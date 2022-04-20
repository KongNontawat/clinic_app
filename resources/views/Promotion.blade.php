@extends('layouts.app')

@section('content')
@include('sweetalert::alert')
@include('components.navbar')
<!-- Header -->
<header id="header" class="header">
	<img class="decoration-star" src="https://technext.github.io/yavin/images/decoration-star.svg" alt="alternative">
	<img class="decoration-star-2" src="https://technext.github.io/yavin/images/decoration-star.svg" alt="alternative">
	<div class="container">
		<h1 class="text-center">Promotion</h1>
	</div>
</header>
<!-- Content -->
<div class="container-fluid mb-5">
	<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
		<div class="carousel-indicators">
			<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
			<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
			<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
		</div>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="{{asset('image/banner1.jpg')}}" class="d-block w-100" alt="...">
			</div>
			<div class="carousel-item">
				<img src="{{asset('image/banner2.jpg')}}" class="d-block w-100" alt="...">
			</div>
			<div class="carousel-item">
				<img src="{{asset('image/banner3.jpg')}}" class="d-block w-100" alt="...">
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
	</div>
</div>

<!-- end Content -->


@include('components.footer')

@endsection