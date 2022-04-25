@extends('layouts.app')

@section('content')
@include('sweetalert::alert')
@include('components.navbar')
<!-- Header -->
<header id="header" class="header">
	<img class="decoration-star" src="{{asset('image/decoration-star.svg')}}" alt="alternative">
	<img class="decoration-star-2" src="{{asset('image/decoration-star.svg')}}" alt="alternative">
	<div class="container">
		<div class="row">
			<div class="col-lg-7 col-xl-5">
				<div class="text-container">
					<h1 class="h1-large">Beauty Care <br> Clinic</h1>
					<p class="p-large">คลินิกความงามครบวงจรพร้อมให้บริการคุณ โดยทีมแพทย์ผู้เชี่ยวชาญให้คำปรึกษาปัญหาทั้งด้านศัลยกรรม ผิวพรรณ ใบหน้าจนถึงรูปร่างด้วยประสบการณ์และความมุ่งมั่นทุ่มเทที่จะให้การดูแลแก่ทุกท่านในราคาที่คุณพอใจ
						เด่นในเรื่องดูดไขมันโดยใช้นวัตกรรม เทคโนโลยี กระบวนการใหม่ๆ ด้วยความปลอดภัยที่ได้ระดับมาตรฐานสากล รวมถึงผลิตภัณฑ์และยาที่ได้รับมาตรฐานจากองค์การอาหารและยา กระทรวงสาธารณสุข</p>
					<a class="btn-solid-lg" href="#introduction">More details</a>
					<a class="btn-outline-lg" href="#contact">Contact us</a>
				</div> <!-- end of text-container -->
			</div> <!-- end of col -->
			<div class="col-lg-5 col-xl-7">
				<div class="image-container">
					<img class="img-fluid" src="{{asset('image/uploads/doctor.png')}}" alt="alternative">
				</div> <!-- end of image-container -->
			</div> <!-- end of col -->
		</div> <!-- end of row -->
	</div> <!-- end of container -->
</header> <!-- end of header -->
<!-- end of header -->



<div class="slider-container">
	<div class="swiper mySwiper">
		<div class="swiper-wrapper">
			<div class="swiper-slide"><img src="{{asset('image/promotion/promotion.png')}}" alt=""></div>
			<div class="swiper-slide"><img src="{{asset('image/promotion/promotion3.png')}}" alt=""></div>
			<div class="swiper-slide"><img src="{{asset('image/promotion/promotion4.png')}}" alt=""></div>
		</div>
	</div>
</div>

<!-- Introduction -->
<div id="introduction" class="basic-1 bg-gray">
	<div class="container">
		<h2 class="text-center w-100">ทำไมต้องเลือก Beauty Care Clinic
			<hr>
		</h2>
		<div class="row justify-content-center text-center ">
			<div class="custom-box col-12 col-md-6 col-lg-4 mt-3 mt-md-4 m-3" style="width: 18rem;">
				<i class="fa-solid fa-user-doctor mb-3" style="width: 50;height: 50;"></i>
				<h4>แพทย์เป็นเจ้าของเอง</h4>
				<p style="color: rgb(129, 129, 129);">Beauty Care Clinic คลินิกศัลยกรรมความงามครบวงจร ก่อตั้งโดย นพ. ฟาร์มสุดหล่อ เป็นแพทย์ประจำคลินิกและเจ้าของคลินิก ดูแลและให้คำปรึกษาเองทุกเคส</p>
			</div>
			<div class="custom-box col-12 col-md-6 col-lg-4 mt-3 mt-md-4 m-3" style="width: 18rem;">
				<i class="fa-solid fa-stethoscope mb-3" style="width: 50;height: 50;"></i>
				<h4>คุณหมอมีความเชี่ยวชาญ</h4>
				<p style="color: rgb(129, 129, 129);">ด้วยประสบการณ์ของคุณหมอที่จบเฉพาะทางด้านศัลยกรรมทั้งในและต่างประเทศ จึงมีความเชี่ยวชาญในการดูแลผิว ปรับรูปหน้า ศัลยกรรม แก้จุดบกพร่องบนใบหน้า ดูดไขมัน</p>
			</div>
			<div class="custom-box col-12 col-md-6 col-lg-4 mt-3 mt-md-4 m-3" style="width: 18rem;">
				<i class="fa-solid fa-hospital mb-3" style="width: 50;height: 50;"></i>
				<h4>คลินิกได้มาตรฐาน</h4>
				<p style="color: rgb(129, 129, 129);">Dr. Chen Clinic คลินิกศัลยกรรมความงามครบวงจร เน้นความสะอาด ปลอดภัย ใช้เครื่องมือและเทคโนโลยีที่ทันสมัย ผ่านการรับรองจากสาธารณสุข ได้มาตรฐานสากล</p>
			</div>
		</div>
	</div> <!-- end of container -->
