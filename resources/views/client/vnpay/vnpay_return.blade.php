<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>VNPAY RESPONSE</title>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('vnpay/bootstrap.min.css')}}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{asset('vnpay/jumbotron-narrow.css')}}" rel="stylesheet">
    <script src="{{asset('vnpay/jquery-1.11.3.min.js')}}"></script>
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .header {
            background-color: #A3CB38;
            color: #fff;
            text-align: center;
            padding: 20px;
            border-radius: 5px 5px 0 0;
        }

        .header h3 {
            font-size: 24px;
            margin: 0;
        }

        .table-responsive {
            background-color: #fff;
            padding: 20px;
            border-radius: 0 0 5px 5px;
            border: 1px solid #ddd;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
            width: 150px;
            display: inline-block;
            color: #333;
        }

        .form-group label:first-of-type {
            margin-top: 0;
        }

        .form-group label+label {
            margin-top: 5px;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border-radius: 0 0 5px 5px;
        }

        .footer p {
            margin: 0;
        }
    </style>
</head>

<body>
    <?php 
        $timeString = $_GET['vnp_PayDate'];

        $year = substr($timeString, 0, 4);
        $month = substr($timeString, 4, 2);
        $day = substr($timeString, 6, 2);
        $hour = substr($timeString, 8, 2);
        $minute = substr($timeString, 10, 2);
        $second = substr($timeString, 12, 2);

        $dateTime = new DateTime("$year-$month-$day $hour:$minute:$second");

        $formattedDateTime = $dateTime->format('Y-m-d H:i:s');
    ?>
    <!--Begin display -->
    <div class="container">
        <div class="header clearfix">
            <h3 class="text-muted">Success</h3>
        </div>
        <div class="table-responsive">
            <div class="form-group">
                <label>Mã đơn hàng:</label>

                <label><?php echo $_GET['vnp_TxnRef'] ?></label>
            </div>
            <div class="form-group">

                <label>Số tiền:</label>
                <label><?php echo $_GET['vnp_Amount'] ?></label>
            </div>
            <div class="form-group">
                <label>Nội dung thanh toán:</label>
                <label><?php echo $_GET['vnp_OrderInfo'] ?></label>
            </div>
            <div class="form-group">
                <label>Mã phản hồi (vnp_ResponseCode):</label>
                <label><?php echo $_GET['vnp_ResponseCode'] ?></label>
            </div>
            <div class="form-group">
                <label>Mã GD Tại VNPAY:</label>
                <label><?php echo $_GET['vnp_TransactionNo'] ?></label>
            </div>
            <div class="form-group">
                <label>Mã Ngân hàng:</label>
                <label><?php echo $_GET['vnp_BankCode'] ?></label>
            </div>
            <div class="form-group">
                <label>Thời gian thanh toán:</label>
                <label><?php echo $formattedDateTime ?></label>
            </div>
            <div class="form-group">
                <label>Kết quả:</label>
                <label>
                    Thanh toán thành công.
                </label>
            </div>
            <?php $booking_id = $_GET['vnp_TxnRef']; ?>
        
                <a href="{{ route('client.bookingDone',['id'=> $booking_id ]) }}" class="btn btn-success">Hoàn tất thanh toán</a>
            
        </div>
        <p>
            &nbsp;
        </p>
        <footer class="footer">
            <p>&copy; VNPAY <?php echo date('Y') ?></p>
        </footer>
    </div>
</body>

</html>