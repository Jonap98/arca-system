<div class="modal fade" id="modalEliminarPlanta{{ $planta->id }}" tabindex="-1" aria-labelledby="modalEliminarPlanta" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="#" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEliminarPlanta">Eliminar planta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="m-2">
                        <span>¿Seguro que desea eliminar la planta <b>{{ $planta->planta }}</b>?</span>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>