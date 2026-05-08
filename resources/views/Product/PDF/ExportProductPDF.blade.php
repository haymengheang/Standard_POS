<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Report</title>
    <style>
        @page {
            size: A4 landscape;
            margin: 15px;
        }

        body{
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
            color: #333;
        }

        .header{
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1{
            margin: 0;
            font-size: 24px;
        }

        .header p{
            margin-top: 5px;
            font-size: 13px;
            color: #666;
        }

        table{
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        thead{
            background-color: #2c3e50;
            color: white;
        }

        th{
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
            font-size: 12px;
        }

        td{
            padding: 8px;
            border: 1px solid #ddd;
            vertical-align: top;
        }

        tbody tr:nth-child(even){
            background-color: #f2f2f2;
        }

        .text-right{
            text-align: right;
        }

        .footer{
            margin-top: 15px;
            text-align: right;
            font-size: 11px;
            color: #666;
        }

    </style>

</head>
<body>

    <div class="header">
        <h1>PRODUCT REPORT</h1>
        <p>Date : {{ date('d-m-Y') }}</p>
    </div>

    <table>

        <thead>
            <tr>
                <th width="10%">PRODUCT ID</th>
                <th width="18%">DESCRIPTION</th>
                <th width="20%">SPECS / NOTE</th>
                <th width="10%">UNIT PRICE</th>
                <th width="10%">OTHER PRICE</th>
                <th width="10%">UOM</th>
                <th width="12%">PRODUCT LINE</th>
                <th width="10%">USER ADD</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->productid }}</td>

                <td>{{ $product->productname }}</td>

                <td>{{ $product->productname2 }}</td>

                <td class="text-right">
                    $ {{ number_format($product->price,2) }}
                </td>

                <td class="text-right">
                    $ {{ number_format($product->other_price,2) }}
                </td>

                <td>{{ $product->unit_of_measure }}</td>

                <td>{{ $product->product_line }}</td>
                <td>{{ $product->useradd }}</td>
            </tr>
            @endforeach
        </tbody>

    </table>
    <div class="footer">
        Total Products : {{ count($products) }}
    </div>
</body>
</html>