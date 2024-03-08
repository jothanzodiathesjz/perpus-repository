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
  <span class="text-muted fw-light">Dashboard /</span> Data Buku
</h4>
<div class="card">
  <div class="card-datatable table-responsive pt-0">
    @if (auth()->user()->role == 'admin') 
    <button class="create-new btn btn-primary mt-4 ms-2"><i class="ti ti-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">Add New Book</span></button>
    @endif
    <table class="datatables-basic table">
      <thead>
        <tr>
          <th></th>
          <th></th>
          <th>id</th>
          <th>Book</th>
          <th>ISBN</th>
          <th>STOK</th>
          <th>Tahun</th>
          <th>Kategori</th>
          <th>Action</th>
        </tr>
      </thead>
    </table>
  </div>
</div>
<!-- DataTable with Buttons -->
<div class="offcanvas offcanvas-end" id="add-new-record">
  <div class="offcanvas-header border-bottom">
    <h5 class="offcanvas-title" id="exampleModalLabel">New Record</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body flex-grow-1">
    <div class="add-new-record pt-0 row g-2" id="form-add-new-record" onsubmit="return false">
      <div class="col-sm-12">
        <label class="form-label" for="basicFullname">Judul</label>
        <div class="input-group input-group-merge">
          <span id="basicFullname2" class="input-group-text"><i class="ti ti-book"></i></span>
          <input type="text" id="judul" class="form-control dt-full-name" name="basicFullname" placeholder="Masukkan Judul" aria-label="John Doe" aria-describedby="basicFullname2" />
        </div>
      </div>
      <div class="col-sm-12">
        <label class="form-label" for="basicPost">Penulis</label>
        <div class="input-group input-group-merge">
          <span id="basicPost2" class="input-group-text"><i class='ti ti-briefcase'></i></span>
          <input type="text" id="penulis" name="basicPost" class="form-control dt-post" placeholder="Masukkan Penulis" aria-label="Web Developer" aria-describedby="basicPost2" />
        </div>
      </div>
      <div class="col-sm-12">
        <label class="form-label" for="kategori_buku">Kategori</label>
        <div class="input-group input-group-merge">
          <span id="basicPost2" class="input-group-text"><i class='ti ti-briefcase'></i></span>
          <input type="text" id="kategori_buku" name="basicPost" class="form-control dt-post" placeholder="Masukkan Kategori" aria-label="Web Developer" aria-describedby="basicPost2" />
          <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Pilih Kategori
          </button>
          <ul id="book-category" class="dropdown-menu w-100" aria-labelledby="basicPost2">
            <li><a class="dropdown-item" href="#" onclick="changeInput('afasfasf')">afasfasf</a></li>
            <li><a class="dropdown-item" href="#" onclick="changeInput('Option 2')">Option 2</a></li>
            <li><a class="dropdown-item" href="#" onclick="changeInput('Option 3')">Option 3</a></li>
          </ul>
        </div>
      </div>
      <div class="col-sm-12">
        <label class="form-label" for="basicEmail">ISBN</label>
        <div class="input-group input-group-merge">
          <span class="input-group-text"><i class="ti ti-activity"></i></span>
          <input type="text" id="basicEmail" name="basicEmail" class="form-control dt-email" placeholder="masukkan isbn" aria-label="john.doe@example.com" />
        </div>
      </div>
      <div class="col-sm-12">
        <label class="form-label" for="basicDate">Tahun Publikasi</label>
        <div class="input-group input-group-merge">
          <span  class="input-group-text"><i class='ti ti-calendar'></i></span>
          <input id="tahun_publikasi" type="number" class="form-control dt-date"  name="basicDate" aria-describedby="basicDate2" placeholder="YYYY"  />
        </div>
      </div>
      <div class="col-sm-12">
        <label class="form-label" for="basicSalary">Stok</label>
        <div class="input-group input-group-merge">
          <span id="basicSalary2" class="input-group-text"><i class='ti ti-box'></i></span>
          <input type="number" id="basicSalary" name="basicSalary" class="form-control dt-salary" placeholder="masukkan stok" aria-label="12000" aria-describedby="basicSalary2" />
        </div>
      </div>
      <div class="col-sm-12">
        <label class="form-label" for="deskripsi">Deskripsi</label>
        <div class="input-group input-group-merge">
          <span id="basicPost2" class="input-group-text"><i class='ti ti-briefcase'></i></span>
         <textarea id="deskripsi" class="form-control"></textarea>
        </div>
      </div>
      <div class="col-sm-12">
        <label class="form-label" for="imgfile">Image</label>
        <div class="input-group input-group-merge">
          <span id="basicPost2" class="input-group-text"><i class='ti ti-briefcase'></i></span>
          <input type="file" id="imgfile" name="basicPost" class="form-control dt-post" placeholder="Web Developer" aria-label="masukkan gambar" aria-describedby="basicPost2" />
        </div>
      </div>
      <input type="text" id="id_book" name="basicSalary" value="0" style="display: none;" />
      <div class="col-sm-12" id="buttonshow">
        <button type="submit" id="btnadd" onclick="addNewRecord()" class=" data-submit me-sm-3 me-1" >Submit</button>
        <button type="submit" id="btnupdate" onclick="updateRecord()" class="data-submit me-sm-3 me-1">Update</button>
        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancel</button>
      </div>
    </div>

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
</div>

