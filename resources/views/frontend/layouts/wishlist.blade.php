<!-- Wishlist -->
<div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
	<div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
		<div class="wishlist d-flex flex-row align-items-center justify-content-end">
			<div class="wishlist_icon"><img src="{{asset('images/heart.png')}}" alt=""></div>
			<div class="wishlist_content">
				<div class="wishlist_text">
					<a href="{{ route('wishlist') }}">
						Diinginkan
					</a>
				</div>
				<div class="wishlist_count">
					@auth()
					{{Auth::user()->wishlist()->count()}}
					@else
					0
					@endauth
				</div>
			</div>
		</div>

		<!-- Cart -->
		<div class="cart">
			<div class="cart_container d-flex flex-row align-items-center justify-content-end">
				<div class="cart_icon">
					<img src="{{asset('images/cart.png')}}" alt="">
					<div class="cart_count">
						<span>
							@auth()
							{{Auth::user()->keranjang()->count()}}
							@else
							0
							@endauth
						</span>
					</div>
				</div>
				<div class="cart_content">
					<div class="cart_text">
						<a href="{{ route('keranjang') }}">Keranjang</a>
					</div>
					<div class="cart_price">
						@auth()
						{{rp(Auth::user()->keranjang()->with('produk')->get()->sum(function($item){
							return $item->produk->harga_jual;
						}))}}
						@else
						0
						@endauth
					</div>
				</div>
			</div>
		</div>
	</div>
</div>