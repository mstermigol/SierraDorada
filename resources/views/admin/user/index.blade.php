@extends('layouts.admin')
@section('title', 'Admin->Usuarios')
@section('section-title', 'Usuarios')
@section('content')
  <div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.user.create') }}" class="btn btn-success"><i class="fas fa-plus"></i></a>
  </div>

  <table class="table">
    <thead>
      <tr>
        <th>Correo</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($viewData['users'] as $user)
        <tr>
          <td class="truncate-email">{{ $user->email }}</td>
          <td>
            <div class="d-flex justify-content-start">
              <a href="{{ route('admin.user.edit', ['id' => $user->getId()]) }}" class="btn btn-primary me-1"><i
                  class="fas fa-pencil-alt"></i></a>
              <form action="{{ route('admin.user.delete', $user->getId()) }}" method="POST">
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
          <td colspan="2">No hay usuarios registrados</td>
        </tr>
      @endforelse
    </tbody>
  </table>

  {{ $viewData['users']->links() }}


@endsection