</div> <!-- end of basic-1 -->
<!-- end of introduction -->


<!-- Details 1 -->
<!-- <div id="details" class="basic-2">
	<img class="decoration-star" src="{{asset('image/decoration-star.svg')}}" alt="alternative">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-xl-5">
				<div class="image-container">
					<img class="img-fluid" src="https://technext.github.io/yavin/images/details-1.png" alt="alternative">
				</div> 
			</div> 
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
				</div>
			</div> 
		</div>
	</div> 
</div>  -->
<!-- end of details 1 -->


<!-- Services -->
<!-- <div id="services" class="cards-1 bg-gray">
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
				</div>
			</div> 
			<div class="col-lg-7">
				<div class="card-container">

					
					<div class="card">
						<div class="card-icon">
							<span class="fas fa-rocket"></span>
						</div>
						<div class="card-body">
							<h5 class="card-title">Space analysis and planning</h5>
						</div>
					</div>
				

					
					<div class="card">
						<div class="card-icon">
							<span class="far fa-clock"></span>
						</div>
						<div class="card-body">
							<h5 class="card-title">Design and color choosing</h5>
						</div>
					</div>
					

				
					<div class="card">
						<div class="card-icon">
							<span class="far fa-comments"></span>
						</div>
						<div class="card-body">
							<h5 class="card-title">Materials and delivery</h5>
						</div>
					</div>
					

					
					<div class="card">
						<div class="card-icon">
							<span class="fas fa-tools"></span>
						</div>
						<div class="card-body">
							<h5 class="card-title">Execute the concept</h5>
						</div>
					</div>
					

					
					<div class="card">
						<div class="card-icon">
							<span class="fas fa-chart-pie"></span>
						</div>
						<div class="card-body">
							<h5 class="card-title">Creating great atmosphere</h5>
						</div>
					</div>
					

					
					<div class="card">
						<div class="card-icon">
							<span class="far fa-chart-bar"></span>
						</div>
						<div class="card-body">
							<h5 class="card-title">Evaluation and reporting</h5>
						</div>
					</div>
				

				</div>
			</div> 
		</div> 
	</div> 
</div>  -->



<!-- Details 2 -->
<!-- <div class="basic-3">
	<img class="decoration-star" src="{{asset('image/decoration-star.svg')}}" alt="alternative">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-xl-7">
				<div class="text-container">
					<h2>A beautiful and well organized office space increases productivity</h2>
					<p>On it differed repeated wandered required in. Then girl neat why yet knew rose spot. Moreover property we he kindness greatest be oh striking laughter. In me he at collecting affronting principles apartments. Has visitor law attacks pretend you calling own excited painted. Contented attending</p>
					<a class="btn-solid-reg" href="article.html">Get started</a>
				</div> 
			</div> 
			<div class="col-lg-6 col-xl-5">
				<div class="image-container">
					<img class="img-fluid" src="https://technext.github.io/yavin/images/details-2.png" alt="alternative">
				</div> 
			</div> 
		</div> 
	</div> 
</div>  -->
<!-- end of details 2 -->


<!-- Invitation -->
<!-- <div class="basic-4 bg-gray">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h4>Our team of highly skilled designers and interior construction workers can deliver above your level of expections</h4>
				<a class="btn-solid-lg" href="#contact">Get quote</a>
			</div>
		</div>
	</div>
</div> -->
<!-- end of invitation -->


