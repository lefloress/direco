{!! Form::model(Input::all(), ['route' => 'admin.usuarios.index', 'method' => 'GET']) !!}
    {!! Field::text('search') !!}
    {!! Field::select('type', array()) !!}
    <p>
        {!! Form::submit('Filtrar data', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('admin.usuarios.index') }}" class="btn btn-default">
            Ver todos
        </a>
    </p>
{!! Form::close() !!}