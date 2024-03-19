@extends('layouts/layoutMaster')

@section('title', 'Daftar PInjam')
@section('vendor-style')
<link rel="stylesheet" href="{{ asset('vendors/css/extensions/nouislider.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/css/extensions/toastr.min.css') }}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />
@endsection
@section('page-style')
<link rel="stylesheet" href="{{ asset('css/base/pages/app-ecommerce.css') }}">
<link rel="stylesheet" href="{{ asset('css/base/plugins/extensions/ext-component-toastr.css') }}">
@endsection
@section('vendor-script')
<script src="{{asset('assets/vendor/libs/masonry/masonry.js')}}"></script>
<script src="{{ asset('vendors/js/extensions/wNumb.min.js') }}"></script>
<script src="{{ asset('vendors/js/extensions/nouislider.min.js') }}"></script>
<script src="{{ asset('vendors/js/extensions/toastr.min.js') }}"></script>
<script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
@endsection
@section('page-script')
<script src="{{ asset('js/pages/app-ecommerce-checkout.js') }}"></script>
<script src="{{asset('assets/js/form-layouts.js')}}"></script>
@endsection
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
                    <dd id="kembali{{$item['id']}}" class="col-6 text-end">{{Carbon::createFromTimestampMs($item['tanggal_kembali'])->toDateString()}}</dd>
    
                    <dt class="col-6 fw-normal">Status</dt>
                    <dd class="col-6 text-end"><span id="status{{$item['id']}}" class="badge {{$item['status'] == 'pinjam' ? 'bg-label-success' : 'bg-label-warning'}} ms-1">{{$item['status']}}</span></dd>
                  </dl>
    
                  <hr class="mx-n4">
                  <dl class="row mb-0">
                    <dt class="col-6">Total Buku</dt>
                    <dd class="col-6 fw-semibold text-end mb-0">{{$item['count_book']}}</dd>
                  </dl>
                </div>
                
                <div class="price-details">
                    <dt class="col-6 fw-normal">Update Status</dt>
                    
                    <select id="statusDropdown{{$item['id']}}" class="form-select" onchange="changeStatus(this.value, '{{$item['id']}}')">
                      <option disabled>Status Buku</option>
                      <option value="kembali" {{ $item['status'] === 'kembali' ? 'selected' : '' }}>Kembali</option>
                      <option value="pinjam" {{ $item['status'] === 'pinjam' ? 'selected' : '' }}>Pinjam</option>
                      <option value="perpanjang" {{ $item['status'] === 'perpanjang' ? 'selected' : '' }}>Perpanjang</option>
                      <option value="expired" {{ $item['status'] === 'expired' ? 'selected' : '' }}>Expired</option>
                  </select>
                </div>
                <div id="updatePerpanjang{{$item['id']}}" class="price-details {{$item['status'] === 'perpanjang' ? '' : 'd-none'}}" >
                    <dt class="col-6 fw-normal">Pilih tanggal Kembali</dt>
                    <input type="text" id="multicol-birthdate{{$item['id']}}" class="form-control dob-picker" placeholder="YYYY-MM-DD" />
                    <button type="button"  onclick="updatePerpanjangan('{{$item['id']}}')" class="btn btn-primary mt-3 w-100 btn-next place-order">Submit</button>
                   
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
  toastr.options.timeOut = 1600;
     function changeStatus(selectedValue, itemId) {
    // Lakukan apa yang Anda perlukan dengan nilai yang dipilih
    console.log("Selected Status: " + selectedValue);
    console.log("Selected Status: " + itemId);
    if(selectedValue === "perpanjang"){
      document.getElementById('updatePerpanjang'+itemId).classList.remove('d-none');
      return;
    }else{
      document.getElementById('updatePerpanjang'+itemId).classList.add('d-none');
      fetch(`/api/skbp1/bebaspinjam/update/${itemId}`, {
          method: 'POST',
          headers: {
              'Content-Type': 'application/json',
          },
          body: JSON.stringify({ status: selectedValue }),
      })
      .then(response => response.json())
      .then(data => {
          console.log(data.message);
        document.getElementById('status'+itemId).innerHTML = data.data.status;
        document.getElementById('kembali'+itemId).innerHTML = new Date(data.data.tanggal_kembali).toLocaleDateString();
        document.getElementById('total-book').innerHTML = 'Rp '+data.denda;
        toastr.success(data.message);
      })
      .catch(error => {
          console.error('Error:', error);
      });
    }
}

function updatePerpanjangan(itemId){
  console.log(itemId);
  const date = new Date(document.getElementById('multicol-birthdate'+itemId).value); 
  fetch('/api/pinjam/update',{
    method:"PUT",
    headers:{
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({
      id: itemId,
      tanggal_kembali: date.getTime(),
      status:"perpanjang",
      expired_date: date.getTime()
    })
  })
  .then(response => response.json())
  .then(data => {
        console.log(data.message);
        // document.getElementById('status'+itemId).innerHTML = data.data.status;
        document.getElementById('kembali'+itemId).innerHTML = new Date(data.data.tanggal_kembali).toLocaleDateString();
        // document.getElementById('total-book').innerHTML = 'Rp '+data.denda;
        toastr.success(data.message);
  })

}

</script>
@endpush
<!--/ Advance Styling Options -->
@endsection
