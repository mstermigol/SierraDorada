<div class="container-fluid d-flex justify-content-center mt-4">
    <form id="logout" action="{{ route('logout') }}" method="POST">
      @csrf
      <button type="submit" class="btn btn-danger">Logout</button>
    </form>
  </div>