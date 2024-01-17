@extends('layouts/layoutMaster')

@section('title', 'Cards basic - UI elements')
@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/animate-css/animate.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/masonry/masonry.js')}}"></script>
@endsection
@section('page-script')
<script src="{{asset('assets/js/ui-modals.js')}}"></script>
@endsection
@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Books /</span> All</h4>


<!-- Examples -->
<div class="row mt-1 mb-3">
    <div class="col-sm-12">
      <div class="input-group input-group-merge shadow">
        <input
          type="text"
          class="form-control p-3"
          id="shop-search"
          placeholder="Search Books"
          aria-label="Search..."
          aria-describedby="shop-search"
        />
        <span class="input-group-text"><i class='ti ti-search me-2'></i></span>
      </div>
    </div>
</div>    
<div class="row">

      <!-- Modal -->
      <div class="modal fade animate__animated animate__bounceInLeft" id="animationModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel5">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col mb-3">
                  <label for="nameAnimation" class="form-label">Name</label>
                  <input type="text" id="nameAnimation" class="form-control" placeholder="Enter Name">
                </div>
              </div>
              <div class="row g-2">
                <div class="col mb-0">
                  <label for="emailAnimation" class="form-label">Email</label>
                  <input type="email" id="emailAnimation" class="form-control" placeholder="xxxx@xxx.xx">
                </div>
                <div class="col mb-0">
                  <label for="dobAnimation" class="form-label">DOB</label>
                  <input type="date" id="dobAnimation" class="form-control" placeholder="DD / MM / YY">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
</div>
<div class="row mb-5">
  <div class="col-md-3 col-lg-3 mb-3 col-sm-3">
    <div class="card h-px-400">
      <img class="card-img-top h-50 img-responsive" src="https://th.bing.com/th/id/OIP.IjXSQgpeek65QTvREX852QHaLL?rs=1&pid=ImgDetMain" alt="Card image cap" />
      <div class="p-3">
        <h5 class="card-title">Books Title</h5>
        <div class="mb-3 ">
            <span><i class='ti ti-pencil me-2'></i></span>
            <span><i>Author : </i></span>
            <span>Dimas Palimbong</span>
        </div>
        <div class="mb-3 ">
            <span><i>280 Halaman</i></span>
        </div>
        <div>
            <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#animationModal">Detail</button>
        </div>
    </div>
    </div>
</div>
  <div class="col-md-3 col-lg-3 mb-3 col-sm-3">
    <div class="card h-px-400">
      <img class="card-img-top h-50 img-responsive" src="https://th.bing.com/th/id/OIP.IjXSQgpeek65QTvREX852QHaLL?rs=1&pid=ImgDetMain" alt="Card image cap" />
      <div class="p-3">
        <h5 class="card-title">Books Title</h5>
        <div class="mb-3 ">
            <span><i class='ti ti-pencil me-2'></i></span>
            <span><i>Author : </i></span>
            <span>Dimas Palimbong</span>
        </div>
        <div class="mb-3 ">
            <span><i>280 Halaman</i></span>
        </div>
        <div>
            <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#animationModal">Detail</button>
        </div>
    </div>
    </div>
</div>
  <div class="col-md-3 col-lg-3 mb-3 col-sm-3">
    <div class="card h-px-400">
      <img class="card-img-top h-50 img-responsive" src="https://th.bing.com/th/id/OIP.IjXSQgpeek65QTvREX852QHaLL?rs=1&pid=ImgDetMain" alt="Card image cap" />
      <div class="p-3">
        <h5 class="card-title">Books Title</h5>
        <div class="mb-3 ">
            <span><i class='ti ti-pencil me-2'></i></span>
            <span><i>Author : </i></span>
            <span>Dimas Palimbong</span>
        </div>
        <div class="mb-3 ">
            <span><i>280 Halaman</i></span>
        </div>
        <div>
            <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#animationModal">Detail</button>
        </div>
    </div>
    </div>
</div>
  <div class="col-md-3 col-lg-3 mb-3 col-sm-3">
    <div class="card h-px-400">
      <img class="card-img-top h-50 img-responsive" src="https://th.bing.com/th/id/OIP.IjXSQgpeek65QTvREX852QHaLL?rs=1&pid=ImgDetMain" alt="Card image cap" />
      <div class="p-3">
        <h5 class="card-title">Books Title</h5>
        <div class="mb-3 ">
            <span><i class='ti ti-pencil me-2'></i></span>
            <span><i>Author : </i></span>
            <span>Dimas Palimbong</span>
        </div>
        <div class="mb-3 ">
            <span><i>280 Halaman</i></span>
        </div>
        <div>
            <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#animationModal">Detail</button>
        </div>
    </div>
    </div>
</div>
  

  
</div>
<!-- Examples -->


</div>
<!--/ Card layout -->
@endsection
