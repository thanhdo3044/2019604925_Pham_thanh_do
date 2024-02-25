<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-spacing: 1;
            border-collapse: collapse;
            background: white;
            border-radius: 6px;
            overflow: hidden;
            max-width: 800px;
            width: 100%;
            margin: 0 auto;
            position: relative;
        }

        table * {
            position: relative;
        }

        table td,
        table th {
            padding-left: 8px;
        }

        table thead tr {
            height: 60px;
            background: #FFED86;
            font-size: 16px;
        }

        table tbody tr {
            height: 48px;
            border-bottom: 1px solid #E3F1D5;
        }

        table tbody tr:last-child {
            border: 0;
        }

        table td,
        table th {
            text-align: left;
        }

        table td.l,
        table th.l {
            text-align: right;
        }

        table td.c,
        table th.c {
            text-align: center;
        }

        table td.r,
        table th.r {
            text-align: center;
        }

        @media screen and (max-width: 35.5em) {
            table {
                display: block;
            }

            table>*,
            table tr,
            table td,
            table th {
                display: block;
            }

            table thead {
                display: none;
            }

            table tbody tr {
                height: auto;
                padding: 8px 0;
            }

            table tbody tr td {
                padding-left: 45%;
                margin-bottom: 12px;
            }

            table tbody tr td:last-child {
                margin-bottom: 0;
            }

            table tbody tr td:before {
                position: absolute;
                font-weight: 700;
                width: 40%;
                left: 10px;
                top: 0;
            }

            table tbody tr td:nth-child(1):before {
                content: "Code";
            }

            table tbody tr td:nth-child(2):before {
                content: "Stock";
            }

            table tbody tr td:nth-child(3):before {
                content: "Cap";
            }

            table tbody tr td:nth-child(4):before {
                content: "Inch";
            }

            table tbody tr td:nth-child(5):before {
                content: "Box Type";
            }
        }

        body {
            background: #9BC86A;
            font: 400 14px 'Calibri', 'Arial';
            padding: 20px;
        }

        blockquote {
            color: white;
            text-align: center;
        }
    </style>
</head>

<body>

    <table>
        <thead>
            <tr>
                <th>Tên khách hàng</th>
                <th>Dịch vụ dùng</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td><?php echo $booking['user_phone']; ?></td>
                <td>
                    @foreach($service as $key)
                    {{$key->service->name}} |
                    @endforeach
                </td>
            </tr>
        </tbody>
    <table>
</body>

</html>