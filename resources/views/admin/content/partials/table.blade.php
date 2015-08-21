<table class="table">
    <thead>
        <tr>
            <th>Título</th>
            <th>Slug URL</th>
            <th>Fecha</th>
            <th>Estatus</th>
            <th>&nbsp;</th>    
        </tr>                  
    </thead>                   
    <tbody>
    @foreach ($content as $item)
        <tr>                   
            <td class="name">{{ $item->titulo }}</td>
            <td>{{ $item->slug_url }}</td>
            <td>{{ $item->fecha }}</td>
            <td>{{ ucfirst($item->estatus) }}</td>
            <td>
                <a href="{{ route("admin.contenido.show", ['id' => $item, 'section' => $section]) }}">
                    Ver
                </a> -
                <a href="{{ route("admin.contenido.edit", ['id' => $item, 'section' => $section]) }}" class="btn-edit">
                    Editar
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{!! $content->render() !!}