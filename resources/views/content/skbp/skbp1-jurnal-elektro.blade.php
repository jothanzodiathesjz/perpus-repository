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
  <span class="text-muted fw-light">Dashboard/</span> Skbp1 / Jurnal
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
  <div class="py-2">
<!-- E-commerce Search Bar Starts -->
<section id="ecommerce-searchbar" class="ecommerce-searchbar" style="margin-top: 1rem ">
  <div class="row mt-1">
    <div class="col-6">
      <div class="input-group input-group-merge">
        <input
          type="text"
          class="form-control search-product"
          value=""
          id="shop-search"
          placeholder="Search Junal"
          aria-label="Search..."
          aria-describedby="shop-search"
        />
        <span class="input-group-text"><i data-feather="search" class="text-muted"></i></span>
      </div>
    </div>
  </div>
</section>
<!-- E-commerce Search Bar Ends -->
  </div>
  
  <div class="col-12">
    <div class="card invoice-preview-card">
      <div class="card-body">
        <h3 id="buletin-title">Buletin Teknik Elektro: Recent Submssion</h3>
        <div id="jurnal-content" class="d-flex flex-column gap-4">
          {{-- <div class="mb-xl-0 mb-0">
            <div class="artifact-description">
              <h5 class="artifact-title">
              <a href="/handle/123456789/56910">Analisis Tingkat Kepuasan Peserta Lelang Dan Perceived Quality Tempat Pelelangan Ikan (Tpi) Di Pangkalan Pendaratan Ikan (PPI) Muara Angke, Jakarta</a><span class="Z3988" title="ctx_ver=Z39.88-2004&amp;rft_val_fmt=info%3Aofi%2Ffmt%3Akev%3Amtx%3Adc&amp;rft_id=0854-5804&amp;rft_id=http%3A%2F%2Frepository.ipb.ac.id%2Fhandle%2F123456789%2F56910&amp;rfr_id=info%3Asid%2Fdspace.org%3Arepository&amp;"></span>
              </h5>
              <div class="artifact-info">
              <span class="author"><small><span>Nurhayati, Popong</span> | <span>Diatin, Iis</span> | <span>Suyanto, Teguh</span></small></span> <span class="publisher-date h4"><small>(<span class="date">2007</span>)</small></span>
              </div>
              <div class="artifact-abstract">The Govemment of OKI Jakarta had built the new TPI (Tempat Pelelangan likan) in Muara Angke to replace the function of the old TPI. This new TPI have equipped an improving facility and service of quality cause of service ...</div>
              </div>
          </div> --}}
        </div>
      </div>
      <hr class="my-0" />
    </div>
  </div>

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
@push('body-scripts')
<script>

    function getVolume(){
      // Mendefinisikan URL endpoint
const url = '/api/skbp1/getvolume?prodi=Teknik Elektro&type=Jurnal';

// Menggunakan fetch untuk melakukan GET request ke endpoint
fetch(url)
  .then(response => {
    // Memeriksa apakah responsenya berhasil (status code 200 OK)
    if (!response.ok) {
      throw new Error(`HTTP error! Status: ${response.status}`);
    }
    // Mengonversi responsenya ke dalam format JSON
    return response.json();
  })
  .then(data => {
    // Menangani data yang telah diterima dari server
    console.log('Data yang diterima:', data);
    let dropdownMenu = document.getElementById('book-category');
    let activeSortingElement = document.querySelector('.active-sorting');
      data.data.forEach(element => {
        let newLink = document.createElement('a');
        newLink.className = 'dropdown-item';
        newLink.textContent = element.volume;
        newLink.href = '#';
        newLink.style.cursor = "pointer"; // Menambahkan style cursor untuk menunjukkan bahwa ini dapat diklik
        newLink.onclick = function() {
          $('#jurnal-content').html('')
            getListFromVolume(element.volume)
            // getBooksCategory(element.kategori_buku);
            activeSortingElement.textContent = element.volume;
        };
  
        // Menambahkan elemen <a> ke elemen dropdown-menu
        dropdownMenu.appendChild(newLink);
      })

    // Lakukan operasi lainnya sesuai kebutuhan Anda
  })
  .catch(error => {
    // Menangani kesalahan yang mungkin terjadi selama proses fetch
    console.error('Fetch error:', error);
  });

    }
