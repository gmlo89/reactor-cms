<div class="form-group date-range-picker-group">
    <label>{{ $label }}</label>
    <div class="input-group">
        {!! Form::hidden($name . '_from', null, ['class' => 'from']) !!}
        {!! Form::hidden($name . '_to', null, ['class' => 'to']) !!}

        <span class="input-group-addon date-text form-control" >Todas</span>
        <span class="input-group-btn">
            <button type="button" class="btn btn-default btn-all">Todos</button>
           <button type="button" class="btn bg-teal btn-calendar"><i class="fa fa-calendar"></i></button>

        </span>
    </div>
    @if ($error)
      <p class="text-red">{{ $error }}</p>
    @endif
</div>