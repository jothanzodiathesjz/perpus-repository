@extends('layouts/layoutMaster')

@section('title', 'Cards basic - UI elements')
@section('vendor-style')
{{-- <link rel="stylesheet" href="{{asset('assets/vendor/libs/animate-css/animate.css')}}"> --}}
<link rel="stylesheet" href="{{ asset('vendors/css/extensions/nouislider.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/css/extensions/toastr.min.css') }}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/animate-css/animate.css')}}">
@endsection

@section('page-style')
<link rel="stylesheet" href="{{ asset('css/base/plugins/extensions/ext-component-sliders.css') }}">
<link rel="stylesheet" href="{{ asset('css/base/pages/app-ecommerce.css') }}">
<link rel="stylesheet" href="{{ asset('css/base/plugins/extensions/ext-component-toastr.css') }}">
<script src="{{asset('assets/js/ui-modals.js')}}"></script>
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/masonry/masonry.js')}}"></script>
<script src="{{ asset('vendors/js/extensions/wNumb.min.js') }}"></script>
<script src="{{ asset('vendors/js/extensions/nouislider.min.js') }}"></script>
<script src="{{ asset('vendors/js/extensions/toastr.min.js') }}"></script>
@endsection
@section('page-script')
<script src="{{ asset('js/pages/app-ecommerce.js') }}"></script>
@endsection
@section('content')
<div class="app-content content ecommerce-application">
   <!-- Modal -->
   <div class="modal fade animate__animated animate__bounceInLeft" id="animationModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel5">Books Item</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="p-2">
          <div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-4">
                <img class="card-img card-img-left" src="" alt="Card image" id="modal-img"/>
              </div>
              <div class="col-md-8">
                <div class="card-body" id="modal-card">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
{{-- @include('content/books/app-ecommerce-sidebar') --}}
<div class="content-detached content-right">
    <div class="content-body">
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
                        aria-expanded="false"
                      >
                        <span class="active-sorting">Category</span>
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
          <!-- E-commerce Content Section Starts -->
          
          <!-- background Overlay when sidebar is shown  starts-->
          <div class=""></div>
          <!-- background Overlay when sidebar is shown  ends-->
          
          <!-- E-commerce Search Bar Starts -->
          <section id="ecommerce-searchbar" class="ecommerce-searchbar" style="margin-top: 1rem ">
            <div class="row mt-1">
              <div class="col-sm-12">
                <div class="input-group input-group-merge">
                  <input
                    type="text"
                    class="form-control search-product"
                    value=""
                    id="shop-search"
                    placeholder="Search Book"
                    aria-label="Search..."
                    aria-describedby="shop-search"
                  />
                  <span class="input-group-text"><i data-feather="search" class="text-muted"></i></span>
                </div>
              </div>
            </div>
          </section>
          <!-- E-commerce Search Bar Ends -->
          
          <!-- E-commerce Products Starts -->
          <section id="ecommerce-products" class="grid-view justify-content-center ">
          </section>
          <!-- E-commerce Products Ends -->
          
          <!-- E-commerce Pagination Starts -->
          <section id="ecommerce-pagination" style="margin-top: 2rem;">
            <div class="row">
              <div class="col-sm-12">
                <nav aria-label="Page navigation example">
                  <ul id="paginate" class="pagination justify-content-center mt-2">
                  </ul>
                </nav>
              </div>
            </div>
          </section>
    </div>
</div>
<!-- E-commerce Content Section Starts -->

  <!-- E-commerce Pagination Ends -->
</div>
<script>
  function clickMe(id){
    console.log('hay')
    toastr.options.timeOut = 500;
    const isItemExists = notificationList.some(item => item === id);
    if (isItemExists) {
      
      toastr.error('Buku Sudah ada dikeranjang');
        return; // Stop the execution of the function
    }
    
    fetch('/api/cart/store',{
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      
      body: JSON.stringify({
        user_id: '{{ Auth::user()->id }}',
        id_buku: id
      })
    })
    .then(res => res.json())
    .then(data => {
      if(data.data){
        toastr.success('Berhasil dimasukkan keranjang')
        let count = document.getElementById('notification-badge');
        let counter = parseInt(count.innerText) + 1;
        let notif = document.getElementById('notification-list');
        var newElement = document.createElement('li');
        newElement.className = 'list-group-item list-group-item-action dropdown-notifications-item';
        count.innerText = counter;
        // Set the innerHTML of the new element with your HTML string
        newElement.innerHTML = `
          <div class="d-flex">
            <div class="flex-shrink-0 me-3">
              <div class="avatar">
                <img src="${data.data.imgfile}" alt class="h-auto rounded-circle">
              </div>
            </div>
            <div class="flex-grow-1">
              <h6 class="mb-1">${data.data.judul}</h6>
              <p class="mb-0">Won the monthly best seller gold badge</p>
              <small class="text-muted">1h ago</small>
            </div>
            <div class="flex-shrink-0 dropdown-notifications-actions">
              <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
              <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
            </div>
          </div>`;
          notif.appendChild(newElement);
          notificationList.push(data.data.id)
          console.log(notificationList)
      }
    })
    .catch(err => {
      console.log(err)
    })
  }
