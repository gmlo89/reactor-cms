@if($errors->any())
    <div class="alert alert-danger">
        <h4><i class="icon fa fa-ban"></i> @lang('CMS::core.errors_title')</h4>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif