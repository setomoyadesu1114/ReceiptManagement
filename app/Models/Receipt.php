<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    protected $guarded =[
        'shop_id',
        'price'
    ];
//    レシート保存
    public function store($request){
        $receipt = new Receipt;

        $shop_id= session('shop_id');

        $receipt->shop_id = $shop_id;
        $receipt->product_name = $request->input('product_name');
        $receipt->unit_price = $request->input('unit_price');
        $receipt->quantity = $request->input('quantity');
        $receipt->price= $receipt->unit_price*$receipt->quantity;

        $receipt->save();

        return $shop_id;
    }

//    レシート編集
    public function edit($id){
        $receipt = Receipt::find($id);
        $shop_id= session('shop_id');

    //  URLのID対策
        if(Receipt::where('id','=',"$id")->count() ==0){
            abort(404);
        }

        return [$receipt,$shop_id];
    }
//    レシート更新
    public function receipt_update($request,$id){
        $receipt = Receipt::find($id);
        $shop_id= session('shop_id');

        $receipt->shop_id = $shop_id;
        $receipt->product_name = $request->input('product_name');
        $receipt->unit_price = $request->input('unit_price');
        $receipt->quantity = $request->input('quantity');

        $receipt->price= $receipt->unit_price*$receipt->quantity;

        $receipt->save();

        return $shop_id;
    }
//    レシート_削除
    public function receipt_destroy($id){
        $receipt = Receipt::find($id);

        $receipt->delete();
    }
}
