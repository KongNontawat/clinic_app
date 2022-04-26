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

	<div class="row blog justify-content-center">

		<div class="card m-3" style="width: 18rem;">
			<a href="#!"><img src="https://via.placeholder.com/400x300" class="card-img-top" alt="..."></a>
			<div class="card-body">
				<h5 class="card-text">รีวิว IV Drip ฉีดวิตามิน</h5>
				<p class="card-text">
					...พี่พยาบาลก็จะเข้ามาเสียบสายน้ำเกลือให้ แล้วก็เริ่มให้วิตามินกันเลย ระหว่างนี้ก็นั่งชิวๆ เล่นโทรศัพท์มือถือได้
					ไม่ได้มีอาการอะไรค่ะ ซึ่งใช้เวลาประมาณ 20 นาทีก็เสร็จ...</p>
			</div>
			<a href="#!">
				<p class="text-center">อ่านเพิ่มเติม</p>
			</a>
		</div>
		<div class="card m-3" style="width: 18rem;">
			<a href="#!"><img src="https://via.placeholder.com/400x300" class="card-img-top" alt="..."></a>
			<div class="card-body">
				<h5 class="card-text">รีวิว กำจัดริ้วรอยด้วยเลเซอร์
				</h5>
				<p class="card-text">"...อายุเพิ่มมากขึ้น ปัญหาริ้วรอยก็ตามมาค่ะ การทาครีมบำรุงผิวอย่างเดียวอาจไม่สามารถช่วยแก้ไขปัญหาผิวได้
					เราก็เลยอยากลองทำ HIFU ดูค่ะ..."</p>
			</div>
			<a href="#!">
				<p class="text-center">อ่านเพิ่มเติม</p>
			</a>
		</div>
		<div class="card m-3" style="width: 18rem;">
			<a href="#!"><img src="https://via.placeholder.com/400x300" class="card-img-top" alt="..."></a>
			<div class="card-body">
				<h5 class="card-text">รีวิว MESO THERAPHY หน้าใส จาก ...</h5>
				..บรรยากาศที่คลินิก สะอาดดีค่ะ มีจุดนั่งพักรับรอง พี่พนักงานก็น่ารัก ใจดี เป็นกันเอง โดยรวมแล้วก็ไม่ได้มีอะไรน่าผิดหวังเลย...
			</div>
			<a href="#!">
				<p class="text-center">อ่านเพิ่มเติม</p>
			</a>
		</div>

	</div>
</div>
</div>
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