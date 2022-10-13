@extends('layouts.app')

@section('content')
    <div class="">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>shop編集</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="mt-4" method="post" action="{{route('shop.update',['id'=>$shop->id])}}">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">店名</label>
                        <div class="col-sm-10">
                            <input name="store_name" value="{{ old('store_name',$shop->store_name)}}" type="text"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">合計</label>
                        <div class="col-sm-10">
                            <input name="total" value="{{ old('total',$shop->total)}}" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3 justify-content-between">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">購入者</label>
                        <select class="form-control" name="buyer" style="width:80%; margin-right: 2%">
                            @foreach($users as $user)
                                <option value="{{$user->id}}"
                                        @if($user->id==old('buyer',$shop->buyer)) selected @endif>{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">購入日</label>
                        <div class="col-sm-10">
                            <input name="buy_date" value="{{ old('buy_date',$shop->buy_date->format('Y-m-d'))}}"
                                   type="date" class="form-control" min="1900-01-01" max="{{date('Y-m-d')}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">集計日</label>
                        <div class="col-sm-10">
                            <input name="total_date" type="date" class="form-control"
                                   value="{{$is_date ? old('total_date',$shop->total_date->format('Y-m-d')) : old('total_date')}}"
                                   min="1900-01-01" max="{{date('Y-m-d')}}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-10 text-start">
                            <div class="form-check-reverse text-start">
                                <label class="form-check-label" for="gridCheck1">
                                    支払いチェック
                                </label>
                                <input class="form-check-input float-none" type="checkbox" name="pay_check" value="1"
                                       @if($shop->pay_check=="1")checked="checked"@endif>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <a href="{{route('shop.show',['id'=>$shop->id])}}" class="btn btn-dark">一覧に戻る</a>
                        </div>
                        <div class="col-2">
                            <input class="btn btn-primary" type="submit" value="更新する">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
