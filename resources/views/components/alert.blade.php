@foreach ($messages as $msg)
    <div class="system-messages {{ $msg['type'] }}">
		<p class="msg">{{ $msg['message'] }}</p>
        @if ( ! empty ($msg['details']))
        <p>{{ $msg['details'] }}</p>
        @endif
        {{ $msg['html'] }}
        @if ( ! empty ($msg['items']))
        <ul>
          @foreach ($msg['items'] as $item)
            <li>{{ $item }}</li>
          @endforeach
        </ul>
        @endif
        @if ( ! empty ($msg['buttons']))
        <p>
        @foreach ($msg['buttons'] as $btn)
            <a class="btn btn-{{ $btn['class'] }}" href="{{ $btn['route'] }}">{{ $btn['text'] }}</a>
        @endforeach
        </p>
        @endif
		<button class="msg-close"><span class="icon-close"></span></button>
	</div>
@endforeach