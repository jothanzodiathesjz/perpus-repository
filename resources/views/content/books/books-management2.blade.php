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
@endsection

@section('page-script')
{{-- <script src="{{asset('assets/js/tables-datatables-basic.js')}}"></script> --}}
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">DataTables /</span> Basic
</h4>
<button class="create-new btn btn-primary"><i class="ti ti-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">Add New Record</span></button>

<!-- DataTable with Buttons -->
<div class="card">
  <div class="card-datatable table-responsive pt-0">
    <div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="DataTables_Table_0_length"><label>Show <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-select"><option value="7">7</option><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="75">75</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"><div id="DataTables_Table_0_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control" placeholder="" aria-controls="DataTables_Table_0"></label></div></div></div>
    <table class="datatables-basic table">
      <thead>
        <tr>
          <th></th>
          <th></th>
          <th>id</th>
          <th>Name</th>
          <th>Email</th>
          <th>Date</th>
          <th>Salary</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
    </table>
  </div>
</div>
<!-- Modal to add new record -->
<div class="offcanvas offcanvas-end" id="add-new-record">
  <div class="offcanvas-header border-bottom">
    <h5 class="offcanvas-title" id="exampleModalLabel">New Record</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body flex-grow-1">
    <form class="add-new-record pt-0 row g-2" id="form-add-new-record" onsubmit="return false">
      <div class="col-sm-12">
        <label class="form-label" for="basicFullname">Full Name</label>
        <div class="input-group input-group-merge">
          <span id="basicFullname2" class="input-group-text"><i class="ti ti-user"></i></span>
          <input type="text" id="basicFullname" class="form-control dt-full-name" name="basicFullname" placeholder="John Doe" aria-label="John Doe" aria-describedby="basicFullname2" />
        </div>
      </div>
      <div class="col-sm-12">
        <label class="form-label" for="basicPost">Post</label>
        <div class="input-group input-group-merge">
          <span id="basicPost2" class="input-group-text"><i class='ti ti-briefcase'></i></span>
          <input type="text" id="basicPost" name="basicPost" class="form-control dt-post" placeholder="Web Developer" aria-label="Web Developer" aria-describedby="basicPost2" />
        </div>
      </div>
      <div class="col-sm-12">
        <label class="form-label" for="basicEmail">Email</label>
        <div class="input-group input-group-merge">
          <span class="input-group-text"><i class="ti ti-mail"></i></span>
          <input type="text" id="basicEmail" name="basicEmail" class="form-control dt-email" placeholder="john.doe@example.com" aria-label="john.doe@example.com" />
        </div>
        <div class="form-text">
          You can use letters, numbers & periods
        </div>
      </div>
      <div class="col-sm-12">
        <label class="form-label" for="basicDate">Joining Date</label>
        <div class="input-group input-group-merge">
          <span id="basicDate2" class="input-group-text"><i class='ti ti-calendar'></i></span>
          <input type="text" class="form-control dt-date" id="basicDate" name="basicDate" aria-describedby="basicDate2" placeholder="MM/DD/YYYY" aria-label="MM/DD/YYYY" />
        </div>
      </div>
      <div class="col-sm-12">
        <label class="form-label" for="basicSalary">Salary</label>
        <div class="input-group input-group-merge">
          <span id="basicSalary2" class="input-group-text"><i class='ti ti-currency-dollar'></i></span>
          <input type="number" id="basicSalary" name="basicSalary" class="form-control dt-salary" placeholder="12000" aria-label="12000" aria-describedby="basicSalary2" />
        </div>
      </div>
      <div class="col-sm-12">
        <button type="submit" class="btn btn-primary data-submit me-sm-3 me-1">Submit</button>
        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancel</button>
      </div>
    </form>

  </div>
