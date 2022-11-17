<div class="modal fade" id="autorizarPrestamo{{ $solicitud->id }}" tabindex="-1" aria-labelledby="autorizarPrestamo" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('ahorro.update') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="autorizarPrestamo">Autorizar solicitud</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="m-2">
                        <span>Semana de autoriación</span>
                        <select name="semana" id="semana" class="form-select">
                            @for ($i = 1; $i <= 52; $i++)
                                <option value="{{ $i }}" {{ ($i == $semana_actual) ? 'selected' : '' }} >{{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="m-2">
                        <span>¿Seguro que desea autorizar el ahorro de <b>${{ $solicitud->monto }}</b> semanales, a: <b>{{ $solicitud->nombres }} {{ $solicitud->paterno }}</b>?</span>
                    </div>
                    <input type="hidden" name="gmin" value="{{ $solicitud->gmin_solicitante }}">
                    <input type="hidden" name="monto_semanal" value="{{ $solicitud->monto }}">
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