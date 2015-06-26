@extends('CMS::auth.master')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="#">{{ config('cms.app_name') }}</a>
        </div><!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">{{ trans('CMS::core.i_forgot_my_password') }}</p>
            @include('CMS::partials._errors')

            @if(Session::has('status'))
                <div class="alert alert-success" role="alert">
                    <p>@lang('CMS::core.pass_reset_email_send')</p>
                </div>
            @endif
            {!! Form::open(['route' => 'CMS::admin.recover-password', 'method' => 'post']) !!}
                <div class="form-group has-feedback">
                    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'E-mail']) !!}
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                    </div><!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">@lang('CMS::core.reset')</button>
                    </div><!-- /.col -->
                </div>
            {!! Form::close() !!}
            <a href="{{ route('CMS::admin.login') }}">@lang('CMS::core.back_to_login')</a><br>
        </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
@endsection