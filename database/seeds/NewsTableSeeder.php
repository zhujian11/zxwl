<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('wl_news')->insert([
            'news_title'=>'正兴物流大量库房出租',
            'news_desc'=>'正兴物流大量库房出租',
            'news_content'=>'正兴物流大量库房出租',
            'created_at'=>date('Y-m-d H:i:s'),
        ]);
        DB::table('wl_news')->insert([
            'news_title'=>'正兴物流大量库房出租1',
            'news_desc'=>'正兴物流大量库房出租1',
            'news_content'=>'正兴物流大量库房出租1',
            'created_at'=>date('Y-m-d H:i:s'),
        ]);
        DB::table('wl_news')->insert([
            'news_title'=>'正兴物流大量库房出租2',
            'news_desc'=>'正兴物流大量库房出租2',
            'news_content'=>'正兴物流大量库房出租2',
            'created_at'=>date('Y-m-d H:i:s'),
        ]);
        DB::table('wl_news')->insert([
            'news_title'=>'正兴物流大量库房出租3',
            'news_desc'=>'正兴物流大量库房出租3',
            'news_content'=>'正兴物流大量库房出租3',
            'created_at'=>date('Y-m-d H:i:s'),
        ]);
    }
}
