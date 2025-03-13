<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>High Expense Notification</title>

    <style>
        body {
            background-color: #f4f7fc;
            padding: 20px;
        }
    </style>
</head>

<body>
    <h1>High Expense Notification</h1>
    <p>Dear <strong>{{ $user->name }}</strong>,</p>

    <p>You have added a new expense of <strong>${{ number_format($expenseAmount, 2) }}</strong>
        to your account.</p>

    @if ($savings > 0)
        <p>In addition, a savings balance of <strong>${{ number_format($savings, 2) }}</strong> has been
            added
            to your Piggy Bank.</p>
    @endif

</body>

</html>
