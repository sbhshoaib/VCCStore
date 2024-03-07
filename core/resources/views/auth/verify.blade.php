@extends('fontend.logmaster')

@section('content')






<div class="d-flex flex-column flex-root" id="kt_app_root">

<div class="d-flex flex-column flex-lg-row flex-column-fluid">
 

    <!--begin::Aside-->
    <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2" style="/* background-image: url(http://localhost/cardmate/assets2/media/misc/auth-bg.png); */box-shadow: 0px 0px 5px 0px #2475f9;">
        <!--begin::Content-->
        <div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
            <!--begin::Logo-->
             <a href="{{ env('BASE_URL') }}" class="mb-0 mb-lg-12">
                <img alt="Logo" src="{{asset('assets/images/')}}/logo/logo.png" class="h-60px h-lg-75px">
            </a>
            <!--end::Logo-->
            <!--begin::Image-->
            <img class="d-none d-lg-block mx-auto w-275px w-md-50 w-xl-500px mb-10 mb-lg-20" src="{{ env('APP_URL') }}/assets2/media/misc/auth-screens.png" alt="">
            <!--end::Image-->
            <!--begin::Title-->
            <h1 class="d-none d-lg-block text-white fs-2qx fw-bolder text-center mb-7">Fast, Efficient and Productive
            </h1>
            <!--end::Title-->
            <!--begin::Text-->
            <div class="d-none d-lg-block text-white fs-base text-center">In this kind of post,
                <a href="#" class="opacity-75-hover text-warning fw-bold me-1">the blogger</a>introduces a person
                they’ve interviewed
                <br>and provides some background information about
                <a href="#" class="opacity-75-hover text-warning fw-bold me-1">the interviewee</a>and their
                <br>work following this is a transcript of the interview.
            </div>
            <!--end::Text-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Aside-->

   <!--begin::Body-->
   <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
        <!--begin::Form-->
        <div class="d-flex flex-center flex-column flex-lg-row-fluid">
            <!--begin::Wrapper-->
            <div class="w-lg-500px p-10 minw-100">
                <!--begin::Form-->
                <form action="{{ route('login') }}" method="post" class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework">


                    @csrf



                    <!--begin::Heading-->
                    <div class="text-center mb-11">
                        <!--begin::Title-->
                        <h1 class="text-dark fw-bolder mb-3">Email Verification</h1>
                        <!--end::Title-->
                        <!--begin::Subtitle-->
                        <div class="text-gray-500 fw-semibold fs-6">Verify your email account.</div>
                        <!--end::Subtitle=-->
                    </div>
                    <!--begin::Heading-->
         
                    <!--begin::Separator-->
            
                    <!--end::Separator-->
                    <!--begin::Input group=-->
                    <div class="row">
                    <div class="col-md-8">
                    <div class="fv-row mb-8 fv-plugins-icon-container">
                        <!--begin::Email-->
                        <input type="text" placeholder="Username" name="username" value="{{ old('username') }}" autocomplete="off" class="form-control bg-transparent">
                        <!--end::Email-->

                        @if ($errors->has('username'))
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">{{ $errors->first('username') }}
                        </div>
                            @endif
                    </div>
                    </div>

                    <div class="col-md-4">
                    <button type="submit" id="kt_sign_in_submit" class="btn btn-success">Send code</button>
                    </div>

                    </div>
                    <!--end::Input group=-->
                    <div class="fv-row mb-3 fv-plugins-icon-container">
                        <!--begin::Password-->
                        <input type="password" placeholder="Password" name="password" autocomplete="off" class="form-control bg-transparent">
                        <!--end::Password-->

                        @if ($errors->has('password'))
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">{{ $errors->first('password') }}
                        </div>
                            @endif
                     
                    </div>
                    <!--end::Input group=-->
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                        <div></div>
                        <!--begin::Link-->
                        <a href="{{ env('APP_URL') }}/reset-password" class="link-primary">Forgot Password ?</a>
                        <!--end::Link-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Submit button-->
                    <div class="d-grid mb-10">
                        <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                            <!--begin::Indicator label-->
                            <span class="indicator-label">Sign In</span>
                            <!--end::Indicator label-->
                            <!--begin::Indicator progress-->
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            <!--end::Indicator progress-->
                        </button>
                    </div>
                    <!--end::Submit button-->
                    <!--begin::Sign up-->
                    <div class="text-gray-500 text-center fw-semibold fs-6">Not a Member yet?
                        <a href="{{url('register')}}" class="link-primary">Sign up</a>
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



</div>
</div>




















    <!-- login page content area start -->
    <section class="login-page-area">
        <div class="container">
            @if(Auth::user()->status!=1)
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-title">
                            <h2 class="title" style="color: red">Account Deactivated</h2>
                        </div>
                    </div>
                </div>
            @elseif(Auth::user()->emailv!=1)
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-title">
                            <h2 class="title"> Email Verification</h2>
                            @include('layouts.error')
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-lg-6">
                        <div class="login-form-wrapper"><!-- login form wrapper -->

                            <form action="{{ route('user.send-vcode') }}" method="post" >
                                @csrf
                                <input id="email" type="hidden"  name="email" value="{{Auth::user()->email}}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="text-center">Your Email:</h4>
                                        <br>
                                        <h5 class="text-center"> {{Auth::user()->email}}</h5>
                                    </div>
                                    <br>

                                    <div class="col-md-12">
                                        <input type="submit" value="Send Verification Code" class="submit-btn btn-block">
                                    </div>
                                </div>

                            </form>


                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="login-form-wrapper"><!-- login form wrapper -->

                            <form action="{{ route('user.email-verify') }}" method="post" >
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-element has-icon margin-bottom-20">
                                            <input type="text" class="input-field" name="code" id="uname" placeholder="Enter Verification Code">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-element">
                                            <input type="submit" value="Submit" class="submit-btn btn-block">
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            @elseif(Auth::user()->smsv!=1)

                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-title">
                            <h2 class="title"> Phone Verification</h2>
                            @include('layouts.error')
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-lg-6">
                        <div class="login-form-wrapper"><!-- login form wrapper -->

                            <form action="{{ route('user.send-vcode') }}" method="post" >
                                @csrf
                                <input id="email" type="hidden"  name="mobile" value="{{Auth::user()->mobile}}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="text-center">Your Phone:</h4>
                                        <br>
                                        <h5 class="text-center"> {{Auth::user()->mobile}}</h5>
                                    </div>
                                    <br>

                                    <div class="col-md-12">
                                        <input type="submit" value="Send Verification Code" class="submit-btn btn-block">
                                    </div>
                                </div>

                            </form>


                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="login-form-wrapper"><!-- login form wrapper -->

                            <form action="{{ route('user.sms-verify') }}" method="post" >
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-element has-icon margin-bottom-20">
                                            <input type="text" class="input-field" name="code" id="uname" placeholder="Enter Verification Code">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-element">
                                            <input type="submit" value="Submit" class="submit-btn btn-block">
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            @endif
        </div>
    </section>
    <!-- login page content area end -->
@endsection
