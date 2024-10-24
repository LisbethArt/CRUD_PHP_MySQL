@extends('app')
@section('title', 'Editar Proyecto')

@section('content')
<div>
    <a href="{{ url('/') }}" class="text-decoration-none">
        <i class="bi bi-arrow-left fs-3 me-3"></i>
    </a>
    <h2 class="d-inline">Editar Proyecto</h2>
    </br></br>
    <form action="{{ route('proyectos.update', $proyecto->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombreProyecto" class="form-label">Nombre del Proyecto</label>
            <input type="text" class="form-control" id="nombreProyecto" name="nombreProyecto" value="{{ $proyecto->nombreProyecto }}" required>
        </div>
        <div class="mb-3">
            <label for="fuenteFondos" class="form-label">Fuente de Fondos</label>
            <input type="text" class="form-control" id="fuenteFondos" name="fuenteFondos" value="{{ $proyecto->fuenteFondos }}" required>
        </div>
        <div class="row g-8">
            <div class="col-md-4 mb-3">
                <label for="montoPlanificado" class="form-label">Monto Planificado</label>
                <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="number" step="0.01" class="form-control" id="montoPlanificado" name="montoPlanificado" value="{{ $proyecto->montoPlanificado }}" required>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="montoPatrocinado" class="form-label">Monto Patrocinado</label>
                <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="number" step="0.01" class="form-control" id="montoPatrocinado" name="montoPatrocinado" value="{{ $proyecto->montoPatrocinado }}" required>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="montoFondosPropios" class="form-label">Monto Fondos Propios</label>
                <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="number" step="0.01" class="form-control" id="montoFondosPropios" name="montoFondosPropios" value="{{ $proyecto->montoFondosPropios }}" required>
                </div>
            </div>
        </div>
        </br>
        <button type="submit" class="btn btn-primary">Editar</button>
    </form>
</div>
@endsection