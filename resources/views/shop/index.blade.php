@extends('layouts.app')

@section('content')
    <div class="">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>買い物リスト</h2>
                <div class="mb-2">
                    <a href="{{ route('shop.create') }}" role="button" class="btn btn-primary">新規作成</a>
                </div>
                <div class="card">
                    <table class="table text-center">
                        <thead>
                        <tr>
                            <th scope="col">番号</th>
                            <th scope="col">店名</th>
                            <th scope="col">合計</th>
                            <th scope="col">購入者</th>
                            <th scope="col">購入日</th>
                            <th scope="col"><small>支払いチェック</small></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($shops as $key=>$shop)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$shop->store_name}}</td>
                                <td>{{$shop->total}}</td>
                                <td>{{$shop->buyer}}</td>
                                <td>{{$shop->buy_date->format('Y/m/d')}}</td>
                                <td>
                                    <input class="form-check-input" disabled="disabled" type="checkbox" value=""
                                           @if($shop->pay_check=="1")checked="checked" @endif>
                                </td>
                                <td>
                                    <a href="{{route('shop.show',['id'=>$shop->id])}}" role="button"
                                       class="btn btn-secondary btn-sm">詳細</a>
                                </td>
                                <td>
                                    <form method="POST" action="{{route('shop.destroy',['id'=>$shop->id])}}">
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
    </div>
@endsection
