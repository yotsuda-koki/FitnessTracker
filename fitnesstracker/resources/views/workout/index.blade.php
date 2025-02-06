@extends('layouts.app')

@section('content')
<div class="container">
    <h2>ワークアウト一覧</h2>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <a href="{{ route('workouts.create') }}" class="btn btn-primary mb-2">新しいワークアウト</a>
    <table class="table">
        <thead>
            <tr>
                <th>日付</th>
                <th>運動タイプ</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($workouts as $workout)
            <tr>
                <td>{{ $workout->date }}</td>
                <td>{{ $workout->type }}</td>
                <td>
                    <a href="{{ route('workouts.show', $workout->id) }}" class="btn btn-outline-secondary">詳細</a>
                    <a href="{{ route('workouts.edit', $workout->id) }}" class="btn btn-outline-success">編集</a>
                    <form action="{{ route('workouts.destroy', $workout->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('本当に削除しますか？')">削除</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $workouts->links() }}
    </div>
</div>
@endsection