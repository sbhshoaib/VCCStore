
<!DOCTYPE html>

<html lang="en">
	<!--begin::Head-->
	<head>
		<title>{{$pt}} - {{$gnl->subtitle}} </title>
		<meta charset="utf-8" />
		
		<meta name="viewport" content="width=device-width, initial-scale=1" />
	
	
        {!!$metatag!!}

	


		<link rel="icon" type="image/png" sizes="16x16" href="{{ env('APP_URL') }}/assets/images/logo/icon.png">
		<!--begin::Fonts(mandatory for all pages)-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
		<link href="{{ env('APP_URL') }}/assets2/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="{{ env('APP_URL') }}/assets2/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
		
		
		<style>

@media (max-width: 991.98px){

	.minw-100{
				min-width: 100%;
			} none!important;

  }
			
		</style>
		
		
		<script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }</script>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="app-blank">
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->




		

	<div class="position-fixed top-10 end-0 p-3" style="z-index: 1000;top: 24px;">
    @if(session('success'))
    <div class="toast show alert-success" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="true"
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
    <div class="toast show alert-danger" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="true"
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

        @yield('content')


		<!--begin::Javascript-->
		<script>var hostUrl = "{{ env('APP_URL') }}/assets2/";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="{{ env('APP_URL') }}/assets2/plugins/global/plugins.bundle.js"></script>
		<script src="{{ env('APP_URL') }}/assets2/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Custom Javascript(used for this page only)-->
		<script src="{{ env('APP_URL') }}/assets2/js/custom/authentication/sign-in/general.js"></script>
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>