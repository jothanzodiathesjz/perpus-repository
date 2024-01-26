@extends('layouts/layoutMaster')

@section('title', 'Account settings - Account')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/animate-css/animate.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
<link rel="stylesheet" href="{{ asset('vendors/css/extensions/toastr.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/base/plugins/extensions/ext-component-toastr.css') }}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
<script src="{{ asset('vendors/js/extensions/wNumb.min.js') }}"></script>
<script src="{{ asset('vendors/js/extensions/nouislider.min.js') }}"></script>
<script src="{{ asset('vendors/js/extensions/toastr.min.js') }}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Account Settings /</span> Account
</h4>

<div class="row">
  <div class="col-md-12">
    <div class="card mb-4">
      <h5 class="card-header">Profile Details</h5>
      <!-- Account -->
      <div class="card-body">
        <div class="d-flex align-items-start align-items-sm-center gap-4">
          <img src="{{ asset('assets/img/avatars/14.png') }}" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar" />
          <div class="">
                <span class="d-none d-sm-block">Upload new Profile Picture</span>
                <div class="d-flex flex-row gap-3">
                    <input type="file" id="upload" class="form-control" accept="image/png, image/jpeg" />
                    <button type="button" class="btn btn-primary" onclick="changePicture()">
                        <span>Change</span>
                      </button>
                </div>
                <div class="text-muted">Allowed JPG, GIF or PNG. Max size of 800K</div>
        </div>
          </div>
        </div>
        <div class="card-body">
          <div id="formAccountSettings" method="POST" onsubmit="return false">
            <div class="row">
              <div class="mb-3 col-md-6">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input class="form-control" type="text" id="nama_lengkap" name="nama_lengkap"  placeholder="Masukkan Nama" />
              </div>
              <div class="mb-3 col-md-6">
                <label for="stambuk" class="form-label">Stambuk</label>
                <input class="form-control" type="text" name="stambuk" id="stambuk" placeholder="Masukkan Stambuk" />
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
                <label class="form-label" for="fakuktas">Fakultas</label>
                <select id="fakultas" class="select2 form-select">
                  <option value="">Select</option>
                  <option value="Fakultas Hukum">Fakultas Hukum</option>
                  <option value="Fakultas Ekonomi">Fakultas Ekonomi</option>
                  <option value="Fakultas Teknik">Fakultas Teknik</option>
                  <option value="Fakultas Informatika dan Komputer">Fakultas Informatika dan Komputer</option>
                </select>
              </div>
              <div class="mb-3 col-md-6">
                <label class="form-label" for="fakuktas">Prodi</label>
                <select id="ProgramStudi" class="select2 form-select">
                  <option value="">Select</option>
                  <option value="Hukum">Hukum</option>
                  <option value="Akuntansi">Akuntansi</option>
                  <option value="Manajemen">Manajemen</option>
                  <option value="Teknik Informatika">Teknik Informatika</option>
                  <option value="Teknik Sipil">Teknik Sipil</option>
                  <option value="Teknik Elektro">Teknik Elektro</option>
                  <option value="Teknik Mesin">Teknik Mesin</option>
                  <option value="Teknik Kimia">Teknik Kimia</option>
                </select>
              </div>
            </div>
            <div class="mt-2">
              <button type="submit" onclick="updateForm()" class="btn btn-primary me-2">Save changes</button>
            </div>
          </div>
        </div>
        <!-- /Account -->
      </div>
      <hr class="my-0">
  </div>
</div>
      
    <div>
    <div class="card">
      <h5 class="card-header">Change Password</h5>
      <div class="card-body">
        <div>
            <div class="mb-3 col-md-6">
                <label for="password" class="form-label">Password</label>
                <input class="form-control" type="password" id="password" name="password"  placeholder="Masukkan Password" />
            </div>
            <div class="mb-3 col-md-6">
                <label for="newpassword" class="form-label">New Password</label>
                <input class="form-control" type="password" id="newpassword" name="newpassword"  placeholder="Masukkan Password Baru" />
            </div>
            <div class="mt-2">
                <button type="submit" onclick="updatePassword()" class="btn btn-primary me-2">Save changes</button>
              </div>
        </div>
      </div>
    </div>
  </div>
</div>

