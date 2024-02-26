@extends('layouts/layoutMaster')

@section('title', 'DataTables - Tables')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
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
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
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
  <span class="text-muted fw-light">Dashboard /</span> Data Buku
</h4>
<div class="row">
  @if (Auth::user()->role == 'admin')
      
  <div class="col-lg-4 col-md-12">
  <div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0">Tambah Sumangan</h5>
    </div>
    <div class="card-body">
      <div>
        <div class="mb-3">
          <label class="form-label" for="basic-icon-default-fullname">Kategori</label>
          <div class="d-flex flex-row border rounded-3">
            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-access-point"></i></span>
            <select id="kategori" class="form-select" aria-label="Default select example">
              <option selected>Open this select menu</option>
              <option value="mahasiswa">Mahasiswa</option>
              <option value="dosen">Dosen</option>
              <option value="alumni">Alumni</option>
              <option value="umum">Umum</option>
          </select>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label" for="basic-icon-default-company">NIDN/STAMBUK</label>
          <div class="d-flex flex-row border rounded-3">
            <span id="basic-icon-default-company2" class="input-group-text border-0"><i class="ti ti-user"></i></span>
            <input type="hidden" id="id_profile"  />
            <select id="stambuk" class="form-select select-2" >
              <option selected>Masukkan Stambuk</option>
          </select>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label" for="basic-icon-default-email">Nama</label>
          <div class="input-group input-group-merge">
            <span class="input-group-text"><i class="ti ti-user-exclamation"></i></span>
            <input type="text" id="nama" class="form-control" placeholder="Masukkan Nama" />
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label" for="basic-icon-default-phone">Judul Buku</label>
         <div class="d-flex flex-row border rounded-3">
            <span id="basic-icon-default-company2" class="input-group-text border-0"><i class="ti ti-book-2"></i></span>
            <select id="judul_buku" class="form-select select-2"placeholder="Masukkan Judul Buku" >
          </select>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label" for="basic-icon-default-message">Jumlah</label>
          <div class="input-group input-group-merge">
            <span id="basic-icon-default-message2" class="input-group-text"><i class="ti ti-number"></i></span>
            <input type="number" id="jumlah" class="form-control" placeholder="Masukkan Jumlah Sumbangan" />
          </div>
        </div>
        <button id="submitSumbangan" onclick="upsert()" type="submit" class="btn btn-primary">Send</button>
        <button id="submitSumbangan"  type="submit" class="btn btn-secondary">Reset</button>
      </div>
    </div>
  </div>
  @endif
  
  </div>
    <div class="card col-lg-8 col-md-12">
        <div class="card-datatable table-responsive pt-0">
          <table class="datatables-basic table">
            <thead>
              <tr>
                <th></th>
                <th>Nama</th>
                <th>Jumlah</th>
                <th>Kategori</th>
                <th>Action</th>
              </tr>
            </thead>
          </table>
        </div>
    </div>
</div>

{{-- modal --}}
<div class="modal fade" id="editUser" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-simple modal-edit-user">
    <div class="modal-content p-3 p-md-5">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="text-center mb-4">
          <h3 class="mb-2">Edit Data Sumbangan</h3>
        </div>
          <div>
          <div class="mb-3">
            <label class="form-label" for="basic-icon-default-fullname">Kategori</label>
            <div class="d-flex flex-row border rounded-3">
              <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-access-point"></i></span>
              <select id="updateKategori" class="form-select" aria-label="Default select example">
                <option selected>Open this select menu</option>
                <option value="mahasiswa">Mahasiswa</option>
                <option value="dosen">Dosen</option>
                <option value="alumni">Alumni</option>
                <option value="umum">Umum</option>
            </select>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-icon-default-company">NIDN/STAMBUK</label>
            <div class="d-flex flex-row border rounded-3">
              <span id="" class="input-group-text border-0"><i class="ti ti-user"></i></span>
              <input type="hidden" id="update_id_profile"  />
              <select id="updateStambuk" class="" >
                <option>Masukkan Stambuk Jika Ingin Mengubah Data</option>
            </select>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-icon-default-email">Nama</label>
            <div class="input-group input-group-merge">
              <span class="input-group-text"><i class="ti ti-user-exclamation"></i></span>
              <input type="text" id="updateNama" class="form-control" placeholder="Masukkan Nama" />
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-icon-default-phone">Judul Buku</label>
           <div class="d-flex flex-row border rounded-3">
              <span id="" class="input-group-text border-0"><i class="ti ti-book-2"></i></span>
              <select id="updateJudul_buku" class="form-select select-2" placeholder="Masukkan Judul Buku" >
            </select>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-icon-default-message">Jumlah</label>
            <div class="input-group input-group-merge">
              <span id="basic-icon-default-message2" class="input-group-text"><i class="ti ti-number"></i></span>
              <input type="number" id="updateJumlah" class="form-control" placeholder="Masukkan Jumlah Sumbangan" />
            </div>
          </div>
        </div>
          <div class="col-12 text-center">
             <input type="hidden" id="idsumbangan" />
             @if (auth()->user()->role == 'admin')
                 
             <button type="submit" onclick="updateSubmit()" class="btn btn-primary me-sm-3 me-1">Submit</button>
             @endif
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
          </div>
      </div>
    </div>
  </div>
