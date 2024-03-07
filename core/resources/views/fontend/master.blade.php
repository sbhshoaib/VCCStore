<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>

	<title>{{$pt}} - {{$gnl->subtitle}} </title>





	
	<meta charset="utf-8" />

	<meta name="csrf-token" content="{{ csrf_token() }}">
	

	<meta name="viewport" content="width=device-width, initial-scale=1" />


	<meta name="description" content="CardVCC Signup" />
	<meta name="keywords" content="card, vcc, cardvcc"/>
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="CardVCC Signup" />
	<meta property="og:url" content="" />
	<meta property="og:site_name" content="" />
	<link rel="canonical" href="" />




    <link rel="icon" type="image/png" sizes="16x16" href="{{ env('APP_URL') }}/assets/images/logo/icon.png">

	<!--begin::Fonts(mandatory for all pages)-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
	<!--end::Fonts-->
	<!--begin::Vendor Stylesheets(used for this page only)-->
	<link href="{{ env('APP_URL') }}/assets2/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
	<link href="{{ env('APP_URL') }}/assets2/plugins/custom/vis-timeline/vis-timeline.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Vendor Stylesheets-->
	<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
	<link href="{{ env('APP_URL') }}/assets2/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="{{ env('APP_URL') }}/assets2/css/style.bundle.css" rel="stylesheet" type="text/css" />


	@yield('css')
	<!--end::Global Stylesheets Bundle-->







	<style>
.bottom-mobile-bar {
	position: fixed;
    bottom: 0;
    width: 100%;
    left: 0;
    right: 0;
	z-index: 100;
}
.nav__item-icon i {
	color:#2574fc;
}
.mobile-menu {
	display: none!important;
}
[data-bs-theme=dark] {
	.nav-box {
  display: flex;
  padding: 6px;
  background-color: #2B2B40;
  box-shadow: 0px 0px 16px 0px #4444;
  border-radius: 8px 8px 0px 0px;

}

span.nav__item-text {
	color:#fff;
}

}
.nav-box {
  display: flex;
  padding: 6px;
  background-color: #fff;
  box-shadow: 0px 0px 16px 0px #4444;
  border-radius: 8px 8px 0px 0px;
}
.nav-container-bottom {
  display: flex;
  width: 100%;
  list-style: none;
  justify-content: space-around;
}
.nav__item {
  display: flex;
  position: relative;
  padding: 2px;
  
}
.nav__item.active .nav__item-icon {
	margin-top: -18px;
  box-shadow: 0px 0px 16px 0px #4444;
}
.nav__item.active .nav__item-text {
  transform: scale(1);
}
.nav__item-link {
  display: flex;
  flex-direction: column;
  align-items: center;
  color: #2f3046;
  text-decoration: none;
}
.nav__item-icon {
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.6em;
  background-color: #ebf3ff;

  border-radius: 50%;
  height: 40px;
    width: 40px;
  transition: margin-top 250ms ease-in-out, box-shadow 250ms ease-in-out;
}
.nav__item-text {
  position: absolute;
  bottom: 0;
  transform: scale(0);
  transition: transform 250ms ease-in-out;
}
</style>


<style>
	.bottom-mobile-bar {
	display: none!important;
}


