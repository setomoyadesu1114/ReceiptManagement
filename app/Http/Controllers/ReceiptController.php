<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use Illuminate\Http\Request;

class ReceiptController extends Controller
{
//    レシート新規作成
    public function create()
    {
        $shop_id= session('shop_id');

        return view('shop/receipt/create',compact("shop_id"));
    }
//    　レシート保存
    public function store(Request $request)
    {
        $request->validate([
            'product_name'=>'required|max:20',
            'unit_price'=>'required|max:999999|numeric',
            'quantity'=>'required|max:999|numeric',
        ]);

        $receipt =new receipt();
        $shop_id=$receipt->store($request);

        return redirect("shop/show/$shop_id");
    }

//    レシート編集
    public function edit($id)
    {
        $receipts=new receipt();
        list($receipt,$shop_id) =$receipts->edit($id);

        return view('shop/receipt/edit', compact('receipt','shop_id'));
    }

//    レシート更新
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name'=>'required|max:20',
            'unit_price'=>'required|max:999999|numeric',
            'quantity'=>'required|max:999|numeric',
        ]);

        $receipt =new receipt();
        $shop_id=$receipt->receipt_update($request,$id);


        return redirect("shop/show/$shop_id");
    }
//    レシート_削除
    public function destroy($id)
    {
        $shop_id= session('shop_id');

        $receipt=new receipt();
        $receipt->receipt_destroy($id);

        return redirect("shop/show/$shop_id");
    }

}
