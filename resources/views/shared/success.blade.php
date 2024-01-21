@if (session()->has('success'))
  <div class="auto-close alert alert-success alert-dismissible fade show" role="alert">
      {{session('success')}}
      <button type="button" class="btn-close" id="success-btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div> 
@endif
