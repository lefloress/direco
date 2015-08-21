<p>
    @if ($item->existe)
    <strong>Disponible</strong>
    @else
     <strong class="cod">No Disponible</strong>
    @endif
    @if ($item->promocion)
    <i class="enpromo" title="En Promoci&oacute;n"></i>
        @if ($item->has_descuento)
        Descuento: <strong class="cod">{{  $item->descuento }}%</strong>
        @endif
    @endif
</p>