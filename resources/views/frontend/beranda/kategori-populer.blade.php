<!-- Popular Categories -->

<div class="popular_categories">
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<div class="popular_categories_content">
					<div class="popular_categories_title">Kategori Populer</div>
					<div class="popular_categories_slider_nav">
						<div class="popular_categories_prev popular_categories_nav"><i class="fas fa-angle-left ml-auto"></i></div>
						<div class="popular_categories_next popular_categories_nav"><i class="fas fa-angle-right ml-auto"></i></div>
					</div>
					<div class="popular_categories_link"><a href="#">full catalog</a></div>
				</div>
			</div>

			<!-- Popular Categories Slider -->

			<div class="col-lg-9">
				<div class="popular_categories_slider_container">
					<div class="owl-carousel owl-theme popular_categories_slider">
@foreach ($kategori as $d)
						<!-- Popular Categories Item -->
						<div class="owl-item">
							<div class="popular_category d-flex flex-column align-items-center justify-content-center">
								<div class="popular_category_image">
									<img src="{{$d->gambar}}" alt="{{$d->nama}}">
								</div>
								<div class="popular_category_text">{{$d->nama}}</div>
							</div>
						</div>

@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>