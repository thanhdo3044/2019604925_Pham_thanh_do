@php
    $segment = request()->segment(2);
@endphp
@if($segment == 'service')
    <h4 class="page-title-main">Tất cả dịch vụ</h4>
@elseif($segment == 'service-categoryService')
    <h4 class="page-title-main">Dịch vụ theo danh mục</h4>
@elseif($segment == 'dashboard')
    <h4 class="page-title-main">Dashboard</h4>
@elseif($segment == 'calendar')
    <h4 class="page-title-main">Lịch</h4>
@elseif($segment == 'chat')
    <h4 class="page-title-main">Chat</h4>
@elseif($segment == 'table')
    <h4 class="page-title-main">Danh sách danh mục</h4>
@elseif($segment == 'member')
    <h4 class="page-title-main">Danh sách nhân viên</h4>
@endif
