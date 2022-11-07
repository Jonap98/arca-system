<div class="modal fade" id="modalCrearPeriocidad" tabindex="-1" aria-labelledby="modalCrearPeriocidad" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="#" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCrearPeriocidad">Crear periocidad</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="m-2">
                        <label>Periodo</label>
                        <input type="text" name="nombre" class="form-control">
                    </div>

                    <div class="m-2">
                        <label>Días</label>
                        <input type="text" name="dias" class="form-control">
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