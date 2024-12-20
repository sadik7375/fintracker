@extends('layouts.layouts')

@section('content')

<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Investment Profit/Loss Status</h5>
                </div>
                <div class="card-block table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Investment Name</th>
                                    <th>Amount</th>
                                    <th>Return Amount</th>
                                    <th>ROI(%)</th>
                                    <th>Target ROI(%)</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($investments as $investment)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $investment->name }}</td>
                                        <td>${{ number_format($investment->amount, 2) }}</td>
                                        <td>${{ number_format($investment->returns, 2) }}</td>
                                        <td>{{ number_format($investment->roi, 2) }}%</td>
                                        <td>{{ number_format($investment->target, 2) }}%</td>
                                        <td>
                                            @if($investment->roi > $investment->target)
                                                <span class="text-success">Profit</span>
                                            @elseif($investment->target > $investment->roi)
                                                <span class="text-danger">Loss</span>
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h5>Profit/Loss Graph</h5>
        </div>
        <div class="card-block">
            <canvas id="profitLossChart" style="height:400px;"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('profitLossChart').getContext('2d');
            const data = @json($investmentChartData);
            const chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: 'Profit/Loss',
                        data: data.values,
                        backgroundColor: data.colors
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>

</div>

@endsection
