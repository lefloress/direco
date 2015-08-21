<div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Cambiar contrase&ntilde;a</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(array('url' => 'admin/usuarios/cambiar-clave/' . $user->cedula_rif), ['class' => 'form', 'method' => 'POST']) !!}
                
                {!! Form::label('clave', 'Nueva contrase&ntilde;a') !!}
                {!! Form::password('clave', ['class' => 'form-control']) !!}

                {!! Form::label('clave_confirmation', 'Repetir contrase&ntilde;a') !!}
                {!! Form::password('clave_confirmation', ['class' => 'form-control'])!!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Guardar</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#changePasswordModal">Cambiar contrase&ntilde;a</a>


