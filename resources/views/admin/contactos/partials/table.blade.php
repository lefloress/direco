<table class="table">
    <thead>
        <tr>
            <th>{!! Sort::link('nombre', 'Nombre') !!}</th>
            <th>{!! Sort::link('correo', 'Correo') !!}</th>
            <th>{!! Sort::link('empresa', 'Empresa') !!}</th>
            <th>&nbsp;</th>    
        </tr>                  
    </thead>                   
    <tbody>
    @foreach ($contactos as $contacto) 
        <tr>                   
            <td class="name">{{ $contacto->nombre }}</td>
            <td>{{ $contacto->correo }}</td>     
            <td>{{ $contacto->empresa }}</td>
            @include('admin/partials.options', ['entity' => $contacto, 'plural' => 'contactos']) 
        </tr>
    @endforeach
    </tbody>
</table>
