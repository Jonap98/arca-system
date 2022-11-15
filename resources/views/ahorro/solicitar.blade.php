<div class="modal fade" id="modalSolicitarAhorro" tabindex="-1" aria-labelledby="modalSolicitarAhorro" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('ahorro.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalSolicitarAhorro">Solicitar ahorro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="m-2">
                        <span>Monto semanal</span>
                        <input type="text" name="monto_semanal" class="form-control">
                    </div>

                    <div class="m-2">
                        <span>¿Seguro que desea solicitar ahorro?</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Solicitar</button>
                </div>
            </form>
        </div>
    </div>
</div>