@extends('layouts.layouts')

@section('content')
<div class="main-body">
    <div class="page-wrapper">
        <div class="page-body">
            <div class="row">
                <!-- Total Deposit -->
                <div class="col-md-6 col-xl-3">
                    <div class="card widget-card-1">
                        <div class="card-block-small">
                            <i class="icofont icofont-pie-chart bg-c-blue card1-icon"></i>
                            <span class="text-c-blue f-w-600">Total Deposit</span>
                            <h4>{{ number_format($totalDeposit, 2) }} BDT</h4>
                            <div>
                                <span class="f-left m-t-10 text-muted">
                                    <i class="text-c-blue f-16 icofont icofont-warning m-r-10"></i>Last Updated
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Expense -->
                <div class="col-md-6 col-xl-3">
                    <div class="card widget-card-1">
                        <div class="card-block-small">
                            <i class="icofont icofont-ui-home bg-c-pink card1-icon"></i>
                            <span class="text-c-pink f-w-600">Total Expense</span>
                            <h4>{{ number_format($totalExpense, 2) }} BDT</h4>
                            <div>
                                <span class="f-left m-t-10 text-muted">
                                    <i class="text-c-pink f-16 icofont icofont-calendar m-r-10"></i>Last 24 hours
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Investment -->
                <div class="col-md-6 col-xl-3">
                    <div class="card widget-card-1">
                        <div class="card-block-small">
                            <i class="icofont icofont-warning-alt bg-c-green card1-icon"></i>
                            <span class="text-c-green f-w-600">Total Investment</span>
                            <h4>{{ number_format($totalInvestment, 2) }} BDT</h4>
                            <div>
                                <span class="f-left m-t-10 text-muted">
                                    <i class="text-c-green f-16 icofont icofont-tag m-r-10"></i>Tracked
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Statistics Chart -->
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
                                         
                                                <!-- Data widget End -->
            </div>
        </div>
    </div>
</div>
@endsection
