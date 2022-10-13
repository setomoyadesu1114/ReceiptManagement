@extends('layouts.app')

@section('content')
    <div class="">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>買い物リスト追加</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="mt-4" method="post" action="{{route('shop.store')}}">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">店名</label>
                        <div class="col-sm-10">
                            <input value="{{ old('store_name') }}" type="text" name="store_name" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">合計</label>
                        <div class="col-sm-10">
                            <input value="{{ old('total') }}" type="text" name="total" class="form-control" pattern="^[0-9]+$">
                        </div>
                    </div>
                    <div class="row mb-3 justify-content-between">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">購入者</label>
                        <select class="form-control" name="buyer" style="width:80%; margin-right: 2%">
                            @foreach($users as $user)
                                    <option value="{{$user->id}}"
                                             @if ($user->id==old('buyer'))selected @endif>{{$user->name}}
                                    </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">購入日</label>
                        <div class="col-sm-10">
                            <input value="{{ old('buy_date') }}" type="date" name="buy_date" class="form-control"  min="1900-01-01" max="{{date('Y-m-d')}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-10 text-start">
                            <div class="form-check-reverse text-start">
                                <label class="form-check-label" for="gridCheck1">
                                    支払いチェック
                                </label>
                                    <input class="form-check-input float-none" type="checkbox" name="pay_check" value="1"
                                           @if (old('pay_check')=="1")checked="checked" @endif>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <a href="{{route('shop.index')}}" class="btn btn-dark">一覧に戻る</a>
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-outline-primary">登録</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
