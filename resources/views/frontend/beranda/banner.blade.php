<!-- Banner -->

<div class="banner_2">
	<div class="banner_2_background" style="background-image:url(images/banner_2_background.jpg)"></div>
	<div class="banner_2_container">
		<div class="banner_2_dots"></div>
		<!-- Banner 2 Slider -->

		<div class="owl-carousel owl-theme banner_2_slider">
@foreach($banner as $d)
			<!-- Banner 2 Slider Item -->
			<div class="owl-item">
				<div class="banner_2_item">
					<div class="container fill_height">
						<div class="row fill_height">
							<div class="col-lg-4 col-md-6 fill_height">
								<div class="banner_2_content">
									<div class="banner_2_category">{{$d->produk->kategori->nama}}</div>
									<div class="banner_2_title">{{$d->produk->nama}}</div>
									<div class="banner_2_text">{{$d->deskripsi}}</div>
									{{-- <div class="rating_r rating_r_4 banner_2_rating"><i></i><i></i><i></i><i></i><i></i></div> --}}
									<div class="button banner_2_button">
										<a href="{{route('produk.show',$d->produk->id)}}">Lihat</a>
									</div>
								</div>

							</div>
							<div class="col-lg-8 col-md-6 fill_height">
								<div class="banner_2_image_container">
									<div class="banner_2_image"><img src="images/banner_2_product.png" alt=""></div>
								</div>
							</div>
						</div>
					</div>			
				</div>
			</div>
@endforeach
		</div>
	</div>
</div>