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
                <div class="card-header">プロフィール編集</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('userInfo.update') }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row my-1">
                            <label for="name" class="col-md-4 col-form-label text-md-right">名前</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" readonly>
                            </div>
                        </div>

                        <div class="form-group row my-1">
                            <label for="age" class="col-md-4 col-form-label text-md-right">年齢</label>
                            <div class="col-md-6">
                                <input id="age" type="number" class="form-control" name="age" value="{{ $userInfo->age ?? '' }}">
                            </div>
                        </div>

                        <div class="form-group row my-1">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">性別</label>
                            <div class="col-md-6">
                                <select id="gender" class="form-control" name="gender">
                                    <option value="0" {{ isset($userInfo->gender) && $userInfo->gender == 0 ? 'selected' : '' }}>性別を選択してください</option>
                                    <option value="1" {{ isset($userInfo->gender) && $userInfo->gender == 1 ? 'selected' : '' }}>男性</option>
                                    <option value="2" {{ isset($userInfo->gender) && $userInfo->gender == 2 ? 'selected' : '' }}>女性</option>
                                    <option value="3" {{ isset($userInfo->gender) && $userInfo->gender == 3 ? 'selected' : '' }}>その他</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row my-1">
                            <label for="height" class="col-md-4 col-form-label text-md-right">身長 (cm)</label>
                            <div class="col-md-6">
                                <input id="height" type="number" class="form-control" name="height" value="{{ $userInfo->height ?? '' }}">
                            </div>
                        </div>

                        <div class="form-group row my-1">
                            <label for="weight" class="col-md-4 col-form-label text-md-right">体重 (kg)</label>
                            <div class="col-md-6">
                                <input id="weight" type="number" class="form-control" name="weight" value="{{ $userInfo->weight ?? '' }}">
                            </div>
                        </div>

                        <div class="form-group col-md-10 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary mx-1">更新</button>
                            <a href="{{ route('userInfo.index') }}" class="btn btn-secondary">戻る</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection