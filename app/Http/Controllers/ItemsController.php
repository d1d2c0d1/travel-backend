<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redis;

class ItemsController extends Controller
{

    public function test() {
        $countries = Country::all();

        return [
            'status' => true,
            'countries' => $countries
        ];
    }

    /**
     * @param Request $request
     * @return Application|Response|ResponseFactory
     */
    public function filter(Request $request): Application|ResponseFactory|Response
    {

        if( !$request->isJson() ) {
            return response([
                'status' => false,
                'error' => 'JSON-Body is required'
            ], 404);
        }

        $perPage = ((int) $request->json('perPage')) <= 0 ? 10 : ((int) $request->json('perPage'));
        $nowPage = ((int) $request->json('page')) <= 0 ? 1 : ((int) $request->json('page'));

        $result = [
            'status' => true,
        ];

        $data = [];

        $nowItem = 0;
        while($nowItem <= $perPage) {
            $data[] = $this->generateItem();
            ++$nowItem;
        }

        // Counting pagination
        $countItems = 150;
        $endPage = round($countItems / $perPage);

        // Set result
        $result['data'] = $data;
        $result['pagination'] = [
            'endPage' => $endPage,
            'nowPage' => $nowPage,
            'itemsPerPage' => $perPage,
            'countItems' => $countItems
        ];

        return response($result);
    }

    /**
     * @param int $id
     * @param Request $request
     * @return array
     */
    public function single(int $id, Request $request): array
    {
        $result = [
            'status' => true,
            'data' => $this->generateItem(true),
            'backId' => rand(100, 15000),
            'nextId' => rand(15000, 25000)
        ];

        return $result;
    }

    /**
     * @param bool $full
     * @return array
     */
    public function generateItem(bool $full = false): array
    {
        $item = [
            'id' => rand(1000, 1500000),
            'title' => $this->generateTitle(rand(2, 6)),
            'description' => $this->generateTitle(rand(15, 48)),
            'duration' => rand(150, 3660),
            'type' => 'group',
            'itemType' => rand(1, 15),
            'price' => rand(1, 15000),
            'priceType' => rand(1, 15),
            'isFavorite' => false,
            'rating' => 4.8,
            'images' => [
                "/uploads/img/1.jpg",
                "/uploads/img/2.jpg",
                "/uploads/img/3.jpg"
            ],
            'properties' => [],
            'phones' => [
                rand(8913000000, 8918111111),
                rand(8913000000, 8918111111)
            ],
            'workTime' => [
                "start" => rand(0, 12) . ':' . rand(0,59),
                "end" => rand(0, 12) . ':' . rand(0,59),
            ],
            "category" => [
                "id" => rand(150, 100000),
                "title" => $this->generateTitle(rand(1, 3)),
                "link" => "/parks-i-attrakcioni"
            ],
        ];

        if( $full === true ) {
            $item['reviews'] = [
                [
                    "id" => rand(10, 100),
                    "author" => "Артемий Лебедев",
                    "rating" => 4.9,
                    "text" => "Текст отзыва",
                    "avatar" => "/uploads/img/artemii-250x250.jpg"
                ],
                [
                    "id" => rand(10, 100),
                    "author" => "Илья Варламов",
                    "rating" => 3.2,
                    "text" => "Текст отзыва",
                    "avatar" => "/uploads/img/ilyia-250x250.jpg"
                ],
                [
                    "id" => rand(10, 100),
                    "author" => "Пётр Ловыгин",
                    "rating" => 4.5,
                    "text" => $this->generateTitle(rand(32, 68)),
                    "avatar" => "/uploads/img/ilyia-250x250.jpg"
                ]
            ];

            $item['nearPlaces'] = [];

            $places = 0;
            while ($places <= 6) {
                $item['nearPlaces'][] = [
                    "id" => rand(1000, 100500),
                    "title" => "Солохаул: история и традиции чаеводства в Сочи",
                    "description" => "Если вы уже получили дозу субтропического ультрафиолета, посозерцали искрящиеся волны и насытились кавказской кухней, а маршруты к водопадам, пещерам и каньонам знаете, как свои пять пальцев, пора открывать новые горизонты!",
                    "duration" => rand(600, 3660),
                    "type" => "group",
                    "itemType" => rand(0, 9),
                    "price" => rand(1000, 90000),
                    "priceType" => rand(0, 9),
                    "isFavorite" => rand(0,1) === 1,
                    "address" => "Олимпийский проспект, 21",
                    "rating" => rand(0,5) . '.' . rand(0,9),
                    "images" => [
                        "/uploads/img/1.jpg",
                        "/uploads/img/2.jpg",
                        "/uploads/img/3.jpg"
                    ],
                ];
                $places++;
            }
        }

        if( rand(0, 1) === 1 ) {
            $item['properties'][] = [
                "name" => "with-child",
                "value" => "Можно с детьми"
            ];
        }

        if( rand(0, 1) === 1 ) {
            $item['properties'][] = [
                "name" => "with-self-food",
                "value" => "Можно с своей едой"
            ];
        }

        if( rand(0, 1) === 1 ) {
            $item['properties'][] = [
                "name" => "with-body-free",
                "value" => "Свободное боди"
            ];
        }

        if( rand(0, 1) === 1 ) {
            $item['properties'][] = [
                "name" => "with-long-time",
                "value" => "На долгое время"
            ];
        }

        if( rand(0, 1) === 1 ) {
            $item['properties'][] = [
                "name" => "with-last-count",
                "value" => "В последний раз"
            ];
        }

        if( rand(0, 1) === 1 ) {
            $item['properties'][] = [
                "name" => "only-for-boys",
                "value" => "Только для парней"
            ];
        }

        return $item;
    }

    /**
     * @param int $cntWords
     * @return string
     */
    public function generateTitle(int $cntWords = 5): string
    {
        $result = '';

        $words = [
            'только', 'лучший', 'камень', 'обь',
            'поход', 'столик', 'гребень', 'гора',
            'проход', 'строгий', 'велик', 'лыжи',
            'красный', 'черный', 'зеленый', 'пастила'
        ];

        $now = 0;

        while ($now <= $cntWords) {
            $result .= $words[rand(0, count($words) - 1)];

            if( $now >= 1 && $now <= $cntWords - 1) {
                $result .= ' ';
            }

            ++$now;
        }

        return $result;
    }
}