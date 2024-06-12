@extends('layouts.admin')
@section('title', 'Admin->Galería')
@section('section-title', 'Galería')
@section('content')
  <div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.gallery.create') }}" class="btn btn-success"><i class="fas fa-plus"></i></a>
  </div>

  <table class="table">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($viewData['galleries'] as $gallery)
        <tr>
          <td class="truncate-email">{{ $gallery->getName() }}</td>
          <td>
            <div class="d-flex justify-content-start">
              <a href="{{ route('admin.gallery.show', ['id' => $gallery->getId()]) }}" class="btn btn-dark me-1"><i
                  class="fas fa-eye"></i></a>
              <a href="{{ route('admin.gallery.edit', ['id' => $gallery->getId()]) }}" class="btn btn-primary me-1"><i
                  class="fas fa-pencil-alt"></i></a>
              <form action="{{ route('admin.gallery.delete', $gallery->getId()) }}" method="POST">
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
          <td colspan="2">No hay galerías registradas</td>
        </tr>
      @endforelse
    </tbody>
  </table>
  {{ $viewData['galleries']->links() }}
@endsection
