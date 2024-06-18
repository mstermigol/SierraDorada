@extends('layouts.admin')
@section('title', 'Admin->Caballos')
@section('section-title', 'Caballos')
@section('content')
  <div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.horse.create') }}" class="btn btn-success"><i class="fas fa-plus"></i></a>
  </div>

  <table class="table">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($viewData['horses'] as $horse)
        <tr>
          <td class="truncate-email">{{ $horse->getName() }}</td>
          <td>
            <div class="d-flex justify-content-start">
              <a href="{{ route('admin.horse.show', ['id' => $horse->getId()]) }}" class="btn btn-dark me-1"><i
                  class="fas fa-eye"></i></a>
              <a href="{{ route('admin.horse.edit', ['id' => $horse->getId()]) }}" class="btn btn-primary me-1"><i
                  class="fas fa-pencil-alt"></i></a>
              <form action="{{ route('admin.horse.delete', $horse->getId()) }}" method="POST">
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
          <td colspan="2">No hay caballos registrados</td>
        </tr>
      @endforelse
    </tbody>
  </table>
  {{ $viewData['horses']->links() }}
@endsection
