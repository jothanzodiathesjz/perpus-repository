@php
$customizerHidden = 'customizer-hide';
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Register ')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-misc.css')}}">
@endsection


@section('content')
<!-- Not Authorized -->
<div class="container-xxl container">
  <div class="misc-wrapper">
    <h2 class="mb-2 mx-2">Pilih Role</h2>
    <div class="d-flex flex-row gap-4">
        <div class="card h-16" >
            <div class="card-body" >
                <a href="/auth/register/mahasiswa">
                    <span class="avatar-initial rounded bg-label-primary"><i class=" ti ti-users" style="font-size: 70px"></i></span>
                </a>
              <h5 class="card-title mt-3">Mahasiswa</h5>
              {{-- <h6 class="card-subtitle text-muted">Support card subtitle</h6> --}}
            </div>
          </div>
          
        <div class="card h-16" >
            <div class="card-body" >
                <a href="/auth/register/alumni">
                    <span class="avatar-initial rounded bg-label-primary"><i class=" ti ti-user-check" style="font-size: 70px"></i></span>
                </a>
              <h5 class="card-title mt-3">Alumni</h5>
              {{-- <h6 class="card-subtitle text-muted">Support card subtitle</h6> --}}
            </div>
        </div>
        <div class="card h-16" >
            <div class="card-body" >
                <a href="/auth/register/dosen">
                    <span class="avatar-initial rounded bg-label-primary"><i class=" ti ti-user" style="font-size: 70px"></i></span>
                </a>
              <h5 class="card-title mt-3">Dosen</h5>
              {{-- <h6 class="card-subtitle text-muted">Support card subtitle</h6> --}}
            </div>
        </div>
    </div>
  </div>
</div>
<div class="container-fluid misc-bg-wrapper">
  <img src="{{ asset('assets/img/illustrations/bg-shape-image-'.$configData['style'].'.png') }}" alt="page-misc-not-authorized" data-app-light-img="illustrations/bg-shape-image-light.png" data-app-dark-img="illustrations/bg-shape-image-dark.png">
</div>
<!-- /Not Authorized -->
@endsection
