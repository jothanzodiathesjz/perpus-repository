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
  <span class="text-muted fw-light">Dashboard /</span> Data Anggota
</h4>
<div class="card table-responsive pt-0">
  <h4 class="ps-4 pt-4">Data Anggota</h4>
  <!-- <button class="create-new btn btn-primary"><i class="ti ti-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">Tambah Staff</span></button>  -->
  <table class="datatables-basic table">
    <thead>
      <tr>
        <th></th>
        <th></th>
        <th>id</th>
        <th>Nama</th>
        <th>Fakultas</th>
        <th>Prodi</th>
        <th>Role</th>
        <th>Telepon</th>
        <th>Status Pembayaran</th>
        <th>Action</th>
      </tr>
    </thead>
  </table>
</div>
<div class="card table-responsive mt-5">
  <h4 class="ps-4 pt-4">Data Staff</h4>
  <!-- <button class="create-new btn btn-primary"><i class="ti ti-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">Tambah Staff</span></button>  -->
  <table class="datatables-basic-2 table">
    <thead>
      <tr>
        <th></th>
        <th></th>
        <th>id</th>
        <th>Nama</th>
        <th>Fakultas</th>
        <th>Prodi</th>
        <th>Role</th>
        <th>Telepon</th>
        <th>Action</th>
      </tr>
    </thead>
  </table>
</div>
<div class="modal fade" id="editUser" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-simple modal-edit-user">
    <div class="modal-content p-3 p-md-5">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="text-center mb-4">
          <h3 class="mb-2">Tambah Staff dan Pimpinan</h3>
        </div>
          <div id="formAccountSettings" method="POST" onsubmit="return false">
            <div class="row">
              <div class="mb-3 col-md-6">
                <label for="username" class="form-label">Username</label>
                <input class="form-control" type="text" id="username" name="username"  placeholder="Masukkan Nama" />
              </div>
              <div class="mb-3 col-md-6">
                <label for="password" class="form-label">Password</label>
                <input class="form-control" type="password" id="password" name="password"  placeholder="Masukkan Nama" />
              </div>
              <div class="mb-3 col-md-6">
                <label for="email" class="form-label">Email</label>
                <input class="form-control" type="email" id="email" name="email"  placeholder="Masukkan Nama" />
              </div>
              <div class="mb-3 col-md-6">
                <label for="fullname" class="form-label">Nama Lengkap</label>
                <input class="form-control" type="text" id="fullname" name="fullname"  placeholder="Masukkan ALamat" />
              </div>
              <div class="mb-3 col-md-6">
                <label for="alamat" class="form-label">Alamat</label>
                <input class="form-control" type="text" id="alamat" name="alamat"  placeholder="Masukkan ALamat" />
              </div>
              <div class="mb-3 col-md-6">
                <label class="form-label" for="telepon">Telepone</label>
                <div class="input-group input-group-merge">
                  <span class="input-group-text">ID (+62)</span>
                  <input type="text" id="telepon" name="telepon" class="form-control"  />
                </div>
              </div>
              <div class="mb-3 col-md-6">
                <label class="form-label" for="role">Role</label>
                <select id="role" class="select2 form-select">
                  <option value="">Select</option>
                  <option value="admin">Admin</option>
                  <option value="staff">Staff</option>
                  <option value="pimpinan">Pimpinan</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-12 text-center">
             <input type="hidden" id="idsumbangan" />
            <button type="submit" onclick="createUser()" class="btn btn-primary me-sm-3 me-1">Submit</button>
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
          </div>
      </div>
    </div>
  </div>
