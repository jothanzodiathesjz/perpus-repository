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
  <span class="text-muted fw-light">Dashboard/</span> Generate Validation Code
</h4>
<div class="col-xl-9 col-md-8 col-12 mb-md-0 mb-4">
  <div class="input-group mb-3">
  <button class="btn btn-outline-secondary" type="button" onclick="generateCode()" id="button-addon1">Generate Code</button>
  <input type="text" class="form-control" id="code" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
</div>
<button type="reset" onclick="reset()" class="btn btn-secondary">Reset</button>

</div>


@push('body-scripts')
<script>
 function generateCode(){
     // Mendefinisikan URL endpoint
const apiUrl = '/api/validation-code';

// Mendefinisikan opsi untuk fetch
const options = {
    method: 'GET',
    headers: {
        'Content-Type': 'application/json',
        // Jika Anda membutuhkan header lain, Anda dapat menambahkannya di sini
    },
    // Jika Anda perlu menyertakan kredensial (misalnya, cookie), tambahkan opsi berikut:
    // credentials: 'include',
};

// Melakukan permintaan fetch
fetch(apiUrl, options)
    .then(response => {
        // Periksa status respons
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        // Mengembalikan respons dalam bentuk JSON
        return response.json();
    })
    .then(data => {
        // Handle data jika diperlukan
        console.log('Data:', data);
        document.getElementById('code').value = data.code
    })
    .catch(error => {
        // Handle error jika diperlukan
        console.error('Error:', error);
    });

 }

function reset(){
  document.getElementById('code').value = ''
}
</script>
@endpush
@endsection
