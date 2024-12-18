@extends('layouts.layouts')


        
@section('content')

    <div class="container" id="payment-slip">

        <h3  class="text-center mt-3">Payment Slip</h3>
        
        <!-- Member Details -->
        <div style="display:flex; justify-content: space-around;">
            <div>
            <p><strong>Name:</strong> {{ $member->name }}</p>
            <p><strong>Phone:</strong> {{ $member->phone }}</p>
            </div>
            <div>
            <p><strong>Email:</strong> {{ $member->email }}</p>
            <p><strong>Member ID:</strong> {{ $member->member_id }}</p>
            </div>
        </div>

        <!-- Deposits Table -->
        <h5>Deposit Details</h5>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Fine</th>
                    <th>Transaction No</th>
                    <th>Transfer Method</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($deposits as $deposit)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $deposit->amount }}</td>
                        <td>{{ $deposit->date }}</td>
                        <td>{{ $deposit->fine }}</td>
                        <td>{{ $deposit->transaction_no }}</td>
                        <td>{{ $deposit->transfer_method }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No deposits found for this member.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <button onclick="downloadPDF()" class="btn btn-success no-print ">Download Slip</button>
        <!-- Footer -->
        <!-- <div class="row mt-8">
            <div class="col-6 text-center"><strong>Deposit By</strong></div>
            <div class="col-6 text-center"><strong>Receive By</strong></div>
        </div> -->
    </div>

    <script>
        function downloadPDF() {
            const element = document.getElementById('payment-slip');
            const options = {
                margin: 1,
                filename: 'deposit-slip.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
            // Generate PDF
            html2pdf().from(element).set(options).save();
        }
    </script>



@endsection
