    <p>
        Hay {{ $pager->total() }} {{ $plural }},
        mostrando página {{ $pager->currentPage() }}
        de {{ $pager->lastPage() }}
    </p>