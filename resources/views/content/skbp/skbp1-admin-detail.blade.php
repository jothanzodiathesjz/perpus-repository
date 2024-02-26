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
  <span class="text-muted fw-light">Dashboard/</span> Bebas Pustaka
</h4>
<div class="col-xl-9 col-md-8 col-12 mb-md-0 mb-4">
  <div class="card invoice-preview-card">
    <div class="card-body d-flex justify-content-between align-items-start">
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
      <a id="print" class="btn btn-primary w-25">Print Skbp2</a>
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
            @if (auth()->user()->role == 'admin') 
            <th>Publish</th>
            @endif
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-nowrap">Bab1</td>
            <td><a id="bab1"><i class="text-primary ti ti-eye"></i></a></td>
            @if (auth()->user()->role == 'admin')   
            <td><div id="checkBab1" data-bab="bab1" class="form-check form-switch">
              <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
              <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch to publish the file</label>
            </div></td>
            @endif
          </tr>
          <tr>
            <td class="text-nowrap">Bab2</td>
            <td><a id="bab2"><i class="text-primary ti ti-eye"></i></a></td>
            @if (auth()->user()->role == 'admin') 
            <td><div id="checkBab2" data-bab="bab2" class="form-check form-switch">
              <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
              <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch to publish the file</label>
            </div></td>
            @endif
          </tr>
          <tr>
            <td class="text-nowrap">Bab3</td>
            <td><a id="bab3" ><i class="text-primary ti ti-eye"></i></a></td>
            @if (auth()->user()->role == 'admin') 
            <td><div id="checkBab3" data-bab="bab3" class="form-check form-switch">
              <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
              <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch to publish the file</label>
            </div></td>
            @endif
          </tr>
          <tr id="rowbab4">
            <td class="text-nowrap">Bab4</td>
            <td><a id="bab4" ><i class="text-primary ti ti-eye"></i></a></td>
            @if (auth()->user()->role == 'admin') 
            <td><div id="checkBab4" data-bab="bab4" class="form-check form-switch">
              <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
              <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch to publish the file</label>
            </div></td>
            @endif
          </tr>
          <tr id="rowconclusion">
            <td class="text-nowrap">Conclusion</td>
            <td><a id="conclusion" ><i class="text-primary ti ti-eye"></i></a></td>
            @if (auth()->user()->role == 'admin') 
            <td><div id="checkConclusion" data-bab="conclusion" class="form-check form-switch">
              <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
              <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch to publish the file</label>
            </div></td>
            @endif
          </tr>
          <tr id="rowreference">
            <td class="text-nowrap">Reference</td>
            <td><a id="reference" ><i class="text-primary ti ti-eye"></i></a></td>
            @if (auth()->user()->role == 'admin') 
            <td><div id="checkReference" data-bab="reference" class="form-check form-switch">
              <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
              <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch to publish the file</label>
            </div></td>
            @endif
          </tr>
          <tr>
            <td class="text-nowrap">Fulltext</td>
            <td><a id="fulltext" ><i class="text-primary ti ti-eye"></i></a></td>
            @if (auth()->user()->role == 'admin') 
            <td><div id="checkfulltext" data-bab="fulltext" class="form-check form-switch">
              <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
              <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch to publish the file</label>
            </div></td>
            @endif
          </tr>
          <tr>
            <td class="text-nowrap">Cover</td>
            <td><a id="sampul" ><i class="text-primary ti ti-eye"></i></a></td>
            <td>-</td>
          </tr>
          <tr>
            <td class="text-nowrap">Epidiens</td>
            <td><a id="turnitin"><i class="text-primary ti ti-eye"></i></a></td>
            <td>-</td>
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
 var bab4 = $("#bab4");
 var conclusion = $("#conclusion");
 var reference = $("#reference");
 var fulltext = $("#fulltext");
 var sampul = $("#sampul");
 var turnitin = $("#turnitin");
 var checkBab1 = $("#checkBab1");
 var checkBab2 = $("#checkBab2");
 var checkBab3 = $("#checkBab3");
 var checkBab4 = $("#checkBab4");
 var checkConclusion = $("#checkConclusion");
 var checkReference = $("#checkReference");
 var checkFulltext = $("#checkfulltext");
 var print = $("#print");
console.log('{{request()->query('no')}}')
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
       print.attr('href','/admin/skbp2/print/'+data.id+'?no={{request()->query('no')}}')



       function setHref(element,check, url,status) {
        if (url) {
          element.attr('href', url);
          if(check && status){
            // set checked
            // $(`${check} input`).prop("checked", status);
            // check.prop('checked', status);
            $(`${check} input`).prop("checked", function (i, value) {
                return !value;
            });
          }
        } else {
          element.removeAttr('href').text('-');
          if(check){
            // remove child
            $(check).text('-');
          }
        }
      }

      setHref(bab1,'#checkBab1', data?.bab1?.url,data?.bab1?.status);
      setHref(bab2,'#checkBab2', data?.bab2?.url,data?.bab2?.status);
      setHref(bab3,'#checkBab3', data?.bab3?.url,data?.bab3?.status);
      setHref(bab4,'#checkBab4', data?.bab4?.url,data?.bab4?.status);
      setHref(conclusion,'#checkConclusion', data?.conclusion?.url,data?.conclusion?.status);
      setHref(reference,'#checkReference', data?.reference?.url,data?.reference?.status);
      setHref(fulltext,'#checkfulltext', data?.fulltext?.url,data?.fulltext?.status);
      setHref(sampul,null, data?.sampul,null);
      setHref(turnitin,null, data?.turnitin,null);

     },
     error: function(jqXHR, textStatus, errorThrown) {
       console.log(textStatus, errorThrown);
     }
   })
 }

getDatabyid()
$(".form-check-input").on('change', function() {
            // Mendapatkan nilai checkbox yang berubah
            var isChecked = $(this).prop("checked");

            // Mendapatkan id dari parent <div>
            var parentId = $(this).closest('div').data("bab");
            console.log(parentId)
            // Menyusun data yang akan dikirimkan
            var requestData = {
                data: {
                    status: isChecked,
                    bab:parentId
                }
            };
            var paramsId = '{{Route::current()->parameter('id')}}';
            // Melakukan permintaan AJAX ke route /api/skbp1/setshow
            $.ajax({
                type: 'POST',
                url: '/api/skbp1/setfileshow/'+paramsId,
                data: JSON.stringify(requestData),
                contentType: 'application/json',
                success: function(response) {
                    console.log(response);
                    // Lakukan sesuatu setelah permintaan berhasil
                    toastr.success('success update')
                },
                error: function(error) {
                    console.error(error);
                    // Lakukan sesuatu jika ada kesalahan
                }
            });
        });
</script>
@endpush
@endsection
