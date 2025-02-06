@extends('layouts.app')

@section('content')
<div class="container">
    <h2>ワークアウト編集</h2>
    <form action="{{ route('workouts.update', $workout->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="type">運動タイプ</label>
            <input type="text" name="type" class="form-control" value="{{ $workout->type }}" required>
        </div>
        <div class="form-group">
            <label for="date">日付</label>
            <input type="date" name="date" class="form-control" value="{{ $workout->date }}" required>
        </div>
        <div class="form-group">
            <label for="duration">時間 (分)</label>
            <input type="number" name="duration_minutes" class="form-control" value="{{ $durationInMinutes }}" required>
        </div>
        <div class="form-group">
            <label for="distance">距離 (km)</label>
            <input type="number" step="0.10" name="distance" class="form-control" value="{{ $workout->distance }}">
        </div>
        <div class="form-group">
            <label for="notes">メモ</label>
            <input type="text" name="notes" class="form-control" value="{{ $workout->notes }}">
        </div>
        <div class="d-flex justify-content-end  mt-3">
            <button type="submit" class="btn btn-success mx-2">更新</button>
            <a href="{{ route('workouts.index') }}" class="btn btn-primary">戻る</a>
        </div>
    </form>
</div>
@endsection