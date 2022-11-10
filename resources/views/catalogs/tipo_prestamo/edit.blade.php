<div class="modal fade" id="modalEditarPrestamo{{ $tipo->id }}" tabindex="-1" aria-labelledby="modalEditarPrestamo" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="#" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditarPrestamo">Editar tipo de préstamo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="m-2">
                        <label>Tipo de préstamo</label>
                        <input type="text" name="tipo_prestamo" class="form-control" value="{{ $tipo->tipo_prestamo }}">
                    </div>

                    <div class="m-2">
                        <label>Tasa de interés</label>
                        <input type="text" name="tasa_interes" class="form-control" value="{{ $tipo->tasa_interes }}">
                    </div>

                    <div class="m-2">
                        <label>Unidad máxima de pago</label>
                        <input type="text" name="unidad_maxima" class="form-control" value="{{ $tipo->unidad_maxima_pago }}">
                    </div>

                    <div class="m-2">
                        <label>Periocidad</label>
                        <select name="periodo" id="periocidad" class="form-select">
                            @foreach ($periodos as $periodo)
                                <option value="{{ $periodo->id }}" {{ ($periodo->id == $tipo->id) ? 'selected' : '' }} >{{ $tipo->periodo }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>