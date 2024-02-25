<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Perukar Barber Shop</title>
    <link rel="shortcut icon" href="{{asset('be/assets/images/logovop.png')}}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&amp;display=swap">

    <link rel="stylesheet" href="{{asset('client/css/plugins.css')}}" />
    <link rel="stylesheet" href="{{asset('client/css/style.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="{{asset('login/css/fontawesome-all.min.css')}}">

    <link rel="stylesheet" href="{{asset('login/style.css')}}">
    @yield('style')
</head>
