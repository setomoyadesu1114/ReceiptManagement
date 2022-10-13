@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('ログインができました。') }}
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <a href="{{('/shop/index')}}" class="btn btn-primary">
                                    トップへ
                                </a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
