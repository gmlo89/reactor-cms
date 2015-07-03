@extends('CMS::master')

@section('content')
<section class="content-header">
  <h1>
    <i class="fa fa-folder-open"></i> @lang('CMS::categories.edit_category')
  </h1>
</section>

<section class="content">
    <div class="box box-primary">
        {!! Form::model($category, ['route' => ['CMS::admin.categories.update', $category->id], 'method' => 'PUT']) !!}
            <div class="box-header">
                <h3 class="box-title"></h3>
                <div class="box-tools pull-right">
                    <a href="{{ route('CMS::admin.categories.index') }}" class="btn btn-default"><i class="fa fa-chevron-circle-left"></i> @lang('CMS::core.back')</a>
                    <button type="submit" class="btn bg-navy"><i class="fa fa-floppy-o"></i> @lang('CMS::core.save')</button>
                </div>
            </div>
            <div class="box-body">
                {!! Alert::render() !!}
                @include('CMS::categories.partials.inputs')

            </div>
        {!! Form::close()  !!}
        <div class="box-footer clearfix">
            {!! Field::deleteButton($category) !!}
        </div>

    </div>
</section>
@stop