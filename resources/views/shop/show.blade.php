@extends('layouts.app')

@section('content')
    <div class="">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h2>{{$shop->store_name}}</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card">
                    <table class="table text-center">
                        <thead>
                        <tr>
                            @if($result==0)
                            <th scope="col">合計</th>
                            @endif
                            <th scope="col">購入者</th>
                            <th scope="col">購入日</th>
                            <th scope="col">集計日</th>
                            <th scope="col">記載者</th>
                            <th scope="col">登校日</th>
                            <th scope="col">更新日</th>
                            <th scope="col"><small>支払いチェック</small></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            @if($result==0)
                            <td>{{$shop->total}}</td>
                            @endif
                            <td>{{$user[$shop->buyer]}}</td>
                            <td>{{$shop->buy_date->format('Y/m/d')}}</td>
                            @if(strtotime($shop->total_date) == strtotime("1900/01/01"))
                                <td class="text-danger">未記入</td>
                            @else
                                <td>{{$shop->total_date->format('Y/m/d')}}</td>
                            @endif
                            <td>{{$user[$shop->enter]}}</td>
                            <td>{{$shop->created_at->format('Y/m/d')}}</td>
                            <td>{{$shop->updated_at->format('Y/m/d')}}</td>
                            <td>
                                <input class="form-check-input" disabled="disabled" type="checkbox"
                                           id="checkboxNoLabel" value="" @if($shop->pay_check=="1")checked="checked" @endif>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-2">
                        <a class="mt-2 btn btn-info" href="{{route('shop.edit',['id'=>$shop->id])}}">編集</a>
                    </div>
                    <div class="col-4">
                        <a class="mt-2 btn btn-dark" href="{{route('shop.index')}}">買い物リストに戻る</a>
                    </div>
                </div>
            </div>
        </div>
        @if($receipts != null)
            <div class="row justify-content-center">
                <div class="pt-4" style="width: 600px">
                    <div class="row mb-2">
                        <h3 class="col-6">レシート</h3>
                        @if($result!=0)
                        <h4 class="col-6">
                            合計：{{(int)$result}}
                        </h4>
                        @endif
                    </div>
                    <div class="row mb-2">
                        <div class="col-5">
                            <a class="btn btn-primary" href="{{route('receipt.create')}}" role="button">新規作成</a>
                        </div>
                    </div>
                    <div class="card">
                        <table class="table text-center">
                            <thead>
                            <tr>
                                <th style="width: 10%;" scope="col">番号</th>
                                <th class="w-25" scope="col">商品名</th>
                                <th class="w-15" scope="col">単価</th>
                                <th style="width: 10%;" scope="col">個数</th>
                                <th class="w-20" scope="col">価格</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($receipts as $key=>$receipt)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$receipt->product_name}}</td>
                                    <td>{{$receipt->unit_price}}</td>
                                    <td>{{$receipt->quantity}}</td>
                                    <td>{{$receipt->price}}</td>
                                    <td class="w-auto">
                                        <a href="{{route('receipt.edit',['id'=>$receipt->id])}}" role="button"
                                           class="btn btn-info btn-sm">編集</a>
                                    </td>
                                    <td class="w-auto">
                                        <form method="POST" action="{{route('receipt.destroy',['id'=>$receipt->id])}}">
                                            @csrf
                                            <button class="btn btn-outline-dark btn-sm" type="submit">削除</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
