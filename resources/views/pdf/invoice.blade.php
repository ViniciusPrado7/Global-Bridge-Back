<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <style>
        @page {
            size: auto;
        }
        body {
            font-family: Arial, sans-serif;
            font-size: 13px;
            color: #000;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        .no-border td {
            border: none;
        }

        .items th {
            background: #f2f2f2;
            font-weight: bold;
        }

        .items th, .items td {
            border: 1px solid #ccc;
            padding: 6px;
        }

        .right {
            text-align: right;
            margin: 0 0 25px 0;
        }

        .center {
            text-align: center;
        }

        .section-title {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .amount-box {
            background: #E2E2E2;
            padding: 8px;
            display: inline-block;
            margin-top: 10px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <table width="100%" style="margin-bottom:30px; border-collapse: collapse;" >
            <tr>
                <td width="40%" style="vertical-align:top; border: 1px solid white">
                    <img src="{{ public_path('pdfImage/global-bridge.jpeg') }}" width="200" height="200">
                </td>

                <td width="70%" style="text-align:right; vertical-align:top; border: 1px solid white;">
                    <div style="font-size:32px; font-weight:bold; margin-top: 30px;">Shipping Invoice #{{$carga->codigo}}</div>
                    <div><strong>GLOBAL BRIDGE</strong></div>
                    <div>4290 South Highway 27</div>
                    <div>Clermont, FL 34711</div>
                    <div>+1 (407) 744-3221</div>
                    <div>sales@americasset.com</div>
                    <div><strong>EIN: 88-3807074</strong></div>
                </td>
            </tr>
        </table>

        <!-- BILL / SHIP -->
        <table class="no-border" style="margin-bottom:25px;">
            <tr>
                <td width="30%">
                    <div class="section-title">BILL TO</div>
                    <div>
                        {{ $carga->freteiro->nome ?? '' }} <br>
                        {{ $carga->freteiro->email ?? '' }} <br>
                        {{ $carga->freteiro->telefone ?? '' }} <br>
                    </div>
                </td>

                <td width="30%">
                    <div class="section-title">SHIP TO</div>
                    <div>
                        {{ $carga->pais_destino ?? '' }} <br>
                        {{ $carga->metodo_entrega ?? '' }} <br>
                    </div>
                </td>

                <td width='30%'>
                    <div>
                        <p><strong>Invoice Number:</strong> {{$carga->codigo}}</p>
                        <p><strong>Invoice Date:</strong> {{$today}}</p>
                        <p><strong>Payment Due:</strong> </p>
                        <div style="background:#E2E2E2; padding:8px; margin-top:5px; display:inline-block;">
                            <strong>Amount Due (USD): </strong>
                        </div>
                    </div>
                </td>
            </tr>
        </table>

        <!-- ITEMS -->
        <table class="items">
            <thead>
                <tr>
                    <th style="background-color: #000; color: #FFF; border: none;">Iten Description</th>
                    <th width="80" style="background-color: #000; color: #FFF; border: none;">Quantity</th>
                    <th width="120" style="background-color: #000; color: #FFF; border: none;">Unit Price</th>
                    <th width="120" style="background-color: #000; color: #FFF; border: none;">Total</th>
                </tr>
            </thead>

            <tbody>               
                @foreach($carga->itens as $item)
                <tr>
                    <td>{{ $item->descricao ?? 'Item' }}</td>
                    <td class="center">{{ $item->quantidade }}</td>
                    <td class="center">
                        ${{ number_format($item->valor_unitario, 2, '.', ',') }}
                    </td>
                    <td class="center">
                        ${{ number_format($item->quantidade * $item->valor_unitario, 2, '.', ',') }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>


        <!-- TOTAL -->
        <table class="no-border" style="margin-top:20px;">
            <tr>
                <td class="right">
                    <strong>
                        TOTAL: ${{ number_format($totalGeral, 2, '.', ',') }}
                    </strong>
                </td>
            </tr>
        </table>
</body>
</html>