</div>
<script>
  function getBooks(page){
  let paginate = '/api/book/get'
  fetch(paginate,{
    method: 'GET',
    headers: {
      'Content-Type': 'application/json',
    }
  })
  .then(res => res.json())
  .then(data => {
    console.log(data)
    
  })
  }

  getBooks()
  // let fv, offCanvasEl;
  // const formAddNewRecord = document.getElementById('form-add-new-record');

  //   setTimeout(() => {
  //     const newRecord = document.querySelector('.create-new'),
  //       offCanvasElement = document.querySelector('#add-new-record');

  //     // To open offCanvas, to add new record
  //     if (newRecord) {
  //       newRecord.addEventListener('click', function () {
  //         offCanvasEl = new bootstrap.Offcanvas(offCanvasElement);
  //         // Empty fields on offCanvas open
  //         (offCanvasElement.querySelector('.dt-full-name').value = ''),
  //           (offCanvasElement.querySelector('.dt-post').value = ''),
  //           (offCanvasElement.querySelector('.dt-email').value = ''),
  //           (offCanvasElement.querySelector('.dt-date').value = ''),
  //           (offCanvasElement.querySelector('.dt-salary').value = '');
  //         // Open offCanvas with form
  //         offCanvasEl.show();
  //       });
  //     }
  //   }, 200);
  //    // Form validation for Add new record
  //    fv = FormValidation.formValidation(formAddNewRecord, {
  //     fields: {
  //       basicFullname: {
  //         validators: {
  //           notEmpty: {
  //             message: 'The name is required'
  //           }
  //         }
  //       },
  //       basicPost: {
  //         validators: {
  //           notEmpty: {
  //             message: 'Post field is required'
  //           }
  //         }
  //       },
  //       basicEmail: {
  //         validators: {
  //           notEmpty: {
  //             message: 'The Email is required'
  //           },
  //           emailAddress: {
  //             message: 'The value is not a valid email address'
  //           }
  //         }
  //       },
  //       basicDate: {
  //         validators: {
  //           notEmpty: {
  //             message: 'Joining Date is required'
  //           },
  //           date: {
  //             format: 'MM/DD/YYYY',
  //             message: 'The value is not a valid date'
  //           }
  //         }
  //       },
  //       basicSalary: {
  //         validators: {
  //           notEmpty: {
  //             message: 'Basic Salary is required'
  //           }
  //         }
  //       }
  //     },
  //     plugins: {
  //       trigger: new FormValidation.plugins.Trigger(),
  //       bootstrap5: new FormValidation.plugins.Bootstrap5({
  //         // Use this for enabling/changing valid/invalid class
  //         // eleInvalidClass: '',
  //         eleValidClass: '',
  //         rowSelector: '.col-sm-12'
  //       }),
  //       submitButton: new FormValidation.plugins.SubmitButton(),
  //       // defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
  //       autoFocus: new FormValidation.plugins.AutoFocus()
  //     },
  //     init: instance => {
  //       instance.on('plugins.message.placed', function (e) {
  //         if (e.element.parentElement.classList.contains('input-group')) {
  //           e.element.parentElement.insertAdjacentElement('afterend', e.messageElement);
  //         }
  //       });
  //     }
  //   });

  //   // FlatPickr Initialization & Validation
  //   flatpickr(formAddNewRecord.querySelector('[name="basicDate"]'), {
  //     enableTime: false,
  //     // See https://flatpickr.js.org/formatting/
  //     dateFormat: 'm/d/Y',
  //     // After selecting a date, we need to revalidate the field
  //     onChange: function () {
  //       fv.revalidateField('basicDate');
  //     }
  //   });
  // fv.on('core.form.valid', function () {
  //   var $new_name = $('.add-new-record .dt-full-name').val(),
  //     $new_post = $('.add-new-record .dt-post').val(),
  //     $new_email = $('.add-new-record .dt-email').val(),
  //     $new_date = $('.add-new-record .dt-date').val(),
  //     $new_salary = $('.add-new-record .dt-salary').val();

  //   if ($new_name != '') {
  //     dt_basic.row
  //       .add({
  //         id: count,
  //         full_name: $new_name,
  //         post: $new_post,
  //         email: $new_email,
  //         start_date: $new_date,
  //         salary: '$' + $new_salary,
  //         status: 5
  //       })
  //       .draw();
  //     count++;

  //     // Hide offcanvas using javascript method
  //     offCanvasEl.hide();
  //   }
  // });
</script>
@endsection