.des-hide{
	display: none!important;
}



	@media (max-width: 991.98px){

		span.menu-link {
    display: none!important;
}

.mob-hide{
	display: none!important;
}

.mob-show{
	display: block!important;
}


.mobile-menu {
	display: block!important;
}


[data-kt-app-header-fixed-mobile=true] .app-header {
    z-index: 10000;
    transition: none;
    position: fixed;
    left: 0;
    right: 0;
    top: 0;


}
.bottom-mobile-bar {
	display: none!important;
}
/*
.d-flex.align-items-center.d-lg-none.ms-n2.me-2 {
    display: none!important;
}
*/
}
</style>


	<script>
		// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }
	</script>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_app_body" data-kt-app-header-fixed-mobile="true" data-kt-app-toolbar-enabled="true" class="app-default">



	<!--begin::Theme mode setup on page load-->
	<script>
		var defaultThemeMode = "light";
		var themeMode;
		if (document.documentElement) {
			if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
				themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
			} else {
				if (localStorage.getItem("data-bs-theme") !== null) {
					themeMode = localStorage.getItem("data-bs-theme");
				} else {
					themeMode = defaultThemeMode;
				}
			}
			if (themeMode === "system") {
				themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
			}
			document.documentElement.setAttribute("data-bs-theme", themeMode);
		}
	</script>
	<!--end::Theme mode setup on page load-->







	<div class="position-fixed top-10 end-0 p-3" style="z-index: 1000;top: 24px;">
    @if(session('success'))
    <div class="toast show alert-success" style="max-width: 50%;
    right: 12px;
    position: fixed;" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="true"
        data-delay="5000">
        <div class="toast-header alert-success ">

            <strong class="me-auto">Notification</strong>
            <small></small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            {{ session('success') }}
        </div>
    </div>
    @endif


    @if(session('error'))
    <div class="toast show alert-danger" style="max-width: 50%;
    right: 12px;
    position: fixed;" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="true"
        data-delay="5000">
        <div class="toast-header alert-danger ">

            <strong class="me-auto">Notification</strong>
            <small></small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            {{ session('error') }}
        </div>
    </div>
    @endif
</div>


<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get the toast element
    var toast = document.querySelector('.toast');

    // Function to hide the toast
    function hideToast() {
        toast.style.display = 'none';
    }

    // Set a timeout to hide the toast after 5 seconds
    setTimeout(hideToast, 3000);
});
</script>





	<!--begin::App-->
	<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
		<!--begin::Page-->
		<div class="app-page flex-column flex-column-fluid" id="kt_app_page">
			<!--begin::Header-->
			<div id="kt_app_header" class="app-header" data-kt-sticky="true" data-kt-sticky-activate="{default: false, lg: true}" data-kt-sticky-name="app-header-sticky" data-kt-sticky-offset="{default: false, lg: '300px'}">
				<!--begin::Header container-->
				<div class="app-container container-xxl d-flex align-items-stretch justify-content-between" id="kt_app_header_container">
					<!--begin::Header mobile toggle-->
					<div class="d-flex align-items-center d-lg-none ms-n2 me-2" title="Show sidebar menu">
						<div  style="background: #2575f9;" class="btn btn-icon btn-active-color-primary w-35px h-35px" id="kt_app_header_menu_toggle">
							<i class="ki-outline ki-abstract-14 fs-2"></i>
						</div>
					</div>
					<!--end::Header mobile toggle-->
					<!--begin::Logo-->
					<div class="d-flex align-items-center flex-grow-1 flex-lg-grow-1 me-lg-13">
						<a href="{{url('home')}}">
							<img alt="Logo" src="{{asset('assets/images/')}}/logo/logo.png" class="h-30px h-lg-30px theme-light-show" />
							<img alt="Logo" src="{{asset('assets/images/')}}/logo/logo.png" class="h-30px h-lg-30px theme-dark-show" />
						</a>
					</div>
					<!--end::Logo-->
					<!--begin::Header wrapper-->
					<div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1" id="kt_app_header_wrapper">
						<!--begin::Menu wrapper-->




























						<style>



@media (min-width: 992px){
.app-header-menu .menu>.menu-item>.menu-link {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width: 88px;
    height: 60px;
}




.app-header-menu .menu>.menu-item>.menu-link .menu-icon>i {
    font-size: 20px;
}


.app-header-menu .menu>.menu-item>.menu-link .menu-title {
    flex-grow: 0;
    font-size: 12px;
    font-weight: 600;
}

.menu-icon{
	margin: auto!important;
    display: block!important;
}

span.menu-link.border.border-gray-300.border-dashed.rounded:hover {
    transition: background 0.5s ease; 
    background: #f1f1f1dd;
}


}
</style>



