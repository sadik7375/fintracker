@extends('layouts.layouts')

@section('content')

<div class="page-body">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Fine Calculator</h5>
                </div>
                <div class="card-block">
                    <form id="fineCalculatorForm">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="depositValue">Deposit Value</label>
                            <div class="col-sm-8">
                                <input type="number" id="depositValue" class="form-control" placeholder="Enter deposit value" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="finePercentage">Fine Percentage (%)</label>
                            <div class="col-sm-8">
                                <input type="number" id="finePercentage" class="form-control" placeholder="Enter fine percentage" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <button type="button" id="calculateFine" class="btn btn-primary">Calculate Fine</button>
                            </div>
                        </div>
                    </form>
                    <div id="fineResult" class="mt-3">
                        <!-- Fine result will appear here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('calculateFine').addEventListener('click', function () {
        const depositValue = parseFloat(document.getElementById('depositValue').value);
        const finePercentage = parseFloat(document.getElementById('finePercentage').value);

        if (isNaN(depositValue) || isNaN(finePercentage) || depositValue <= 0 || finePercentage < 0) {
            document.getElementById('fineResult').innerHTML = '<p class="text-danger">Please enter valid values.</p>';
            return;
        }

        const fine = (depositValue * finePercentage) / 100;
        document.getElementById('fineResult').innerHTML = `<p>Fine Amount: <strong>${fine.toFixed(2)} BDT</strong></p>`;
    });
</script>

@endsection
