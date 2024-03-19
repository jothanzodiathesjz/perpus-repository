@extends('layouts/layoutMaster')

@section('title', 'ASD - Learn')

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
  <h5 class="card-header">Learning</h5>
  <div class="card-body">
    <div class="w-full d-flex flex-column align-items-center justify-content-center">
        <div style="width: 500px;">
            <img class="img-fluid h-100" src="{{asset('img/asd/learn.webp')}}" alt="">
        </div>
        <div class="px-5 mt-2">
            <p>Fase pembelajaran adalah fase yang sangat penting dalam siklus hidup adaptif karena fase ini menentukan langkah selanjutnya dan memandu pemangku kepentingan ke arah yang benar selama keseluruhan proses pengembangan perangkat lunak. Keberhasilan fase ini bergantung pada kolaborasi yang efektif, yang merupakan fase kedua dan inti dari siklus hidup adaptif.</p>
        </div>
        <div class="px-5 w-full">
            <span class="">Dalam fase yang terjadi setelah setiap iterasi, tim pengembangan perangkat lunak tangkas berkumpul untuk menganalisis tingkat pengetahuan, keterampilan, dan keahlian. Hal ini dilakukan melalui:</span>
            <div class="d-flex flex-row mt-1 mb-0 gap-3">
               <span><i class="fas fa-check"></i></span> <p>Mempelajari tinjauan teknis</p>
            </div>
            <div class="d-flex flex-row gap-3">
               <span><i class="fas fa-check"></i></span> <p>Mempelajari retrospektif proyek</p>
            </div>
            <div class="d-flex flex-row gap-3">
               <span><i class="fas fa-check"></i></span> <p>Memfasilitasi umpan balik pengguna melalui kelompok fokus dan cara lain yang memungkinkan atau tersedia.</p>
            </div>
        </div>
    </div>
  </div>
</div>
<!--/ Avatar Group -->

@endsection
