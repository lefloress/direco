    <p>
        {!! Form::submit($submit_text, ['class' => 'btn btn-success']) !!}
        @if (isset ($back_path))
            <a href="{{ $back_path }}" class="btn btn-default">
                {{ $back_text }}
            </a>
        @endif
    </p>