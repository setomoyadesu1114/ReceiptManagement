<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipts', function (Blueprint $table) {
//            shoppingのID
            $table->integer('shop_id');
//            receiptのID
            $table->bigincrements('id');
//            商品名
            $table->string('product_name');
//            単価
            $table->integer('unit_price');
//            個数
            $table->integer('quantity');
//            金額
            $table->integer('price');
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
        Schema::dropIfExists('receipts');
    }
}
