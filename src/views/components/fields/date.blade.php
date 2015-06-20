<div class="form-group">
    <label>{{ $label }}</label>
    <div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
          {!! $control !!}
        </div>
    @if ($error)
      <p class="text-red">{{ $error }}</p>
    @endif
</div>