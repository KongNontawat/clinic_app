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
				<img src="https://via.placeholder.com/60x20 " class="d-block w-100" alt="...">
				<div class="carousel-caption d-none d-md-block">
					<h5>First slide label</h5>
					<p>Some representative placeholder content for the first slide.</p>
				</div>
			</div>
			<div class="carousel-item">
				<img src="https://via.placeholder.com/60x20 " class="d-block w-100" alt="...">
				<div class="carousel-caption d-none d-md-block">
					<h5>Second slide label</h5>
					<p>Some representative placeholder content for the second slide.</p>
				</div>
			</div>
			<div class="carousel-item">
				<img src="https://via.placeholder.com/60x20 " class="d-block w-100" alt="...">
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
	<!-- Content -->

	<div class="container">
		<div class="content">
			<img class="rounded mt-5 mx-auto d-block mb-5" src="https://via.placeholder.com/200x200" alt="">
			<h1 class="text-center mb-3">BEYOND BEAUTY AND CONFIDENCE</h1>
			<p><i class="fa-solid fa-caret-right me-2"></i> เราใช้ยาที่ผ่านการรับรองความปลอดภัยจากองค์การอาหารและยาเท่านั้น คุณสามารถขอดูกล่องยา ขวดยา เพื่อตรวจสอบความถูกต้องได้เสมอ</p>
			<p><i class="fa-solid fa-caret-right me-2"></i> เครื่องมือ และอุปกรณ์ทุกชนิดทันสมัย อัพเกรดภายใน 2 ปี</p>
			<p><i class="fa-solid fa-caret-right me-2"></i> ทุกบริการ ให้คำปรึกษา และทำการรักษาโดยทีมแพทย์ที่มีประสบการณ์</p>
			<p><i class="fa-solid fa-caret-right me-2"></i> ราคาสมเหตุสมผล และโปร่งใส ราคาที่คุณจ่ายจริงจะถูกนำเสนอ ก่อนการรักษาทุกครั้ง</p>
		</div>
	</div>


	<!-- end Content -->


	<!-- Introduction -->
	<div id="introduction" class="basic-1 bg-gray mt-5">
		<div class="container">
			<h2 class="text-center">Services</h2>
		</div>
	</div>

	<!-- services -->
	<div class="container">
		<div class="row">
			<div class="col-6 ">
				<div class="services_column mt-5">
					<img class="rounded mx-auto d-block mb-5" src="https://via.placeholder.com/400x200" alt="">
					<h3 class="text-center">FILLER</h3>
					<p class="p-4">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Libero accusantium labore, ipsum quis quas laborum non reprehenderit culpa! Neque, aliquid nostrum mollitia asperiores vitae ratione doloribus facilis fugiat deleniti error velit! Aspernatur laborum commodi, reprehenderit fuga in nam inventore, quidem ut recusandae sunt exercitationem officiis quaerat provident numquam? Perferendis, minima.</p>
				</div>
			</div>
			<div class="col-6 ">
				<div class="services_column mt-5">
					<img class="rounded mx-auto d-block mb-5" src="https://via.placeholder.com/400x200" alt="">
					<h3 class="text-center">BODY FAT</h3>
					<p class="p-4">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Libero accusantium labore, ipsum quis quas laborum non reprehenderit culpa! Neque, aliquid nostrum mollitia asperiores vitae ratione doloribus facilis fugiat deleniti error velit! Aspernatur laborum commodi, reprehenderit fuga in nam inventore, quidem ut recusandae sunt exercitationem officiis quaerat provident numquam? Perferendis, minima.</p>
				</div>
			</div>
			<div class="col-6 ">
				<div class="services_column mt-5">
					<img class="rounded mx-auto d-block mb-5" src="https://via.placeholder.com/400x200" alt="">
					<h3 class="text-center">BOTOX</h3>
					<p class="p-4">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Libero accusantium labore, ipsum quis quas laborum non reprehenderit culpa! Neque, aliquid nostrum mollitia asperiores vitae ratione doloribus facilis fugiat deleniti error velit! Aspernatur laborum commodi, reprehenderit fuga in nam inventore, quidem ut recusandae sunt exercitationem officiis quaerat provident numquam? Perferendis, minima.</p>
				</div>
			</div>
			
			<div class="col-6 ">
				<div class="services_column mt-5">
					<img class="rounded mx-auto d-block mb-5" src="https://via.placeholder.com/400x200" alt="">
					<h3 class="text-center">FILLER</h3>
					<p class="p-4">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Libero accusantium labore, ipsum quis quas laborum non reprehenderit culpa! Neque, aliquid nostrum mollitia asperiores vitae ratione doloribus facilis fugiat deleniti error velit! Aspernatur laborum commodi, reprehenderit fuga in nam inventore, quidem ut recusandae sunt exercitationem officiis quaerat provident numquam? Perferendis, minima.</p>
				</div>
			</div>
			<div class="col-6 ">
				<div class="services_column mt-5">
					<img class="rounded mx-auto d-block mb-5" src="https://via.placeholder.com/400x200" alt="">
					<h3 class="text-center">FILLER</h3>
					<p class="p-4">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Libero accusantium labore, ipsum quis quas laborum non reprehenderit culpa! Neque, aliquid nostrum mollitia asperiores vitae ratione doloribus facilis fugiat deleniti error velit! Aspernatur laborum commodi, reprehenderit fuga in nam inventore, quidem ut recusandae sunt exercitationem officiis quaerat provident numquam? Perferendis, minima.</p>
				</div>
			</div>
			<div class="col-6 ">
				<div class="services_column mt-5">
					<img class="rounded mx-auto d-block mb-5" src="https://via.placeholder.com/400x200" alt="">
					<h3 class="text-center">FILLER</h3>
					<p class="p-4">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Libero accusantium labore, ipsum quis quas laborum non reprehenderit culpa! Neque, aliquid nostrum mollitia asperiores vitae ratione doloribus facilis fugiat deleniti error velit! Aspernatur laborum commodi, reprehenderit fuga in nam inventore, quidem ut recusandae sunt exercitationem officiis quaerat provident numquam? Perferendis, minima.</p>
				</div>
			</div>
		</div>
	</div>

	<!-- Details 1 -->
	<div id="details" class="basic-2">
		<img class="decoration-star" src="https://technext.github.io/yavin/images/decoration-star.svg" alt="alternative">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-xl-5">
					<div class="image-container">
						<img class="img-fluid" src="	https://technext.github.io/yavin/images/details-1.png" alt="alternative">
					</div> <!-- end of image-container -->
				</div> <!-- end of col -->
				<div class="col-lg-6 col-xl-7">
					<div class="text-container">
						<h2>Office spaces should be unique they don’t need to look the same</h2>
						<ul class="list-unstyled li-space-lg">
							<li class="d-flex">
								<i class="fas fa-square"></i>
								<div class="flex-grow-1">At every tiled on ye defer do. No attention suspected oh difficult. Fond his say</div>
							</li>
							<li class="d-flex">
								<i class="fas fa-square"></i>
								<div class="flex-grow-1">Old meet cold find come whom. The sir park sake bred. Wonder matter now</div>
							</li>
							<li class="d-flex">
								<i class="fas fa-square"></i>
								<div class="flex-grow-1">Can estate esteem assure fat roused. Am performed on existence as discourse</div>
							</li>
							<li class="d-flex">
								<i class="fas fa-square"></i>
								<div class="flex-grow-1">existence as discourse is. Pleasure friendly at marriage blessing or should</div>
							</li>
						</ul>
						<a class="btn-solid-reg" href="article.html">Get started</a>
					</div> <!-- end of text-container -->
				</div> <!-- end of col -->
			</div> <!-- end of row -->
		</div> <!-- end of container -->
	</div> <!-- end of basic-2 -->
	<!-- end of details 1 -->


	<!-- Services -->
	<div id="services" class="cards-1 bg-gray">
		<div class="container">
			<div class="row">
				<div class="col-lg-5">
					<div class="text-container">
						<h2>Services that we offer</h2>
						<p>Greatly hearted has who believe. Drift allow green son walls years for blush. Sir margaret drawings repeated recurred exercise laughing may you</p>
						<p>Do repeated whatever to welcomed absolute no. Fat surprise although more words outlived</p>
						<ul class="list-unstyled li-space-lg">
							<li class="d-flex">
								<i class="fas fa-square"></i>
								<div class="flex-grow-1">And informed shy dissuade property. Musical by</div>
							</li>
							<li class="d-flex">
								<i class="fas fa-square"></i>
								<div class="flex-grow-1">He drawing savings an. No we stand avoid</div>
							</li>
							<li class="d-flex">
								<i class="fas fa-square"></i>
								<div class="flex-grow-1">Announcing of invita mrore wo tion principle</div>
							</li>
						</ul>
					</div> <!-- end of text-container -->
				</div> <!-- end of col -->
				<div class="col-lg-7">
					<div class="card-container">

						<!-- Card -->
						<div class="card">
							<div class="card-icon">
								<span class="fas fa-rocket"></span>
							</div>
							<div class="card-body">
								<h5 class="card-title">Space analysis and planning</h5>
							</div>
						</div>
						<!-- end of card -->

						<!-- Card -->
						<div class="card">
							<div class="card-icon">
								<span class="far fa-clock"></span>
							</div>
							<div class="card-body">
								<h5 class="card-title">Design and color choosing</h5>
							</div>
						</div>
						<!-- end of card -->

						<!-- Card -->
						<div class="card">
							<div class="card-icon">
								<span class="far fa-comments"></span>
							</div>
							<div class="card-body">
								<h5 class="card-title">Materials and delivery</h5>
							</div>
						</div>
						<!-- end of card -->

						<!-- Card -->
						<div class="card">
							<div class="card-icon">
								<span class="fas fa-tools"></span>
							</div>
							<div class="card-body">
								<h5 class="card-title">Execute the concept</h5>
							</div>
						</div>
						<!-- end of card -->

						<!-- Card -->
						<div class="card">
							<div class="card-icon">
								<span class="fas fa-chart-pie"></span>
							</div>
							<div class="card-body">
								<h5 class="card-title">Creating great atmosphere</h5>
							</div>
						</div>
						<!-- end of card -->

						<!-- Card -->
						<div class="card">
							<div class="card-icon">
								<span class="far fa-chart-bar"></span>
							</div>
							<div class="card-body">
								<h5 class="card-title">Evaluation and reporting</h5>
							</div>
						</div>
						<!-- end of card -->

					</div> <!-- end of container -->
				</div> <!-- end of col -->
			</div> <!-- end of row -->
		</div> <!-- end of container -->
	</div> <!-- end of cards-1 -->
	<!-- end of services -->


	<!-- Details 2 -->
	<div class="basic-3">
		<img class="decoration-star" src="https://technext.github.io/yavin/images/decoration-star.svg" alt="alternative">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-xl-7">
					<div class="text-container">
						<h2>A beautiful and well organized office space increases productivity</h2>
						<p>On it differed repeated wandered required in. Then girl neat why yet knew rose spot. Moreover property we he kindness greatest be oh striking laughter. In me he at collecting affronting principles apartments. Has visitor law attacks pretend you calling own excited painted. Contented attending</p>
						<a class="btn-solid-reg" href="article.html">Get started</a>
					</div> <!-- end of text-container -->
				</div> <!-- end of col -->
				<div class="col-lg-6 col-xl-5">
					<div class="image-container">
						<img class="img-fluid" src="https://technext.github.io/yavin/images/details-2.png" alt="alternative">
					</div> <!-- end of image-container -->
				</div> <!-- end of col -->
			</div> <!-- end of row -->
		</div> <!-- end of container -->
	</div> <!-- end of basic-3 -->
	<!-- end of details 2 -->


	<!-- Invitation -->
	<div class="basic-4 bg-gray">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h4>Our team of highly skilled designers and interior construction workers can deliver above your level of expections</h4>
					<a class="btn-solid-lg" href="#contact">Get quote</a>
				</div> <!-- end of col -->
			</div> <!-- end of row -->
		</div> <!-- end of container -->
	</div> <!-- end of basic-4 -->
	<!-- end of invitation -->


	<!-- Projects -->
	<div id="projects" class="cards-2">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="h2-heading">Projects we developed</h2>
				</div> <!-- end of col -->
			</div> <!-- end of row -->
			<div class="row">
				<div class="col-lg-12">

					<!-- Card -->
					<div class="card">
						<img class="img-fluid" src="https://technext.github.io/yavin/images/project-1.jpg" alt="alternative">
						<div class="card-body">
							<h5 class="card-title">Office space for banking</h5>
							<p class="card-text">Suffer should if waited common person little ans words are needed oh <a class="blue no-line" href="article.html">...Read more</a></p>
						</div>
					</div>
					<!-- end of card -->

					<!-- Card -->
					<div class="card">
						<img class="img-fluid" src="https://technext.github.io/yavin/images/project-2.jpg" alt="alternative">
						<div class="card-body">
							<h5 class="card-title">Planning and design for startup</h5>
							<p class="card-text">In to am attended desirous raptures declared diverted confined at collected <a class="blue no-line" href="article.html">...Read more</a></p>
						</div>
					</div>
					<!-- end of card -->

					<!-- Card -->
					<div class="card">
						<img class="img-fluid" src="https://technext.github.io/yavin/images/project-3.jpg" alt="alternative">
						<div class="card-body">
							<h5 class="card-title">Colors and materials update</h5>
							<p class="card-text">Instantly remaining up certainly to necessary as over walk dull into son <a class="blue no-line" href="article.html">...Read more</a></p>
						</div>
					</div>
					<!-- end of card -->

					<!-- Card -->
					<div class="card">
						<img class="img-fluid" src="https://technext.github.io/yavin/images/project-4.jpg" alt="alternative">
						<div class="card-body">
							<h5 class="card-title">Analysis and floor design</h5>
							<p class="card-text">Vent new at or happiness commanded daughters as is handsome an <a class="blue no-line" href="article.html">...Read more</a></p>
						</div>
					</div>
					<!-- end of card -->

					<!-- Card -->
					<div class="card">
						<img class="img-fluid" src="https://technext.github.io/yavin/images/project-5.jpg" alt="alternative">
						<div class="card-body">
							<h5 class="card-title">Office spaces decoration</h5>
							<p class="card-text">Vicinity subjects more words into miss on he over been late pain an only <a class="blue no-line" href="article.html">...Read more</a></p>
						</div>
					</div>
					<!-- end of card -->

					<!-- Card -->
					<div class="card">
						<img class="img-fluid" src="https://technext.github.io/yavin/images/project-6.jpg" alt="alternative">
						<div class="card-body">
							<h5 class="card-title">Playground for kinder garden</h5>
							<p class="card-text">Match round scale now sex style far times your me past and who now much <a class="blue no-line" href="article.html">...Read more</a></p>
						</div>
					</div>
					<!-- end of card -->

				</div> <!-- end of col -->
			</div> <!-- end of row -->
		</div> <!-- end of container -->
	</div> <!-- end of cards-2 -->
	<!-- end of projects -->


	<!-- Testimonials -->
	<div class="slider-1 bg-gray">
		<img class="quotes-decoration" src="https://technext.github.io/yavin/images/quotes.svg" alt="alternative">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">

					<!-- Card Slider -->
					<div class="slider-container">
						<div class="swiper-container card-slider">
							<div class="swiper-wrapper">

								<!-- Slide -->
								<div class="swiper-slide">
									<img class="testimonial-image" src="https://technext.github.io/yavin/images/testimonial-1.jpg" alt="alternative">
									<p class="testimonial-text">“Expense bed any sister depend changer off piqued one. Contented continued any happiness instantly objection yet her allowance. Use correct day new brought tedious. By come this been in. Kept easy or sons my it how about some words here done”</p>
									<div class="testimonial-author">Marlene Visconte</div>
									<div class="testimonial-position">General Manager - Scouter</div>
								</div> <!-- end of swiper-slide -->
								<!-- end of slide -->

								<!-- Slide -->
								<div class="swiper-slide">
									<img class="testimonial-image" src="https://technext.github.io/yavin/images/testimonial-2.jpg" alt="alternative">
									<p class="testimonial-text">“Expense bed any sister depend changer off piqued one. Contented continued any happiness instantly objection yet her allowance. Use correct day new brought tedious. By come this been in. Kept easy or sons my it how about some words here done”</p>
									<div class="testimonial-author">John Spiker</div>
									<div class="testimonial-position">Team Leader - Vanquish</div>
								</div> <!-- end of swiper-slide -->
								<!-- end of slide -->

								<!-- Slide -->
								<div class="swiper-slide">
									<img class="testimonial-image" src="https://technext.github.io/yavin/images/testimonial-3.jpg" alt="alternative">
									<p class="testimonial-text">“Expense bed any sister depend changer off piqued one. Contented continued any happiness instantly objection yet her allowance. Use correct day new brought tedious. By come this been in. Kept easy or sons my it how about some words here done”</p>
									<div class="testimonial-author">Stella Virtuoso</div>
									<div class="testimonial-position">Design Chief - Bikegirl</div>
								</div> <!-- end of swiper-slide -->
								<!-- end of slide -->

							</div> <!-- end of swiper-wrapper -->

							<!-- Add Arrows -->
							<div class="swiper-button-next"></div>
							<div class="swiper-button-prev"></div>
							<!-- end of add arrows -->

						</div> <!-- end of swiper-container -->
					</div> <!-- end of slider-container -->
					<!-- end of card slider -->

				</div> <!-- end of col -->
			</div> <!-- end of row -->
		</div> <!-- end of container -->
	</div> <!-- end of slider-1 -->
	<!-- end of testimonials -->


	<!-- Contact -->
	<div id="contact" class="form-1">
		<img class="decoration-star" src="https://technext.github.io/yavin/images/decoration-star.svg" alt="alternative">
		<img class="decoration-star-2" src="https://technext.github.io/yavin/images/decoration-star.svg" alt="alternative">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="image-container">
						<img class="img-fluid" src="https://technext.github.io/yavin/images/contact.png" alt="alternative">
					</div> <!-- end of image-container -->
				</div> <!-- end of col -->
				<div class="col-lg-6">
					<div class="text-container">
						<h2>Contact us for a quote using the following form</h2>

						<!-- Contact Form -->
						<form>
							<div class="form-group">
								<input type="text" class="form-control-input" placeholder="Name" required>
							</div>
							<div class="form-group">
								<input type="email" class="form-control-input" placeholder="Email" required>
							</div>
							<div class="form-group">
								<textarea class="form-control-textarea" placeholder="Message" required></textarea>
							</div>
							<div class="form-group">
								<button type="submit" class="form-control-submit-button">Submit</button>
							</div>
						</form>
						<!-- end of contact form -->
					</div> <!-- end of text-container -->
				</div> <!-- end of col -->
			</div> <!-- end of row -->
		</div> <!-- end of container -->
	</div> <!-- end of form-1 -->
	<!-- end of contact -->
	@include('components.footer')

	@endsection