<!-- Projects -->
<div id="projects" class="cards-2">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="h2-heading">Services
					<hr>
				</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">

				<div class="card">
					<img class="img-fluid" src="https://image.makewebeasy.net/makeweb/m_750x0/2GFvGZndG/DefaultData/IMG_7690.jpg?v=202012190947" alt="alternative">
					<div class="card-body">
						<h4 class="card-title text-center">เสริมจมูก</h4>
						<p class="card-text">ทำจมูก หรือการศัลยกรรมจมูก (Rhinoplasty) คือการผ่าตัดเปลี่ยนรูปร่างของจมูก โดยอาจมีจุดประสงค์เพื่อปรับรูปร่างลักษณะของจมูกใหม่</p>
					</div>
				</div>

				<div class="card">
					<img class="img-fluid" src="https://image.makewebeasy.net/makeweb/0/2GFvGZndG/DefaultData/117906534_xl.jpg?v=202012190947" alt="alternative">
					<div class="card-body">
						<h4 class="card-title text-center">ตาสองขั้น</h4>
						<p class="card-text">ดวงตาเป็นหน้าต่างของหัวใจ เพราะฉะนั้น เราควรดูแลเป็นอย่างดี อีกทั้งยังเป็นจุดที่มีเสน่ห์แล้วชวนให้หลงใหลได้อีกด้วย ควรมีตาสองชั้นที่มีลักษณะดีตามตำราโหงวเฮ้ง</p>
					</div>
				</div>

				<div class="card">
					<img class="img-fluid" src="https://image.makewebeasy.net/makeweb/0/2GFvGZndG/DefaultData/114922804_xl.jpg?v=202012190947" alt="alternative">
					<div class="card-body">
						<h4 class="card-title text-center">เสริมคาง</h4>
						<p class="card-text">ทำไมเราถึงต้องเสริมคาง บางคนตอบว่าอยากได้หน้าหวานขึ้น อยากได้หน้าวีเชฟมากขึ้น อยากได้โหงวเฮ้งรับทรัพย์ อยากให้หายคางบุ๋ม ตัด หรือสั้น ล้วนเป็นคำตอบส่วนใหญ่</p>
					</div>
				</div>

				<div class="card">
					<img class="img-fluid" src="https://image.makewebeasy.net/makeweb/m_750x0/51KrHvmMb/DefaultData/iStock_1159699813.jpg?v=202012190947" alt="alternative">
					<div class="card-body">
						<h5 class="card-title text-center">เลเซอร์รักษาสิว</h5>
						<p class="card-text">Vent new at or happiness commanded daughters as is handsome an <a class="blue no-line" href="article.html">...Read more</a></p>
					</div>
				</div>

				<div class="card">
					<img class="img-fluid" src="https://image.makewebeasy.net/makeweb/0/2GFvGZndG/DefaultData/iStock_1147978235.jpg?v=202012190947" alt="alternative">
					<div class="card-body">
						<h4 class="card-title text-center">VITAMIN ผิว</h4>
						<p class="card-text">ไม่ว่าจะยุคสมัยไหน “การฉีดผิว”ก็เป็นอะไรที่ขาดไม่ได้ ไม่ว่าจะเป็นการฉีดผิวให้ดูขาว กระจ่างใสขึ้น หรือว่าจะฉีดวิตามินบำรุงสุขภาพทั่วไป ซึ่งยังเป็นที่นิยมและได้รับความสนใจจากสาวๆ</p>
					</div>
				</div>



				<div class="card">
					<img class="img-fluid" src="https://image.makewebeasy.net/makeweb/m_750x0/2GFvGZndG/DefaultData/IMG_7689.jpg?v=202012190947" alt="alternative">
					<div class="card-body">
						<h4 class="card-title text-center">MESO THERAPHY หน้าใส</h4>
						<p class="card-text">“เมโสหน้าใส หรือ Mesotherapy” คือ การให้สารอาหารและวิตามินต่างๆในการช่วยบำรุงหน้า ด้วยวิธีการที่เร่งรัดและเห็นผลที่รวดเร็วกว่าการทาครีม รวมถึงแก้ปัญหาต่างๆของผิวหน้า โดยจะลงลึกได้มากกว่าการทาครีมทั่วไป</p>
					</div>
				</div>


			</div>
		</div>
	</div>
</div>
<!-- end of projects -->


<!-- Testimonials -->
<!-- <div class="slider-1 bg-gray">
	<img class="quotes-decoration" src="{{asset('image/quotes.svg')}}" alt="alternative">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="slider-container">
					<div class="swiper-container card-slider">
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								<img class="testimonial-image" src="https://technext.github.io/yavin/images/testimonial-1.jpg" alt="alternative">
								<p class="testimonial-text">“Expense bed any sister depend changer off piqued one. Contented continued any happiness instantly objection yet her allowance. Use correct day new brought tedious. By come this been in. Kept easy or sons my it how about some words here done”</p>
								<div class="testimonial-author">Marlene Visconte</div>
								<div class="testimonial-position">General Manager - Scouter</div>
							</div>
							<div class="swiper-slide">
								<img class="testimonial-image" src="https://technext.github.io/yavin/images/testimonial-2.jpg" alt="alternative">
								<p class="testimonial-text">“Expense bed any sister depend changer off piqued one. Contented continued any happiness instantly objection yet her allowance. Use correct day new brought tedious. By come this been in. Kept easy or sons my it how about some words here done”</p>
								<div class="testimonial-author">John Spiker</div>
								<div class="testimonial-position">Team Leader - Vanquish</div>
							</div>
							<div class="swiper-slide">
								<img class="testimonial-image" src="https://technext.github.io/yavin/images/testimonial-3.jpg" alt="alternative">
								<p class="testimonial-text">“Expense bed any sister depend changer off piqued one. Contented continued any happiness instantly objection yet her allowance. Use correct day new brought tedious. By come this been in. Kept easy or sons my it how about some words here done”</p>
								<div class="testimonial-author">Stella Virtuoso</div>
								<div class="testimonial-position">Design Chief - Bikegirl</div>
							</div>
						</div>
						<div class="swiper-button-next"></div>
						<div class="swiper-button-prev"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> -->
