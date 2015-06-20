<div class="form-group {{ $error ? 'has-error' : '' }}">
	<div class="checkbox">
		<label>
			{!! $control !!} {!! $label !!}
		</label>
	</div>
	@if ($error)
        <small class="text-danger">{{ $error }}</small>
    @endif
</div>