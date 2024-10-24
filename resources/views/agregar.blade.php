@extends('app')
@section('title', 'Agregar Proyecto')

@section('content')
<div>
    <a href="{{ url('/') }}" class="text-decoration-none">
        <i class="bi bi-arrow-left fs-3 me-3"></i>
    </a>
    <h2 class="d-inline">Agregar Proyecto</h2>
    </br></br>
    <form action="{{ route('proyectos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombreProyecto" class="form-label">Nombre del Proyecto</label>
            <input type="text" class="form-control" id="nombreProyecto" name="nombreProyecto" required>
        </div>
        <div class="mb-3">
            <label for="fuenteFondos" class="form-label">Fuente de Fondos</label>
            <input type="text" class="form-control" id="fuenteFondos" name="fuenteFondos" required>
        </div>
        <div class="row g-8">
            <div class="col-md-4 mb-3">
                <label for="montoPlanificado" class="form-label">Monto Planificado</label>
                <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="number" step="0.01" class="form-control" id="montoPlanificado" name="montoPlanificado" required>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="montoPatrocinado" class="form-label">Monto Patrocinado</label>
                <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="number" step="0.01" class="form-control" id="montoPatrocinado" name="montoPatrocinado" required>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="montoFondosPropios" class="form-label">Monto Fondos Propios</label>
                <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="number" step="0.01" class="form-control" id="montoFondosPropios" name="montoFondosPropios" required>
                </div>
            </div>
        </div>
        </br>
        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
</div>
@endsection