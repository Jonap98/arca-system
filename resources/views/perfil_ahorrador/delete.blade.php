<div class="modal fade" id="modalEliminarPerfil{{ $perfil->gmin }}" tabindex="-1" aria-labelledby="modalEliminarPerfil" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('perfil-ahorrador.delete') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEliminarPerfil">Eliminar perfil ahorrador</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="m-2">
                        <span>¿Seguro que desea eliminar el perfil ahorrador <b>{{ $perfil->nombres }} {{ $perfil->paterno }}</b>?</span>
                    </div>
                    <input type="hidden" name="gmin" value="{{ $perfil->gmin }}">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>