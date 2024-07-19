@extends('layouts.admin')
@section('title', 'Admin->Deportista')
@section('section-title', 'Deportista')
@section('content')
  <div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.sportsman.create') }}" class="btn btn-success"><i class="fas fa-plus"></i></a>
  </div>

  <table class="table">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($viewData['sportsman'] as $sportsman)
        <tr>
          <td class="truncate-email">{{ $sportsman->getName() }}</td>
          <td>
            <div class="d-flex justify-content-start">
              <a href="{{ route('admin.sportsman.show', ['id' => $sportsman->getId()]) }}" class="btn btn-dark me-1"><i
                  class="fas fa-eye"></i></a>
              <a href="{{ route('admin.sportsman.edit', ['id' => $sportsman->getId()]) }}" class="btn btn-primary me-1"><i
                  class="fas fa-pencil-alt"></i></a>
              <form action="{{ route('admin.sportsman.delete', $sportsman->getId()) }}" method="POST">
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
          <td colspan="2">No hay deportistas registrados</td>
        </tr>
      @endforelse
    </tbody>
  </table>
  {{ $viewData['sportsman']->links() }}
@endsection
