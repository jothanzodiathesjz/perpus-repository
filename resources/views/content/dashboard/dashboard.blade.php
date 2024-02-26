@extends('layouts/layoutMaster')

@section('title', 'Analytics')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/swiper/swiper.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css')}}" />
@endsection

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/cards-advance.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/swiper/swiper.js')}}">
</script>
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
@endsection

@section('content')

<div class="row">
  <!-- Website Analytics -->
  <div class="col-lg-12 mb-4">
    <div class="swiper-container swiper-container-horizontal swiper swiper-card-advance-bg" id="swiper-with-pagination-cards">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <div class="row">
            <div class="row">
              
              <div class="col-lg-7 col-md-9 col-12 order-2 order-md-1 d-flex justify-content-center align-items-center" style="height: 30vh;">
                <h3 class="text-white mt-0 ">Wellcome To E-Library UKI Paulus</h3>
              </div>
              <div class="col-lg-5 col-md-3 col-12 order-1 order-md-2 my-4 my-md-0 text-center">
                <img src="{{asset('assets/img/perpus/ukip.png')}}" alt="Website Analytics" width="170" class="card-website-analytics-img">
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="row">
            <div class="col-12">
              <h5 class="text-white mb-0 mt-2">Alamat</h5>
              {{-- <small>Total 28.5% Conversion Rate</small> --}}
            </div>
            <div class="col-lg-7 col-md-9 col-12 order-2 order-md-1">
              <div class="row">
                <div class="col-12">
                  <p class="text-wrap">
                      Kampus Daya (Kampus Utama ) : Jl. Perintis Kemerdekaan KM 13 , Daya Kota Makassar, <br> Telp : 0411-582825 <br>
                      Kampus Program Pascasarjana : Jl. Cendrawasih No.65 Telp 0411-855397, 873 259</p>
                </div>
              </div>
            </div>
            <div class="col-lg-5 col-md-3 col-12 order-1 order-md-2 my-4 my-md-0 text-center">
              <img src="{{asset('assets/img/illustrations/card-website-analytics-2.png')}}" alt="Website Analytics" width="170" class="card-website-analytics-img">
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
  <!--/ Website Analytics -->

 
<div class="row">
  <div class="col-sm-6 col-lg-3 mb-4">
    <div class="card card-border-shadow-primary">
      <div class="card-body">
        <div class="d-flex align-items-center mb-2 pb-1">
          <div class="avatar me-2">
            <span class="avatar-initial rounded bg-label-primary"><i class="ti ti-book ti-md"></i></span>
          </div>
          <h4 id="totalBooks" class="ms-1 mb-0">0</h4>
        </div>
        <p class="mb-1">Books</p>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-lg-3 mb-4">
    <div class="card card-border-shadow-warning">
      <div class="card-body">
        <div class="d-flex align-items-center mb-2 pb-1">
          <div class="avatar me-2">
            <span class="avatar-initial rounded bg-label-warning"><i class="ti ti-file ti-md"></i></span>
          </div>
          <h4 id="totalJournals" class="ms-1 mb-0">0</h4>
        </div>
        <p  class="mb-1">Journal</p>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-lg-3 mb-4">
    <div class="card card-border-shadow-danger">
      <div class="card-body">
        <div class="d-flex align-items-center mb-2 pb-1">
          <div class="avatar me-2">
            <span class="avatar-initial rounded bg-label-danger"><i class="ti ti-file-description ti-md"></i></span>
          </div>
          <h4 id="totalSkripsi" class="ms-1 mb-0">0</h4>
        </div>
        <p class="mb-1">Skripsi</p>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-lg-3 mb-4">
    <div class="card card-border-shadow-info">
      <div class="card-body">
        <div class="d-flex align-items-center mb-2 pb-1">
          <div class="avatar me-2">
            <span class="avatar-initial rounded bg-label-info"><i class="ti ti-user-check ti-md"></i></span>
          </div>
          <h4 id="totalUsers" class="ms-1 mb-0">0</h4>
        </div>
        <p class="mb-1">Users</p>
      </div>
    </div>
  </div>
</div>

</div>

@push('body-scripts')
<script>
  // Menggunakan fetch untuk mengambil data dari endpoint
fetch('/api/dashboard/data-count')
  .then(response => {
    // Memeriksa apakah permintaan berhasil (status 200 OK)
    if (!response.ok) {
      throw new Error(`HTTP error! Status: ${response.status}`);
    }
    // Menguraikan respon sebagai JSON
    return response.json();
  })
  .then(data => {
    // Data sukses diambil, lakukan sesuatu dengan data
    console.log(data);
    document.getElementById('totalBooks').innerHTML = data.books;
    document.getElementById('totalJournals').innerHTML = data.jurnal;
    document.getElementById('totalSkripsi').innerHTML = data.skripsi;
    document.getElementById('totalUsers').innerHTML = data.users;
  })
  .catch(error => {
    // Menangani kesalahan jika terjadi
    console.error('Fetch error:', error);
  });

</script>
@endpush

@endsection
