@extends('CMS::master')

@section('content')
<section class="content-header">
  <h1>
    <i class="fa fa-users"></i> Edit user
    @if($user->isBlocked())
        <small>
        <span class="label label-danger">User blocked</span>
        </small>
    @endif
  </h1>
</section>

<section class="content">
    <div class="box box-primary">
        {!! Form::model($user, ['route' => ['CMS::admin.users.update', $user->id], 'method' => 'PUT']) !!}
            <div class="box-header">
                <h3 class="box-title"></h3>
                <div class="box-tools pull-right">
                    <a href="{{ route('CMS::admin.users.index') }}" class="btn btn-default"><i class="fa fa-chevron-circle-left"></i> Back</a>
                    <button type="submit" class="btn bg-navy"><i class="fa fa-floppy-o"></i> Save</button>
                </div>
            </div>
            <div class="box-body">
                {!! Alert::render() !!}
                @include('CMS::users.partials.inputs')
            </div>
        {!! Form::close()  !!}
        <div class="box-footer clearfix">
            <a href="{{ route('CMS::admin.users.update-password', $user->id) }}" class="btn btn-default btn-sm"><span class="fa fa-key"></span> Update password</a>
            {!! Field::deleteButton($user) !!}
            <div class="box-tools pull-right">
                {!! Form::open(['route' => ['CMS::admin.users.status-toggle', $user->id], 'method' => 'PUT']) !!}
                    @if($user->isBlocked())
                        <button type="submit" class="btn btn-success btn-sm"><span class="fa fa-unlock"></span> Unblock user</button>
                    @else
                        <button type="submit" class="btn btn-warning btn-sm"><span class="fa fa-lock"></span> Block user</button>
                    @endif
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>
@stop