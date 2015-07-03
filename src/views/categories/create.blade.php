@extends('CMS::master')

@section('content')
<section class="content-header">
  <h1>
    <i class="fa fa-folder-open"></i> @lang('CMS::categories.create_new_category')
  </h1>
</section>

<section class="content">
    <div class="box box-primary">
        {!! Form::open(['route' => 'CMS::admin.categories.store']) !!}
            <div class="box-header">
                <h3 class="box-title"></h3>
                <div class="box-tools pull-right">
                    <a href="{{ route('CMS::admin.categories.index') }}" class="btn btn-default"><i class="fa fa-chevron-circle-left"></i> @lang('CMS::core.back')</a>
                    <button type="submit" class="btn bg-navy"><i class="fa fa-floppy-o"></i> @lang('CMS::core.save')</button>
                </div>
            </div>
            <div class="box-body">

                @include('CMS::categories.partials.inputs')

            </div>
            <div class="box-footer clearfix">

            </div>
        {!! Form::close()  !!}
    </div>
</section>
@stop