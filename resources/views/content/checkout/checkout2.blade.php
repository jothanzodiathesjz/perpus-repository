@extends('layouts/layoutMaster')

@section('title', 'Validation - Forms')

@section('vendor-style')
<link rel="stylesheet" href="{{ asset('vendors/css/extensions/nouislider.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/css/extensions/toastr.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/css/extensions/nouislider.min.css') }}">
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/animate-css/animate.css')}}">
  <link rel="stylesheet" href="{{ asset('css/base/plugins/extensions/ext-component-sliders.css') }}">
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
  
@endsection
@section('page-style')
  <!-- Page css files -->
  <link rel="stylesheet" href="{{ asset('css/base/pages/app-ecommerce.css') }}">
  <link rel="stylesheet" href="{{ asset('css/base/plugins/extensions/ext-component-toastr.css') }}">
@endsection
@section('vendor-script')

  <script src="{{ asset('vendors/js/extensions/toastr.min.js') }}"></script>
  <script src="{{ asset('vendors/js/extensions/wNumb.min.js') }}"></script>
  <script src="{{ asset('vendors/js/extensions/nouislider.min.js') }}"></script>
  <script src="{{asset('assets/js/ui-modals.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/masonry/masonry.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>
<script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
@endsection



@section('page-script')
<script src="{{ asset('js/pages/app-ecommerce-checkout.js') }}"></script>
<script src="{{asset('assets/js/form-layouts.js')}}"></script>
@endsection

@section('content')
<div class="app-content content ecommerce-application">
<div class="content-body relative">
  
  <div class="bs-stepper-content">
     <!-- Modal -->
   <div class="modal fade animate__animated animate__bounceInLeft" id="animationModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel5">Form Pinjam Buku</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="card p-2">
          <div class="card-body">
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label" for="multicol-full-name">Full Name</label>
              <div class="col-sm-9">
                <input type="text" id="multicol-full-name" class="form-control" placeholder="John Doe" />
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label" for="multicol-birthdate">Tanggal Kembali</label>
              <div class="col-sm-9">
                <input type="text" id="multicol-birthdate" class="form-control dob-picker" placeholder="YYYY-MM-DD" />
              </div>
            </div>
            <div class="row">
              <label class="col-sm-3 col-form-label" for="verification-code">Code Verification</label>
              <div class="col-sm-9">
                <input type="text" id="verification-code" class="form-control " placeholder="Masukkan Code"  />
              </div>
            </div>
            <div class="pt-4">
              <div class="row justify-content-end">
                <div class="col-sm-9">
                  <button id="modalSubmit" type="submit" class="btn btn-primary me-sm-2 me-1" data-bs-dismiss="modal" >Submit</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
        
          <!-- Checkout Place order starts -->
          <div id="step-cart" class="content" role="tabpanel" aria-labelledby="step-cart-trigger">
            <div id="place-order" class="list-view product-checkout">
              <!-- Checkout Place Order Left starts -->
              <div class="checkout-items" id="items-checkout">
               
              </div>
              <!-- Checkout Place Order Left ends -->
      
              <!-- Checkout Place Order Right starts -->
              <div class="checkout-options">
                <div class="card">
                  <div class="card-body">
                    <label class="section-label form-label mb-1">Options</label>
                    <hr />
                    <div class="price-details">
                      <p>
                        jangan lupa untuk mengembalikan buku yang Anda pinjam sebelum batas waktu berakhir. Kepatuhan Anda sangat membantu kami menjaga koleksi perpustakaan.
                      </p>
                      <hr />
                      <ul class="list-unstyled">
                        <li class="price-detail">
                          <div class="detail-title detail-total">Total</div>
                          <div class="detail-amt fw-bolder" id="total-book">0</div>
                        </li>
                      </ul>
                      <button type="button" class="btn btn-primary w-100 btn-next place-order" id="btn-pinjam" data-bs-toggle="modal" data-bs-target="#animationModal">Pinjam Buku</button>
                    </div>
                  </div>
                </div>
                <!-- Checkout Place Order Right ends -->
              </div>
            </div>
            <!-- Checkout Place order Ends -->
          </div>
         
        </div>
