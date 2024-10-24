@extends('app')
@section('title', 'Home')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <a href="{{ url('/agregar') }}" class="btn btn-success btn-sm d-flex align-items-center" style="margin-left: 20px;">
        <i class="bi bi-plus text-white me-2"></i> Agregar Proyecto
    </a>
    <div class="d-flex align-items-center">
        <a href="{{ route('proyectos.pdf') }}" class="btn btn-primary btn-sm d-flex align-items-center me-3">
            <i class="bi bi-eye text-white me-2"></i> Ver PDF
        </a>
        <a href="{{ route('proyectos.pdf.download') }}" class="btn btn-secondary btn-sm d-flex align-items-center" style="margin-right: 20px;">
            <i class="bi bi-download text-white me-2"></i> Descargar PDF
        </a>
    </div>
</div>
<table id="proyectosTable" class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre del Proyecto</th>
                <th scope="col">Fuente de Fondos</th>
                <th scope="col">Monto Planificado</th>
                <th scope="col">Monto Patrocinado</th>
                <th scope="col">Monto Fondos Propios</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($proyectos as $proyecto)
                <tr>
                    <th scope="row">{{ $proyecto->id }}</th>
                    <td>{{ $proyecto->nombreProyecto }}</td>
                    <td>{{ $proyecto->fuenteFondos }}</td>
                    <td>${{ number_format($proyecto->montoPlanificado, 2) }}</td>
                    <td>${{ number_format($proyecto->montoPatrocinado, 2) }}</td>
                    <td>${{ number_format($proyecto->montoFondosPropios, 2) }}</td>
                    <td>
                        <a href="{{ route('proyectos.edit', $proyecto->id) }}" class="btn btn-primary btn-sm">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $proyecto->id }}" data-name="{{ $proyecto->nombreProyecto }}">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Confirmar Eliminación</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¿Estás seguro de que deseas eliminar el proyecto <span id="projectName"></span>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <form id="deleteForm" method="POST" action="">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
      </div>
    </div>
  </div>
</div>

@if(session('success'))
<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div class="toast bg-success text-white" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-success text-white">
            <strong class="me-auto">Éxito</strong>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            {{ session('success') }}
        </div>
    </div>
</div>
@endif

@if(session('error'))
<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div class="toast bg-danger text-white" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-danger text-white">
            <strong class="me-auto">Error</strong>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            {{ session('error') }}
        </div>
    </div>
</div>
@endif

<script>
document.addEventListener('DOMContentLoaded', function () {
    var deleteModal = document.getElementById('deleteModal');
    deleteModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var projectId = button.getAttribute('data-id');
        var projectName = button.getAttribute('data-name');
        
        var modalBody = deleteModal.querySelector('.modal-body #projectName');
        modalBody.textContent = projectName;

        var deleteForm = deleteModal.querySelector('#deleteForm');
        deleteForm.action = '/proyectos/' + projectId;
    });

    // Inicializar DataTables
    $('#proyectosTable').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/2.1.8/i18n/es-MX.json"
        },
        "columnDefs": [
            { "orderable": false, "targets": [6] }
        ]
    });

    // Mostrar toast si hay un mensaje de éxito o error
    var toastElList = [].slice.call(document.querySelectorAll('.toast'))
    var toastList = toastElList.map(function (toastEl) {
        return new bootstrap.Toast(toastEl, { autohide: true, delay: 5000 })
    });
    toastList.forEach(toast => toast.show());
});
</script>
@endsection