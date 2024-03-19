@extends('layouts/layoutMaster')

@section('title', 'ASD - Collaboration')

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
  <h5 class="card-header">Collaboration</h5>
  <div class="card-body">
    <div class="w-full d-flex flex-column align-items-center justify-content-center">
        <div style="width: 500px;">
            <img class="img-fluid h-100" src="{{asset('img/asd/Agile-project-1.jpg')}}" alt="">
        </div>
        <div class="px-5">
            <p>Pada fase inilah perkembangan sebenarnya dimulai. Fase ini adalah tentang munculnya kelompok. Ini tentang menyatukan beragam pengalaman, pengetahuan, dan keterampilan. Hal ini membentuk lingkungan kolaboratif di mana keberagaman berfungsi sebagai landasan kreativitas dan inovasi di seluruh siklus pembangunan.</p>
        </div>
        <div class="px-5">
            <span class="">Prinsip intrinsik dari fase kolaborasi adalah:</span>
            <div class="d-flex flex-row mt-1 mb-0 gap-3">
               <span><i class="fas fa-check"></i></span> <p>Keberagaman sangat penting untuk mengumpulkan, menganalisis, dan menerapkan data atau informasi dalam jumlah besar secara efektif untuk pengembangan produk</p>
            </div>
            <div class="d-flex flex-row gap-3">
               <span><i class="fas fa-check"></i></span> <p>Kolaborasi atau lingkungan kolaboratif adalah satu-satunya cara sejati agar keberagaman ini dapat dimanfaatkan sebaik-baiknya</p>
            </div>
            <div class="d-flex flex-row gap-3">
               <span><i class="fas fa-check"></i></span> <p>Ketika keberagaman tersebut diterapkan secara menyeluruh, penerapan yang rumit tidak perlu dibangun. Keanekaragaman memungkinkan mereka berkembang secara organik.</p>
            </div>
            <div class="d-flex flex-row gap-3">
               <span><i class="fas fa-check"></i></span> <p>Kolaborasi dicapai dengan mencapai keseimbangan antara teknik manajemen proyek tradisional dan lingkungan kolaboratif yang progresif</p>
            </div>
            <div class="d-flex flex-row gap-3">
               <span><i class="fas fa-check"></i></span> <p>Rasa keberakaran dengan pendekatan kemunculan yang terbuka.</p>
            </div>
        </div>
    </div>
  </div>
</div>
<!--/ Avatar Group -->

@endsection
