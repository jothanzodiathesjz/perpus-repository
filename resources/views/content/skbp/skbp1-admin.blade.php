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
  <span class="text-muted fw-light">Dashboard/</span> Data Bebas Pustaka
</h4>
<section id="ecommerce-header">
    <div class="row">
      <div class="col-sm-12">
        <div class="ecommerce-header-items">
          <div class="view-options d-flex">
            <div class="btn-group dropdown-sort">
              <button
                type="button"
                class="btn btn-outline-primary dropdown-toggle me-1"
                data-bs-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="true"
              >
                <span class="active-sorting">Volume</span>
              </button>
              <div class="dropdown-menu" id="book-category">
                <!-- <a class="dropdown-item" href="#">Featured</a>
                <a class="dropdown-item" href="#">Lowest</a>
                <a class="dropdown-item" href="#">Highest</a> -->
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </section>
<div class="card-datatable table-responsive pt-0">
  {{-- <button class="create-new btn btn-primary"><i class="ti ti-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">Add New Book</span></button> --}}
  <table class="datatables-basic table">
    <thead>
      <tr>
        <th></th>
        <th>No</th>
        <th>Nama</th>
        <th>Judul</th>
        <th>Jurusan</th>
        <th>Stambuk</th>
        <th>Type</th>
        <th>Action</th>
      </tr>
    </thead>
  </table>
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
      <div class="col-sm-12">
        <button type="submit" onclick="addNewRecord()" class="btn btn-primary data-submit me-sm-3 me-1">Submit</button>
        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancel</button>
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
          
          // Open offCanvas with form
          offCanvasEl.show();
        });
      }
    }, 200);
    

  })();
});

function editItem(id){
  const formAddNewRecord = document.getElementById('form-add-new-record');
    setTimeout(() => {
        offCanvasElement = document.querySelector('#add-new-record');
        offCanvasEl = new bootstrap.Offcanvas(offCanvasElement);
        offCanvasEl.show();
       
    }, 200);
    console.log(id)
  }

  function deleteItem(id){
    console.log(id)
    const apiUrl = '/api/pustaka/delete/'+id;
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
        url:'/api/skbp1/get',
        dataSrc: 'data'
      },
      columns: [
        { data: '' },
        { data: '' },
        { data: 'nama' },
        { data: 'judul' },
        { data: 'jurusan' },
        { data: 'stambuk' },
        { data: 'type' },
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
          targets: 1,
          searchable: false, 
          render: function (data, type, row, meta) {
                  // Menambahkan nomor urut
                  return meta.row + 1;
            }
        },
        {
          targets: 2,
          searchable: true, 
        },
        {
          // Avatar image/badge, Name and post
          targets: 3,
          responsivePriority: 1,
          searchable: true,
          render: function (data, type, full, meta) {
              var $name = full['judul']
             
            // Creates full output for row
            var $row_output =
              '<span class="">' +
              $name +
              '</span>'
            return $row_output;
          }
        },
        {
          targets: 4
        },
        {
          targets: 5
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
            return (
              `<a href="javascript:;" onclick="deleteItem('${full.id}')" class="btn btn-sm btn-icon" ><i class="text-primary ti ti-trash"></i></a>` + 
              `<a href="/admin/skbp1/${full.id}?no=${meta.row + 1}" class="btn btn-sm btn-icon item-edit"><i class="text-primary ti ti-eye"></i></a>`
            );
          }
        }
      ],
      order: [[1, 'desc']],
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
});
</script>
@endpush
@endsection