</div>
{{-- <script src="{{ asset(mix('assets/vendor/libs/jquery/jquery.js')) }}"></script> --}}
@push('body-scripts')
<script> 

  var role = '{{auth()->user()->role}}'
  function addNewRecord() {
    const form = new FormData();
    form.append("imgfile", imgfileInput.files[0]);
    form.append("judul", judulInput.value);
    form.append("penulis", penulisInput.value);
    form.append("tahun_publikasi", tahunPublikasiInput.value);
    form.append("isbn", isbnInput.value);
    form.append("ketersediaan", stokInput.value);
    form.append("kategori_buku", kategoriBukuInput.value);
    form.append("deskripsi", deskripsiTextarea.value);
    const apiUrl = '/api/book/store';
// Mendefinisikan opsi untuk fetch
    const options = {
        method: 'POST',
        body: form,
    };

   
    fetch(apiUrl, options)
        .then(response => response.json())
        .then(data => {
            // Handle response jika diperlukan
            toastr.success('Berhasil')
            emptyForm()
            console.log('Success:', data);
           
        })
        .catch(error => {
            // Handle error jika diperlukan
            console.error('Error:', error);
            toastr.error('Gagal dimasukkan')
        });

    $('.datatables-basic').DataTable().ajax.reload();
  }


  
  let fv, offCanvasEl;
  document.addEventListener('DOMContentLoaded', function (e) {
    const formAddNewRecord = document.getElementById('form-add-new-record');
  (function () {
    
    setTimeout(() => {
      const newRecord = document.querySelector('.create-new'),
        offCanvasElement = document.querySelector('#add-new-record');

      // To open offCanvas, to add new record
      if (newRecord) {
        newRecord.addEventListener('click', function () {
          offCanvasEl = new bootstrap.Offcanvas(offCanvasElement);
          // Empty fields on offCanvas open
          emptyForm()
          const modalTitle = document.querySelector('.offcanvas-title');
          modalTitle.textContent = 'New Record';
          // Open offCanvas with form
          const btnadd = document.getElementById('btnadd');
          btnadd.classList.add('btn', 'btn-primary');
           const btnupdate = document.getElementById('btnupdate')
           btnupdate.classList.remove('btn', 'btn-primary');
           btnupdate.style.display = 'none';
          offCanvasEl.show();
        });
      }
    }, 200);
    

  })();
});

