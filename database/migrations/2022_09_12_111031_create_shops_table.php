<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
//            shop_tableのID
            $table->bigincrements('id');
//            店名
            $table->string('store_name');
//            合計
            $table->integer('total');
//            購入者
            $table->integer('buyer');
//            購入日
            $table->date('buy_date');
//            集計日
            $table->date('total_date')->default('1900-01-01');
//            記載者
            $table->integer('enter');
//            支払いチェック
            $table->boolean('pay_check')->nullable();
//            編集日＆更新日
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
