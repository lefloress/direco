@if ( ! $filtered)
    <h4>
        There are no {{ $plural }}, please create the first one
    </h4>
@else
    <h4>
        Your search didn't match any results, please try again
    </h4>
@endif