{{-- <script src="{{ asset(mix('assets/vendor/libs/jquery/jquery.js')) }}"></script> --}}
@push('body-scripts')
<script> 
  function getCategory() {
    fetch(`/api/book/category`, {
      method: 'GET',
      headers: {
        'Content-Type': 'application/json',
      }
    })
    .then(res => res.json())
    .then(data => {
      let dropdownMenu = document.getElementById('book-category');
      
      // Clear existing dropdown items
      dropdownMenu.innerHTML = '';

      // Add new dropdown items based on API response
      data.data.forEach(category => {
        let listItem = document.createElement('li');
        let link = document.createElement('a');
        link.classList.add('dropdown-item');
        link.href = '#';
        link.textContent = category.kategori_buku;
        link.onclick = function() {
          changeInput(category.kategori_buku);
        };
        listItem.appendChild(link);
        dropdownMenu.appendChild(listItem);
      });
    })
    .catch(error => console.error('Error fetching categories:', error));
  }

  function changeInput(value) {
    document.getElementById('kategori_buku').value = value;
  }

  getCategory();

  const judulInput = document.getElementById('judul');
  const penulisInput = document.getElementById('penulis');
  const kategoriBukuInput = document.getElementById('kategori_buku');
  const isbnInput = document.getElementById('basicEmail');
  const tahunPublikasiInput = document.getElementById('tahun_publikasi');
  const stokInput = document.getElementById('basicSalary');
  const deskripsiTextarea = document.getElementById('deskripsi');
  const imgfileInput = document.getElementById('imgfile');
  toastr.options.timeOut = 500;
  function emptyForm() {
            judulInput.value = ""
            penulisInput.value = ""
            kategoriBukuInput.value = ""
            isbnInput.value = ""
            tahunPublikasiInput.value = ""
            stokInput.value = ""
            deskripsiTextarea.value = ""
            imgfileInput.value = ""
  }

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
    const apiUrl = '/api/book/'+id;
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

  var role = '{{ auth()->user()->role }}';

  $(function() {

  var dt_basic_table = $('.datatables-basic');

  // DataTable with buttons
  // --------------------------------------------------------------------

  if (dt_basic_table.length) {
    dt_basic = dt_basic_table.DataTable({
      processing: true,
      ajax: {
        url:'/api/admin/book/get',
        dataSrc: 'data'
      },
      columns: [
        { data: '' },
        { data: 'id' },
        { data: 'id' },
        { data: 'kategori_buku' },
        { data: 'isbn' },
        { data: 'ketersediaan' },
        { data: 'tahun_publikasi' },
        { data: 'kategori_buku' },
        { data: '' }
      ],
     
      columnDefs: [
        {
          // For Responsive
          className: 'control',
          orderable: false,
          searchable: false,
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
          visible :false,
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
            var $user_img = full['imgfile'],
              $name = full['judul'],
              $post = full['penulis'];
              var $output =
                '<img src="' + $user_img + '" alt="Avatar" class="rounded-circle">';
            // Creates full output for row
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
          targets: -2
        },
        
        {
          // Actions
          targets: -1,
          title: 'Actions',
          orderable: false,
          searchable: false,
          render: function (data, type, full, meta) {
            var edit = role == 'admin' ? `<a href="javascript:;" onclick="editItem('${full.id}',{
                'id': '${full.id}',
                'judul': '${full.judul}',
                'penulis': '${full.penulis}',
                'imgfile': '${full.imgfile}',
                'isbn': '${full.isbn}',
                'ketersediaan': '${full.ketersediaan}',
                'tahun_publikasi': '${full.tahun_publikasi}',
                'deskripsi': '${full.deskripsi}',
                'kategori_buku': '${full.kategori_buku}',

              })" class="btn btn-sm btn-icon item-edit"><i class="text-primary ti ti-pencil"></i></a>` : ''

              var hapus = role == 'admin' ?
               `<a href="javascript:;" onclick="deleteItem('${full.id}')" class="btn btn-sm btn-icon" ><i class="text-primary ti ti-trash"></i></a>` : '<span>-</span>';
              var detail = `<a href="javascript:;" onclick="" class="btn btn-sm btn-icon item-edit" data-bs-toggle="modal" data-bs-target="#editUser"><i class="text-primary ti ti-eye"></i></a>`

            return ( edit + hapus + detail);
          }
        },
        // {
        //     orderable: false,
        //     searchable: false,
        //     targets: -1,
        //     visible: role == 'pimpinan' ? true : false,
            
        // }
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
              return 'Details of ' + data['judul'];
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
});

function updateRecord() {
  
    const form = new FormData();
    form.append("imgfile",imgfileInput.files[0]);
    form.append("judul", judulInput.value);
    form.append("penulis", penulisInput.value);
    form.append("tahun_publikasi", tahunPublikasiInput.value);
    form.append("isbn", isbnInput.value);
    form.append("ketersediaan", stokInput.value);
    form.append("kategori_buku", kategoriBukuInput.value);
    form.append("deskripsi", deskripsiTextarea.value);

    const apiUrl = `/api/book/update/${document.getElementById('id_book').value}`; // Sesuaikan dengan endpoint yang benar

    // Mendefinisikan opsi untuk fetch
    const options = {
        method: 'POST',
        body: form,
    };

    fetch(apiUrl, options)
        .then(response => response.json())
        .then(data => {
            // Handle response jika diperlukan

            toastr.success('Berhasil diupdate');
            emptyForm();
            console.log('Success:', data);
        })
        .catch(error => {
            // Handle error jika diperlukan
            console.error('Error:', error);
            toastr.error('Gagal diupdate');
        });

    $('.datatables-basic').DataTable().ajax.reload();
}

 function detailsWithModal(data){
    let modalCard = document.querySelector('modal');
    let modalImg = document.getElementById('modal-img');
    modalImg.src = data.imgfile
    modalCard.innerHTML = '';
    modalCard.innerHTML = `
    <h5 class="card-title">${data.judul}</h5>
                  <div style="
                  display: flex;
                  flex-direction: column;
                  ">
                    <span>Penulis : <b>${data.penulis}</b></span>
                    <span>Tahun : <b>${data.tahun_publikasi}</b></span>
                    <span>Halaman : <b>120halaman</b></span>
                    <span>ISBN : <b>${data.isbn}</b></span>
                  </div>
                  <p class="card-text">
                    ${data.deskripsi}
                  </p>
    `
  }
</script>
@endpush
@endsection
