<div class="form-group">
    {{ Form::label($name, trans('validation.attributes.'.$name), ['class' => 'control-label']) }}
    {{ Form::password($name, ['class' => 'form-control']) }}
    @if ($help) <small class="text-muted">{{ $help }}</small> @endif
    @error($name)
        <div class="text-danger">{{$message}}</div>
    @enderror
</div>