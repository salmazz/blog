@include('admin.auth.layouts.head')
<div class="login-box">
    <div class="login-logo">
        <a href="{{ url('/') }}">Shorten</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        @yield('content')
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@include('admin.auth.layouts.foot')