@push('body-scripts')
<script>
    const fakultas = document.getElementById('fakultas')
    const ProgramStudi = document.getElementById('ProgramStudi')
  toastr.options.timeOut = 500;
  var formAccountSettings = document.getElementById("formAccountSettings");
  var inputNamaLengkap = document.getElementById("nama_lengkap");
  var inputStambuk = document.getElementById("stambuk");
  var inputAlamat = document.getElementById("alamat");
  var inputTelepon = document.getElementById("telepon");
  var newpassword = document.getElementById("newpassword");
  var password = document.getElementById("password");
  var avatarImage = document.getElementById('uploadedAvatar');

  function getDetailsUser()
  {
    fetch('/api/users/profile-data/{{auth()->user()->id}}')
    .then(response => {
      // Memeriksa status response
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      return response.json(); // Mengubah response menjadi JSON
    })
    .then(data => {
      console.log('Profile details:', data);
      inputNamaLengkap.value = data.data.fullname;
      inputStambuk.value = data.data.stambuk;
      inputTelepon.value = data.data.telepon;
      inputAlamat.value = data.data.alamat;
      $('#fakultas').val(data.data.fakultas).select2();
      $('#ProgramStudi').val(data.data.ProgramStudi).select2();
      if(data.profilePicture){
        avatarImage.src = data.profilePicture.img
      }
    })
    .catch(error => {
      // Handle error
      console.error('Error during fetch operation:', error);
    });
  }

getDetailsUser();

function updateForm(){
    fetch('/api/users/profile-data/{{auth()->user()->id}}', {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            fullname: inputNamaLengkap.value,
            stambuk: inputStambuk.value,
            alamat: inputAlamat.value,
            telepon: inputTelepon.value,
            fakultas: fakultas.value,
            ProgramStudi: ProgramStudi.value,
        })
    })
    .then(response => {
      // Memeriksa status response
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      return response.json(); // Mengubah response menjadi JSON
    })
    .then(data => {
      console.log('Profile details:', data);
      inputNamaLengkap.value = data.data.fullname;
      inputStambuk.value = data.data.stambuk;
      inputTelepon.value = data.data.telepon;
      inputAlamat.value = data.data.alamat;
      $('#fakultas').val(data.data.fakultas).select2();
      $('#ProgramStudi').val(data.data.ProgramStudi).select2();
      toastr.success('Berhasil');
    })
    .catch(error => {
      // Handle error
      console.error('Error during fetch operation:', error);
      toastr.error('Gagal dimasukkan');
    });
}

function updatePassword(){
    fetch('/api/users/profile-password/{{auth()->user()->id}}', {
    method: 'PUT',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      password: password.value,
      newpassword: newpassword.value,
    }),
  })
  .then(response => {
    // Memeriksa status response
    if (!response.ok) {
      throw new Error('Network response was not ok');
    }
    return response.json(); // Mengubah response menjadi JSON
  })
  .then(data => {
    // Handle data yang diterima dari server
    console.log('Password updated:', data);
    // Lakukan apa yang perlu dilakukan dengan data, misalnya menampilkan pesan sukses
    toastr.success('Password updated successfully');
  })
  .catch(error => {
    // Handle error
    console.error('Error during fetch operation:', error);
    // Lakukan apa yang perlu dilakukan jika ada kesalahan, misalnya menampilkan pesan kesalahan
    toastr.error('Error updating password: ' + error.message);
  });
}

function changePicture(){
    const imgfileInput = document.getElementById('upload');
    if (imgfileInput.files.length === 0) {
        toastr.error('Please select a file to upload.');
         throw new Error('Please select a file.');
  }
   // Mendapatkan file yang dipilih
   var selectedFile = imgfileInput.files[0];

    // Memeriksa tipe file (hanya mendukung JPEG, PNG, dan GIF)
    var allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if (!allowedTypes.includes(selectedFile.type)) {
    toastr.error('Only JPEG, PNG, and GIF files are allowed.');
    throw new Error('Only JPEG, PNG, and GIF files are allowed.');
    }

    var maxSizeInBytes = 800 * 1024; // 800K dalam byte
    if (selectedFile.size > maxSizeInBytes) {
    toastr.error('File size exceeds the maximum allowed size of 800K.');
    throw new Error('File size exceeds the maximum allowed size of 800K.')
    }
    const form = new FormData();
    form.append("imgfile", selectedFile);
    fetch('/api/users/profile-picture/{{auth()->user()->id}}', {
        method: 'POST',
        body: form
    }).then(response => {
      // Memeriksa status response
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      return response.json(); // Mengubah response menjadi JSON
    })
    .then(data => {
      avatarImage.src = data.data;
      toastr.success('Password updated successfully');
    })
}

</script>
@endpush


@endsection
