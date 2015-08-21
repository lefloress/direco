<div id="field_{{ $htmlId }}"{!! Html::classes(['checkbox', 'has-error' => $error]) !!}>
    <label>
        {{ $label }}
        {!! $input !!}
    </label>
    @if ($required)
     <span class="label label-info">Required</span>
    @endif
    <div class="controls">
        @if ($error)
            <p class="text-error">{{ $error }}</p>
        @endif
    </div>
</div>