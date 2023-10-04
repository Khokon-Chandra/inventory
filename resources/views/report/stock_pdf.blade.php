@php
    ini_set('pcre.backtrack_limit', '5000000000000000000');
    ini_set('memory_limit', '4096M');
    ini_set('max_execution_time', 600);
    date_default_timezone_set('Asia/Dhaka');
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stock report</title>
    <style>
        @page {
            header: page-header;
            footer: page-footer;
        }

        body {
            font-family: 'nikosh', "Roboto Thin", sans-serif;
            width: 100%;
            font-size: 12px;

        }

        table {
            border-collapse: collapse;
            font-size: 12px;
            width: 100%;
            /* page-break-inside: avoid */
        }

        .bordered,
        th,
        td {
            vertical-align: top;
            border: 1px solid black;
            max-width: 100%;
            padding: 5px;
            /*white-space:nowrap;*/
        }

        .col-md-6 {
            float: left;
            width: 48%;
            padding: 10px;
        }

        .text-right {
            text-align: right;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>
</head>

<body>
    <div class="row">

        <div style="float: left; width: 33.33%">
            <h3>logo goes here</h3>
        </div>

        <div style="float: left; width: 33.33%; text-align: center; font-size: 14px;">
            <p style="line-height: 1.5;"> <b>Stock report</b> <br>
                Main title goes<br>
                Type information<br>
                Payment Type :Paypale<br>

                {{ now() }} - {{ now() }}

            </p>
        </div>

    </div>

    <p style="text-align:right">Print Date : {{ \Carbon\Carbon::now()->format('d-M-Y H:i') }}</p>
    <table class="table" width="100%" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th>SL</th>
                <th>Store name</th>
                <th>Product</th>
                <th>Opening Quantity</th>
                <th>Closing Quantity</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($dataset as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->store_name }}</td>
                    <td>{{ $item->product_name }}</td>
                    <td>{{ $item->opening_stock }}</td>
                    <td>{{ $item->closing_stock }}</td>
                    <td>{{ $item->date }}</td>
                </tr>
            @empty
                <tr>
                    <th class="text-center" colspan="7">No record Found</th>
                </tr>
            @endforelse


        </tbody>
    </table>

    <htmlpagefooter name="page-footer">
        <div class="col-md-6">
            <p style="text-align: left; font-size: 10px;">
                Developed By- khokon chandra <br>
                <span style="font-size: 8px;">Report No.: 001</span>
            </p>
        </div>
        <div class="col-md-6">
            <p style="text-align: right">{PAGENO} of {nbpg} pages</p>
        </div>
    </htmlpagefooter>
</body>

</html>
