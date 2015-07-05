@extends('CMS::master')

@section('content')
    <section class="content-header">
        <h1>
            <i class="fa fa-folder-open"></i> @lang('CMS::categories.categories')
        </h1>
    </section>
    <section class="content">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"></h3>
                <div class="box-tools pull-right">
                    <a href="{{ route('CMS::admin.categories.create') }}" class="btn bg-navy"><i class="fa fa-plus-circle"></i> @lang('CMS::core.create_new')</a>
                </div>
            </div>
            <div class="box-body">
                {!! Alert::render() !!}
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>@lang('CMS::core.title')</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $category)
                            <tr>
                                <td>{{ $category->title }}</td>
                                <td><a href="{{ route('CMS::admin.categories.edit', $category->id) }}" class="btn bg-orange btn-xs">@lang('CMS::core.details') <i class="fa fa-arrow-circle-right"></i></a></td>
                            </tr>
                        @empty
                            <tr class="active">
                                <td colspan="5">- @lang('CMS::core.empty') -</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="box-footer clearfix">
                {!! $categories->render() !!}
            </div>
        </div>
    </section>
@endsection