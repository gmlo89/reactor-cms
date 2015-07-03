@extends('CMS::master')

@section('content')
<section class="content-header">
  <h1>
    <i class="fa fa-file"></i> @lang('CMS::articles.create_new_article')
  </h1>
</section>

<section class="content">
    {!! Form::open(['route' => 'CMS::admin.articles.store']) !!}
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title"></h3>
            <div class="box-tools pull-right">
                <a href="{{ route('CMS::admin.articles.index') }}" class="btn btn-default"><i class="fa fa-chevron-circle-left"></i> @lang('CMS::core.back')</a>
                <button type="submit" class="btn bg-navy"><i class="fa fa-floppy-o"></i> @lang('CMS::core.save')</button>
            </div>
        </div>
        <div class="box-body"></div>
    </div>

    @include('CMS::articles.partials.inputs')

    {!! Form::close()  !!}
</section>
@stop

@section('scripts')
    @include('CMS::articles.partials.scripts')
@stop