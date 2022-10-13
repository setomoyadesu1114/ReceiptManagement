<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shops')->insert(
            [
                [
//                    店名
                    'store_name' => 'イオン',
//                    合計
                    'total' => 20000,
//                    購入者
                    'buyer' => '瀬戸',
//                    購入日
                    'buy_date' => now()->format('Y/m/d'),
//                    集計日
                    'total_date' => now()->format('Y/m/d'),
//                    記載者
                    'edit_user_id' => 1,
//                    支払いチェック
                    'pay_check' => true,
//                    編集日
                    'created_at' => now()->format('Y/m/d'),
//                    更新日
                    'updated_at' => now()->format('Y/m/d'),
                ],
            ]
        );
    }
}
