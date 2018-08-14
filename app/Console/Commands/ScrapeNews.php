<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Goutte\Client;

class ScrapeNews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:news';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scrape news titles';

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
     * @return mixed
     */
    public function handle()
    {
        //
        $date = date('Ymd', strtotime('-1 day'));
        $client = new Client();
        $crawler = $client->request('GET', 'https://ria.ru/archive/'.$date);
        $crawler->filter('.b-list .b-list__item a span.b-list__item-title')->each(function($node){
          DB::table('russiannews')->limit(1)->delete();
          $date = date('Ymd', strtotime('-1 day'));
          $title = $node->text();
          $param = [
            'question' => $title,
            'date' => $date,
            'level' => 3,
            'en' => '',
            'jp' => '',
          ];
          DB::table('russiannews')->insert($param);
        });

    }
}
