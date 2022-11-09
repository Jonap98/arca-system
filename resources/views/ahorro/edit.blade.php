<div class="modal fade" id="modalEditarAhorro{{ $solicitud->gmin_solicitante }}" tabindex="-1" aria-labelledby="modalEditarAhorro" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="#" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditarAhorro">Editar ahorro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="m-2">
                        <span>Monto semanal</span>
                        <input type="text" name="monto_semanal" value="{{ $solicitud->monto_semanal }}">
                    </div>

                    <div class="m-2">
                        <span>Semana de autorización</span>
                        <input type="number" name="semana">
                    </div>

                    <div class="m-2">
                        <span>¿Seguro que desea editar el monto de ahorro de <b>{{ $solicitud->monto_semanal }}</b>, al perfil ahorrador <b>{{ $perfil->nombres }} {{ $perfil->paterno }}</b>?</span>
                    </div>
                    <input type="hidden" name="gmin" value="{{ $perfil->folio }}">
                    <input type="hidden" name="gmin" value="{{ $perfil->gmin_solicitante }}">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>