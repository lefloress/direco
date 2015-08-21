    {!! Field::text('titulo', ['required']) !!}

    {!! Field::text('slug_url', ['required']) !!}

    {!! Field::file('imagen') !!}

    {!! Field::select('estatus', config('options.contenido.estatus'), ['required']) !!}

    {!! Field::text('orden') !!}

    {!! Field::text('fecha') !!}

    {!! Field::textarea('contenido') !!}

    {!! Field::textarea('meta_description', ['rows' => 2]) !!}