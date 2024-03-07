@extends('fontend.logmaster')
@section('css')

@endsection
@section('content')



<div class="d-flex flex-column flex-root" id="kt_app_root">

<div class="d-flex flex-column flex-lg-row flex-column-fluid">
 
@php
 $data = \App\Loginpage::first();
@endphp
    <!--begin::Aside-->
    <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2" style="/* background-image: url(http://localhost/cardmate/assets2/media/misc/auth-bg.png); */box-shadow: 0px 0px 5px 0px #2475f9;">
        <!--begin::Content-->
        <div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
            <!--begin::Logo-->
                      <a href="{{ env('BASE_URL') }}" class="mb-0 mb-lg-12">
                <img alt="Logo" src="{!!$data->logo!!}" class="h-60px h-lg-75px">
            </a>
            <!--end::Logo-->
            <!--begin::Image-->
            <img class="d-none d-lg-block mx-auto w-275px w-md-50 w-xl-500px mb-10 mb-lg-20" src="{!!$data->image!!}" alt="">
            <!--end::Image-->
         



{!!$data->content!!}


        </div>
        <!--end::Content-->
    </div>
    <!--end::Aside-->
    
   <!--begin::Body-->
   <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
        <!--begin::Form-->
        <div class="d-flex flex-center flex-column flex-lg-row-fluid">









        <div class="w-lg-500px p-10 minw-100">
							<!--begin::Form-->
							<form action="{{route('password.sendemailpost')}}" method="post" class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework"  id="kt_password_reset_form" >
							@csrf
                            <!--begin::Heading-->
								<div class="text-center mb-10">
									<!--begin::Title-->
									<h1 class="text-dark fw-bolder mb-3">Forgot Password ?</h1>
									<!--end::Title-->
									<!--begin::Link-->
									<div class="text-gray-500 fw-semibold fs-6">Enter your email to reset your password.</div>
									<!--end::Link-->
								</div>
								<!--begin::Heading-->
								<!--begin::Input group=-->
								<div class="fv-row mb-8 fv-plugins-icon-container">
									<!--begin::Email-->
									<input type="email" placeholder="Email" name="email" value="{{old('email')}}" autocomplete="off" class="form-control bg-transparent">
									<!--end::Email-->
								<div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
								<!--begin::Actions-->
								<div class="d-flex flex-wrap justify-content-center pb-lg-0">
									<button type="submit" id="kt_password_reset_submit" class="btn btn-primary me-4">
										<!--begin::Indicator label-->
										<span class="indicator-label">Submit</span>
										<!--end::Indicator label-->
										<!--begin::Indicator progress-->
										<span class="indicator-progress">Please wait...
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
										<!--end::Indicator progress-->
									</button>
									<a href="{{url('login')}}" class="btn btn-light">Go back</a>
								</div>
								<!--end::Actions-->
							</form>
							<!--end::Form-->
						</div>












        </div>
        <!--end::Form-->
    
    </div>
    <!--end::Body-->



</div>
</div>
















@endsection