<!DOCTYPE html>
<html lang="zxx">
<!-- css -->
@include('client.layouts.divide.head')

<body>
<!-- Menu -->
@include('client.layouts.divide.menu')
{{--Login--}}
<div id="popupContainer" class="popup-container" >
@include('auth.login')
</div>
<div id="popupContainer2" class="popup-container2">
@include('auth.otp')
</div>
<div id="popupContainer3" class="popup-container2">
    @include('auth.OtpBooking')
</div>
<!-- Begin Page Content -->
@yield('content')
<!-- Footer -->
@include('client.layouts.divide.footer')
<!-- jQuery -->
@include('client.layouts.divide.js')

@yield('js')
</body>
</html>
