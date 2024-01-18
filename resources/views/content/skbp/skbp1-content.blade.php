@extends('layouts/layoutMaster')

@section('title', 'DataTables - Tables')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />
<!-- Row Group CSS -->
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css')}}">
<!-- Form Validation -->
<link rel="stylesheet" href="{{asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}" />
<link rel="stylesheet" href="{{ asset('vendors/css/extensions/nouislider.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/css/extensions/toastr.min.css') }}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/animate-css/animate.css')}}">
@endsection
@section('page-style')
<link rel="stylesheet" href="{{ asset('css/base/plugins/extensions/ext-component-sliders.css') }}">
<link rel="stylesheet" href="{{ asset('css/base/pages/app-ecommerce.css') }}">
<link rel="stylesheet" href="{{ asset('css/base/plugins/extensions/ext-component-toastr.css') }}">
@endsection
@section('vendor-script')

<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<!-- Flat Picker -->
<script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>
<script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
<!-- Form Validation -->
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/masonry/masonry.js')}}"></script>
<script src="{{ asset('vendors/js/extensions/wNumb.min.js') }}"></script>
<script src="{{ asset('vendors/js/extensions/nouislider.min.js') }}"></script>
<script src="{{ asset('vendors/js/extensions/toastr.min.js') }}"></script>
@endsection



@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Dashboard/</span> Skbp1
</h4>
<div class="col-xl-9 col-md-8 col-12 mb-md-0 mb-4">
  <div class="card invoice-preview-card">
    <div class="card-body">
      <div class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column m-sm-3 m-0">
        <div class="mb-xl-0 mb-0">
          <p class="mb-3">
            <span class="fw-semibold">Nama:</span> 
            <span id="nama"> </span></p>
          <p class="mb-3">
            <span class="fw-semibold">Stambuk: </span> 
            <span id="stambuk"> </span> </p>
          <p class="mb-3">
            <span class="fw-semibold">Fakultas: </span>   
            <span id="fakultas"></span></p>
          <p class="mb-3">
            <span class="fw-semibold">Jurusan: </span>  
            <span id="jurusan"></span></p>
          <p class="mb-3">
            <span class="fw-semibold">Judul: </span>  
            <span id="judul"></span></p>
        </div>
      </div>
    </div>
    <hr class="my-0" />
    <div class="card-body">
      <div class="row p-sm-3 p-0">
        <div class="col-12">
          <h6 class="mb-3">Abstark:</h6>
          <div id="abstrak"></div>
        </div>
      </div>
    </div>
    <div class="table-responsive border-top">
      <table class="table m-0">
        <thead>
          <tr>
            <th>Item</th>
            <th>File</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-nowrap">Bab1</td>
            <td><a id="bab1"><i class="text-primary ti ti-eye"></i></a></td>
          </tr>
          <tr>
            <td class="text-nowrap">Bab2</td>
            <td><a id="bab2"><i class="text-primary ti ti-eye"></i></a></td>
          </tr>
          <tr>
            <td class="text-nowrap">Bab3</td>
            <td><a id="bab3" ><i class="text-primary ti ti-eye"></i></a></td>
          </tr>
          <tr>
            <td class="text-nowrap">Fulltext</td>
            <td><a id="fulltext" ><i class="text-primary ti ti-eye"></i></a></td>
          </tr>
          <tr>
            <td class="text-nowrap">Sampul</td>
            <td><a id="sampul" ><i class="text-primary ti ti-eye"></i></a></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>


@push('body-scripts')
<script>
  toastr.options.timeOut = 500;
 const params = '{{Route::current()->parameter('id')}}';
 var nama = $("#nama");
 var stambuk = $("#stambuk");
 var fakultas = $("#fakultas");
 var jurusan = $("#jurusan");
 var judul = $("#judul");
 var abstrak = $("#abstrak");
 var bab1 = $("#bab1");
 var bab2 = $("#bab2");
 var bab3 = $("#bab3");
 var fulltext = $("#fulltext");
 var sampul = $("#sampul");

 function getDatabyid(){
   $.ajax({
     type: "GET",
     url: `/api/skbp1/get/${params}`,
     dataType: "json",
     success: function (response) {
       console.log(response)
       let data = response.data
       nama.text(data.nama)
       stambuk.text(data.stambuk)
       fakultas.text(data.fakultas)
       jurusan.text(data.jurusan)
       judul.text(data.judul.toUpperCase())
       abstrak.text(data.abstrak)
       sampul.attr('href', data.sampul);

       function setHref(element, url, status) {
        if (status) {
          element.attr('href', url.url);
        } else {
          element.removeAttr('href').text('-');
        }
      }

      setHref(bab1, data?.bab1,data?.bab1?.status);
      setHref(bab2, data?.bab2,data?.bab2?.status);
      setHref(bab3, data?.bab3,data?.bab3?.status);
      setHref(fulltext, data?.fulltext,data?.fulltext?.status);

     },
     error: function(jqXHR, textStatus, errorThrown) {
       console.log(textStatus, errorThrown);
     }
   })
 }

getDatabyid()

</script>
@endpush
@endsection