@php
    use Illuminate\Support\Str;
@endphp






						<div class="d-flex align-items-stretch" id="kt_app_header_menu_wrapper">
							<div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_menu_wrapper'}" style="">
							
							
							
							<!--begin::Menu-->
									<div class="menu menu-rounded menu-column menu-lg-row menu-active-bg menu-title-gray-600 menu-state-dark menu-arrow-gray-400 fw-semibold fw-semibold fs-6 align-items-stretch my-5 my-lg-0 px-2 px-lg-0" id="#kt_app_header_menu" data-kt-menu="true">
										<!--begin:Menu item-->
										<div onclick="window.location.href='{{url('home')}}'"  class="menu-item @if(request()->is('home')) here @endif menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
											<!--begin:Menu link-->
											
											<span class="menu-link @if(!request()->is('home')) border border-gray-300 border-dashed rounded  @endif "><a href="{{url('home')}}">
												<span class="menu-icon">
													<i class="fs-1 @if(!request()->is('home')) text-dark @endif ki-duotone ki-home"></i>
													</span>
													<span class="menu-title">Home</span>
													<span class="menu-arrow d-lg-none"></span>
												</span>
											</a>
											<!--end:Menu link-->
										

													<div class="mobile-menu row" >
														<!--begin:Col-->
														<div class="col-lg-8 mb-3 mb-lg-0 py-3 px-3 py-lg-6 px-lg-6">
															<!--begin:Row-->
															<div class="row">
																<!--begin:Col-->
																<div class="col-lg-6 mb-3">
																	<!--begin:Menu item-->
																	<div class="menu-item p-0 m-0">
																		<!--begin:Menu link-->
																		<a href="{{url('home')}}" class="menu-link @if(request()->is('home')) active @endif">
																			<span class="menu-custom-icon d-flex flex-center flex-shrink-0 rounded w-40px h-40px me-3">
																				<i class="ki-outline ki-home text-primary fs-1"></i>
																			</span>
																			<span class="d-flex flex-column">
																				<span class="fs-6 fw-bold text-gray-800">Home</span>
																				<span class="fs-7 fw-semibold text-muted">Your Dashboard</span>
																			</span>
																		</a>
																		<!--end:Menu link-->
																	</div>
																	<!--end:Menu item-->
																</div>
																<!--end:Col-->
																<!--begin:Col-->
																<div class="col-lg-6 mb-3">
																	<!--begin:Menu item-->
																	<div class="menu-item p-0 m-0">
																		<!--begin:Menu link-->
																		<a href="{{url('home/cardlist')}}" class="menu-link @if(request()->is('home/cardlist') || request()->is('home/add_card')) active @endif ">
																			<span class="menu-custom-icon d-flex flex-center flex-shrink-0 rounded w-40px h-40px me-3">
																				<i class="ki-outline ki-two-credit-cart text-danger fs-1"></i>
																			</span>
																			<span class="d-flex flex-column">
																				<span class="fs-6 fw-bold text-gray-800">Cards</span>
																				<span class="fs-7 fw-semibold text-muted">View and manage your cards</span>
																			</span>
																		</a>
																		<!--end:Menu link-->
																	</div>
																	<!--end:Menu item-->
																</div>
																<!--end:Col-->
																<!--begin:Col-->
																<div class="col-lg-6 mb-3">
																	<!--begin:Menu item-->
																	<div class="menu-item p-0 m-0">
																		<!--begin:Menu link-->
																		<a href="{{url('home/deposit')}}" class="menu-link @if(request()->is('home/deposit')) active @endif">
																			<span class="menu-custom-icon d-flex flex-center flex-shrink-0 rounded w-40px h-40px me-3">
																				<i class="ki-outline ki-dollar text-info fs-1"></i>
																			</span>
																			<span class="d-flex flex-column">
																				<span class="fs-6 fw-bold text-gray-800">Deposit</span>
																				<span class="fs-7 fw-semibold text-muted">Deposit money to your wallet</span>
																			</span>
																		</a>
																		<!--end:Menu link-->
																	</div>
																	<!--end:Menu item-->
																</div>
																<!--end:Col-->
																<!--begin:Col-->
																<div class="col-lg-6 mb-3">
																	<!--begin:Menu item-->
																	<div class="menu-item p-0 m-0">
																		<!--begin:Menu link-->
																		<a href="{{url('home/transaction')}}" class="menu-link @if(request()->is('home/transaction')) active @endif">
																			<span class="menu-custom-icon d-flex flex-center flex-shrink-0 rounded w-40px h-40px me-3">
																				<i class="ki-outline ki-arrow-right-left text-success fs-1"></i>
																			</span>
																			<span class="d-flex flex-column">
																				<span class="fs-6 fw-bold text-gray-800">Transactions</span>
																				<span class="fs-7 fw-semibold text-muted">View account transactions</span>
																			</span>
																		</a>
																		<!--end:Menu link-->
																	</div>
																	<!--end:Menu item-->
																</div>
																<!--end:Col-->

															</div>
														</div>
													</div>
										


										</div>
										<!--end:Menu item-->
									
								




									<!--begin:Menu item-->
									
										<div onclick="window.location.href='{{url('home/cardlist')}}'" class="menu-item @if(request()->is('home/cardlist') || request()->is('home/add_card') ) here @endif menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
									
											<!--begin:Menu link-->
											<span class="menu-link @if(!request()->is('home/cardlist') && !request()->is('home/add_card')) border border-gray-300 border-dashed rounded  @endif ">
											<a href="{{url('home/cardlist')}}">
												<span class="menu-icon">
												<i class="fs-1 @if(!request()->is('home/cardlist') && !request()->is('home/add_card')) text-dark @endif ki-duotone ki-two-credit-cart">
														<span class="path1"></span>
														<span class="path2"></span>
														<span class="path3"></span>
														<span class="path4"></span>
														<span class="path5"></span>
												</i>
												</span>
												<span class="menu-title">Cards</span>
													
												</a>
											</span>
											<!--end:Menu link-->

										</div>
										<!--end:Menu item-->
										



										<!--begin:Menu item-->
																		
										<div onclick="window.location.href='{{url('home/deposit')}}'" class="menu-item @if(request()->is('home/deposit')) here @endif menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
																		
									<!--begin:Menu link-->
									<span class="menu-link  @if(!request()->is('home/deposit')) border border-gray-300 border-dashed rounded  @endif  ">
									<a href="{{url('home/deposit')}}">
										<span class="menu-icon">
										<i class="fs-1 @if(!request()->is('home/deposit')) text-dark @endif ki-duotone ki-dollar">
											<span class="path1"></span>
											<span class="path2"></span>
											<span class="path3"></span>
										</i>
										</span>
										<span class="menu-title">Deposit</span>
										<span class="menu-arrow d-lg-none"></span>
										</a>
									</span>
									<!--end:Menu link-->

								</div>
								<!--end:Menu item-->
								


	<!--begin:Menu item-->
									
								<div onclick="window.location.href='{{url('home/transaction')}}'" class="menu-item @if(request()->is('home/transaction')) here @endif  menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
									
									<!--begin:Menu link-->
									<span class="menu-link @if(!request()->is('home/transaction')) border border-gray-300 border-dashed rounded  @endif  ">
									<a href="{{url('home/transaction')}}">
										<span class="menu-icon">
										<i class="fs-1 @if(!request()->is('home/transaction')) text-dark @endif ki-duotone ki-arrow-right-left">
												<span class="path1"></span>
												<span class="path2"></span>
										</i>
										</span>
										<span class="menu-title">Transactions</span>
										<span class="menu-arrow d-lg-none"></span>
										</a>
									</span>
									<!--end:Menu link-->

								</div>
								<!--end:Menu item-->
								






									</div>
									<!--end::Menu-->
								</div>
								<!--begin::Menu holder-->
								<!--end::Menu holder-->
							</div>
















































































					
						<!--end::Menu wrapper-->



						<!--begin::Navbar-->
						<div class="app-navbar flex-shrink-0">
							<!--begin::User menu-->
							<div class="app-navbar-item" id="kt_header_user_menu_toggle">
								<!--begin::Menu wrapper-->
								<div class="d-flex align-items-center border border-dashed border-gray-300 rounded p-2" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
									<!--begin::User-->
									<div class="cursor-pointer symbol me-3 symbol-35px symbol-lg-45px">

									@if(Auth::user()->image==NULL)
										<img alt="user_image" src="{{ env('APP_URL') }}/assets2/media/avatars/avater.png" alt="user" />
									@else
									<img alt="user_image" src="{{Auth::user()->image}}" alt="user" />
									@endif
									</div>
									<!--end::User-->
									<!--begin:Info-->
									<div class="me-4">
										<a href="#" class="text-dark text-hover-primary fs-6 fw-bold">{{ implode(' ', array_slice(str_word_count(Auth::user()->name, 1), 0, 2)) }}</a>
										<a href="#" class="text-gray-400 text-hover-primary fs-7 fw-bold d-block">{{Auth::user()->username}}</a>
									</div>
									<!--end:Info-->
									<i class="ki-outline ki-down fs-2 text-gray-500 pt-1"></i>
								</div>






								<!--begin::User account menu-->
								<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">


									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<div class="menu-content d-flex align-items-center px-3">
											<!--begin::Avatar-->
											<div class="symbol symbol-50px me-5">
											@if(Auth::user()->image==NULL)
										<img alt="user_image" class="" src="{{ env('APP_URL') }}/assets2/media/avatars/avater.png" alt="user" />
									@else
									<img alt="user_image" class="" src="{{Auth::user()->image}}" alt="user" />
									@endif


											
											</div>
											<!--end::Avatar-->
											<!--begin::Username-->
											<div class="d-flex flex-column">
												<div class="fw-bold d-flex align-items-center fs-5">{{Auth::user()->name}}
													<span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2"></span>
												</div>
												<a href="#" class="fw-semibold text-muted text-hover-primary fs-7">{{'@'.Auth::user()->username}}</a>
											</div>
											<!--end::Username-->
										</div>
									</div>
									<!--end::Menu item-->



									<!--begin::Menu separator-->
									<div class="separator my-2"></div>
									<!--end::Menu separator-->

									<!--begin::Menu item-->
									<div class="menu-item px-5">
										<a href="#" class="menu-link px-5">My
											Balance: {{$gnl->cursym}}{{Auth::user()->balance}}</a>
									</div>
									<!--end::Menu item-->

									<!--begin::Menu item-->
									<div class="menu-item px-5">
										<a href="{{ env('APP_URL') }}/home/profile" class="menu-link px-5">My
											Profile</a>
									</div>
									<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="menu-item px-5">
										<a href="{{ env('APP_URL') }}/home/referral" class="menu-link px-5">Referral</a>
									</div>
									<!--end::Menu item-->



									<div class="separator my-2"></div>
									<!--end::Menu separator-->
									<!--begin::Menu item-->
									<div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
										<a href="#" class="menu-link px-5">
											<span class="menu-title position-relative">Mode
												<span class="ms-5 position-absolute translate-middle-y top-50 end-0">
													<i class="ki-outline ki-night-day theme-light-show fs-2"></i>
													<i class="ki-outline ki-moon theme-dark-show fs-2"></i>
												</span></span>
										</a>
										<!--begin::Menu-->
										<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px" data-kt-menu="true" data-kt-element="theme-mode-menu">
											<!--begin::Menu item-->
											<div class="menu-item px-3 my-0">
												<a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
													<span class="menu-icon" data-kt-element="icon">
														<i class="ki-outline ki-night-day fs-2"></i>
													</span>
													<span class="menu-title">Light</span>
												</a>
											</div>
											<!--end::Menu item-->



											<!--begin::Menu item-->
											<div class="menu-item px-3 my-0">
												<a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
													<span class="menu-icon" data-kt-element="icon">
														<i class="ki-outline ki-moon fs-2"></i>
													</span>
													<span class="menu-title">Dark</span>
												</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-3 my-0">
												<a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
													<span class="menu-icon" data-kt-element="icon">
														<i class="ki-outline ki-screen fs-2"></i>
													</span>
													<span class="menu-title">System</span>
												</a>
											</div>
											<!--end::Menu item-->
										</div>
										<!--end::Menu-->
									</div>
									<!--end::Menu item-->

									<!--begin::Menu item-->
									<div class="menu-item px-5 my-1">
										<a href="{{ env('APP_URL') }}/home/deposit" class="menu-link px-5">Deposit</a>
									</div>
									<!--end::Menu item-->


									<!--begin::Menu item-->
									<div class="menu-item px-5 my-1">
										<a href="{{ env('APP_URL') }}/home/withdraw" class="menu-link px-5">Withdraw</a>
									</div>
									<!--end::Menu item-->


									<!--begin::Menu item
									<div class="menu-item px-5 my-1">
										<a href="{{ env('APP_URL') }}/home/account" class="menu-link px-5">Account
											Settings</a>
									</div>
									<!--end::Menu item-->



									<div class="menu-item px-5">
										<a class="menu-link px-5" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Sign
											Out</a>
										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											@csrf
										</form>

									</div>

								</div>
								<!--end::User account menu-->
								<!--end::Menu wrapper-->
							</div>
							<!--end::User menu-->
							<!--begin::Sidebar menu toggle-->
							<!--end::Sidebar menu toggle-->
						</div>
						<!--end::Navbar-->
					</div>
					<!--end::Header wrapper-->
				</div>
				<!--end::Header container-->
			</div>
			<!--end::Header-->




			@yield('content')


			<hr>
			<!--begin::Footer-->
			<div id="kt_app_footer" class="app-footer d-flex flex-column flex-md-row flex-center flex-md-stack pb-3">
				<!--begin::Copyright-->
				<div class="text-dark order-2 order-md-1">
					<span class="text-muted fw-semibold me-1">{{date('Y')}}&copy;</span>
					<a href="{{url('')}}"  class="text-gray-800 text-hover-primary">{{$gnl->title}}</a>
				</div>
				<!--end::Copyright-->
				<!--begin::Menu-->
				<ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
					<li class="menu-item">
						<a href="{{route('privacy')}}"  class="menu-link px-2">Privacy Policy</a>
					</li>
					<li class="menu-item">
						<a href="{{route('rrp')}}"  class="menu-link px-2">Refund and return policy</a>
					</li>
					<li class="menu-item">
						<a href="{{route('contact')}}" class="menu-link px-2">Contact us</a>
					</li>
				</ul>
				<!--end::Menu-->
			</div>
			<!--end::Footer-->
		</div>
		<!--end:::Main-->
	</div>
	<!--end::Wrapper container-->
	</div>
	<!--end::Wrapper-->

	</div>
	<!--end::Page-->
	</div>
	<!--end::App-->
	<!--begin::Drawers-->



	<!--end::Drawers-->
	<!--begin::Scrolltop-->
	<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
		<i class="ki-outline ki-arrow-up"></i>
	</div>
	<!--end::Scrolltop-->















