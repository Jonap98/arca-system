<div class="modal fade" id="modalCrearPrestamo" tabindex="-1" aria-labelledby="modalCrearPrestamo" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('tipo-prestamo.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCrearPrestamo">Crear tipo de préstamo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="m-2">
                        <label>Tipo de préstamo</label>
                        <input type="text" name="tipo_prestamo" class="form-control">
                    </div>

                    <div class="m-2">
                        <label>Tasa de interés %</label>
                        <input type="number" name="tasa_interes" class="form-control">
                    </div>

                    <div class="m-2">
                        <label>Unidad máxima de pago</label>
                        <input type="number" name="unidad_maxima" class="form-control">
                    </div>

                    <div class="m-2">
                        <label>Periocidad</label>
                        <select name="periocidad" id="periocidad" class="form-select">
                            @foreach ($periodos as $periodo)
                                <option value="{{ $periodo->id }}">{{ $periodo->periodo }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Crear</button>
                </div>
            </form>
        </div>
    </div>
</div>