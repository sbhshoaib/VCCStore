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





        <form action="{{route('password.passchangereq')}}" method="post" ="form w-100 fv-plugins-bootstrap5 fv-plugins-framework">
							
        @csrf
        <!--begin::Heading-->
								<div class="text-center mb-10">
									<!--begin::Title-->
									<h1 class="text-dark fw-bolder mb-3">Setup New Password</h1>
									<!--end::Title-->
									<!--begin::Link-->
									<div class="text-gray-500 fw-semibold fs-6">Set a new password for your account.</div>
								
								</div>
								<!--begin::Heading-->
								<!--begin::Input group-->
								<div class="fv-row mb-8 fv-plugins-icon-container" data-kt-password-meter="true">
									<!--begin::Wrapper-->
									<div class="mb-1">
										<!--begin::Input wrapper-->
										<div class="position-relative mb-3">
											<input class="form-control bg-transparent" type="text" placeholder="Password" name="password" autocomplete="off">
											<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
												<i class="ki-outline ki-eye-slash fs-2 d-none"></i>
												<i class="ki-outline ki-eye fs-2"></i>
											</span>
										</div>
										<!--end::Input wrapper-->
										<!--begin::Meter-->
										<div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2 active"></div>
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
										</div>
										<!--end::Meter-->
									</div>
									<!--end::Wrapper-->
									<!--begin::Hint-->
									<div class="text-muted">Use 8 or more characters with a mix of letters, numbers &amp; symbols.</div>
									<!--end::Hint-->
								<div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
								<!--end::Input group=-->
								<!--end::Input group=-->
								<div class="fv-row mb-8 fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
									<!--begin::Repeat Password-->
									<input type="password" placeholder="Repeat Password" name="password_conf" autocomplete="off" class="form-control bg-transparent">
									<!--end::Repeat Password-->
							
                            </div>
								<!--end::Input group=-->

								<!--begin::Action-->
								<div class="d-grid mb-10">
									<button type="submit" id="kt_new_password_submit" class="btn btn-primary">
										<!--begin::Indicator label-->
										<span class="indicator-label">Submit</span>
										<!--end::Indicator label-->
										<!--begin::Indicator progress-->
										<span class="indicator-progress">Please wait...
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
										<!--end::Indicator progress-->
									</button>
								</div>
								<!--end::Action-->
							</form>





    
    </div>
    <!--end::Body-->



</div>
</div>
















@endsection