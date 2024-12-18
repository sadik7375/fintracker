<!DOCTYPE html>
<html>
<head>
    <title>Payment Slip</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e6f0f8;
            margin: 20px;
            padding: 0;
        }
        .container {
            background: white;
            padding: 20px 30px;
            border: 1px solid #000;
        }
        h1, h3 {
            text-align: center;
            margin: 0;
        }
        .row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        .section {
            margin: 15px 0;
        }
        .bottom-text {
            display: flex;
            justify-content: space-between;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Fintracker</h1>
        <div class="row">
            <h3>Payment Slip</h3>
            <h3>Download</h3>
        </div>

        <div class="section">
            <div class="row">
                <strong>Member ID:</strong> <span>{{ $deposit->member->id }}</span>
                <strong>Member Name:</strong> <span>{{ $deposit->member->name }}</span>
            </div>
            <div class="row">
                <strong>Deposit Date:</strong> <span>{{ $deposit->date }}</span>
                <strong>Amount:</strong> <span>{{ number_format($deposit->amount, 2) }} BDT</span>
            </div>
            <div class="row">
                <strong>Fine:</strong> <span>{{ $deposit->fine ?? '0.00' }} BDT</span>
                <strong>Payment Method:</strong> <span>{{ $deposit->transfer_method }}</span>
            </div>
            <div class="row">
                <strong>Transaction No:</strong> <span>{{ $deposit->transaction_no }}</span>
                <strong>Trans No:</strong> <span>{{ $deposit->transaction_no }}</span>
            </div>
        </div>

        <div class="bottom-text">
            <div>
                <strong>Deposit By</strong>
            </div>
            <div>
                <strong>Receive By</strong>
            </div>
        </div>
    </div>
</body>
</html>