getVolume()

        function getListFromVolume(volume,paginate){
          // Mendefinisikan URL endpoint

          let url;
          if(volume){
            url ='/api/skbp1/getList?vol='+volume+'&prodi=Teknik Elektro&type=jurnal';
          }else if(paginate){
            url =paginate;
          }else{
            url ='/api/skbp1/getList?prodi=Teknik Elektro&type=jurnal';
          }

        // Menggunakan fetch untuk melakukan GET request ke endpoint
        fetch(url)
          .then(response => {
            // Memeriksa apakah responsenya berhasil (status code 200 OK)
            if (!response.ok) {
              throw new Error(`HTTP error! Status: ${response.status}`);
            }
            // Mengonversi responsenya ke dalam format JSON
            return response.json();
          })
          .then(data => {
            fillPagination(data.data.links);
            console.log('Data yang diterima:', data.data);
            data.data.data.forEach(element => {
              $('#jurnal-content').append(`
              <div class="">
            <div class="">
              <h5 class="mb-0">
              <a href="/jurnal/content/${element.id}">${element.judul}</a>
              </h5>
              <div class="artifact-info">
              <span class="author"><small>${element.nama}</small> <small>(<span class="date">${element.tahun}</span>)</small></span>
              </div>
              <div class="text-truncate">${element.abstrak}</div>
              </div>
          </div>
              `)
            })

            // Lakukan operasi lainnya sesuai kebutuhan Anda
          })
          .catch(error => {
            // Menangani kesalahan yang mungkin terjadi selama proses fetch
            console.error('Fetch error:', error);
          });

        }
        getListFromVolume()

  function createPaginationElement(link) {
  var li = document.createElement("li");
  li.className = "page-item" + (link.active ? " active" : "") + (link.url ? "" : " disabled");

  var a = document.createElement("a");
  a.className = "page-link";
  if (link.url) {
    a.innerHTML = link.label;
    a.style.cursor = "pointer"; // Menambahkan style cursor untuk menunjukkan bahwa ini dapat diklik
    a.onclick = function() {
      $('#jurnal-content').html('')
        // getBooks(link.url);
        getListFromVolume(null,link.url)
    };
} else {
    a.innerHTML = link.label;
    a.style.cursor = "pointer"; // Menambahkan style cursor untuk menunjukkan bahwa ini dapat diklik
    a.onclick = function() {
      $('#jurnal-content').html('')
      getListFromVolume(null,link.url)
    };
}

  li.appendChild(a);
  return li;
}

function fillPagination(links) {
  var paginationElement = document.getElementById("paginate");
  paginationElement.innerHTML = "";

  links.forEach(function (link) {
      var li = createPaginationElement(link);
      paginationElement.appendChild(li);
  });
}

function searchJurnal(search){
  fetch(`/api/skbp1/search?prodi=Teknik Elektro&type=Jurnal&search=${search}`)
        .then(response => response.json())
        .then(data => {
          console.log(data)
          $('#jurnal-content').html('')
          fillPagination(data.data.links);
            console.log('Data yang diterima:', data.data);
            data.data.data.forEach(element => {
              $('#jurnal-content').append(`
              <div class="">
            <div class="">
              <h5 class="mb-0">
              <a href="/jurnal/content/${element.id}">${element.judul}</a>
              </h5>
              <div class="artifact-info">
              <span class="author"><small>${element.nama}</small> <small>(<span class="date">${element.tahun}</span>)</small></span>
              </div>
              <div class="text-truncate">${element.abstrak}</div>
              </div>
          </div>
              `)
            })
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
}

var searchInput = document.getElementById('shop-search');
  searchInput.addEventListener('input', function() {
    searchJurnal(searchInput.value)
  })

</script>
@endpush
@endsection
