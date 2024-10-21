<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Nota Pembayaran</title>
    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }
        .invoice-box table {
            width: 100%;
            line-height: normal;
            text-align: left;
        }
        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }
        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }
        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }
        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }
        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }
        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }
        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }
        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td,
            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('logo.png'))) }}" width="150px">

                            </td>
                            <td>
                                Invoice: <strong>#{{ $sale->no_sales }}</strong><br>
                                Tanggal: {{ $sale->created_at->format('d/m/Y') }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                <strong>PENGIRIM</strong><br>
                                {{ config('app.name', 'Web Bengkel') }}<br>

                            </td>
                            <td>
                                <strong>PENERIMA</strong><br>

                                Nama: {{ Auth::user()->name }}<br>
                                Email: {{ Auth::user()->email }}<br/>
                                Alamat: {{ Auth::user()->adress }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="heading">
                <td>Nama Barang</td>
                <td>Total</td>
            </tr>
            @php $total_jual = 0; @endphp
            @foreach($sale->products as $product)
                <tr class="item">
                    <td>
                        {{ $product->name }}<br>
                        <strong>Harga:</strong> Rp {{ number_format($product->price, 2) }} x {{ $product->pivot->quantity }}
                    </td>
                    <td>Rp. {{ number_format($product->price * $product->pivot->quantity, 2) }}</td>
                </tr>
                @php $total_jual += $product->price * $product->pivot->quantity; @endphp
            @endforeach
            <tr class="total">
                <td></td>
                <td>Total: Rp. {{ number_format($total_jual, 2) }}</td>
            </tr>
        </table>
        <p>Terima kasih atas kepercayaan Anda</p>
    </div>
</body>
</html>
