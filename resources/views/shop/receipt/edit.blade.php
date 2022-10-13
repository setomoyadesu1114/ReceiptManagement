@extends('layouts.app')

@section('content')
    <div class="">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>レシート編集</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="mt-4" method="post" action="{{route('receipt.update',['id'=>$receipt->id])}}">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="pt-4 w-50">
                            <div class="card mb-2">
                                <table class="table text-center">
                                    <thead>
                                    <tr>
                                        <th scope="col">商品名</th>
                                        <th scope="col">単価</th>
                                        <th scope="col">個数</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <input name="product_name" value="{{ old('product_name',$receipt->product_name)}}" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input name="unit_price"   value="{{ old('unit_price',$receipt->unit_price)}}" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input name="quantity"   value="{{ old('quantity',$receipt->quantity)}}" type="text" class="form-control">
                                        </td>

                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <a href="{{route('shop.show',$shop_id)}}" class="btn btn-secondary">買い物詳細に戻る</a>
                                </div>
                                <div class="col-6">
                                    <button type="submit" class="btn btn-outline-info">更新</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