</div>
</div>
<script>
  const totalBook = document.getElementById('total-book');
  const itemChekout = document.getElementById('items-checkout');
  function getCart(){
    fetch('/api/cart/{{ Auth::id() }}',{
      method: 'GET',
      headers: {
        'content-type': 'application/json',
      }
    })
    .then(response => response.json())
    .then(data => {
        if(data.data.length === 0){
          $('#btn-pinjam').attr('disabled', 'disabled');
        }
        data.data.forEach(element => {
            const items = document.createElement('div');
            totalBook.textContent = data.data.length
            items.className = 'card ecommerce-card';
            items.style = 'margin-bottom:1rem;'
            items.innerHTML = `
            <div class="item-img">
                <a href="#" style="height: 200px;">
                  <img src="${element.imgfile}" alt="img-placeholder" />
                </a>
              </div>
              <div class="card-body">
                <div class="item-name">
                  <h6 class="mb-0"><a href="#" class="text-body">${element.judul}</a></h6>
                  <span class="item-company">By <a href="#" class="company-name">${element.penulis}</a></span>
                </div>
              </div>
              <div class="item-options text-center">
                <div class="item-wrapper">
                  <div class="item-cost">
                    <p class="card-text shipping">
                      <span class="badge rounded-pill badge-light-success">Free Shipping</span>
                    </p>
                  </div>
                </div>
                <button type="button" onclick="deleteCartItem('${element.cart_id}')" class="btn btn-light mt-1">
                  <i data-feather="x" class="align-middle me-25"></i>
                  <span>Remove</span>
                </button>
              </div>
            `
            itemChekout.appendChild(items);
        })
    })
    .catch(error => console.error(error));
  }
  getCart()
    function deleteCartItem(id){
      fetch('/api/cart/'+id,{
        method: 'DELETE',
        headers: {
          'content-type': 'application/json',
        }
      })
      .then(response => response.json())
      .then(data => {
        // getNotification()
        toastr.success('data berhasil dihapus')
        notificationList = []
        itemChekout.innerHTML = ''
        getCart()
      })
      .catch(error => {
        toastr.error('data gagal dihapus')
      })
      .finally(() => {
        getNotification()
      })
    }

    document.getElementById('modalSubmit').addEventListener('click', function() {
      let nama_lengkap = document.getElementById('multicol-full-name').value;
      let tanggal_kembali = document.getElementById('multicol-birthdate').value;
      let validation_code = document.getElementById('verification-code').value;
      toastr.options.timeOut = 2000;
        let data = {
          id_buku:notificationList,
          id_user:'{{ Auth::user()->id }}',
          tanggal_pinjam: new Date().getTime(),
          tanggal_kembali:new Date(tanggal_kembali).getTime(),
          nama_lengkap:nama_lengkap,
          validation_code:validation_code
        }
        if(!tanggal_kembali || !nama_lengkap || !validation_code){
          toastr.error('data harus diisi')
          return
        }
        loader.style.display = 'flex';
        fetch('/api/books/pinjam', {
          method: 'POST',
          headers: {
            'content-type': 'application/json',
          },
          body: JSON.stringify(data)
        }).then(response => response.json())
        .then(data => {
          if(data.error){
            toastr.error(data.error)
            loader.style.display = 'none';
            return
          }
          loader.style.display = 'none';
          getCart();
          getNotification();
          itemChekout.innerHTML = '';
          totalBook.textContent = 0
          toastr.success(data.message)
          $('#btn-pinjam').attr('disabled', 'disabled');
          console.log(data.data)
        })
        .catch(error => console.error(error));
        
    });
    const loader = document.getElementById('loader')
    
</script>
@endsection
