<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;

class NewsUpdateCommand extends Command
{

    protected string $apiKey = '1e1639e8b3d740a38ac199cb6a0286ee';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'news:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update last news for blog page';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Transliterate-language
     *
     * @param string $text
     * @return string
     */
    public function cyr2lat(string $text): string
    {
        $cyr = array(
            'ж',  'ч',  'щ',   'ш',  'ю',  'а', 'б', 'в', 'г', 'д', 'е', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ъ', 'ь', 'я',
            'Ж',  'Ч',  'Щ',   'Ш',  'Ю',  'А', 'Б', 'В', 'Г', 'Д', 'Е', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ъ', 'Ь', 'Я');
        $lat = array(
            'zh', 'ch', 'sht', 'sh', 'yu', 'a', 'b', 'v', 'g', 'd', 'e', 'z', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'y', 'x', 'q',
            'Zh', 'Ch', 'Sht', 'Sh', 'Yu', 'A', 'B', 'V', 'G', 'D', 'E', 'Z', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'c', 'Y', 'X', 'Q');
        if($text) return str_replace($cyr, $lat, $text);
        return $text;
    }

    /**
     * Return slug from text
     *
     * @param string $text
     * @return string
     */
    public function prepareSlug(string $text): string
    {
        $slug = $this->cyr2lat($text);
        $divider = '-';

        $slug = preg_replace('~[^\pL\d]+~u', $divider, $slug);
        $slug = preg_replace('~[^-\w]+~', '', $slug);
        $slug = trim($slug, $divider);
        $slug = preg_replace('~-+~', $divider, $slug);
        $slug = strtolower($slug);

        if (empty($slug)) {
            return 'n-a';
        }

        return $slug;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {

        $response = Http::get('http://newsapi.org/v2/everything?q=туризм&from=2021-12-20&sortBy=popularity&apiKey=1e1639e8b3d740a38ac199cb6a0286ee');
        $news = $response->json();

        if( isset($news['articles']) && is_array($news['articles']) ) {
            $articles = [];

            foreach ($news['articles'] as $article) {
                $slug = $this->prepareSlug($article['title']);

                $item = [
                    'title' => $article['title'],
                    'link' => $article['url'],
                    'image' => $article['urlToImage'],
                    'description' => $article['description'],
                    'createdAt' => $article['publishedAt'],
                    'slug' => "/blog/{$slug}/",
                    'source' => [
                        'name' => $article['source']['name']
                    ]
                ];

                $articles[$slug] = $item;
            }

            Redis::set('lastNews', json_encode($articles));
        }

        return 1;
    }
}
