<!-- Product Panel -->
<div class="product_panel panel @isset($active) active @endisset">
	<div class="featured_slider slider">
		@foreach($data as $d)
		<!-- Slider Item -->
		<div class="featured_slider_item">
			<div class="border_active"></div>
			<div class="product_item d-flex flex-column align-items-center justify-content-center text-center">
				<div class="product_image d-flex flex-column align-items-center justify-content-center">
					<img src="{{$d->logo}}" alt="{{$d->nama}}">
				</div>
				<div class="product_content">
					<div class="product_price">{{$d->harga}}</div>
					<div class="product_name">
						<div>
							<a href="product.html">{{$d->nama}}</a>
						</div>
					</div>
					<div class="product_extras">
						<button class="product_cart_button" style="border-radius: 0;">Lihat</button>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
	<div class="featured_slider_dots_cover"></div>
</div>