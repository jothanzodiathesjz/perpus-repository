@extends('layouts/layoutMaster')

@section('title', 'ASD')

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
  <h5 class="card-header">ASD Life Cycle</h5>
  <div class="card-body">
    <div class="w-full d-flex justify-content-center">
      <div style="width: 600px; height: 700px" class="position-relative">
        <span class="fs-1 position-absolute text-1">Speculation</span>
        <span class="fs-1 position-absolute text-2">Learning</span>
        <span class="fs-1 position-absolute text-3">Collaboration</span>

        <a href="/asd/collaboration"><img class="position-absolute item1 img-fluid"  src="{{asset('img/asd/Vector3.png')}}" alt=""></a>
        <a href="/asd/learning"><img class="position-absolute item2 img-fluid"  src="{{asset('img/asd/Vector2.png')}}" alt=""></a>
        <a href="/asd/speculation"><img class="position-absolute item3 img-fluid"  src="{{asset('img/asd/Vector1.png')}}" alt=""></a>
      </div>
    </div>
  </div>
</div>
<!--/ Avatar Group -->

@endsection
