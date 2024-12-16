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
                    <div id="fineResult" class="mt-3"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Table for Unpaid Members -->
 <!-- Table for Unpaid Members -->
<div class="row mt-5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Members with Unpaid Fines for Current Month</h5>
                <!-- Download CSV Button -->
               
            </div>
            <div class="card-block">
                @if($unpaidMembers->isEmpty())
                    <p class="text-success">All members have paid their deposits for this month.</p>
                @else
                    <table class="table table-striped" id="unpaidMembersTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Member Name</th>
                                <th>Member ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($unpaidMembers as $key => $member)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $member->name }}</td>
                                    <td>{{ $member->id }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
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

    document.addEventListener('DOMContentLoaded', function () {
        // Add a button to download CSV
        const downloadButton = document.createElement('button');
        downloadButton.innerText = 'Download CSV Report';
        downloadButton.classList.add('btn', 'btn-success', 'mb-3');
        downloadButton.onclick = downloadCSV;

        // Insert the button above the table
        const cardHeader = document.querySelector('.card-header');
        cardHeader.appendChild(downloadButton);

        // Function to download the CSV
        function downloadCSV() {
            const table = document.querySelector('.table'); // Select the table
            const rows = table.querySelectorAll('tr'); // Get all rows
            let csvContent = '';

            // Loop through table rows
            rows.forEach(row => {
                const cols = row.querySelectorAll('th, td');
                const rowData = Array.from(cols).map(col => col.innerText.trim()).join(',');
                csvContent += rowData + '\n';
            });

            // Create a Blob with the CSV content
            const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
            const link = document.createElement('a');

            // Set download attributes
            link.href = URL.createObjectURL(blob);
            link.download = 'unpaid_members_report.csv';
            link.style.display = 'none';

            document.body.appendChild(link); // Append to the DOM
            link.click(); // Trigger download
            document.body.removeChild(link); // Clean up
        }
    });



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

    document.getElementById('downloadCsvButton').addEventListener('click', function () {
        const table = document.getElementById('unpaidMembersTable'); // Table ID
        const rows = table.querySelectorAll('tr'); // Get all rows
        let csvContent = '';

        // Extract table data
        rows.forEach(row => {
            const cols = row.querySelectorAll('th, td');
            const rowData = Array.from(cols).map(col => col.innerText.trim()).join(',');
            csvContent += rowData + '\n';
        });

        // Create and trigger file download
        const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
        const link = document.createElement('a');
        link.href = URL.createObjectURL(blob);
        link.download = 'unpaid_members_report.csv';
        link.style.display = 'none';

        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    });

   
      




</script>

@endsection
