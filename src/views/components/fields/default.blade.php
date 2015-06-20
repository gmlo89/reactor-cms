<div class="form-group {{ $error ? 'has-error' : '' }}">
    <label for="{{ $name }}">{{ $label }}</label>
    {!! $control !!}
    @if ($error)
        <small class="text-danger">{{ $error }}</small>
    @endif
</div>