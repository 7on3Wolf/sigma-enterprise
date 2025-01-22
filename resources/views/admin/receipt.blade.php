<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pembayaran - Sigma Enterprise</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f9;
            color: #333;
        }

        .receipt-container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .receipt-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .receipt-header h1 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }

        .receipt-header p {
            margin: 5px 0;
            font-size: 14px;
            color: #777;
        }

        .receipt-body .info {
            margin-bottom: 10px;
            font-size: 14px;
            line-height: 1.6;
        }

        .receipt-body .info strong {
            display: inline-block;
            width: 120px;
        }

        .receipt-body .total {
            font-size: 18px;
            font-weight: bold;
            text-align: right;
            margin-top: 20px;
            color: #000;
        }

        .receipt-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>

<body>
    <div class="receipt-container">
        <div class="receipt-header">
            <h1>Struk Pembayaran</h1>
            <p>Sigma Enterprise</p>
            <p>{{ now()->format('d-m-Y H:i:s') }}</p>
        </div>

        <div class="receipt-body">
            <p class="info"><strong>Nama:</strong> {{ $order->name }}</p>
            <p class="info"><strong>Alamat:</strong> {{ $order->address }}</p>
            <p class="info"><strong>Telepon:</strong> {{ $order->phone }}</p>
            <p class="info"><strong>Catatan:</strong> {{ $order->notes }}</p>
            <p class="info"><strong>Status:</strong> {{ $order->progress_status }}</p>
            <p class="info"><strong>Tanggal Pesanan:</strong> {{ $order_date }}</p>
            <p class="total"><strong>Total:</strong> Rp. {{ $formatted_price }}</p>
        </div>

        <div class="receipt-footer">
            <p>Terima kasih atas kepercayaan Anda.</p>
            <p>Sigma Enterprise</p>
        </div>
    </div>
</body>

</html>