function getBooks(page){
  let paginate = page?page:'/api/book/get?page='
  fetch(paginate,{
    method: 'GET',
    headers: {
      'Content-Type': 'application/json',
    }
  })
  .then(res => res.json())
  .then(data => {
    console.log(data)
    fillPagination(data.data.links);
    data.data.data.forEach((element,index) => {
      $('#ecommerce-products').append(
        `
        <div class="card ecommerce-card " style="width: 250px;margin-top: 20px;" id="book-${element.id}">
              <div class="text-center" style="height: 200px;">
                <a href="">
                  <img
                    class=""
                    src="${element.imgfile}"
                    alt="img-placeholder"
                    style="
                    height: 100%;
                    width: auto;
                    "
                /></a>
              </div>
              <div class="p-2">
                <h6 class="item-name">
                  <a class="text-body" href="">${element.judul}</a>
                </h6>
                <div class="mt-2 mb-1">
                  <span><i class='ti ti-pencil me-2'></i></span>
                  <span><i>Author : ${element.penulis}</i></span>
                  <span>${element.tahun_publikasi}</span>
              </div>
              <div class="mb-3 ">
                <span><i>isbn : ${element.isbn}</i></span>
              </div>
              </div>
              <div class="item-options text-center">
                <a href="#" onClick="detailsWithModal({
                  id: '${element.id}',
                  judul: '${element.judul}',
                  penulis: '${element.penulis}',
                  imgfile: '${element.imgfile}',
                  deskripsi: '${element.deskripsi}',
                  tahun_publikasi: '${element.tahun_publikasi}',
                  isbn: '${element.isbn}',
                })" class="btn btn-light btn-wishlist" data-bs-toggle="modal" data-bs-target="#animationModal">
                  <i data-feather="heart"></i>
                  <span>Detail</span>
                </a>
                <a onclick="clickMe('${element.id}')"  class="btn btn-primary text-white">
                  <span class="add-to-cart">Add to cart</span>
                </a>
              </div>
            </div>
        `)
    });
  })
}

getBooks()

