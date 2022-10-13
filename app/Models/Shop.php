<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Shop extends Model
{
    protected $guarded =[
        'enter'
    ];
    protected $dates = [
        'buy_date',
        'total_date',
    ];
//  買い物リスト
    public function index(){
        $shops = Shop::select('shops.id', 'store_name', 'total', 'users.name as buyer', 'buy_date', 'total_date', 'users.name as enter', 'pay_check', 'shops.created_at', 'shops.updated_at')
            ->join('users', 'shops.buyer', '=', 'users.id')
            ->get();
//        shopsテーブルの中の「buy_date」をstring型からtimestamp型に変更しdateを使いformatを"Y/m/d"に変更
        foreach ($shops as $shop) {
            $shop->buy_date = date("Y/m/d", strtotime($shop->buy_date));
        }
        return $shops;
    }
//    買い物_詳細
    public function show($id){
        $shop = Shop::find($id);
    //        Userテーブルの「id」と「name」を取得しpluckを使い必要な部分のみを配列にさせ変数に代入する
        $user = User::select('id', 'name')->pluck('name', 'id');

    //  URLのID対策
        if(Shop::where('id','=',"$id")->count() ==0){
            abort(404);
        }

        session(['shop_id' => $shop->id]);
        $result = 0;
//　　　　　$idをもとにreceiptsテーブルの「shop_id」が同じレコードのみを取得する
        $receipts = receipt::where('shop_id', '=', $id)->get();
//        買い物詳細の合計を求める
        foreach($receipts as $receipt_data){
            $result += $receipt_data->price;
        }
        return [$shop,$user,$receipts,$result];
    }

//    買い物_保存
    public function store($request){
        $shop = new Shop;
        $shop->fill($request->all());

        $shop->enter = Auth::id();

        $shop->save();

        return $shop;
    }
//    買い物_編集
    public function edit($id){
        $shop = Shop::find($id);

    //  URLのID対策
        if(Shop::where('id','=',"$id")->count() ==0){
            abort(404);
        }
        return $shop;
    }
//    買い物_登録
    public function shop_update($request,$id){
        $shop=Shop::find($id);

        $shop->store_name = $request->input('store_name');
        $shop->total = $request->input('total');
        $shop->buyer = $request->input('buyer');
        $shop->buy_date = $request->input('buy_date');
        $shop->total_date = $request->input('total_date');
        $shop->pay_check = $request->input('pay_check');

        if (is_null($shop->total_date)) {
            $shop->total_date = '1900-01-01';
        }

        $shop->enter = Auth::id();
        $shop->save();

        return $shop;
    }
//    買い物_削除
    public function shop_destroy($id){
        $shop = Shop::find($id);
        $users_id = receipt::where('shop_id','=',$id);

        $users_id->delete();
        $shop->delete();

        return $shop;
    }

}
