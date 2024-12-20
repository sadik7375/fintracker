@extends('layouts.layouts')

@section('content')

<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Investment List</h5>
                    <a href="{{ route('investments.create') }}" class="btn btn-primary">Add Investment</a>
                </div>
                <div class="card-block table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Investment Name</th>
                                    <th>Category</th>
                                    <th>Amount</th>
                                    <th>Investment Date</th>
                                    <th>Maturity Date</th>
                                    <th>ROI(%)</th>
                                    <th>Target(%)</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($investments as $investment)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $investment->name }}</td>
                                        <td>{{ $investment->category }}</td>
                                        <td>{{ $investment->amount }}</td>
                                        <td>{{ $investment->investment_date }}</td>
                                        <td>{{ $investment->maturity_date ?? 'N/A' }}</td>
                                        <td>{{ $investment->roi ?? 'N/A' }}%</td>
                                        <td>{{ $investment->target ?? 'N/A' }}%</td>
                                        <td>
                                            <a href="{{ route('investments.show', $investment->id) }}" class="btn btn-info btn-sm">View</a>
                                            <a href="{{ route('investments.edit', $investment->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('investments.destroy', $investment->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
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
</div>




<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="card-block">
    <canvas id="roiChart" style="height:517px;"></canvas>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('roiChart').getContext('2d');
    const roiData = @json($monthlyROI);
    const labels = roiData.map(data => `${data.month}-${data.year}`);
    const data = {
        labels: labels,
        datasets: [{
            label: 'Average ROI',
            data: roiData.map(data => data.average_roi),
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        }, {
            label: 'Target ROI',
            data: roiData.map(data => data.average_target),
            borderColor: 'rgb(255, 99, 132)',
            tension: 0.1
        }]
    };

    new Chart(ctx, {
        type: 'line',
        data: data,
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




@endsection
