<table class="table">
    <thead>
        <tr>
            <th>{!! Sort::link('titulo', 'Titulo') !!}</th>
            <th>{!! Sort::link('estatus', 'Estatus') !!}</th>
            <th>{!! Sort::link('fecha_de_publicacion', 'Fecha de publicacion') !!}</th>
            <th>&nbsp;</th>    
        </tr>                  
    </thead>                   
    <tbody>
    @foreach ($news as $noticia) 
        <tr>                   
            <td class="name">{{ $noticia->titulo }}</td>     
            <td>{{ $noticia->estatus }}</td>
            <td>{{ $noticia->fecha_de_publicacion }}</td>
            @include('admin/partials.options', ['entity' => $noticia, 'plural' => 'noticias']) 
        </tr>
    @endforeach
    </tbody>
</table>
