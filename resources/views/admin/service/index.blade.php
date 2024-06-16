@extends('layouts.admin')
@section('title', 'Admin->Servicios')
@section('section-title', 'Servicios')
@section('content')
  <div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.service.create') }}" class="btn btn-success"><i class="fas fa-plus"></i></a>
  </div>

  <table class="table">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($viewData['services'] as $service)
        <tr>
          <td class="truncate-email">{{ $service->getName() }}</td>
          <td>
            <div class="d-flex justify-content-start">
              <a href="{{ route('admin.service.show', ['id' => $service->getId()]) }}" class="btn btn-dark me-1"><i
                  class="fas fa-eye"></i></a>
              <a href="{{ route('admin.service.edit', ['id' => $service->getId()]) }}" class="btn btn-primary me-1"><i
                  class="fas fa-pencil-alt"></i></a>
              <form action="{{ route('admin.service.delete', $service->getId()) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger me-1"
                  onclick="return confirm('{{ $viewData['delete'] }}')"><i class="fas fa-trash-alt"></i></button>
              </form>
            </div>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="2">No hay servicios registrados</td>
        </tr>
      @endforelse
    </tbody>
  </table>
  {{ $viewData['services']->links() }}
@endsection
