@extends('layouts/layoutMaster')

@section('title', 'DataTables - Tables')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />

<!-- Row Group CSS -->
<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/typography.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/katex.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/editor.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css')}}">
<!-- Form Validation -->
<link rel="stylesheet" href="{{asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}" />
<link rel="stylesheet" href="{{ asset('vendors/css/extensions/nouislider.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/css/extensions/toastr.min.css') }}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/animate-css/animate.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
@endsection
@section('page-style')
<link rel="stylesheet" href="{{ asset('css/base/plugins/extensions/ext-component-sliders.css') }}">
<link rel="stylesheet" href="{{ asset('css/base/pages/app-ecommerce.css') }}">
<link rel="stylesheet" href="{{ asset('css/base/plugins/extensions/ext-component-toastr.css') }}">
@endsection
@section('vendor-script')
<script src="{{asset('assets/vendor/libs/quill/katex.js')}}"></script>
<script src="{{asset('assets/vendor/libs/quill/quill.js')}}"></script>
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
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
@endsection
@section('page-script')
<script src="{{asset('assets/js/pages-auth-multisteps.js')}}"></script>
{{-- <script src="{{asset('assets/js/forms-editors.js')}}"></script> --}}
@endsection


@section('content')
<style>
  .hidden {
    display: none;
  }
