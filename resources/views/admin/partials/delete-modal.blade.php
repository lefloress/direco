<div class="modal fade" id="deletePageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">{{ $title }}</h4>
            </div>
            <div class="modal-body">
                ¿Seguro que desea eliminar el registro?
            </div>
            <div class="modal-footer">
                {!! Form::open(array('route' => $route, 'method' => 'DELETE')) !!}
                <button type="submit" class="btn btn-danger pull-left">Eliminar</button>
                {!! Form::close() !!}
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>