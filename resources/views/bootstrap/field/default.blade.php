<div id="field_{{ $htmlId }}" class=" form-group{{ $error ? ' has-error' : '' }}">
    {!! Form::label($htmlId, $label) !!}
    @if ($required)
     <span class="label label-info">Required</span>
    @endif    
    <div class="controls">
        {!! $input !!}
        @if ($error)
            <p class="text-error">{{ $error }}</p>
        @endif
    </div>
</div>