</div>
{{-- <script src="{{ asset(mix('assets/vendor/libs/jquery/jquery.js')) }}"></script> --}}
@push('body-scripts')
<script> 
var role = '{{ auth()->user()->role }}';
// datatables
$(document).ready(function() {
    var table = $('.datatables-basic').DataTable({
        processing: true,
        ajax: {
            url: '/api/users/sumbangan/get',
            type: 'GET',
            dataSrc: 'data',
        },
        columns: [
            {
                data: null,
            },
            {
                data: 'fullname',
            },
            {
                data: 'jumlah',
            },
            {
                data: 'kategori',
            },
            {
                data: null,
            }
        ],
        columnDefs: [
            {
                targets: 0,
                render: function(data, type, row, meta) {
                    return meta.row + 1;
                }
            },
            {
                targets: 1,
            },
            {
                targets: 2,
            },
            {
                targets: 3,
            },
            {
                targets: 4,
                
                render: function(data, type, row) {
                    return `
                    ${role == 'admin' ? `<a href="javascript:void(0);" onclick="deleteItem('${data.id}')" class="item-delete" title="Delete"><i class="ti ti-trash"></i></a>` : ''}
                    
                    <a href="javascript:void(0);" onclick="changeUpdate(${JSON.stringify(data).replace(/"/g, '&quot;')})" class="btn btn-sm btn-icon item-edit" data-bs-toggle="modal" data-bs-target="#editUser"><i class="text-primary ti ti-eye"></i></a>
                    `
                }
            }
        ]
    })
})
var isUpdate = false;
    $('#stambuk').select2({
    ajax: {
        url: '/api/users/profile',
        dataType: 'json',
        delay: 250,
        data: function(params) {
            return {
                search: params.term, // Parameter pencarian dari input Select2
                page: params.page
            };
        },
        processResults: function(data) {
            return {
                results: data.data.map(function(option) {
                    return {
                        id: option.id,
                        text: `${option.stambuk} - ${option.fullname}`,
                        additionalData: option.fullname
                    };
                })
            };
        }
    }
    
});
$(document).ready(function() {
$('#updateStambuk').select2({
  dropdownParent: $("#editUser"),
    ajax: {
        url: '/api/users/profile',
        dataType: 'json',
        delay: 250,
        data: function(params) {
            return {
                search: params.term, // Parameter pencarian dari input Select2
                page: params.page
            };
        },
        processResults: function(data) {
            return {
                results: data.data.map(function(option) {
                    return {
                        id: option.id,
                        text: `${option.stambuk} - ${option.fullname}`,
                        additionalData: option.fullname
                    };
                })
            };
        }
    }
    
});

})
    

$('#judul_buku').select2({
    ajax: {
        url: '/api/book/get',
        dataType: 'json',
        delay: 250,
        data: function(params) {
            return {
                search: params.term,
                page: params.page
            };
        },
        processResults: function(data) {
            return {
                results: data.data.data.map(function(option) {
                    return {
                        id: option.id,
                        text: option.judul
                    };
                })
            };
        },
        cache: true
    },
    placeholder: 'Pilih judul buku', // Placeholder untuk input select
    allowClear: true, // Memberikan opsi untuk menghapus seleksi
    multiple: true // Memungkinkan multiple select
});
 $('#updateJudul_buku').select2({
    dropdownParent: $("#editUser"),
      ajax: {
        url: '/api/book/get',
        dataType: 'json',
        delay: 250,
        data: function(params) {
            return {
                search: params.term,
                page: params.page
            };
        },
        processResults: function(data) {
            return {
                results: data.data.data.map(function(option) {
                    return {
                        id: option.id,
                        text: option.judul
                    };
                })
            };
        },
        cache: true
    },
    placeholder: 'Pilih judul buku', // Placeholder untuk input select
    allowClear: true, // Memberikan opsi untuk menghapus seleksi
    multiple: true // Memungkinkan multiple select
     })

