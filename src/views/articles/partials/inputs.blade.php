@include('CMS::partials._errors')
{!! Alert::render() !!}
<div class="box box-solid">
    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                {!! Field::text('title', null, ['id' => 'title']) !!}
            </div>
            <div class="col-md-6">
                {!! Field::text('slug_url', null, ['id' => 'slugUrl']) !!}
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-8">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab_1" aria-expanded="true">@lang('CMS::articles.content')</a></li>
                <li><a data-toggle="tab" href="#tab_2" aria-expanded="false">@lang('CMS::articles.seo')</a></li>
                <li><a data-toggle="tab" href="#tab_3" aria-expanded="false">@lang('CMS::articles.gallery')</a></li>
            </ul>
            <div class="tab-content">
                <div id="tab_1" class="tab-pane active">
                    <div class="form-group">
                        <div class="row">
                            @if(isset($article) and $article->image and $article->txt_primary_image = $article->image->name)
                                <div class="col-md-2" id="thumbContainer">
                                    <img class="img-responsive" src="{{ asset($article->image->path) }}">
                                </div>
                            @else
                                <div class="col-md-2 hide" id="thumbContainer">
                                </div>
                            @endif
                            <div class="col-md-5">
                                <label>@lang('CMS::articles.primary_image')</label>
                                <div class="input-group">
                                    {!! Form::text('txt_primary_image', null, ['class' => 'form-control', 'disabled', 'id' => 'txtPrimaryImage']) !!}
                                    {!! Form::hidden('primary_img', null, ['id' => 'primaryImageID']) !!}
                                    <span class="input-group-btn">
                                        <button type="button" class="btn bg-maroon" id="btnSearchPrimaryImage">
                                             <span class="fa fa-search"></span>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>

                        {!! Form::hidden('primary_image', null, ['id' => 'primaryImgID']) !!}
                    </div>
                    {!! Field::textarea('sumary', null, ['rows' => 2]) !!}
                    {!! Field::textarea('body', null, ['class' => 'html-editor', 'id' => 'body']) !!}
                </div>
                <div id="tab_2" class="tab-pane">
                    {!! Field::text('title_seo', null, ['id' => 'titleSeo']) !!}
                    {!! Field::textarea('meta_keywords', null, ['rows' => 2]) !!}
                    {!! Field::textarea('meta_description', null, ['rows' => 2]) !!}
                </div>
                <div id="tab_3" class="tab-pane">

                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="box box-solid">
            <div class="box-header"></div>
            <div class="box-body">
                @if(isset($article))
                    @if($article->present()->isPublish())
                        <div class="form-group">
                            <button type="button" class="toggle-status btn btn-danger btn-block"><span class="fa fa-eye"></span> @lang('CMS::articles.unpublish')</button>
                        </div>
                    @else
                        <div class="form-group">
                            <button type="button" class="toggle-status btn btn-success btn-block"><span class="fa fa-eye"></span> @lang('CMS::articles.publish')</button>
                        </div>
                    @endif
                @endif
                {!! Field::select('category_id', $categories) !!}
                @if(isset($article))
                    <div class="form-group">
                        {!! Field::makeDeleteButton($article) !!}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>