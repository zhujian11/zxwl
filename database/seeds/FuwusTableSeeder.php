<?php


use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;


class FuwusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('wl_fuwu')->insert([
            'fuwu_id'=>Uuid::uuid1(),
            'fuwu_name'=>'精准汽运',
            'fuwu_desc'=>'普通时效产品，性价比更高，全网覆盖，8大增值服务满足各类客户需求',
            'fuwu_content'=>'普通时效产品，性价比更高，全网覆盖，8大增值服务满足各类客户需求',
            'seo_title'=>'精准汽运',
            'seo_keywords'=>'精准汽运',
            'seo_description'=>'精准汽运',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
        DB::table('wl_fuwu')->insert([
            'fuwu_id'=>Uuid::uuid1(),
            'fuwu_name'=>'精准空运',
            'fuwu_desc'=>'普通时效产品，性价比更高，全网覆盖，8大增值服务满足各类客户需求',
            'fuwu_content'=>'普通时效产品，性价比更高，全网覆盖，8大增值服务满足各类客户需求',
            'seo_title'=>'精准汽运',
            'seo_keywords'=>'精准汽运',
            'seo_description'=>'精准汽运',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),

        ]);

    }
}
