@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header">プロフィール</div>

                <div class="card-body">
                    <div class="form-group row my-1">
                        <label for="name" class="col-md-4 col-form-label text-md-right">名前</label>
                        <div class="col-md-6 col-form-label">
                            {{ $user->name }}
                        </div>
                    </div>

                    <div class="form-group row my-1">
                        <label for="age" class="col-md-4 col-form-label text-md-right">年齢</label>
                        <div class="col-md-6 col-form-label">
                            {{ $userInfo->age ?? '未設定' }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="gender" class="col-md-4 col-form-label text-md-right">性別</label>
                        <div class="col-md-6 col-form-label">
                            @switch($userInfo->gender)
                            @case(1)
                            男性
                            @break
                            @case(2)
                            女性
                            @break
                            @case(3)
                            その他
                            @break
                            @default
                            未設定
                            @endswitch
                        </div>
                    </div>

                    <div class="form-group row my-1">
                        <label for="height" class="col-md-4 col-form-label text-md-right">身長</label>
                        <div class="col-md-6 col-form-label">
                            {{ $userInfo->height ?? '未設定' }}cm
                        </div>
                    </div>

                    <div class="form-group row my-1">
                        <label for="weight" class="col-md-4 col-form-label text-md-right">体重</label>
                        <div class="col-md-6 col-form-label">
                            {{ $userInfo->weight ?? '未設定' }}
                        </div>
                    </div>

                    <div class="form-group col-md-8 d-flex justify-content-end">
                        <a href="{{ route('userInfo.edit') }}" class="btn btn-primary">編集</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection