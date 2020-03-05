<?php

use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\DB;

class CategorysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id1 = Uuid::uuid1();
        $id2 = Uuid::uuid1();
        $id3 = Uuid::uuid1();
        DB::table('wl_category')->insert([
            'category_id'=>$id1,
            'category_name'=>'报价与时效',
            'category_pid'=>'0',
            'category_content'=>'报价与时效',
        ]);
        DB::table('wl_category')->insert([
            'category_id'=>$id2,
            'category_name'=>'公路报价',
            'category_pid'=>$id1,
            'category_content'=>'公路报价',
        ]);
        DB::table('wl_category')->insert([
            'category_id'=>$id3,
            'category_name'=>'航空报价',
            'category_pid'=>$id1,
            'category_content'=>'公路报价',
        ]);
    }
}
