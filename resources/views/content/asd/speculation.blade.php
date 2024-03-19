@extends('layouts/layoutMaster')

@section('title', 'ASD - Speculation')

@section('content')
<style>
  .item1 {
    left: 74px;
    top: 162px;
    max-height: 300px;
    transition: transform 0.3s ease;
}



.item2 {
    right: 68px;
    bottom: 204px;
    max-height: 200px;
    transition: transform 0.3s ease;
}
.item3 {
    right: 99px;
    top: 89px;
    max-height: 200px;
    transition: transform 0.3s ease;
}
.item1:hover {
  transform: scale(1.3);
  z-index: 10;
}
.item2:hover {
  transform: scale(1.3);
  z-index: 10;
}
.item3:hover {
  transform: scale(1.3);
  z-index: 10;
}
.text-1{
  right: -92px;
    top: 114px;
}
.text-2{
  right: 200px;
  bottom: 150px;
}
.text-3{
  left: -148px;
  bottom: 388px;
}
</style>
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Adaptive Software Development</span>
</h4>
<!-- Avatar Group -->
<div class="card">
  <h5 class="card-header">Speculation</h5>
  <div class="card-body">
    <div class="w-full d-flex flex-column align-items-center justify-content-center">
        <div style="width: 500px;">
            <img class="img-fluid h-100" src="{{asset('img/asd/What-Is-Agile-Project-Management.webp')}}" alt="">
        </div>
        <div class="px-5 mt-2">
            <p>Kata “spekulasi” yang menggambarkan fase pertama dari siklus hidup adaptif mencerminkan contoh Pengembangan Perangkat Lunak Adaptif. Fase spekulasi dengan hati-hati dan sengaja menghilangkan faktor perencanaan yang seringkali membawa banyak beban dan ketegangan yang tidak perlu.</p>
        </div>
        <div class="px-5 mt-2">
            <p>Fase ini memberikan kebebasan penuh kepada tim untuk menyambut dan menerima hasil tanpa rasa takut akan hal yang tidak diketahui atau ketidakpastian. Hal ini benar-benar menghilangkan kebutuhan buruk untuk selalu benar, sehingga membuat semua pemangku kepentingan merasa nyaman.</p>
        </div>
        <div class="px-5 w-full">
            <span class="">Tujuan dari fase spekulasi adalah:</span>
            <div class="d-flex flex-row mt-1 mb-0 gap-3">
               <span><i class="fas fa-check"></i></span> <p>Untuk menghilangkan beban perencanaan yang tidak perlu</p>
            </div>
            <div class="d-flex flex-row gap-3">
               <span><i class="fas fa-check"></i></span> <p>Untuk menciptakan ruang bagi inovasi dengan menjadikan seluruh proses terbuka</p>
            </div>
            <div class="d-flex flex-row gap-3">
               <span><i class="fas fa-check"></i></span> <p>Untuk menjaga perencanaan pada tingkat yang paling minimum atau esensial</p>
            </div>
            <div class="d-flex flex-row gap-3">
               <span><i class="fas fa-check"></i></span> <p>Untuk menetapkan kerangka kerja yang sesuai untuk produk akhir</p>
            </div>
            <div class="d-flex flex-row gap-3">
               <span><i class="fas fa-check"></i></span> <p>Untuk memungkinkan eksplorasi dan eksperimen dengan setiap fase spekulasi baru dengan iterasi kecil.</p>
            </div>
        </div>
    </div>
  </div>
</div>
<!--/ Avatar Group -->

@endsection
