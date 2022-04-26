@extends('layouts.app')

@section('content')
@include('sweetalert::alert')
@include('components.navbar')
<!-- Header -->
<header id="header" class="header">
	<img class="decoration-star" src="https://technext.github.io/yavin/images/decoration-star.svg" alt="alternative">
	<img class="decoration-star-2" src="https://technext.github.io/yavin/images/decoration-star.svg" alt="alternative">
	<div class="container">
		<h1 class="text-center">Review</h1>
	</div>
</header>
<!-- Content -->
<div class="container mt-5 mb-5">
	<p><a href="{{ route('home') }}">Home</a>/Review</p>

	<!-- <div class="d-flex justify-content-center">
		<div class="btn-group" role="group" aria-label="Basic example">
			<button type="button" class="btn btn-primary">Left</button>
			<button type="button" class="btn btn-primary">Middle</button>
			<button type="button" class="btn btn-primary">Right</button>
		</div>
	</div> -->

	<div class="col-md-4">
		
	</div>

</div>

<!-- end Content -->


<!-- Contact -->
<!-- <div id="contact" class="form-1">
	<img class="decoration-star" src="https://technext.github.io/yavin/images/decoration-star.svg" alt="alternative">
	<img class="decoration-star-2" src="https://technext.github.io/yavin/images/decoration-star.svg" alt="alternative">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<iframe style="width: 100%;height: 100%;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15305.631260529384!2d102.83998044999998!3d16.454875199999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31228ba19cfbee99%3A0x42a47dfb6ec74154!2z4Lij4LmJ4Liy4LiZ4LiV4LmJ4Lit4LiH4LmE4LiC4LmI4LmE4LiB4LmI!5e0!3m2!1sth!2sth!4v1648290525243!5m2!1sth!2sth" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
			<div class="col-lg-6">
				<img src="https://via.placeholder.com/900x400" style="width: 100%;" alt="">
			</div>
		</div>
	</div>
</div> -->

@include('components.footer')

@endsection