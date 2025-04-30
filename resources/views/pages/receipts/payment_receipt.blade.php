<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Payment Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .receipt {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .receipt-header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #ddd;
            padding-bottom: 20px;
        }
        .receipt-header h1 {
            color: #2c3e50;
            margin: 0;
            font-size: 24px;
        }
        .receipt-header p {
            margin: 5px 0;
            color: #7f8c8d;
        }
        .receipt-body {
            margin-bottom: 30px;
        }
        .receipt-info {
            margin-bottom: 20px;
        }
        .receipt-info h2 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #2c3e50;
            border-bottom: 1px solid #eee;
            padding-bottom: 5px;
        }
        .info-row {
            display: flex;
            margin-bottom: 5px;
        }
        .info-label {
            font-weight: bold;
            width: 150px;
        }
        .info-value {
            flex: 1;
        }
        .receipt-amount {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
            text-align: right;
        }
        .receipt-amount h3 {
            margin: 0;
            font-size: 20px;
            color: #2c3e50;
        }
        .receipt-footer {
            margin-top: 50px;
            text-align: center;
            font-size: 12px;
            color: #7f8c8d;
            border-top: 1px solid #eee;
            padding-top: 20px;
        }
        .success-stamp {
            position: relative;
            text-align: center;
            margin-top: 40px;
            margin-bottom: 40px;
        }
        .success-stamp span {
            display: inline-block;
            border: 2px solid #27ae60;
            color: #27ae60;
            padding: 10px 20px;
            font-size: 24px;
            font-weight: bold;
            border-radius: 10px;
            transform: rotate(-15deg);
        }
    </style>
</head>
<body>
    <div class="receipt">
        <div class="receipt-header">
            <h1>NABAMS</h1>
            <p>Official Payment Receipt</p>
            <p>{{ date('F d, Y') }}</p>
        </div>

        <div class="receipt-body">
            <div class="receipt-info">
                <h2>Payment Information</h2>
                <div class="info-row">
                    <div class="info-label">Receipt No:</div>
                    <div class="info-value">{{ $transaction->reference }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Payment Date:</div>
                    <div class="info-value">{{ date('F d, Y h:i A', strtotime($transaction->paid_at ?? $transaction->created_at)) }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Payment Method:</div>
                    <div class="info-value">{{ $transaction->channel ?? 'Online Payment' }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Payment For:</div>
                    <div class="info-value">{{ $paymentName }}</div>
                </div>
            </div>

            <div class="receipt-info">
                <h2>Member Information</h2>
                <div class="info-row">
                    <div class="info-label">Name:</div>
                    <div class="info-value">{{ $transaction->fullname }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Email:</div>
                    <div class="info-value">{{ $transaction->email }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Phone:</div>
                    <div class="info-value">{{ $transaction->phone_number }}</div>
                </div>
            </div>

            <div class="receipt-amount">
                <h3>Amount Paid: =N={{ number_format($transaction->amount, 2) }}</h3>
            </div>

            <div class="success-stamp">
                <span>PAID</span>
            </div>
        </div>

        <div class="receipt-footer">
            <p>This is an electronically generated receipt and does not require a physical signature.</p>
            <p>For any inquiries, please contact NAPAS Association administration.</p>
            <p>© {{ date('Y') }} NAPAS Association. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
