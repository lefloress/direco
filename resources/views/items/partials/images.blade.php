<ul class="list-image">
@foreach($item->imagenes as $image)
    @if ($item->exists())
    <li>
        <img src="{{ $image->thumbnail()->source() }}" alt="Repuesto" title="{{ $item->descripcion }}" />
    </li>
    @endif
@endforeach
</ul>