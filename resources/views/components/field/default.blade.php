<div id="field_{{ $htmlId }}"{!! Html::classes(['field' => true, 'field-error' => $error, 'field-required' => $required]) !!}>
    {!! Form::label($htmlId, $label) !!}
    {!! $input !!}
    @if ($error)
        <p class="message-error">{{ $error }}</p>
    @endif
</div>