@extends('layouts.app')

@section('content')
<div class="container">
    <h2>新規ワークアウト</h2>
    <form action="{{ route('workouts.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="type">タイプ</label>
            <input type="text" name="type" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="date">日付</label>
            <input type="date" name="date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="duration_minutes">時間 (分)</label>
            <input type="number" name="duration_minutes" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="distance">距離 (km)</label>
            <input type="number" step="0.10" name="distance" class="form-control">
        </div>
        <div class="form-group">
            <label for="notes">メモ</label>
            <input type="text" name="notes" class="form-control">
        </div>
        <div class="d-flex justify-content-end mt-3">
            <button type="submit" class="btn btn-success mx-2">追加</button>
            <a href="{{ route('workouts.index') }}" class="btn btn-primary">戻る</a>
        </div>
    </form>
</div>
@endsection