$('#stambuk').on('select2:select', function(event) {
        var selectedValue = event.params.data.id;
        var selectedText = event.params.data.text;
        var additionalData = event.params.data.additionalData;
        // Update nilai pada input nama
        $('#nama').val(additionalData);
        $('#id_profile').val(selectedValue);

        // Atau jika Anda ingin menampilkan teks yang diambil dari input stambuk
        // $('#nama').val(selectedText);
    });

$('#updateStambuk').on('select2:select', function(event) {
        var selectedValue = event.params.data.id;
        var selectedText = event.params.data.text;
        var additionalData = event.params.data.additionalData;
        // Update nilai pada input nama
        $('#updateNama').val(additionalData);
        $('#update_id_profile').val(selectedValue);

        // Atau jika Anda ingin menampilkan teks yang diambil dari input stambuk
        // $('#nama').val(selectedText);
    });

    var nama = $('#nama');
    $('#kategori').select2();
    var kategori = $('#kategori');

    $('#kategori').change(function(){
      if($(this).val() == 'umum'){
        $('#stambuk').prop('disabled', true);
        $('#id_profile').val('');
      }else{
        $('#stambuk').prop('disabled', false);
      }
    })

    $('#updateKategori').change(function(){
      if($(this).val() == 'umum'){
        $('#updateStambuk').prop('disabled', true);
        $('#update_id_profile').val('');
      }else{
        $('#updateStambuk').prop('disabled', false);
      }
    })

const loader = document.getElementById('loader')
 function upsert(){
   var data = {
     id_buku: $('#judul_buku').val(),
     stambuk: $('#stambuk').val(),
     kategori: $('#kategori').val(),
     id_profile: $('#id_profile').val(),
     jumlah: $('#jumlah').val(),
     fullname: $('#nama').val(),
   }

     loader.style.display = 'flex';
        fetch('/api/users/sumbangan', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify(data),
        })
        .then(res => res.json())
        .then(data => {
          console.log(data)
          toastr.success('Berhasil')
        })
        .catch(error => {
                 console.error('Error:', error);
                 toastr.error('Gagal dimasukkan')
                 loader.style.display = 'none'
             })
             
             .finally(() => {
                 loader.style.display = 'none'
                 $('.datatables-basic').DataTable().ajax.reload();
             })
      
   }

 
   function resetform(){
     isUpdate = false;
     $('#stambuk').val('')
     $('#id_profile').val('')
     $('#kategori').val('')
     $('#jumlah').val('')
     $('#nama').val('')
     $('#judul_buku').val('')

     $('#stambuk').prop('disabled', false);

   }


   function changeUpdate(data){
     isUpdate = true;
     $('#updateKategori').val(data.kategori)
     $('#update_id_profile').val(data.id_profile)
     $('#updateJumlah').val(data.jumlah)
     $('#updateNama').val(data.fullname)
     $('#idsumbangan').val(data.id)
     $('#updateJudul_buku').text('')
      data.buku.forEach(element => {
      $('#updateJudul_buku').append(`<option value="${element.id}" selected>${element.judul}</option>`)
    });
   }

   function updateSubmit(){
     var data = {
     id_buku: $('#updateJudul_buku').val(),
     stambuk: $('#updateStambuk').val(),
     kategori: $('#updateKategori').val(),
     id_profile: $('#update_id_profile').val(),
     jumlah: $('#updateJumlah').val(),
     fullname: $('#updateNama').val(),
     }
     console.log(data)
     loader.style.display = 'flex';
        fetch(`/api/users/sumbangan?update=true&id=${$('#idsumbangan').val()}`, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify(data),
        })
        .then(res => res.json())
        .then(data => {
          console.log(data)
          toastr.success('Berhasil')
        })
        .catch(error => {
                 console.error('Error:', error);
                 toastr.error('Gagal dimasukkan')
                 loader.style.display = 'none'
             })
             
             .finally(() => {
                 loader.style.display = 'none'
                 $('.datatables-basic').DataTable().ajax.reload();
             })
      
     
   }

   function deleteItem(id){
     loader.style.display = 'flex';
     fetch(`/api/users/sumbangan?id=${id}`, {
       method: 'DELETE',
     })
     .then(res => res.json())
        .then(data => {
          console.log(data)
          toastr.success('Berhasil')
        })
        .catch(error => {
                 console.error('Error:', error);
                 toastr.error('failed')
                 loader.style.display = 'none'
             })
             
             .finally(() => {
                 loader.style.display = 'none'
                 $('.datatables-basic').DataTable().ajax.reload();
             })
   }

</script>
@endpush
@endsection
