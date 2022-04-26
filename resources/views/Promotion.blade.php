@extends('layouts.app')

@section('content')
@include('sweetalert::alert')
@include('components.navbar')
<!-- Header -->
<header id="header" class="header">
	<img class="decoration-star" src="https://technext.github.io/yavin/images/decoration-star.svg" alt="alternative">
	<img class="decoration-star-2" src="https://technext.github.io/yavin/images/decoration-star.svg" alt="alternative">
	<div class="container">
		<h1 class="text-center" style="font-weight: 500;font-size: 60px;">Promotion <hr></h1>
	</div>
</header>
<!-- Content -->
<div class="container mt-5 mb-5">
	<!-- <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
		<div class="carousel-indicators">
			<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
			<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
			<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
		</div>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="{{asset('image/promotion4.png')}}" class="d-block w-100" alt="...">
			</div>
			<div class="carousel-item">
				<img src="{{asset('image/promotion1.png')}}" class="d-block w-100" alt="...">
			</div>
			<div class="carousel-item">
				<img src="{{asset('image/promotion2.png')}}" class="d-block w-100" alt="...">
			</div>
		</div>
		<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
		</button>
	</div> -->
	<div class="promotion">
	<img class="mb-3" src="{{asset('image/promotion1.png')}}">
	<img class="mb-3" src="{{asset('image/promotion4.png')}}">
	<img class="mb-3" src="{{asset('image/promotion3.png')}}">
	</div>
	
</div>

<!-- end Content -->


@include('components.footer')

@endsection