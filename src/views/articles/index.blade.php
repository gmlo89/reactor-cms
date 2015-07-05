@extends('CMS::master')

@section('content')
    <section class="content-header">
        <h1>
            <i class="fa fa-file"></i> @lang('CMS::articles.articles')
        </h1>
    </section>
    <section class="content">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"></h3>
                <div class="box-tools pull-right">
                    <a href="{{ route('CMS::admin.articles.create') }}" class="btn bg-navy"><i class="fa fa-plus-circle"></i> @lang('CMS::core.create_new')</a>
                </div>
            </div>
            <div class="box-body">
                {!! Alert::render() !!}
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>@lang('CMS::core.title')</th>
                            <th>@lang('CMS::core.category')</th>
                            <th>@lang('CMS::core.status')</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($articles as $article)
                            <tr>
                                <td>{{ $article->title }}</td>
                                <td>{{ $article->category->title }}</td>
                                <td>
                                    @if($article->present()->isPublish())
                                        <span class="label label-success">@lang('CMS::core.published')</span>
                                    @else
                                        <span class="label label-danger">@lang('CMS::core.no_published')</span>
                                    @endif
                                </td>
                                <td><a href="{{ route('CMS::admin.articles.edit', $article->id) }}" class="btn bg-orange btn-xs">@lang('CMS::core.details') <i class="fa fa-arrow-circle-right"></i></a></td>
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
                {!! $articles->render() !!}
            </div>
        </div>
    </section>
@endsection