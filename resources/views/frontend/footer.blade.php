<footer class="footer">
	<div class="container">
		<div class="row">

			<div class="col-lg-3 footer_col">
				<div class="footer_column footer_contact">
					<div class="logo_container">
						<div class="logo"><a href="#">{{config('app.name')}}</a></div>
					</div>
					<div class="footer_title">Ada pertanyaan? Hubungi kami 24/7</div>
					<div class="footer_phone">{{\App\Pengaturan::where('key','no_telp')->first()->value}}</div>
					<div class="footer_contact_text">
						{!!\App\Pengaturan::where('key','alamat')->first()->value!!}
					</div>
					<div class="footer_social">
						<ul>
							<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#"><i class="fab fa-youtube"></i></a></li>
							<li><a href="#"><i class="fab fa-google"></i></a></li>
							<li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="col-lg-2 offset-lg-2">
				<div class="footer_column">
					<div class="footer_title">Kategori</div>
					<ul class="footer_list">
						@foreach($_kategori as $k)
						<li><a href="{{ $k->url }}">{{$k->nama}}</a></li>
						@endforeach
					</ul>
				</div>
			</div>

			<div class="col-lg-2">
				<div class="footer_column">
					{{-- <div class="footer_title">Produk</div> --}}
					<ul class="footer_list footer_list_2">
						@foreach (\App\Produk::where('status','verified')->take(5)->inRandomOrder()->get() as $p)
						<li><a href="{{$p->url}}">{{$p->nama}}</a></li>
						@endforeach
					</ul>
				</div>
			</div>

			<div class="col-lg-2">
				<div class="footer_column">
					<div class="footer_title">Layanan Pelanggan</div>
					<ul class="footer_list">
						<li><a href="#">Menu</a></li>
						<li><a href="#">Menu</a></li>
						<li><a href="#">Menu</a></li>
						<li><a href="#">Menu</a></li>
						<li><a href="#">Menu</a></li>
						<li><a href="#">Menu</a></li>
						<li><a href="#">Menu</a></li>
					</ul>
				</div>
			</div>

		</div>
	</div>
</footer>

<div class="copyright">
	<div class="container">
		<div class="row">
			<div class="col">

				<div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
					<div class="copyright_content">
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
					</div>
					<div class="logos ml-sm-auto">
						<ul class="logos_list">
							<li><a href="#"><img src="{{asset('images/logos_1.png')}}" alt=""></a></li>
							<li><a href="#"><img src="{{asset('images/logos_2.png')}}" alt=""></a></li>
							<li><a href="#"><img src="{{asset('images/logos_3.png')}}" alt=""></a></li>
							<li><a href="#"><img src="{{asset('images/logos_4.png')}}" alt=""></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>