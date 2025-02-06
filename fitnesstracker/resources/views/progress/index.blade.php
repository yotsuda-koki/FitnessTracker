@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">進捗管理</div>
                <div class="card-body">
                    <canvas id="progressChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('progressChart').getContext('2d');
    let labels = @json(array_keys($data));
    let data = @json(array_values($data));

    let chartData = {
        labels: labels,
        datasets: [{
            label: '運動時間 (分)',
            data: data,
            fill: false,
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 2,
            pointBackgroundColor: 'rgba(75, 192, 192, 1)',
            pointRadius: 5,
            pointHoverRadius: 7
        }]
    };
    new Chart(ctx, {
        type: 'line',
        data: chartData,
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: '運動時間 (分)'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: '日付'
                    }
                }
            }
        }
    });
</script>
@endsection