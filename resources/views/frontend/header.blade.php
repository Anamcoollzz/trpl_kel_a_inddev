{{-- @php
	$_pengaturan = \App\Pengaturan
	@endphp --}}
	<header class="header">

		<!-- Top Bar -->

		<div class="top_bar">
			<div class="container">
				<div class="row">
					<div class="col d-flex flex-row">
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{asset('images/phone.png')}}" alt=""></div>{{\App\Pengaturan::where('key','no_telp')->first()->value}}</div>
						@php
						$email = \App\Pengaturan::where('key','email')->first()->value;
						@endphp
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{asset('images/mail.png')}}" alt=""></div><a href="mailto:{{$email}}">{{$email}}</a></div>
						<div class="top_bar_content ml-auto">
							<div class="top_bar_menu">
								<!-- <ul class="standard_dropdown top_bar_dropdown"> -->
									<!-- <li>
										<a href="#">English<i class="fas fa-chevron-down"></i></a>
										<ul>
											<li><a href="#">Italian</a></li>
											<li><a href="#">Spanish</a></li>
											<li><a href="#">Japanese</a></li>
										</ul>
									</li> -->
									<!-- <li>
										<a href="#">$ US dollar<i class="fas fa-chevron-down"></i></a>
										<ul>
											<li><a href="#">EUR Euro</a></li>
											<li><a href="#">GBP British Pound</a></li>
											<li><a href="#">JPY Japanese Yen</a></li>
										</ul>
									</li> -->
									<!-- </ul> -->
									@auth
									<a style="color: black;" href="{{ route('notifikasi') }}">
										<i class="fas fa-bell"></i>
										<span>{{Auth::user()->notifikasi()->where('sudah_dibaca','belum')->count()}}</span>
									</a>
									@endauth
								</div>
								<div class="top_bar_user">
									<div class="user_icon"><img src="{{asset('images/user.svg')}}" alt=""></div>
									@if(Auth::check())
									@if(Auth::user()->role == 'member' || Auth::user()->role == 'klien')
									<div><a href="{{route('profil')}}">{{Auth::user()->nama}}</a></div>
									@else
									<div>{{Auth::user()->nama}}</div>
									@endif
									<div><a href="{{route('member-keluar')}}">Keluar</a></div>
									@else

									<div><a href="{{route('form-daftar')}}">Daftar</a></div>
									<div><a href="{{route('form-masuk')}}">Masuk</a></div>
									
									@endif
								</div>
							</div>
						</div>
					</div>
				</div>		
			</div>

			<!-- Header Main -->

			<div class="header_main">
				<div class="container">
					<div class="row">

						<!-- Logo -->
						<div class="col-lg-2 col-sm-3 col-3 order-1">
							<div class="logo_container">
								<div class="logo"><a href="{{url('')}}">IndDev</a></div>
							</div>
						</div>

						<!-- Search -->
						<div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
							<div class="header_search">
								<div class="header_search_content">
									<div class="header_search_form_container">
										<form action="{{route('produk.pencarian')}}" class="header_search_form clearfix">
											<input type="search" name="keyword" required="required" class="header_search_input" placeholder="Cari aplikasi ..." value="{{request()->query('keyword')}}">
											<div class="custom_dropdown">
												<div class="custom_dropdown_list">
													<span class="custom_dropdown_placeholder clc">Semua Kategori</span>
													<i class="fas fa-chevron-down"></i>
													<ul class="custom_list clc">
														<li><a class="clc" data-uri="semua" href="#">Semua Kategori</a></li>
														@foreach($_kategori as $k)
														<li><a class="clc" data-uri="{{$k->uri_routing}}" href="{{ $k->url }}">{{$k->nama}}</a></li>
														@endforeach
													</ul>
												</div>
											</div>
											<input type="hidden" name="kategori_search" value="semua">
											<button type="submit" class="header_search_button trans_300" value="Submit"><img src="{{asset('images/search.png')}}" alt=""></button>
										</form>
									</div>
								</div>
							</div>
						</div>

						@include('frontend.layouts.wishlist')
					</div>
				</div>
			</div>
			
			<!-- Main Navigation -->

			<nav class="main_nav">
				<div class="container">
					<div class="row">
						<div class="col">
							
							<div class="main_nav_content d-flex flex-row">

								<!-- Categories Menu -->

								<div class="cat_menu_container">
									<div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
										<div class="cat_burger"><span></span><span></span><span></span></div>
										<div class="cat_menu_text">kategori</div>
									</div>

									<ul class="cat_menu">
										@foreach($_kategori as $k)
										<li><a href="{{$k->url}}">{{$k->nama}}<i class="fas fa-chevron-right ml-auto"></i></a></li>
										@endforeach
									</ul>
								</div>

								<!-- Main Nav Menu -->

								<div class="main_nav_menu ml-auto">
									<ul class="standard_dropdown main_nav_dropdown">
										<li><a href="{{url('')}}">Home<i class="fas fa-chevron-down"></i></a></li>
										<li class="hassubs">
											<a href="#">Produk<i class="fas fa-chevron-down"></i></a>
											<ul>
												<li><a href="{{route('produk.terpopuler')}}">Terpopuler<i class="fas fa-chevron-down"></i></a></li>
												<li><a href="{{route('produk.terbaru')}}">Terbaru<i class="fas fa-chevron-down"></i></a></li>
												{{-- <li><a href="{{$d->}}">Gratis<i class="fas fa-chevron-down"></i></a></li> --}}
											</ul>
										</li>
										@auth
										@if(Auth::user()->role == 'member' || Auth::user()->role == 'klien')
										<li class="hassubs">
											<a href="#">Menu Saya<i class="fas fa-chevron-down"></i></a>
											<ul>
												@if(Auth::user()->role == 'member')
												<li>
													<a href="{{ route('produk.create') }}">
														Tambah Produk
														<i class="fas fa-chevron-down"></i>
													</a>
												</li>
												<li>
													<a href="{{ route('produk.saya') }}">
														Produk Saya
														<i class="fas fa-chevron-down"></i>
													</a>
												</li>
												@endif
												<li>
													<a href="{{ route('transaksi.index') }}">
														Transaksi Saya
														<i class="fas fa-chevron-down"></i>
													</a>
												</li>
												@if(Auth::user()->role == 'member')
												<li>
													<a href="{{ route('pencairan-saldo') }}">
														Pencairan Saldo
														<i class="fas fa-chevron-down"></i>
													</a>
												</li>
												@endif
												<li>
													<a href="{{ route('chat') }}">
														Chat
														<i class="fas fa-chevron-down"></i>
													</a>
												</li>
											</ul>
										</li>
										@endif
										@endauth
									</ul>
								</div>

								<!-- Menu Trigger -->

								<div class="menu_trigger_container ml-auto">
									<div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
										<div class="menu_burger">
											<div class="menu_trigger_text">menu</div>
											<div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</nav>
			
			<!-- Menu -->

			<div class="page_menu">
				<div class="container">
					<div class="row">
						<div class="col">
							
							<div class="page_menu_content">
								
								<div class="page_menu_search">
									<form action="#">
										<input type="search" required="required" class="page_menu_search_input" placeholder="Cari aplikasi ...">
									</form>
								</div>
								<ul class="page_menu_nav">
									<li class="page_menu_item has-children">
										<a href="#">Language<i class="fa fa-angle-down"></i></a>
										<ul class="page_menu_selection">
											<li><a href="#">English<i class="fa fa-angle-down"></i></a></li>
											<li><a href="#">Italian<i class="fa fa-angle-down"></i></a></li>
											<li><a href="#">Spanish<i class="fa fa-angle-down"></i></a></li>
											<li><a href="#">Japanese<i class="fa fa-angle-down"></i></a></li>
										</ul>
									</li>
									<li class="page_menu_item has-children">
										<a href="#">Currency<i class="fa fa-angle-down"></i></a>
										<ul class="page_menu_selection">
											<li><a href="#">US Dollar<i class="fa fa-angle-down"></i></a></li>
											<li><a href="#">EUR Euro<i class="fa fa-angle-down"></i></a></li>
											<li><a href="#">GBP British Pound<i class="fa fa-angle-down"></i></a></li>
											<li><a href="#">JPY Japanese Yen<i class="fa fa-angle-down"></i></a></li>
										</ul>
									</li>
									<li class="page_menu_item">
										<a href="#">Home<i class="fa fa-angle-down"></i></a>
									</li>
									<li class="page_menu_item has-children">
										<a href="#">Super Deals<i class="fa fa-angle-down"></i></a>
										<ul class="page_menu_selection">
											<li><a href="#">Super Deals<i class="fa fa-angle-down"></i></a></li>
											<li class="page_menu_item has-children">
												<a href="#">Menu Item<i class="fa fa-angle-down"></i></a>
												<ul class="page_menu_selection">
													<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
													<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
													<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
													<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
												</ul>
											</li>
											<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
											<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
											<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
										</ul>
									</li>
									<li class="page_menu_item has-children">
										<a href="#">Featured Brands<i class="fa fa-angle-down"></i></a>
										<ul class="page_menu_selection">
											<li><a href="#">Featured Brands<i class="fa fa-angle-down"></i></a></li>
											<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
											<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
											<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
										</ul>
									</li>
									<li class="page_menu_item has-children">
										<a href="#">Trending Styles<i class="fa fa-angle-down"></i></a>
										<ul class="page_menu_selection">
											<li><a href="#">Trending Styles<i class="fa fa-angle-down"></i></a></li>
											<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
											<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
											<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
										</ul>
									</li>
									<li class="page_menu_item"><a href="blog.html">blog<i class="fa fa-angle-down"></i></a></li>
									<li class="page_menu_item"><a href="contact.html">contact<i class="fa fa-angle-down"></i></a></li>
								</ul>
								
								<div class="menu_contact">
									<div class="menu_contact_item"><div class="menu_contact_icon"><img src="{{asset('images/phone_white.png')}}" alt=""></div>+38 068 005 3570</div>
									<div class="menu_contact_item"><div class="menu_contact_icon"><img src="{{asset('images/mail_white.png')}}" alt=""></div><a href="mailto:fastsales@gmail.com">fastsales@gmail.com</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</header>