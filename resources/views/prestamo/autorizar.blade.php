<div class="modal fade" id="autorizarPrestamo{{ $solicitud->id }}" tabindex="-1" aria-labelledby="autorizarPrestamo" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('solicitud-prestamo.autorizar') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="autorizarPrestamo">Autorizar solicitud de prestamo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <b>Detalles de solicitud:</b>

                    <div class="m-2">
                        <b>Pago {{ $solicitud->plazo }}</b>
                        <span>${{ round($solicitud->monto / $solicitud->unidad_maxima_pago, 2) }}</span>
                    </div>

                    <div class="m-2">
                        <b>Plazo</b>
                        <span>{{ $solicitud->unidad_maxima_pago }} pagos de manera {{ $solicitud->plazo }}</span>
                    </div>

                    <div class="m-2">
                        <b>Tipo de préstamo</b>
                        <span>{{ $solicitud->tipo_prestamo }}</span>
                    </div>
                    
                    <div class="m-2">
                        <span>¿Seguro que desea autorizar el prestamo de <b>${{ $solicitud->monto }}</b>, a: <b>{{ $solicitud->nombres }} {{ $solicitud->paterno }}</b>?</span>
                    </div>
                    <input type="hidden" name="id_solicitud" value="{{ $solicitud->id }}">
                    <input type="hidden" name="plazo" value="{{ $solicitud->unidad_maxima_pago }}">
                    <input type="hidden" name="gmin" value="{{ $solicitud->gmin_solicitante }}">
                    <input type="hidden" name="pago_total" value="{{ $solicitud->monto }}">
                    <input type="hidden" name="abono" value="{{ $solicitud->monto / $solicitud->unidad_maxima_pago }}">
                    <input type="hidden" name="accion" value="Autorizar">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Autorizar</button>
                </div>
            </form>
        </div>
    </div>
</div>