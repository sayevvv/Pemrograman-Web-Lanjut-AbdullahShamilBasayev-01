<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/libre-baskerville/1.0.1/css/libre-baskerville.min.css">
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            margin: 6px 20px 5px 20px;
            line-height: 15px;
        }

        .sales-title {
            font-family: 'Libre Baskerville', serif;
            font-style: italic;
            font-size: 18pt;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td,
        th {
            padding: 4px 3px;
        }

        th {
            text-align: left;
        }

        .d-block {
            display: block;
        }

        img.image {
            width: auto;
            height: 80px;
            max-width: 150px;
            max-height: 150px;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .p-1 {
            padding: 5px 1px 5px 1px;
        }

        .font-10 {
            font-size: 10pt;
        }

        .font-11 {
            font-size: 11pt;
        }

        .font-12 {
            font-size: 12pt;
        }

        .font-13 {
            font-size: 13pt;
        }

        .font-bold {
            font-weight: bold;
        }

        .border-bottom-header {
            border-bottom: 1px solid;
        }

        .border-all,
        .border-all th,
        .border-all td {
            border: 1px solid;
        }
    </style>
</head>

<body>
    <table class="border-bottom-header" style="width: 100%;">
    <tr>
        <td style="width: 50%; vertical-align: bottom;">
            <span class="sales-title">SalesPoint</span>
        </td>
        <td style="width: 50%; text-align: right; vertical-align: bottom;">
            <span class="font-10">Abdullah Shamil Basayev | TI 2D | 2341720166</span>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: right;">
            <span class="font-10">Laman: www.SalesPoint.ac.id</span>
        </td>
    </tr>
</table>

    <div>
        @yield('content')
    </div>
</body>
</html>
