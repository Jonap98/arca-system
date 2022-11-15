<div class="modal fade" id="rechazarAhorro{{ $solicitud->id }}" tabindex="-1" aria-labelledby="rechazarAhorro" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('ahorro.update') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="rechazarAhorro">Rechazar solicitud</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="m-2">
                        <span>¿Seguro que desea rechazar el ahorro de <b>${{ $solicitud->monto_semanal }}</b> semanales, a: <b>{{ $solicitud->nombres }} {{ $solicitud->paterno }}</b>?</span>
                    </div>
                    <input type="hidden" name="gmin" value="{{ $solicitud->gmin_solicitante }}">
                    <input type="hidden" name="folio" value="{{ $solicitud->folio }}">
                    <input type="hidden" name="accion" value="Rechazar">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Rechazar</button>
                </div>
            </form>
        </div>
    </div>
</div>