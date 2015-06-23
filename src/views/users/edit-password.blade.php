@extends('CMS::master')

@section('content')
<section class="content-header">
  <h1>
    <i class="fa fa-users"></i> Update password - {{ $user->name }}
  </h1>
</section>

<section class="content">
    <div class="box box-primary">
        {!! Form::open(['route' => ['CMS::admin.users.update-password', $user->id], 'method' => 'PUT']) !!}
            <div class="box-header">
                <h3 class="box-title"></h3>
                <div class="box-tools pull-right">
                    <a href="{{ route('CMS::admin.users.edit', $user->id) }}" class="btn btn-default"><i class="fa fa-chevron-circle-left"></i> Back</a>
                    <button type="submit" class="btn bg-navy"><i class="fa fa-floppy-o"></i> Save</button>
                </div>
            </div>
            <div class="box-body">

                {!! Field::password('password') !!}
                {!! Field::password('password_confirmation') !!}

            </div>
            <div class="box-footer clearfix">

            </div>
        {!! Form::close()  !!}
    </div>
</section>
@stop