@extends('CMS::auth.master')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="#">{{ config('cms.app_name') }}</a>
        </div><!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">{{ trans('CMS::core.recover-password') }}</p>
            @include('CMS::partials._errors')
            {!! Form::open(['route' => 'CMS::admin.reset-password', 'method' => 'post']) !!}
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group has-feedback">
                    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'E-mail']) !!}
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                    </div><!-- /.col -->
                    <div class="col-xs-6">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">@lang('CMS::core.reset_password')</button>
                    </div><!-- /.col -->
                </div>
            {!! Form::close() !!}

            <a href="{{ route('CMS::admin.login') }}">@lang('CMS::core.back_to_login')</a><br>

        </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
@endsection