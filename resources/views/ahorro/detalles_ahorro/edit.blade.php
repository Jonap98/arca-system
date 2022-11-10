<div class="modal fade" id="modalEditarMonto" tabindex="-1" aria-labelledby="modalEditarMonto" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('ahorro.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditarMonto">Seleccionar monto semanal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="m-2">
                        <span>Monto semanal</span>
                        <input type="text" name="monto_semanal" class="form-control">
                    </div>

                    <div class="m-2">
                        <span>¿Seguro que desea solicitar la modificación del monto semanal?</span>
                    </div>
                    <input type="hidden" name="folio" value="{{ $ahorro_semanal->folio }}">
                    <input type="hidden" name="gmin_solicitante" value="{{ $ahorro_semanal->gmin_solicitante }}">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Solicitar</button>
                </div>
            </form>
        </div>
    </div>
</div>