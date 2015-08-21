    {!! Field::text('titulo', ['required']) !!}

    {!! Field::text('slug_url', ['required']) !!}

    {!! Field::select('estatus', config('options.paginas.estatus'), ['required']) !!}

    {!! Field::text('orden') !!}

    {!! Field::textarea('contenido') !!}

    {!! Field::textarea('meta_description', ['rows' => 2]) !!}