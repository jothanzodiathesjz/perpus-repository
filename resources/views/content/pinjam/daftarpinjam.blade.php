@extends('layouts/layoutMaster')

@section('title', 'Daftar PInjam')

@section('content')
<h4 class="fw-bold py-3 "><span class="text-muted fw-light">Daftar Pinjam /</span> Accordion</h4>
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
            {{Carbon::createFromTimestampMs($item['tanggal_pinjam'])->format('Y-m-d')}}
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
                    <dd class="col-sm-6 text-success text-end"> {{Carbon::createFromTimestampMs($item['tanggal_pinjam'])->format('Y-m-d')}}</dd>
    
                    <dt class="col-6 fw-normal">Tanggal Kembali</dt>
                    <dd class="col-6 text-end">{{Carbon::createFromTimestampMs($item['tanggal_kembali'])->format('Y-m-d')}}</dd>
    
                    <dt class="col-6 fw-normal">Status</dt>
                    <dd class="col-6 text-end"><span class="badge {{$item['status'] == 'pinjam' ? 'bg-label-warning' : 'bg-label-success'}} ms-1">{{$item['status']}}</span></dd>
                  </dl>
    
                  <hr class="mx-n4">
                  <dl class="row mb-0">
                    <dt class="col-6">Total Buku</dt>
                    <dd class="col-6 fw-semibold text-end mb-0">{{$item['count_book']}}</dd>
                  </dl>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>

</div>

<script>
      function getDataPinjam(){
        fetch(`api/daftarpinjam/${'{{Auth::user()->id}}'}`,{
          method: 'GET',
          headers: {
            'Content-Type': 'application/json',
          }
        })
        .then(res => res.json())
        .then(data => {
          console.log(data.data)
        })
      }
      getDataPinjam()

</script>

<!--/ Advance Styling Options -->
@endsection
