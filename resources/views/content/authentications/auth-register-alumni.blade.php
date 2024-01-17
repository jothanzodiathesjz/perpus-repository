@php
$customizerHidden = 'customizer-hide';
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Register Mahasiswa')

@section('vendor-style')
<!-- Vendor -->
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/animate-css/animate.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
@endsection

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('assets/vendor/libs/spinkit/spinkit.css')}}" />
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/pages-auth-multisteps.js')}}"></script>
@endsection

@section('content')

<div class="authentication-wrapper authentication-cover authentication-bg">
  
  <div class="authentication-inner row">

    <!-- Left Text -->
    <div class="d-none d-lg-flex col-lg-4 align-items-center justify-content-center p-5 auth-cover-bg-color position-relative auth-multisteps-bg-height">
      <img src="{{ asset('assets/img/illustrations/auth-register-multisteps-illustration.png') }}" alt="auth-register-multisteps" class="img-fluid" width="280px">

      <img src="{{ asset('assets/img/illustrations/bg-shape-image-'.$configData['style'].'.png') }}" alt="auth-register-multisteps" class="platform-bg" data-app-light-img="illustrations/bg-shape-image-light.png" data-app-dark-img="illustrations/bg-shape-image-dark.png">
    </div>
    <!-- /Left Text -->
    
    <!--  Multi Steps Registration -->
    <div class="d-flex col-lg-8 align-items-center justify-content-center p-sm-5 p-3">
      <div class="w-px-700">
        <div id="multiStepsValidation" class="bs-stepper shadow-none">
          <div class="bs-stepper-header border-bottom-0">
            <div class="step" data-target="#accountDetailsValidation">
              <button type="button" class="step-trigger">
                <span class="bs-stepper-circle"><i class="ti ti-smart-home ti-sm"></i></span>
                <span class="bs-stepper-label">
                  <span class="bs-stepper-title">Account</span>
                  <span class="bs-stepper-subtitle">Account Details</span>
                </span>
              </button>
            </div>
            <div class="line">
              <i class="ti ti-chevron-right"></i>
            </div>
            <div class="step " data-target="#personalInfoValidation">
              <button type="button" class="step-trigger ">
                <span class="bs-stepper-circle"><i class="ti ti-users ti-sm"></i></span>
                <span class="bs-stepper-label">
                  <span class="bs-stepper-title">Personal</span>
                  <span class="bs-stepper-subtitle">Enter Information</span>
                </span>
              </button>
            </div>
            
          </div>
          <div class="bs-stepper-content">
            <form id="multiStepsForm" onSubmit="return false">
              @csrf
              <!-- Account Details -->
              <div id="accountDetailsValidation" class="content">
                <div class="content-header mb-4">
                  <h3 class="mb-1">Account Information</h3>
                  <p>Enter Your Account Details</p>
                </div>
                <div class="row g-3">
                  <div class="col-sm-6">
                    <label class="form-label" for="multiStepsUsername">Username</label>
                    <input type="text" name="multiStepsUsername" id="multiStepsUsername" class="form-control" placeholder="Masukkan Username" />
                  </div>
                  <div class="col-sm-6">
                    <label class="form-label" for="multiStepsEmail">Email</label>
                    <input type="email" name="multiStepsEmail" id="multiStepsEmail" class="form-control" placeholder="john.doe@email.com" aria-label="john.doe" />
                  </div>
                  <div class="col-sm-6 form-password-toggle">
                    <label class="form-label" for="multiStepsPass">Password</label>
                    <div class="input-group input-group-merge">
                      <input type="password" id="multiStepsPass" name="multiStepsPass" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="multiStepsPass2" />
                      <span class="input-group-text cursor-pointer" id="multiStepsPass2"><i class="ti ti-eye-off"></i></span>
                    </div>
                  </div>
                  <div class="col-sm-6 form-password-toggle">
                    <label class="form-label" for="multiStepsConfirmPass">Confirm Password</label>
                    <div class="input-group input-group-merge">
                      <input type="password" id="multiStepsConfirmPass" name="multiStepsConfirmPass" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="multiStepsConfirmPass2" />
                      <span class="input-group-text cursor-pointer" id="multiStepsConfirmPass2"><i class="ti ti-eye-off"></i></span>
                    </div>
                  </div>
                  <div class="col-12 d-flex justify-content-between mt-4">
                    <button class="btn btn-label-secondary btn-prev" disabled> <i class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
                      <span class="align-middle d-sm-inline-block d-none">Previous</span>
                    </button>
                    <button class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Next</span> 
                        {{-- <span class="spinner-border" role="status" aria-hidden="true"></span> --}}
                      <i class="ti ti-arrow-right ti-xs"></i>
                    </button>
                  </div>
                </div>
              </div>
              <!-- Personal Info -->
              <div id="personalInfoValidation" class="content">
                <div class="content-header mb-4">
                  <h3 class="mb-1">Personal Information</h3>
                  <p>Enter Your Personal Information</p>
                </div>
                <div class="row g-3">
                  <div class="col-sm-6">
                    <label class="form-label" for="fullname">Full Name</label>
                    <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Masukkan Nama" />
                  </div>
                  <div class="col-sm-6">
                    <label class="form-label" for="telepon">Telepon</label>
                    <div class="input-group">
                      <span class="input-group-text">ID (+62)</span>
                      <input type="text" id="telepon" name="telepon" class="form-control multi-steps-mobile" placeholder="0836765113" />
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <label class="form-label" for="stambuk">Stambuk</label>
                    <input type="text" id="stambuk" name="stambuk" class="form-control multi-steps-pincode" placeholder="Masukkan Stambuk" maxlength="20" />
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="alamat">Alamat</label>
                    <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Address" />
                  </div>
                  <div class="col-sm-6">
                    <label class="form-label" for="fakultas">Fakultas</label>
                    <select id="fakultas" class="select2 form-select" data-allow-clear="true">
                      <option value="">Select Fakultas</option>
                    </select>
                  </div>
                  <div class="col-sm-6">
                    <label class="form-label" for="ProgramStudi">Prodi</label>
                    <select id="ProgramStudi" class="select2 form-select" data-allow-clear="true">
                      <option value="">Select prodi</option>
                    </select>
                  </div>
                  <div class="col-12 d-flex justify-content-between mt-4">
                    <button class="btn btn-label-secondary btn-prev"> <i class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
                      <span class="align-middle d-sm-inline-block d-none">Previous</span>
                    </button>
                    
                    <button type="submit" class="btn btn-success btn-next btn-submit" id="submitForm">Submit</button>
                  </div>
                </div>
              </div>
              <!-- Billing Links -->
              <div id="billingLinksValidation" class="content">
                <div class="content-header">
                  <h3 class="mb-1">Select Plan</h3>
                  <p>Select plan as per your requirement</p>
                </div>
                <!-- Custom plan options -->
                <div class="row gap-md-0 gap-3 my-4">
                  <div class="col-md">
                    <div class="form-check custom-option custom-option-icon">
                      <label class="form-check-label custom-option-content" for="basicOption">
                        <span class="custom-option-body">
                          <span class="custom-option-title fs-4 mb-1">Basic</span>
                          <small class="fs-6">A simple start for start ups & Students</small>
                          <span class="d-flex justify-content-center">
                            <sup class="text-primary fs-6 lh-1 mt-3">$</sup>
                            <span class="fw-semibold fs-2 text-primary">0</span>
                            <sub class="lh-1 fs-6 mt-auto mb-2 text-muted">/month</sub>
                          </span>
                        </span>
                        <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="basicOption" />
                      </label>
                    </div>
                  </div>
                  <div class="col-md">
                    <div class="form-check custom-option custom-option-icon">
                      <label class="form-check-label custom-option-content" for="standardOption">
                        <span class="custom-option-body">
                          <span class="custom-option-title fs-4 mb-1">Standard</span>
                          <small class="fs-6">For small to medium businesses</small>
                          <span class="d-flex justify-content-center">
                            <sup class="text-primary fs-6 lh-1 mt-3">$</sup>
                            <span class="fw-semibold fs-2 text-primary">99</span>
                            <sub class="lh-1 fs-6 mt-auto mb-2 text-muted">/month</sub>
                          </span>
                        </span>
                        <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="standardOption" checked />
                      </label>
                    </div>
                  </div>
                  <div class="col-md">
                    <div class="form-check custom-option custom-option-icon">
                      <label class="form-check-label custom-option-content" for="enterpriseOption">
                        <span class="custom-option-body">
                          <span class="custom-option-title fs-4 mb-1">Enterprise</span>
                          <small class="fs-6">Solution for enterprise & organizations</small>
                          <span class="d-flex justify-content-center">
                            <sup class="text-primary fs-6 lh-1 mt-3">$</sup>
                            <span class="fw-semibold fs-2 text-primary">499</span>
                            <sub class="lh-1 fs-6 mt-auto mb-2 text-muted">/year</sub>
                          </span>
                        </span>
                        <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="enterpriseOption" />
                      </label>
                    </div>
                  </div>
                </div>
              
                <!--/ Credit Card Details -->
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- / Multi Steps Registration -->
  </div>
