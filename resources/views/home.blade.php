@extends('layouts.app')

@section('content')
@include('components.navbar')
<!-- Header -->
<header id="header" class="header">
	<img class="decoration-star" src="https://technext.github.io/yavin/images/decoration-star.svg" alt="alternative">
	<img class="decoration-star-2" src="https://technext.github.io/yavin/images/decoration-star.svg" alt="alternative">
	<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
		<div class="carousel-indicators">
			<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
			<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
			<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
		</div>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="https://via.placeholder.com/600x200 " class="d-block w-100" alt="...">
				<div class="carousel-caption d-none d-md-block">
					<h5>First slide label</h5>
					<p>Some representative placeholder content for the first slide.</p>
				</div>
			</div>
			<div class="carousel-item">
				<img src="https://via.placeholder.com/600x200 " class="d-block w-100" alt="...">
				<div class="carousel-caption d-none d-md-block">
					<h5>Second slide label</h5>
					<p>Some representative placeholder content for the second slide.</p>
				</div>
			</div>
			<div class="carousel-item">
				<img src="https://via.placeholder.com/600x200 " class="d-block w-100" alt="...">
				<div class="carousel-caption d-none d-md-block">
					<h5>Third slide label</h5>
					<p>Some representative placeholder content for the third slide.</p>
				</div>
			</div>
		</div>
		<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
		</button>
	</div>
</header>
<!-- Content -->





<div class="container">
	<div class="content">
		<img class="rounded mt-5 mx-auto d-block mb-5" src="{{asset('/image/Logo_Beauty_Care1.png')}}" alt="" style="width:200px;height:200px;">
		<div class="p-5">
			<h1 class=" text-center mb-3">BEYOND BEAUTY AND CONFIDENCE</h1>
			<p><i class="fa-solid fa-caret-right me-2"></i> เราใช้ยาที่ผ่านการรับรองความปลอดภัยจากองค์การอาหารและยาเท่านั้น คุณสามารถขอดูกล่องยา ขวดยา เพื่อตรวจสอบความถูกต้องได้เสมอ</p>
			<p><i class="fa-solid fa-caret-right me-2"></i> เครื่องมือ และอุปกรณ์ทุกชนิดทันสมัย อัพเกรดภายใน 2 ปี</p>
			<p><i class="fa-solid fa-caret-right me-2"></i> ทุกบริการ ให้คำปรึกษา และทำการรักษาโดยทีมแพทย์ที่มีประสบการณ์</p>
			<p><i class="fa-solid fa-caret-right me-2"></i> ราคาสมเหตุสมผล และโปร่งใส ราคาที่คุณจ่ายจริงจะถูกนำเสนอ ก่อนการรักษาทุกครั้ง</p>
		</div>
	</div>
</div>

<!-- end Content -->


<!-- Introduction -->
<div id="introduction" class="basic-1 bg-gray mt-5 mb-5">
	<div class="container">
		<h2 class="me-auto ms-auto text-center">Services</h2>
	</div>
</div>

<!-- services -->
<div class="container">
	<div class="carousel" data-flickity='{ "wrapAround": true,"autoPlay":true }'>
		<div class="carousel-cell">
			<img src="https://via.placeholder.com/900x400" alt="">
		</div>
		<div class="carousel-cell">
			<img src="https://via.placeholder.com/900x400" alt="">
		</div>
		<div class="carousel-cell">
			<img src="https://via.placeholder.com/900x400" alt="">
		</div>
		<div class="carousel-cell">
			<img src="https://via.placeholder.com/900x400" alt="">
		</div>
		<div class="carousel-cell">
			<img src="https://via.placeholder.com/900x400" alt="">
		</div>
	</div>

	<div style="text-align: center;">
		<a href="#!" class="btn btn-deactive mt-5">เรียนรู้เพิ่มเติม</a>
	</div>

</div>



<!-- review -->

<div id="introduction" class="basic-1 bg-gray mt-5 mb-5">
	<div class="container">
		<h2 class="me-auto ms-auto text-center">Review</h2>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="d-flex justify-content-center">
			<div class="col-3">
				<img class="rounded mx-auto d-block p-3 " src="https://via.placeholder.com/200x200" style="width: 100%;" alt="">
				<img class="rounded mx-auto d-block p-3" src="https://via.placeholder.com/200x200" style="width: 100%;" alt="">
			</div>
			<div class="col-3">
				<img class="rounded mx-auto d-block p-3 " src="https://via.placeholder.com/200x200" style="width: 100%;" alt="">
				<img class="rounded mx-auto d-block p-3" src="https://via.placeholder.com/200x200" style="width: 100%;" alt="">
			</div>
			<div class="col-6">
				<img class="rounded mx-auto d-block p-3" src="https://via.placeholder.com/200x200" style="width: 100%;" alt="">
			</div>
		</div>
	</div>
</div>

<div style="text-align: center;">
	<a href="#!" class="btn btn-deactive mt-5">ดูรีวิวทั้งหมด</a>
</div>



<!-- Blog -->

<div id="introduction" class="basic-1 bg-gray mt-5 mb-5">
	<div class="container">
		<h2 class="me-auto ms-auto text-center">Blog</h2>
	</div>
</div>

<div class="container mb-5">
	<div class="d-flex justify-content-center">
		<div class="row">
			<div class="col-4">
				<div class="card" style="width: 18rem;">
					<img src="https://via.placeholder.com/50x50" class="card-img-top" alt="...">
					<div class="card-body">
						<h5><a href="#!">การฉีดโบท็อกซ์สำหรับผู้ชาย สามารถทำได้หรือไม่ ? </a></h5>
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					</div>
				</div>
			</div>
			<div class="col-4">
				<div class="card" style="width: 18rem;">
					<img src="https://via.placeholder.com/50x50" class="card-img-top" alt="...">
					<div class="card-body">
						<h5><a href="#!"> อยากหน้าเรียวได้ดั่งใจ ต้องลอง Hifu ทางออกของคนอยากมีหน้า V Shape </a></h5>
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					</div>
				</div>
			</div>
			<div class="col-4">
				<div class="card" style="width: 18rem;">
					<img src="https://via.placeholder.com/50x50" class="card-img-top" alt="...">
					<div class="card-body">
						<h5><a href="#!"> ฟิลเลอร์ใต้ตา ตัวเลือกดีๆ ที่ช่วยลดปัญหารอยคล้ำใต้ตาได้อย่างเห็นผล ! </a></h5>
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div style="text-align: center;">
		<a href="#!" class="btn btn-deactive mt-5">อ่านบทความทั้งหมด</a>
	</div>

</div>




<!-- Contact -->
<div id="contact" class="form-1">
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
</div>

@include('components.footer')

@endsection