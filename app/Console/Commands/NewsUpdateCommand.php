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
                $item = [
                    'title' => $article['title'],
                    'link' => $article['url'],
                    'image' => $article['urlToImage'],
                    'description' => $article['description'],
                    'createdAt' => $article['publishedAt'],
                    'source' => [
                        'name' => $article['source']['name']
                    ]
                ];

                $articles[] = $item;
            }

            Redis::set('lastNews', json_encode($articles));
        }

        return 1;
    }
}
