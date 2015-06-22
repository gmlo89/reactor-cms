@extends('CMS::master')

@section('content')
<section class="content-header">
  <h1>
    <i class="fa fa-users"></i> Edit user
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
            <a href="#" class="btn btn-default btn-sm"><span class="fa fa-key"></span> Update password</a>
            {!! Field::deleteButton($user) !!}
        </div>
    </div>
</section>
@stop