<!-- partial:index.partial.html -->
<nav class="bottom-mobile-bar">
  <div class="nav-box">
    <ul class="nav-container-bottom" style="margin-bottom: 0px;    padding-left: 0px;">
	
	
      <li class="nav__item @if(request()->is('home')) active @endif ">
        <a href="{{url('home')}}" class="nav__item-link">
          <div class="nav__item-icon">
		  <i class="fs-1 ki-duotone ki-home"></i>
          </div>
          <span class="nav__item-text">Home</span>
        </a>
      </li>
	  

	  
	  
	  
      <li class="nav__item @if(request()->is('home/cardlist') || request()->is('home/add_card')) active @endif">
        <a href="{{url('home/cardlist')}}" class="nav__item-link">
          <div class="nav__item-icon">
		  <i class="fs-1 ki-duotone ki-two-credit-cart">
														<span class="path1"></span>
														<span class="path2"></span>
														<span class="path3"></span>
														<span class="path4"></span>
														<span class="path5"></span>
												</i>
          </div>
          <span class="nav__item-text">Cards</span>
        </a>
      </li>



      <li class="nav__item @if(request()->is('home/deposit')) active @endif">
        <a href="{{url('home/deposit')}}" class="nav__item-link">
          <div class="nav__item-icon">
									   <i class="fs-1 ki-duotone ki-dollar">
											<span class="path1"></span>
											<span class="path2"></span>
											<span class="path3"></span>
										</i>
          </div>
          <span class="nav__item-text">Deposit</span>
        </a>
      </li>





      <li class="nav__item @if(request()->is('home/transaction')) active @endif">
        <a href="{{url('home/transaction')}}" class="nav__item-link">
          <div class="nav__item-icon">
		 								 <i class="fs-1 ki-duotone ki-arrow-right-left">
												<span class="path1"></span>
												<span class="path2"></span>
										</i>
          </div>
          <span class="nav__item-text">Transaction</span>
        </a>
      </li>
    </ul>
  </div>
