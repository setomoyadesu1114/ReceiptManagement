<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\shop;


class ShopController extends Controller
{
    /**
     * /**
     * Show the application dashboard.
     *
     * @return Application|Factory|View
     */
//　買い物リスト
    public function index()
    {
        $shop = new shop();
        $shops = $shop->index();

        return view('shop.index', compact('shops'));
    }

    /**
     * Show the application dashboard.
     *
     * @return Application|Factory|View
     */
//　買い物_詳細
    public function show($id)
    {

        $shops = new shop;

        list($shop, $user, $receipts, $result) = $shops->show($id);
        return view('shop/show', compact('shop', 'user', 'receipts', 'result'));
    }
    /**
     * Show the application dashboard.
     *
     * @return Application|Factory|View
     */
    //   買い物_新規作成
    public function create()
    {
//        userテーブルの「id」と「name」選択し変数に代入する
        $users = User::select('id', 'name')->get();

        return view('shop/create', compact("users"));
    }

    /**
     * Show the application dashboard.
     * @param Request $request
     * @return Application|Factory|View
     */
    //   買い物_保存
    public function store(Request $request)
    {
//    　　「store_name」、「total」、「buy_date」をバリデーションを行う
        $request->validate([
            'store_name' => 'required|string|min:1|max:20',
            'total' => 'required|min:1|max:99999999|numeric',
            'buy_date' => 'required|before:tomorrow|after:1900-01-01',
        ]);

        $shops = new Shop;
        $shops->store($request);

        return redirect('shop/index');
    }

    /**
     * Show the application dashboard.
     *
     * @return Application|Factory|View
     */
    //   買い物_編集
    public function edit($id)
    {
        $users = User::select('id', 'name')->get();

        $shops = new shop();
        $shop = $shops->edit($id);
        $is_date = strtotime($shop->total_date) != strtotime("1900-01-01");
        return view('shop/edit', compact('shop', 'users', 'is_date'));
    }

//買い物_登録
    public function update(Request $request, $id)
    {
        $request->validate([
            'store_name' => 'required|string|min:1|max:20',
            'total' => 'required|min:1|max:99999999|numeric',
            'buy_date' => 'required|before:tomorrow|after:1900-01-01',
        ]);

        $shops = new shop();
        $shops->shop_update($request, $id);

        return redirect("shop/show/$id");
    }

//買い物_削除
    public function destroy($id)
    {
        $shop = new shop;
        $shop->shop_destroy($id);

        return redirect('shop/index');
    }
    /**
     * Show the application dashboard.
     *
     * @return Application|Factory|View
     */

}