function editItem(id,data){
  const formAddNewRecord = document.getElementById('form-add-new-record');
    setTimeout(() => {
      emptyForm()
        offCanvasElement = document.querySelector('#add-new-record');
        offCanvasEl = new bootstrap.Offcanvas(offCanvasElement);
        offCanvasEl.show();
        const modalTitle = document.querySelector('.offcanvas-title');
        modalTitle.textContent = 'Edit Record';
         console.log(data)
            judulInput.value = data.judul
            penulisInput.value = data.penulis
            kategoriBukuInput.value = data.kategori_buku
            isbnInput.value = data.isbn
            tahunPublikasiInput.value = data.tahun_publikasi
            stokInput.value = data.ketersediaan
            deskripsiTextarea.value = data.deskripsi
            document.getElementById('id_book').value = data.id
             const btnadd = document.getElementById('btnadd');
             btnadd.classList.remove('btn', 'btn-primary');
             btnadd.style.display = 'none';
             const btnupdate = document.getElementById('btnupdate')
             btnupdate.classList.add('btn', 'btn-primary');
             btnupdate.style.display = 'block';
      }, 200);
     
  }

  function deleteItem(id,data){
    console.log(data)
    const apiUrl = '/api/users/delete/'+id;
    const options = {
        method: 'DELETE',
    };
    fetch(apiUrl, options)
        .then(response => response.json())
        .then(data => {
            // Handle response jika diperlukan
            toastr.success('Berhasil')
            console.log('Success:', data);
           
        })
        .catch(error => {
            // Handle error jika diperlukan
            console.error('Error:', error);
            toastr.error('Gagal Delete')
        });

    $('.datatables-basic').DataTable().ajax.reload();
  }

  $(function() {

  var dt_basic_table = $('.datatables-basic');

  // DataTable with buttons
  // --------------------------------------------------------------------

  if (dt_basic_table.length) {
    dt_basic = dt_basic_table.DataTable({
      ajax: {
        url:'/api/users/all',
        dataSrc: 'data'
      },
      columns: [
        { data: '' },
        { data: 'id' },
        { data: 'id' },
        { data: 'fullname' },
        { data: 'fakultas' },
        { data: 'prodi' },
        { data: 'role' },
        { data: 'telepon' },
        { data: 'status' },
        { data: '' }
      ],
     
      columnDefs: [
        {
          // For Responsive
          className: 'control',
          orderable: false,
          searchable: false,
          responsivePriority: 2,
          targets: 0,
          render: function (data, type, full, meta) {
            return '';
          }
        },
        {
          // For Checkboxes
          targets: 1,
          orderable: false,
          searchable: false,
          responsivePriority: 3,
          checkboxes: true,
          render: function () {
            return '<input type="checkbox" class="dt-checkboxes form-check-input">';
          },
          checkboxes: {
            selectAllRender: '<input type="checkbox" class="form-check-input">'
          }
        },
        {
          targets: 2,
          searchable: false,
          visible: false
        },
        {
          // Avatar image/badge, Name and post
          targets: 3,
          responsivePriority: 1,
          render: function (data, type, full, meta) {
            var $user_img = full['img'],
              $name = full['fullname'],
              $post = full['stambuk'];
              if ($user_img) {
              // For Avatar image
              var $output =
                 '<img src="' + $user_img + '" alt="Avatar" class="rounded-circle">';
            } else {
              // For Avatar badge
              var stateNum = Math.floor(Math.random() * 6);
              var states = ['success', 'danger', 'warning', 'info', 'primary', 'secondary'];
              var $state = states[stateNum],
                $name = full['fullname'],
                $initials = $name.match(/\b\w/g) || [];
              $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
              $output = '<span class="avatar-initial rounded-circle bg-label-' + $state + '">' + $initials + '</span>';
            }
            var $row_output =
              '<div class="d-flex justify-content-start align-items-center user-name">' +
              '<div class="avatar-wrapper">' +
              '<div class="avatar me-2">' +
              $output +
              '</div>' +
              '</div>' +
              '<div class="d-flex flex-column">' +
              '<span class="emp_name text-truncate">' +
              $name +
              '</span>' +
              '<small class="emp_post text-truncate text-muted">' +
              $post +
              '</small>' +
              '</div>' +
              '</div>';
            return $row_output;
          }
        },
        {
          targets: 4
        },
        {
          responsivePriority: 4,
          targets: 5
        },
        {
          responsivePriority: 4,
          targets: 6,
          render: function (data, type, full, meta) {
            var $status_number = full['role'].toUpperCase();
              $badge = `<span>${$status_number}</span>`;
            return $badge;
          }
        },
        {
          responsivePriority: 4,
          targets: 7
        },
        
        {
          // Actions
          targets: -1,
          title: 'Actions',
          orderable: false,
          visible: role == 'admin' ? true : false,
          searchable: false,
          render: function (data, type, full, meta) {
            return (
              `<a href="javascript:;" onclick="deleteItem('${full.user_id}')" class="btn btn-sm btn-icon" ><i class="text-primary ti ti-trash"></i></a>` + 
              `<a href="/admin/data-users/${full.user_id}"  class="btn btn-sm btn-icon item-edit"><i class="text-primary ti ti-pencil"></i></a>`
            );
          }
        }
      ],
      order: [[2, 'desc']],
      dom: '<"card-header flex-column flex-md-row"<"head-label text-center"><"dt-action-buttons text-end pt-3 pt-md-0"B>><"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
      displayLength: 7,
      lengthMenu: [7, 10, 25, 50, 75, 100],
      buttons: [
        {
          extend: 'collection',
          className: 'btn btn-label-primary dropdown-toggle me-2',
          text: '<i class="ti ti-file-export me-sm-1"></i> <span class="d-none d-sm-inline-block">Export</span>',
          buttons: [
            {
              extend: 'print',
              text: '<i class="ti ti-printer me-1" ></i>Print',
              className: 'dropdown-item',
              exportOptions: { columns: [3, 4, 5, 6, 7] }
            },
            {
              extend: 'csv',
              text: '<i class="ti ti-file-text me-1" ></i>Csv',
              className: 'dropdown-item',
              exportOptions: { columns: [3, 4, 5, 6, 7] }
            },
            {
              extend: 'pdf',
              text: '<i class="ti ti-file-description me-1"></i>Pdf',
              className: 'dropdown-item',
              exportOptions: { columns: [3, 4, 5, 6, 7] }
            },
            {
              extend: 'copy',
              text: '<i class="ti ti-copy me-1" ></i>Copy',
              className: 'dropdown-item',
              exportOptions: { columns: [3, 4, 5, 6, 7] }
            }
          ]
        },
      ],
      responsive: {
        details: {
          display: $.fn.dataTable.Responsive.display.modal({
            header: function (row) {
              var data = row.data();
              return 'Details of ' + data['full_name'];
            }
          }),
          type: 'column',
          renderer: function (api, rowIdx, columns) {
            var data = $.map(columns, function (col, i) {
              return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                ? '<tr data-dt-row="' +
                    col.rowIndex +
                    '" data-dt-column="' +
                    col.columnIndex +
                    '">' +
                    '<td>' +
                    col.title +
                    ':' +
                    '</td> ' +
                    '<td>' +
                    col.data +
                    '</td>' +
                    '</tr>'
                : '';
            }).join('');

            return data ? $('<table class="table"/><tbody />').append(data) : false;
          }
        }
      }
    });
  }

  var dt_basic_table2 = $('.datatables-basic-2');
  dt_basic_table2.DataTable({
      processing: true,
      ajax: {
        url:'/api/users/staff',
        dataSrc: 'data'
      },
      columns: [
        { data: '' },
        { data: 'id' },
        { data: 'id' },
        { data: 'fullname' },
        { data: 'fakultas' },
        { data: 'prodi' },
        { data: 'role' },
        { data: 'telepon' },
        { data: '' }
      ],
     
      columnDefs: [
        {
          // For Responsive
          className: 'control',
          orderable: false,
          searchable: false,
          responsivePriority: 2,
          targets: 0,
          render: function (data, type, full, meta) {
            return '';
          }
        },
        {
          // For Checkboxes
          targets: 1,
          orderable: false,
          searchable: false,
          responsivePriority: 3,
          checkboxes: true,
          render: function () {
            return '<input type="checkbox" class="dt-checkboxes form-check-input">';
          },
          checkboxes: {
            selectAllRender: '<input type="checkbox" class="form-check-input">'
          }
        },
        {
          targets: 2,
          searchable: false,
          visible: false
        },
        {
          // Avatar image/badge, Name and post
          targets: 3,
          responsivePriority: 1,
          render: function (data, type, full, meta) {
            var $user_img = full['img'],
              $name = full['fullname'],
              $post = full['stambuk'];
              if ($user_img) {
              // For Avatar image
              var $output =
                 '<img src="' + $user_img + '" alt="Avatar" class="rounded-circle">';
            } else {
              // For Avatar badge
              var stateNum = Math.floor(Math.random() * 6);
              var states = ['success', 'danger', 'warning', 'info', 'primary', 'secondary'];
              var $state = states[stateNum],
                $name = full['fullname'],
                $initials = $name.match(/\b\w/g) || [];
              $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
              $output = '<span class="avatar-initial rounded-circle bg-label-' + $state + '">' + $initials + '</span>';
            }
            var $row_output =
              '<div class="d-flex justify-content-start align-items-center user-name">' +
              '<div class="avatar-wrapper">' +
              '<div class="avatar me-2">' +
              $output +
              '</div>' +
              '</div>' +
              '<div class="d-flex flex-column">' +
              '<span class="emp_name text-truncate">' +
              $name +
              '</span>' +
              '<small class="emp_post text-truncate text-muted">' +
              $post +
              '</small>' +
              '</div>' +
              '</div>';
            return $row_output;
          }
        },
        {
          targets: 4
        },
        {
          responsivePriority: 4,
          targets: 5
        },
        {
          responsivePriority: 4,
          targets: 6,
          render: function (data, type, full, meta) {
            var $status_number = full['role'].toUpperCase();
              $badge = `<span>${$status_number}</span>`;
            return $badge;
          }
        },
        {
          responsivePriority: 4,
          targets: 7
        },
        
        {
          // Actions
          targets: 8,
          title: 'Actions',
          orderable: false,
          searchable: false,
          visible: role === 'admin' ? true : false, 
          render: function (data, type, full, meta) {
            return (
              `<a href="javascript:;" onclick="deleteItem('${full.user_id}')" class="btn btn-sm btn-icon" ><i class="text-primary ti ti-trash"></i></a>` + 
              `<a href="/admin/data-users/${full.user_id}"  class="btn btn-sm btn-icon item-edit"><i class="text-primary ti ti-pencil"></i></a>`
            );
          }
        }
      ],
      order: [[2, 'desc']],
      dom: '<"card-header flex-column flex-md-row"<"head-label text-center"><"dt-action-buttons text-end pt-3 pt-md-0"B>><"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
      displayLength: 7,
      lengthMenu: [7, 10, 25, 50, 75, 100],
      buttons: [
        {
          extend: 'collection',
          className: 'btn btn-label-primary dropdown-toggle me-2',
          text: '<i class="ti ti-file-export me-sm-1"></i> <span class="d-none d-sm-inline-block">Export</span>',
          buttons: [
            {
              extend: 'print',
              text: '<i class="ti ti-printer me-1" ></i>Print',
              className: 'dropdown-item',
              exportOptions: { columns: [3, 4, 5, 6, 7] }
            },
            {
              extend: 'csv',
              text: '<i class="ti ti-file-text me-1" ></i>Csv',
              className: 'dropdown-item',
              exportOptions: { columns: [3, 4, 5, 6, 7] }
            },
            {
              extend: 'pdf',
              text: '<i class="ti ti-file-description me-1"></i>Pdf',
              className: 'dropdown-item',
              exportOptions: { columns: [3, 4, 5, 6, 7] }
            },
            {
              extend: 'copy',
              text: '<i class="ti ti-copy me-1" ></i>Copy',
              className: 'dropdown-item',
              exportOptions: { columns: [3, 4, 5, 6, 7] }
            }
          ]
        },
        {
          text: '<i class="ti ti-plus me-1"></i> Add New User',
          className: role === 'admin' ? 'create-new btn btn-primary' : 'd-none',
          attr: {
            'data-bs-toggle': 'modal',
            'data-bs-target': '#editUser',
            href: 'javascript:;'
          }
        }
      ],
      responsive: {
        details: {
          display: $.fn.dataTable.Responsive.display.modal({
            header: function (row) {
              var data = row.data();
              return 'Details of ' + data['full_name'];
            }
          }),
          type: 'column',
          renderer: function (api, rowIdx, columns) {
            var data = $.map(columns, function (col, i) {
              return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                ? '<tr data-dt-row="' +
                    col.rowIndex +
                    '" data-dt-column="' +
                    col.columnIndex +
                    '">' +
                    '<td>' +
                    col.title +
                    ':' +
                    '</td> ' +
                    '<td>' +
                    col.data +
                    '</td>' +
                    '</tr>'
                : '';
            }).join('');

            return data ? $('<table class="table"/><tbody />').append(data) : false;
          }
        }
      }
    });
});

function createUser()
{
  var data = {
    username: $('#username').val(),
    password: $('#password').val(),
    email: $('#email').val(),
    alamat: $('#alamat').val(),
    fullname: $('#fullname').val(),
    telepon: $('#telepon').val(),
    role: $('#role').val(),
  }
  console.log(data);
   loader.style.display = 'flex';
        fetch('/api/users/staff', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify(data),
        })
        .then(res => res.json())
        .then(data => {
          console.log(data)
          toastr.success('Berhasil');
          $('#username').val('')
          $('#password').val('')
          $('#email').val('')
          $('#alamat').val('')
          $('#fullname').val('')
          $('#telepon').val('')
          $('#role').val('')

          // close modal
          $('#editUser').modal('hide')
        })
        .catch(error => {
                 console.error('Error:', error);
                 toastr.error('Gagal dimasukkan')
                 loader.style.display = 'none'
             })
             
             .finally(() => {
                 loader.style.display = 'none'
                 $('.datatables-basic-2').DataTable().ajax.reload();
             })
}

</script>
@endpush
@endsection