</div>


<script>
  // Check selected custom option
  window.Helpers.initCustomOptionCheck();
</script>
@push('body-scripts')
<script>
  const fakultas = document.getElementById('fakultas')
  const ProgramStudi = document.getElementById('ProgramStudi')
  let dataPro = new Map();
  fetch("{{asset('json/data.json')}}").then(response => response.json()).then(data => {
    const datas = data.data
    datas.forEach(elemet => {
      fakultas.append(
        new Option(elemet.fakultas, elemet.fakultas)
      )
      dataPro.set(elemet.fakultas, elemet.prodi)
    })
    fakultas.onchange = function(){
      if(fakultas.value === "Fakultas Teknik"){
        ProgramStudi.innerHTML = ''
        datas[0].prodi.forEach(element => {
          ProgramStudi.append(
            new Option(element.name, element.name)
          )
        })
      }
      if(fakultas.value === "Fakultas Hukum"){
        ProgramStudi.innerHTML = ''
        ProgramStudi.append(
          new Option("Hukum", "Hukum")
        )
      }
      if(fakultas.value === "Fakultas Ekonomi"){
        ProgramStudi.innerHTML = ''
        datas[2].prodi.forEach(element => {
          ProgramStudi.append(
            new Option(element.name, element.name)
          )
        })
      }
      if(fakultas.value === "Fakultas Informatika dan Komputer"){
        ProgramStudi.innerHTML = ''
        ProgramStudi.append(
          new Option("Teknik Informatika", "Teknik Informatika")
        )
      }
    }


  })
  const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  const submit = document.getElementById('submitForm');
  submit.onclick = ()=>{
    
    const fakultas = document.getElementById('fakultas').value
    const ProgramStudi = document.getElementById('ProgramStudi').value
    const username = document.getElementById('multiStepsUsername').value
    const email = document.getElementById('multiStepsEmail').value
    const password = document.getElementById('multiStepsPass').value
    const fullname = document.getElementById('fullname').value
    const telepon = document.getElementById('telepon').value
    const stambuk = document.getElementById('stambuk').value
    const alamat = document.getElementById('alamat').value
    $('#submitForm').append('<span class="spinner-border spinner-border-sm"></span>');
    $('#submitForm').attr('disabled', 'disabled');
    const users = {
      username,
      email,
      password,
    }

    const user_details = {s
      fullname,
      telepon,
      stambuk,
      alamat,
      fakultas,
      ProgramStudi,
    }


    $.ajax({
      type: 'POST',
      url: "{{route('mahasiswa.store')}}",
      data: {
        ...users,
        ...user_details,
      _token: '{{ csrf_token() }}'
      },
      success: function(data){
        console.log(data)
        window.open(data.url, '_blank');
        window.location.href = "/auth/login-cover"
        $('.spinner-border').remove()
        $('#submitForm').removeAttr('disabled');
      },
      error: function(data){
        $('.spinner-border').remove()
        $('#submitForm').removeAttr('disabled');
        console.log(data)
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: data.responseJSON.message,
        });
      }
    })

async function fetcPayment(id_user){
  const response = await fetch('http://localhost:8000/api/payment/store',{
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({
      id_users: id_user,
    })
  })
}


  }

</script>
@endpush
@endsection