function getBooksCategory(category){
  fetch(`/api/book/get?category=${category}`,{
    method: 'GET',
    headers: {
      'Content-Type': 'application/json',
    }
  })
  .then(res => res.json())
  .then(data => {
    console.log(data)
    fillPagination(data.data.links);
    data.data.data.forEach(element => {
      $('#ecommerce-products').append(
        `
        <div class="card ecommerce-card " style="width: 250px;margin-top: 20px;" id="book-${element.id}">
              <div class="text-center" style="height: 200px;">
                <a href="">
                  <img
                    class=""
                    src="${element.imgfile}"
                    alt="img-placeholder"
                    style="
                    height: 100%;
                    width: auto;
                    "
                /></a>
              </div>
              <div class="p-2">
                <h6 class="item-name">
                  <a class="text-body" href="">${element.judul}</a>
                </h6>
                <div class="mt-2 mb-1">
                  <span><i class='ti ti-pencil me-2'></i></span>
                  <span><i>Author : ${element.penulis}</i></span>
                  <span>${element.tahun_publikasi}</span>
              </div>
              <div class="mb-3 ">
                <span><i>isbn : ${element.isbn}</i></span>
              </div>
              </div>
              <div class="item-options text-center">
                <a href="#" onClick="detailsWithModal({
                  id: '${element.id}',
                  judul: '${element.judul}',
                  penulis: '${element.penulis}',
                  imgfile: '${element.imgfile}',
                  deskripsi: '${element.deskripsi}',
                  tahun_publikasi: '${element.tahun_publikasi}',
                  isbn: '${element.isbn}',
                })" class="btn btn-light btn-wishlist" data-bs-toggle="modal" data-bs-target="#animationModal">
                  <i data-feather="heart"></i>
                  <span>Detail</span>
                </a>
                <a onclick="clickMe('${element.id}')"  class="btn btn-primary text-white">
                  <span class="add-to-cart">Add to cart</span>
                </a>
              </div>
            </div>
        `)
    });
  })
}
function createPaginationElement(link) {
  var li = document.createElement("li");
  li.className = "page-item" + (link.active ? " active" : "") + (link.url ? "" : " disabled");

  var a = document.createElement("a");
  a.className = "page-link";
  if (link.url) {
    a.innerHTML = link.label;
    a.style.cursor = "pointer"; // Menambahkan style cursor untuk menunjukkan bahwa ini dapat diklik
    a.onclick = function() {
      $('#ecommerce-products').html('')
        getBooks(link.url);
    };
} else {
    a.innerHTML = link.label;
    a.style.cursor = "pointer"; // Menambahkan style cursor untuk menunjukkan bahwa ini dapat diklik
    a.onclick = function() {
      $('#ecommerce-products').html('')
      getBooks(link.url);
    };
}

  li.appendChild(a);
  return li;
}
function searchBooks(search){
  fetch(`/api/book/get?search=${search}`,{
    method: 'GET',
    headers: {
      'Content-Type': 'application/json',
    }
  })
  .then(res => res.json())
  .then(data => {
    console.log(data)
    $('#ecommerce-products').html('')
    fillPagination(data.data.links);
    data.data.data.forEach(element => {
      $('#ecommerce-products').append(
        `
        <div class="card ecommerce-card " style="width: 250px;margin-top: 20px;" id="book-${element.id}">
              <div class="text-center" style="height: 200px;">
                <a href="">
                  <img
                    class=""
                    src="${element.imgfile}"
                    alt="img-placeholder"
                    style="
                    height: 100%;
                    width: auto;
                    "
                /></a>
              </div>
              <div class="p-2">
                <h6 class="item-name">
                  <a class="text-body" href="">${element.judul}</a>
                </h6>
                <div class="mt-2 mb-1">
                  <span><i class='ti ti-pencil me-2'></i></span>
                  <span><i>Author : ${element.penulis}</i></span>
                  <span>${element.tahun_publikasi}</span>
              </div>
              <div class="mb-3 ">
                <span><i>isbn : ${element.isbn}</i></span>
              </div>
              </div>
              <div class="item-options text-center">
                <a href="#" class="btn btn-light btn-wishlist" data-bs-toggle="modal" data-bs-target="#animationModal">
                  <i data-feather="heart"></i>
                  <span>Detail</span>
                </a>
                <a onclick="clickMe('${element.id}')"  class="btn btn-primary text-white">
                  <span class="add-to-cart">Add to cart</span>
                </a>
              </div>
            </div>
        `)
    });
  })
}
function fillPagination(links) {
  var paginationElement = document.getElementById("paginate");
  paginationElement.innerHTML = "";

  links.forEach(function (link) {
      var li = createPaginationElement(link);
      paginationElement.appendChild(li);
  });
}

  var searchInput = document.getElementById('shop-search');
  searchInput.addEventListener('input', function() {
    searchBooks(searchInput.value)
  })

  function getCategory(){
    fetch(`/api/book/category`,{
      method: 'GET',
      headers: {
        'Content-Type': 'application/json',
      }
    }).then(res => res.json())
    .then(data => {
      let dropdownMenu = document.getElementById('book-category');
      data.data.forEach(element => {
        let newLink = document.createElement('a');
        newLink.className = 'dropdown-item';
        newLink.textContent = element.kategori_buku;
        newLink.href = '#';
        newLink.style.cursor = "pointer"; // Menambahkan style cursor untuk menunjukkan bahwa ini dapat diklik
        newLink.onclick = function() {
          $('#ecommerce-products').html('')
            //getBooks(link.url);
            getBooksCategory(element.kategori_buku)
        };
  
        // Menambahkan elemen <a> ke elemen dropdown-menu
        dropdownMenu.appendChild(newLink);
      })
    })
  }
  getCategory()


  function detailsWithModal(data){
    let modalCard = document.getElementById('modal-card');
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
@endsection
