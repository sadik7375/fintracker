<!DOCTYPE html>
<html>
<head>
    <title>Deposit Slip</title>
</head>
<body>
    <h1>Deposit Slip</h1>
    <p>Hello {{ $member->name }},</p>
    <p>This is your deposit slip for the amount of ${{ number_format($deposit->amount, 2) }}.</p>
    <p>Thank you for your deposit on {{ $deposit->created_at->toFormattedDateString() }}.</p>
</body>
</html>
