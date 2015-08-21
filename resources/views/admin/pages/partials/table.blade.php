<table class="table">
    <thead>
        <tr>
            <th>Título</th>
            <th>Slug URL</th>
            <th>Estatus</th>
            <th>&nbsp;</th>    
        </tr>                  
    </thead>                   
    <tbody>
    @foreach ($pages as $page) 
        <tr>                   
            <td class="name">{{ $page->titulo }}</td>
            <td>{{ $page->slug_url }}</td>
            <td>{{ ucfirst($page->estatus) }}</td>
            <td>
                <a href="{{ route("admin.paginas.show", ['id' => $page, 'section' => $section]) }}">
                    Ver
                </a> -
                <a href="{{ route("admin.paginas.edit", ['id' => $page, 'section' => $section]) }}" class="btn-edit">
                    Editar
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
