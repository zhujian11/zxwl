<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('wl_config')->insert([
            'config_title'=>'网站标题',
            'config_name'=>'web_title',
            'config_content'=>'正兴物流',
        ]);
        DB::table('wl_config')->insert([
            'config_title'=>'统计代码',
            'config_name'=>'web_count',
            'config_content'=>'<script></script>',
        ]);
        DB::table('wl_config')->insert([
            'config_title'=>'seo_title',
            'config_name'=>'web_seo_title',
            'config_content'=>'正兴物流-快递公司',
        ]);
    }
}
