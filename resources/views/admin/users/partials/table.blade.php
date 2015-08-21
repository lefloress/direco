<table class="table">
    <thead>
        <tr>
            <th>{!! Sort::link('NOMBRE', 'Nombre completo') !!}</th>
            <th>{!! Sort::link('LOGIN', 'E-mail') !!}</th>
            <th>{!! Sort::link('ESTATUS', 'Estatus') !!}</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)
        <tr>
            <td class="name">{{ $user->NOMBRE }}</td>
            <td>{{ $user->LOGIN }}</td>
            <td>{{ $user->ESTATUS }}</td>
            @include('admin/partials.options', ['entity' => $user, 'plural' => 'usuarios'])
        </tr>
    @endforeach
    </tbody>
</table>
