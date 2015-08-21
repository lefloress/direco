<div id="field_{{ $htmlId }}"{!! Html::classes(['field' => true, 'field-ci' => true, 'field-error' => $error, 'field-required' => $required]) !!}>
    <label for="ci-rif">Cédula o RIF</label>
    {!! Form::select($htmlName.'[letter]', Rif::types(), Rif::letter($value), ['class' => 'select2']) !!}
    {!! Form::text($htmlName.'[number]', Rif::number($value), ['placeholder' => 'Ejemplo: 14943339, 12345678-9']) !!}
    @if ($error)
        <p class="message-error">{{ $error }}</p>
    @endif
</div>