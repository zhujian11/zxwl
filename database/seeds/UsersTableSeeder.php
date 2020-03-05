<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('wl_user')->insert([
            'user_id'=>Uuid::uuid1(),
            'user_name'=>'admin',
            'user_email'=>'595452769@qq.com',
            'user_password'=>Hash::make(888888)
        ]);
        DB::table('wl_user')->insert([
            'user_id'=>Uuid::uuid1(),
            'user_name'=>'james',
            'user_email'=>'595453769@qq.com',
            'user_password'=>Hash::make(888888)
        ]);
        DB::table('wl_user')->insert([
            'user_id'=>Uuid::uuid1(),
            'user_name'=>'curry',
            'user_email'=>'595454769@qq.com',
            'user_password'=>Hash::make(888888)
        ]);

    }
}
