<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <style>
    body {
      font-family: "Roboto", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
      background-color: #fff;
      font-weight: 300;
    }

    p {
      color: #000000;
      font-weight: 300;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    .h1,
    .h2,
    .h3,
    .h4,
    .h5,
    .h6 {
      font-family: "Roboto", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    }

    a {
      -webkit-transition: .3s all ease;
      -o-transition: .3s all ease;
      transition: .3s all ease;
    }

    a,
    a:hover {
      text-decoration: none !important;
    }

    .content {
      padding: 7rem 0;
    }

    h2 {
      font-size: 20px;
    }

    .custom-table-responsive {
      background-color: #efefef;
      padding: 20px;
      border-radius: 4px;
    }

    .custom-table {
      min-width: 900px;
    }

    .custom-table thead tr,
    .custom-table thead th {
      border-top: none;
      border-bottom: none !important;
      font-size: 12px;
      text-transform: uppercase;
      letter-spacing: .1rem;
    }

    .custom-table tbody th,
    .custom-table tbody td {
      color: #777;
      font-weight: 400;
      padding-bottom: 20px;
      padding-top: 20px;
      font-weight: 300;
    }

    .custom-table tbody th small,
    .custom-table tbody td small {
      color: #b3b3b3;
      font-weight: 300;
    }

    .custom-table tbody tr:not(.spacer) {
      border-radius: 7px;
      overflow: hidden;
      -webkit-transition: .3s all ease;
      -o-transition: .3s all ease;
      transition: .3s all ease;
    }

    .custom-table tbody tr:not(.spacer):hover {
      -webkit-box-shadow: 0 2px 10px -5px rgba(0, 0, 0, 0.1);
      box-shadow: 0 2px 10px -5px rgba(0, 0, 0, 0.1);
    }

    .custom-table tbody tr th,
    .custom-table tbody tr td {
      background: #fff;
      border: none;
    }

    .custom-table tbody tr th:first-child,
    .custom-table tbody tr td:first-child {
      border-top-left-radius: 7px;
      border-bottom-left-radius: 7px;
    }

    .custom-table tbody tr th:last-child,
    .custom-table tbody tr td:last-child {
      border-top-right-radius: 7px;
      border-bottom-right-radius: 7px;
    }

    .custom-table tbody tr.spacer td {
      padding: 0 !important;
      height: 10px;
      border-radius: 0 !important;
      background: transparent !important;
    }

    .custom-table tbody tr.active {
      opacity: .4;
    }

    /* Custom Checkbox */
    .control {
      display: block;
      position: relative;
      margin-bottom: 25px;
      cursor: pointer;
      font-size: 18px;
    }

    .control input {
      position: absolute;
      z-index: -1;
      opacity: 0;
    }

    .control__indicator {
      position: absolute;
      top: 2px;
      left: 0;
      height: 20px;
      width: 20px;
      border-radius: 4px;
      border: 2px solid #ccc;
      background: transparent;
    }

    .control--radio .control__indicator {
      border-radius: 50%;
    }

    .control:hover input~.control__indicator,
    .control input:focus~.control__indicator {
      border: 2px solid #007bff;
    }

    .control input:checked~.control__indicator {
      border: 2px solid #007bff;
      background: #007bff;
    }

    .control input:disabled~.control__indicator {
      background: #e6e6e6;
      opacity: 0.6;
      pointer-events: none;
      border: 2px solid #ccc;
    }

    .control__indicator:after {
      font-family: 'icomoon';
      content: '\e5ca';
      position: absolute;
      display: none;
    }

    .control input:checked~.control__indicator:after {
      display: block;
      color: #fff;
    }

    .control--checkbox .control__indicator:after {
      top: 50%;
      left: 50%;
      -webkit-transform: translate(-50%, -52%);
      -ms-transform: translate(-50%, -52%);
      transform: translate(-50%, -52%);
    }

    .control--checkbox input:disabled~.control__indicator:after {
      border-color: #7b7b7b;
    }

    .control--checkbox input:disabled:checked~.control__indicator {
      background-color: #007bff;
      opacity: .2;
      border: 2px solid #007bff;
    }
  </style>
</head>

<body>
  <div class="content">

    <div class="container">
      <h2 class="mb-5">Table #{{$payment->booking_id}}</h2>


      <div class="table-responsive custom-table-responsive">

        <table class="table custom-table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Booking_id</th>
              <th scope="col">Money</th>
              <th scope="col">Email</th>
              <th scope="col">Note</th>
              <th scope="col">Trạng thái</th>
              <th scope="col">Mã giao dịch</th>
              <th scope="col">Ngân hàng</th>
              <th scope="col">Thời gian bank</th>
            </tr>
          </thead>

          <tbody>
            <tr scope="row">

              <td>{{$payment->id}}</td>
              <td>{{$payment->booking_id}}</td>
              <td>{{number_format($payment->money, 0,'.','.')}}đ</td>
              <td>{{$payment->email}}</td>
              <td>{{$payment->note}}</td>
              <td>{{$payment->vnp_response_code}}</td>
              <td>{{$payment->code_vnpay}}</td>
              <td>{{$payment->code_bank}}</td>
              <td>{{$payment->time}}</td>
            </tr>
          </tbody>
        </table>
      </div>


    </div>

  </div>
</body>

</html>