</nav>

<script>

const list = document.querySelectorAll(".nav__item");
list.forEach((item) => {
  item.addEventListener("click", () => {
    list.forEach((item) => item.classList.remove("active"));
    item.classList.add("active");
  });
});
</script>














	<!--begin::Javascript-->
	<script>
		var hostUrl = "{{ env('APP_URL') }}/assets2/";
	</script>
	<!--begin::Global Javascript Bundle(mandatory for all pages)-->
	<script src="{{ env('APP_URL') }}/assets2/plugins/global/plugins.bundle.js"></script>
	<script src="{{ env('APP_URL') }}/assets2/js/scripts.bundle.js"></script>
	<!--end::Global Javascript Bundle-->
	<!--begin::Vendors Javascript(used for this page only)-->
	<script src="{{ env('APP_URL') }}/assets2/plugins/custom/datatables/datatables.bundle.js"></script>
	<script src="{{ env('APP_URL') }}/assets2/plugins/custom/vis-timeline/vis-timeline.bundle.js"></script>
	<!--end::Vendors Javascript-->
	<!--begin::Custom Javascript(used for this page only)-->
	<script src="{{ env('APP_URL') }}/assets2/js/custom/pages/user-profile/general.js"></script>
	<script src="{{ env('APP_URL') }}/assets2/js/widgets.bundle.js"></script>
	<script src="{{ env('APP_URL') }}/assets2/js/custom/widgets.js"></script>
	<script src="{{ env('APP_URL') }}/assets2/js/custom/apps/chat/chat.js"></script>
	<script src="{{ env('APP_URL') }}/assets2/js/custom/utilities/modals/users-search.js"></script>
	<script src="{{ env('APP_URL') }}/assets2/js/custom/utilities/modals/create-app.js"></script>
		<script src="{{ env('APP_URL') }}/assets2/js/custom/utilities/modals/users-search.js"></script>

	<!--end::Custom Javascript-->


	<script>
    // Assuming toastEl is the reference to your toast element
var toastEl = document.querySelector('.toast');

// Hide the toast after 5 seconds (5000 milliseconds)
setTimeout(function() {
    var toast = new bootstrap.Toast(toastEl); // Assuming you're using Bootstrap
    toast.hide();
}, 50000); // Adjust the time delay as needed

</script>
	@yield('js')

	<!--end::Javascript-->
</body>
<!--end::Body-->

</html>