</style>
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Dashboard/</span> Skbp1
</h4>
 <!-- Bootstrap Validation -->
 <div class="col-md">
    <div class="card">
      <h5 class="card-header">Form SKBP 1</h5>
      <div class="card-body">
        <div class="form-check form-switch mb-1 d-flex flex-column">
          <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked onchange="toggleSwitch()">
        </div>
        <div class="mb-3 d-flex flex-column">
          <span class="text-danger">*Enable untuk memilih skripsi</span>
          <span class="text-danger">*Disable untuk memilih jurnal</span>
        </div>
        {{-- form start --}}
        <div class="needs-validation" novalidate>
          <div class="row">
            <div class="mb-3 col-12 col-lg-6">
              <label class="form-label" for="bs-validation-name">Nama Lengkap</label>
              <input type="text" class="form-control" id="nama" placeholder="Masukkan nama" required />
              <div class="valid-feedback"> Looks good! </div>
              <div class="invalid-feedback"> Please enter your name. </div>
            </div>
            <div class="mb-3 col-12 col-lg-6">
              <label class="form-label" for="bs-validation-email">Stambuk</label>
              <input type="email" id="stambuk" class="form-control" placeholder="Masukkan Stambuk" aria-label="john.doe" required />
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6 mb-3">
              <label class="form-label" for="fakultas">Fakultas</label>
              <select id="fakultas" class="select2 form-select" data-allow-clear="true">
                <option value="">Select Fakultas</option>
              </select>
            </div>
            <div class="col-sm-6 mb-3">
              <label class="form-label" for="ProgramStudi">Prodi</label>
              <select id="ProgramStudi" class="select2 form-select" data-allow-clear="true">
                <option value="">Select prodi</option>
              </select>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="judul">Judul</label>
            <div class="input-group input-group-merge">
              <input type="text" id="judul" class="form-control" placeholder="Masukkan Judul"  />
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <label class="form-label" for="judul">Alamat</label>
              <div class="input-group input-group-merge">
                <input type="text" id="alamat" class="form-control" placeholder="Masukkan Alamat"  />
              </div>
            </div>
            <div class="col-sm-6">
              <label class="form-label" for="volume">Volume</label>
              <div class="input-group input-group-merge">
                <input type="text" id="volume" class="form-control" placeholder="Masukkan Volume"  />
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <label class="form-label" for="tahun">Tahun</label>
            <div class="input-group input-group-merge">
              <input type="text" id="tahun" class="form-control" placeholder="Masukkan Tahun"  />
            </div>
          </div>
          <div class="row">
            <div class=" col-sm-6" id="bab1parent">
              <label class="form-label" for="bab1">Babb 1</label>
              <input type="file" class="form-control" id="bab1" accept=".pdf, .doc, .docx" />
              <ul class="list-unstyled pt-1 d-flex flex-row gap-4">
                <li>
                  <span class="text-danger fs-tiny">* max. 5 MB</span>
                </li>
                <li>
                  <span class="text-danger fs-tiny">* file. pdf,docx</span>
                </li>
              </ul>
            </div>
            <div class=" col-sm-6" id="bab2parent">
              <label class="form-label" for="bab2">Babb 2</label>
              <input type="file" class="form-control" id="bab2" accept=".pdf, .doc, .docx" />
              <ul class="list-unstyled pt-1 d-flex flex-row gap-4">
                <li>
                  <span class="text-danger fs-tiny">* max. 5 MB</span>
                </li>
                <li>
                  <span class="text-danger fs-tiny">* file. pdf,docx</span>
                </li>
              </ul>
            </div>
          </div>
          <div class="row" >
            <div class=" col-sm-6" id="bab3parent">
              <label class="form-label" for="bab3">Babb 3</label>
              <input type="file" class="form-control" id="bab3" accept=".pdf, .doc, .docx" />
              <ul class="list-unstyled pt-1 d-flex flex-row gap-4">
                <li>
                  <span class="text-danger fs-tiny">* max. 5 MB</span>
                </li>
                <li>
                  <span class="text-danger fs-tiny">* file. pdf,docx</span>
                </li>
              </ul>
            </div>
            <div class=" col-sm-6">
              <label class="form-label" for="fulltext">Full Text</label>
              <input type="file" class="form-control" id="fulltext" accept=".pdf, .doc, .docx" />
              <ul class="list-unstyled pt-1 d-flex flex-row gap-4">
                <li>
                  <span class="text-danger fs-tiny">* max. 5 MB</span>
                </li>
                <li>
                  <span class="text-danger fs-tiny">* file. pdf,docx</span>
                </li>
              </ul>
            </div>
          </div>
          <div class="row">
            <div class=" col-sm-6">
              <label class="form-label" for="sampul">Sampul</label>
              <input type="file" class="form-control" id="sampul" accept=".pdf, .doc, .docx" />
              <ul class="list-unstyled pt-1 d-flex flex-row gap-4">
                <li>
                  <span class="text-danger fs-tiny">* max. 5 MB</span>
                </li>
                <li>
                  <span class="text-danger fs-tiny">* file. pdf,docx</span>
                </li>
              </ul>
            </div>
            <div class=" col-sm-6">
              <label class="form-label" for="turnitin">Turnitin</label>
              <input type="file" class="form-control" id="turnitin" accept=".pdf, .doc, .docx" />
              <ul class="list-unstyled pt-1 d-flex flex-row gap-4">
                <li>
                  <span class="text-danger fs-tiny">* max. 5 MB</span>
                </li>
                <li>
                  <span class="text-danger fs-tiny">* file. pdf,docx</span>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-12 mb-3">
            <label class="form-label" for="abstrak">Abstrak</label>
            <textarea class="form-control" id="abstrak" name="formValidationBio" rows="3"></textarea>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" onclick="submitForm()" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </div>
        {{-- form end --}}
      </div>
    </div>
  </div>
  <!-- /Bootstrap Validation -->

  <script>
    // Check selected custom option
    window.Helpers.initCustomOptionCheck();
  </script>
