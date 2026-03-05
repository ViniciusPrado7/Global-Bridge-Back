<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Warehouse Receipt - Tradewings USA</title>

    <style>
        @page {
            size: A4;
            margin: 20px;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
            color: #000;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        .no-border td {
            border: none;
        }

        .bordered td, .bordered th {
            border: 1px solid #000;
        }

        .center { text-align: center; }
        .right { text-align: right; }
        .bold { font-weight: bold; }

        .space{
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            flex-direction: column;
        }

        .gray-bg {
            background: #f2f2f2;
            font-weight: bold;
            text-align: center;
        }

        .small { font-size: 10px; }

    </style>
</head>

<body>

<!-- HEADER TOP -->
<table class="no-border" style="margin-bottom:10px;">
    <tr>
        <td class="right bold" style="font-size:28px; color:#999;">
            WAREHOUSE
        </td>
    </tr>
</table>

<!-- LOGO + RECEIPT BOX -->
<table class="no-border" style="margin-bottom:15px;">
    <tr>
        <!-- LEFT SIDE -->
        <td width="60%" style="vertical-align:top;">
            <div style="font-size:22px; font-weight:bold; font-style:italic;">
                Tradewings USA
            </div>
            <div class="small">
                International Freight Forwarders Since 2002
            </div>
            <div style="color:#00008B; font-weight:bold; font-style:italic; font-size:14px; margin-top:5px;">
                All Ways Your Partner
            </div>
        </td>

        <!-- RIGHT SIDE -->
        <td width="40%" style="vertical-align:top;">
            <table class="bordered">
                <tr>
                    <td class="bold">Receipt Number:</td>
                    <td><strong>WR -15782</strong></td>
                </tr>
                <tr>
                    <td class="bold">Received Date/Time:</td>
                    <td>{{$today}}</td>
                </tr>
                <tr>
                    <td class="bold">Received By:</td>
                    <td>TWUSA WHS1</td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<!-- SHIPPER / CONSIGNEE -->
<table class="bordered" style="margin-bottom:0;">
    <tr class="gray-bg">
        <td width="50%">Shipper Information</td>
        <td width="50%">Consignee Information</td>
    </tr>
    <tr>
        <td style="height:80px; white-space: pre-wrap;">
            {{ $carga->shipper_information }}
        </td>
        <td></td>
    </tr>
</table>

<!-- CARRIER INFO -->
<table class="bordered" style="margin-top:-1px;">
    <tr class="gray-bg">
        <td colspan="4">Inland Carrier and Supplier information</td>
    </tr>

    <tr>
        <td class="bold">Carrier Name:</td>
        <td></td>
        <td class="bold">Driver License:</td>
        <td></td>
    </tr>

    <tr>
        <td class="bold">PRO Number:</td>
        <td></td>
        <td class="bold">Supplier Name:</td>
        <td></td>
    </tr>

    <tr>
        <td class="bold">Tracking Number:</td>
        <td></td>
        <td class="bold">Invoice Number:</td>
        <td></td>
    </tr>

    <tr>
        <td class="bold">Driver Name:</td>
        <td></td>
        <td class="bold">P.O. Number:</td>
        <td></td>
    </tr>
</table>

<!-- ITEMS TABLE -->
<table class="bordered" style="margin-top:20px;">
    <tr class="gray-bg">
        <td width="5%">Pcs</td>
        <td width="15%">Package</td>
        <td width="15%">Dimensions</td>
        <td width="40%">Description</td>
        <td width="15%">Weight</td>
        <td width="10%">Volume</td>
    </tr>

    <tr class="gray-bg small">
        <td>Location</td>
        <td>Invoice Number</td>
        <td>Notes</td>
        <td></td>
        <td></td>
        <td>Volume Weight</td>
    </tr>

    <tr class="gray-bg small">
        <td>Quantity</td>
        <td>PO Number</td>
        <td>Part Number</td>
        <td>Model / Serial Number</td>
        <td></td>
        <td></td>
    </tr>

    <tr style="height:200px;">
        <td class="center">
            {{ $carga->volumes }} PCS
        </td>
        <td></td>
        <td></td>
        <td></td>
        <td class="center" style="height: 100px;">
            {{ $carga->peso ?? '' }} Kg
        </td> 
        <td></td>
    </tr>
</table>

<!-- FOOTER -->
<table class="bordered" style="margin-top:-1px;">
    <tr>
        <td width="55%" style="height:60px; vertical-align:bottom;">
            Received by Signature: _________________________________
        </td>

        <td width="15%" class="center">
            <span class="bold">Pieces</span><br><br>
           <!-- quantidade aqui -->
        </td>

        <td width="15%" class="center">
            <span class="bold">Weight</span><br>
            {{ $carga->peso }} Kg
        </td>

        <td width="15%" class="center">
            <span class="bold">Volume</span><br>
            {{ $carga->volumes }}
        </td>
    </tr>
</table>

</body>
</html>