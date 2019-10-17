@extends('admin.auth.layouts.layout')

@section('content')

    @if(session('message'))
        <div class="alert alert-danger">{{ flash('message') }}</div>
    @endif

    <form action="{{ url('admin-panel/') }}" method="post">
        <div class="form-group has-feedback @if($errors && $errors->has('user_name')) has-error @endif">
            <input type="text" name="user_name" class="form-control" placeholder="Username" value="{{$old?$old['user_name']:''}}">
            <span class="fa fa-user form-control-feedback"></span>
            @if($errors && $errors->has('user_name'))
                <div class="help-block">{{ $errors->first('user_name') }}</div>
            @endif
        </div>
        <div class="form-group has-feedback @if($errors && $errors->has('password')) has-error @endif">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            @if($errors && $errors->has('password'))
                <div class="help-block">{{ $errors->first('password') }}</div>
            @endif
        </div>
        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                        <input type="checkbox" name="remember"> Remember Me
                    </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div>
            <!-- /.col -->
        </div>
    </form>
@endsection