@push('body-scripts')
<script>
  var type = "Skripsi";
  
  toastr.options.timeOut = 1600;
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
    
    var namaElement = document.getElementById('nama');
    var stambukElement = document.getElementById('stambuk');
    var fakultasElement = document.getElementById('fakultas');
    var programStudiElement = document.getElementById('ProgramStudi');
    var judulElement = document.getElementById('judul');
    var alamatElement = document.getElementById('alamat');
    var volumeElement = document.getElementById('volume');
    var tahunElement = document.getElementById('tahun');
    var bab1Element = document.getElementById('bab1');
    var bab2Element = document.getElementById('bab2');
    var bab3Element = document.getElementById('bab3');
    var fulltextElement = document.getElementById('fulltext');
    var sampulElement = document.getElementById('sampul');
    var turnitinElement = document.getElementById('turnitin');
    var abstrakElement = document.getElementById('abstrak');
    var bab1parent = document.getElementById('bab1parent');
    var bab2parent = document.getElementById('bab2parent');
    var bab3parent = document.getElementById('bab3parent');
    function toggleSwitch() {
      // Mendapatkan status terkini dari checkbox
      var isChecked = document.getElementById('flexSwitchCheckChecked').checked;
      if (isChecked) {
        type = "Skripsi";
        console.log(type);
        bab1parent.classList.remove('hidden');
        bab2parent.classList.remove('hidden');
        bab3parent.classList.remove('hidden');
      } else {
        type = "Jurnal";
        console.log(type);
        bab1parent.classList.add('hidden');
        bab2parent.classList.add('hidden');
        bab3parent.classList.add('hidden');
      }
    }

    function validateAndSubmit() {
      // Validasi ukuran file dan tipe file
      var fileInputs;
      if(type === "Skripsi"){
        fileInputs = ['bab1', 'bab2', 'bab3', 'fulltext', 'sampul', 'turnitin'];
      }else{
        fileInputs = ['fulltext', 'sampul', 'turnitin'];
      }

      for (var i = 0; i < fileInputs.length; i++) {
        var inputId = fileInputs[i];
        var inputFile = document.getElementById(inputId);
        var fileSize = inputFile.files[0] ? inputFile.files[0].size : 0;

        // Cek ukuran file
        if (fileSize > 5 * 1024 * 1024) {
          toastr.error('File ' + inputId + ' terlalu besar. Maksimum 5 MB diizinkan.');
          throw new Error('File ' + inputId + ' terlalu besar. Maksimum 5 MB diizinkan. UkURAN FILE: ' + fileSize);
        }

        // Cek tipe file
        var allowedFileTypes = ['.pdf', '.doc', '.docx'];
        var fileType = inputFile.value.slice((inputFile.value.lastIndexOf(".") - 1 >>> 0) + 2);

        if (!allowedFileTypes.includes('.' + fileType)) {
          toastr.error('File ' + inputId + ' tidak valid. Hanya file dengan ekstensi .pdf, .doc, atau .docx diizinkan.');
          throw new Error('File ' + inputId + ' tidak valid. Hanya file dengan ekstensi .pdf, .doc, atau .docx diizinkan.');
        }
      }
    }

    function submitForm() {
      validateAndSubmit();
      const form = new FormData();
      form.append("id_user", "{{ Auth::user()->id }}");
      form.append("nama", namaElement.value);
      form.append("stambuk", stambukElement.value);
      form.append("fakultas", fakultasElement.value);
      form.append("jurusan", programStudiElement.value);
      form.append("judul", judulElement.value);
      form.append("bab1", bab1Element.files[0]);
      form.append("bab2", bab2Element.files[0]);
      form.append("bab3", bab3Element.files[0]);
      form.append("turnitin", turnitinElement.files[0]);
      form.append("fulltext", fulltextElement.files[0]);
      form.append("sampul", sampulElement.files[0]);
      form.append("alamat", alamatElement.value);
      form.append("type", type);
      form.append("abstrak", abstrakElement.value);
      form.append("volume", volumeElement.value);
      form.append("tahun", tahunElement.value);
      console.log("{{ Auth::user()->id }}")
      
      const url = '/api/skbp1/store'
      const options = {
      method: 'POST',
      body: form
    };

    fetch('/api/skbp1/store', options)
        .then(response => response.json())
        .then(data => {
            // Handle response jika diperlukan
            toastr.success('Berhasil')
            console.log('Success:', data);
           
        })
        .catch(error => {
            // Handle error jika diperlukan
            console.error('Error:', error);
            toastr.error('Gagal dimasukkan')
        });
  }
    
</script>
@endpush
@endsection