<!-- end of testimonials -->


<div class="basic-1 bg-gray">
	<div class="container">
		<h2 class="text-center w-100">Blog
			<hr>
		</h2>
		
			<div class="row blog justify-content-center">
				
					<div class="card m-3" style="width: 18rem;">
						<a href="#!"><img src="https://via.placeholder.com/400x300" class="card-img-top" alt="..."></a>
						<div class="card-body">
							<h5 class="card-text">อยากหน้าใสต้องทำเลเซอร์ หรือฉีด Meso หน้าใสดี?</h5>
							<p class="card-text">ในปัจจุบันมีเทคโนโลยีมากมายที่จะช่วยกู้ใบหน้าหมองคล้ำจากการที่สีผิวไม่สม่ำเสมอ หรือมีรอยดำจากสิว ให้กลับมาสวยใส วิธีที่ได้รับความนิยมกันอย่างมากก็คือการทำเลเซอร์และการฉีด Meso หน้าใส เนื่องจากเป็นวิธีที่เห็นผลลัพธ์เร็ว ทั้งยังปลอดภัย ไม่ต้องผ่าตัด ไม่ต้องพักฟื้น...</p>
						</div>
					</div>
					<div class="card m-3" style="width: 18rem;">
						<a href="#!"><img src="https://via.placeholder.com/400x300" class="card-img-top" alt="..."></a>
						<div class="card-body">
							<h5 class="card-text">รู้จัก 5 ประเภท “เลเซอร์สิว” ที่เหมาะกับการกำจัดรอยสิวที่ดีที่สุด</h5>
							<p class="card-text">รอยแผลเป็นจากสิวเป็นเรื่องปกติที่สามารถเกิดขึ้นได้กับทุกคน และมักจะก่อให้เกิดปัญหาด้านความงามตามมา ซึ่งในปัจจุบันก็มีตัวเลือกในการรักษารอยดำและรอยแผลเป็นจากสิวมากมาย ไม่ว่าจะเป็นการกรอผิว การลอกหน้าผลัดเซลล์ผิว หรือการทำฟิลเลอร์...</p>
						</div>
					</div>
					<div class="card m-3" style="width: 18rem;">
						<a href="#!"><img src="https://via.placeholder.com/400x300" class="card-img-top" alt="..."></a>
						<div class="card-body">
							<h5 class="card-text">4 ปัญหากวนใจยอดฮิตที่ต้องพึ่ง Clinic เสริมความงาม</h5>
							รวม 4 อันดับปัญหาแก้ไขยาก พร้อมวิธีรับมือ ยิ่งอายุเข้าใกล้เลข 3 ปัญหาสุขภาพก็ยิ่งเข้ามากวนใจเรามากขึ้น ทั้งปัญหาบนใบหน้า และหนังศีรษะ KeTHAT Clinic เสริมความงาม จึงขอแชร์ 4 ปัญหาควรระวังเพื่อไม่ให้ปัญหากวนใจแบบนี้เกิดขึ้น พร้อมเคล็ดลับการแก้ไขปัญหาในจุดต่าง ๆ...
						</div>
					</div>
				
			</div>
			
		<a href="#!"><p class="text-center">อ่านเพิ่มเติม</p></a>

	</div>
</div>




<!-- Contact -->
<div id="contact" class="form-1">
	<img class="decoration-star" src="{{asset('image/decoration-star.svg')}}" alt="alternative">
	<img class="decoration-star-2" src="{{asset('image/decoration-star.svg')}}" alt="alternative">
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

<script src="{{ asset('js/swiper.min.js') }}"></script>

<script>
	var swiper = new Swiper(".mySwiper", {
		pagination: {
			el: ".swiper-pagination",
			dynamicBullets: true,
		},
	});
</script>

@include('components.footer')

@endsection