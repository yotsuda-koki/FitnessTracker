@extends('layouts.app')

@section('content')
<div class="container">
    <h2>ワークアウト詳細</h2>
    <div class="card">
        <div class="card-body">
            <p class="card-text"><strong>運動タイプ:</strong> {{ $workout->type }}</p>
            <p class="card-text"><strong>日付:</strong> {{ $workout->date }}</p>
            <p class="card-text"><strong>時間:</strong> {{ substr($workout->duration, 0, 5) }} 分</p>
            <p class="card-text"><strong>距離:</strong> {{ $workout->distance }} km</p>
            <p class="card-text"><strong>メモ:</strong> {{ $workout->notes }}</p>
            <div class="d-flex justify-content-end mt-3">
                <a href="{{ route('workouts.index') }}" class="btn btn-primary">戻る</a>
            </div>
        </div>
    </div>
    @endsection