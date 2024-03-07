@extends('fontend.logmaster')
@section('css')

@endsection

@section('content')



<div class="d-flex flex-column flex-root" id="kt_app_root">
    <!--begin::Authentication - Sign-up -->
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
        <!--begin::Body-->
        <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
            <!--begin::Form-->
            <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                <!--begin::Wrapper-->
                <div class="w-lg-500px p-10 minw-100">



                    <!--begin::Form-->
                    <form action="{{ route('register') }}" method="post" class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework">

                        @csrf

                        <!--begin::Heading-->
                        <div class="text-center mb-11">
                            <!--begin::Title-->
                            <h1 class="text-dark fw-bolder mb-3">Sign Up</h1>
                            <!--end::Title-->
                            <!--begin::Subtitle-->
                            <div class="text-gray-500 fw-semibold fs-6">Your Social Campaigns</div>
                            <!--end::Subtitle=-->
                        </div>
                        <!--begin::Heading-->
                        <!--begin::Login options-->
                        <div class="row g-3 mb-9">
                            <!--begin::Col-->
                            <div class="col-md-12">
                                <!--begin::Google link=-->
                                <a href="login/google" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                                    <img alt="Logo" src="{{ env('APP_URL') }}/assets2/media/svg/brand-logos/google-icon.svg" class="h-15px me-3">Sign in with Google</a>
                                <!--end::Google link=-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div style="display: none;" class="col-md-6">
                                <!--begin::Google link=-->
                                <a href="#" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                                    <img alt="Logo" src="{{ env('APP_URL') }}/assets2/media/svg/brand-logos/apple-black.svg" class="theme-light-show h-15px me-3">
                                    <img alt="Logo" src="{{ env('APP_URL') }}/assets2/media/svg/brand-logos/apple-black-dark.svg" class="theme-dark-show h-15px me-3">Sign in with Apple</a>
                                <!--end::Google link=-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Login options-->
                        <!--begin::Separator-->
                        <div class="separator separator-content my-14">
                            <span class="w-125px text-gray-500 fw-semibold fs-7">Or with email</span>
                        </div>
                        <!--end::Separator-->


                        @if ($errors->any())
                        @foreach ($errors->all() as $error)
                

                        <!--begin::Alert-->
<div class="alert alert-primary d-flex align-items-center p-5">
    <!--begin::Icon-->
    <i class="ki-duotone  ki-information-5  fs-2hx text-danger me-4"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
    <!--end::Icon-->

    <!--begin::Wrapper-->
    <div class="d-flex flex-column">
        <!--begin::Title-->
        <h4 class="mb-1 text-dark">Error</h4>
        <!--end::Title-->

        <!--begin::Content-->
        <span>{{ $error }}</span>
        <!--end::Content-->
    </div>
    <!--end::Wrapper-->
</div>
<!--end::Alert-->

                        @php
                         break;
                        @endphp
                        @endforeach
                        @endif


                
@if(session('referby')!='')

    @php
    $userdata = App\User::find(session('referby'));
    @endphp

    @if($userdata)

    
                      <!--begin::Alert-->
<div class="alert alert-primary d-flex align-items-center p-5">
    <!--begin::Icon-->
<i class="ki-duotone ki-abstract-25  fs-2hx text-primary me-4">
 <span class="path1"></span>
 <span class="path2"></span>
</i>
    <!--end::Icon-->

    <!--begin::Wrapper-->
    <div class="d-flex flex-column">
        <!--begin::Title-->
        <h4 class="mb-1 text-dark">{{$userdata['name']}}</h4>
        <!--end::Title-->

        <!--begin::Content-->
        <span>Refered You</span>
        <!--end::Content-->
    </div>
    <!--end::Wrapper-->
</div>
<!--end::Alert-->
@endif
@endif


                        <!--begin::Input group=-->
                        <div class="fv-row mb-8 fv-plugins-icon-container">
                            <!--begin::Email-->
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="Full Name" autocomplete="off" class="form-control bg-transparent">
                            <!--end::Email-->
                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            </div>
                        </div>


                        <!--begin::Input group=-->
                        <div class="fv-row mb-8 fv-plugins-icon-container">
                            <!--begin::Email-->
                            <input type="text"  name="username" value="{{ old('username') }}" placeholder="Username" autocomplete="off" class="form-control bg-transparent">
                            <!--end::Email-->
                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            </div>
                        </div>


                        <!--begin::Input group=-->
                        <div class="fv-row mb-8 fv-plugins-icon-container">
                            <!--begin::Email-->
                            <input type="text" name="email" value="{{ old('email') }}" placeholder="Email" autocomplete="off" class="form-control bg-transparent">
                            <!--end::Email-->
                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            </div>
                        </div>





                        <!--begin::Input group=-->
                        <div class="fv-row mb-8 fv-plugins-icon-container">
                            <!--begin::Email-->
                            <input type="text"  name="password" placeholder="Enter Password" autocomplete="off" class="form-control bg-transparent">
                            <!--end::Email-->
                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            </div>
                        </div>



          

                        
                        <!--begin::Input group=-->
                        <div class="fv-row mb-8 fv-plugins-icon-container">
                            <!--begin::Email-->
                            <input type="password" name="password_confirmation" placeholder="Confirm Password" autocomplete="off" class="form-control bg-transparent">
                            <!--end::Email-->
                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            </div>
                        </div>





                        <!--begin::Accept-->
                        <div class="fv-row mb-8 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                            <label class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="toc" value="1" required>
                                <span class="form-check-label fw-semibold text-gray-700 fs-base ms-1">I Accept the
                               
                               
                               
                                <a href="{{route('terms')}}" class="ms-1 link-primary">Terms & Conditions</a></span>
                            </label>
                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            </div>
                        </div>
                        <!--end::Accept-->
                        <!--begin::Submit button-->
                        <div class="d-grid mb-10">
                            <button type="submit" id="kt_sign_up_submit" class="btn btn-primary">
                                <!--begin::Indicator label-->
                                <span class="indicator-label">Sign up</span>
                                <!--end::Indicator label-->
                                <!--begin::Indicator progress-->
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                <!--end::Indicator progress-->
                            </button>
                        </div>
                        <!--end::Submit button-->
                        <!--begin::Sign up-->
                        <div class="text-gray-500 text-center fw-semibold fs-6">Already have an Account?
                            <a href="{{url('login')}}" class="link-primary fw-semibold">Sign in</a>
                        </div>
                        <!--end::Sign up-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Form-->
  
        </div>
        <!--end::Body-->


        
















        <!--begin::Aside-->
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

    
    </div>
    <!--end::Authentication - Sign-up-->
</div>



@endsection