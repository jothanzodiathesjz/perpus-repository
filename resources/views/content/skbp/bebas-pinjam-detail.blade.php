@extends('layouts/layoutMaster')

@section('title', 'Daftar PInjam')

@section('content')
<h4 class="fw-bold py-3 "><span class="text-muted fw-light">Daftar Pinjam /</span> Data Pinjam</h4>
@php
   use \Carbon\Carbon;
   $number=1;
   $number2=1;
@endphp
<div class="row mb-3">
  <!-- Accordion with Icon -->
  <div class="col-md col-lg-8 mb-4 mb-md-2">
    <div class="accordion mt-3" id="accordionWithIcon">
      @foreach ($data as $item)
      <div div class="card accordion-item active">
        <h2 class="accordion-header d-flex align-items-center">
          <button type="button"  class="accordion-button" data-bs-toggle="collapse" data-bs-target="#accordionWithIcon-{{$number++}}" aria-expanded="true">
            <i class="ti ti-star ti-xs me-2"></i>
            {{Carbon::createFromTimestampMs($item['tanggal_pinjam'])->toDateString()}}
          </button>
        </h2>
        <div id="accordionWithIcon-{{$number2++}}" class="accordion-collapse collapse ">
          <div class="accordion-body">
            <div class="row">
              <ul class="col-lg-6 col-md-12 col-xs-12 p-2">
                @foreach ($item['books'] as $item2)
                <li class="d-flex mb-4 pb-1  border rounded">
                  <div class="me-3">
                    <img src="{{ $item2['imgfile'] }}" alt="User" class="rounded" width="46">
                  </div>
                  <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                    <div class="me-2">
                      <h6 class="mb-0">{{ $item2['judul'] }}</h6>
                      <small class="text-muted d-block">Penulis: {{ $item2['penulis'] }}</small>
                    </div>
                  </div>
                </li>
                @endforeach
              </ul>
              <div class="col-lg-6 col-md-12 col-xs-12">
                <div class="border rounded p-4 mb-3 pb-3">
                  <h6>Detail Pinjam</h6>
                  <dl class="row mb-0">
                    <dt class="col-6 fw-normal">Nama</dt>
                    <dd class="col-6 text-end">{{$item['nama_lengkap']}}</dd>
    
                    <dt class="col-sm-6 fw-normal">Tanggal Pinjam</dt>
                    <dd class="col-sm-6 text-success text-end"> {{Carbon::createFromTimestampMs($item['tanggal_pinjam'])->toDateString()}}</dd>
    
                    <dt class="col-6 fw-normal">Tanggal Kembali</dt>
                    <dd class="col-6 text-end">{{Carbon::createFromTimestampMs($item['tanggal_kembali'])->toDateString()}}</dd>
    
                    <dt class="col-6 fw-normal">Status</dt>
                    <dd class="col-6 text-end"><span class="badge {{$item['status'] == 'pinjam' ? 'bg-label-success' : 'bg-label-warning'}} ms-1">{{$item['status']}}</span></dd>
                  </dl>
    
                  <hr class="mx-n4">
                  <dl class="row mb-0">
                    <dt class="col-6">Total Buku</dt>
                    <dd class="col-6 fw-semibold text-end mb-0">{{$item['count_book']}}</dd>
                  </dl>
                </div>
                
                <div class="price-details">
                    <dt class="col-6 fw-normal">Update Status</dt>
                    <div class="dropdown">
                        <select class="form-select" onchange="changeStatus(this.value)">
                            <option selected disabled>Status Buku</option>
                            <option value="kembali">Kembali</option>
                            <option value="pinjam">Pinjam</option>
                            <option value="expired">Expired</option>
                        </select>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  <div class="checkout-options col-md col-lg-4">
    <div class="card">
      <div class="card-body">
        <label class="section-label form-label mb-1">Tagihan Denda</label>
        <div class="detail-amt fw-bolder" id="total-book">Rp {{$denda}}</div>
        <hr />
        <div class="price-details">
          <ul class="list-unstyled">
            <li class="price-detail">
              <div class="detail-title detail-total">Action</div>
              <a href="/admin/skbp1/print/{{$id_user}}?no={{Request::query('no')}}"  class="btn btn-primary mt-3 w-100 btn-next place-order" id="btn-pinjam" >Print bebas pinjam</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- Checkout Place Order Right ends -->
  </div>
</div>

@push('body-scripts')
<script>
     function changeStatus(selectedValue) {
        // Lakukan apa yang Anda perlukan dengan nilai yang dipilih, misalnya, tampilkan di konsol
        console.log("Selected Status: " + selectedValue);
        
        // Tambahkan logika lain sesuai kebutuhan aplikasi Anda
    }
</script>
@endpush
<!--/ Advance Styling Options -->
@endsection
