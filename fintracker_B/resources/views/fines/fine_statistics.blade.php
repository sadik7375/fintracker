@extends('layouts.layouts')

@section('content')
<div class="page-body">
    <div class="row">
        <!-- Statistics Chart -->
        <div class="col-md-12 col-xl-8">
            <div class="card">
                <div class="card-header">
                    <h5>Statistics</h5>
                </div>
                <div class="card-block">
                    <!-- Chart Container -->
                    <canvas id="fineChart" style="height:517px;"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js Library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('fineChart').getContext('2d');

        // Data passed from the controller
        const months = @json($months);
        const counts = @json($counts);

        // Chart Configuration
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: months,
                datasets: [{
                    label: 'Unpaid Members (Monthly)',
                    data: counts,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
@endsection
