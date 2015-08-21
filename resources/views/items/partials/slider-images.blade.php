<div class="flexslider">
    <ul class="slides">
    @foreach ($item->imagenes as $image)
        <li data-thumb="{{ $image->thumbnail()->source() }}">
            <img src="{{ $image->source() }}" alt="{{ $item->descripcion }}" />
        </li>
    @endforeach
    </ul>
</div>  