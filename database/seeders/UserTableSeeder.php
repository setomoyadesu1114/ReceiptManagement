<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
//                ID
                'ID'=>1,
//                ユーザー名
                'user_name'=>'田所',
//                編集日
                'created_at'=>now(),
//                更新日
                'updated_at'=>now(),

            ]
        );
    }
}
