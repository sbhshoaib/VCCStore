@extends('fontend.authmaster')
@section('css')

<style>
.tooltip-inner {

}

    </style>
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



<link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">


<link rel="stylesheet" href="https://pattern.kivan-works.com/fonts/kredit.css">

<style>
* {
    background-repeat: no-repeat;
}



@media (max-width: 991.98px){

.mxmargin {
margin-top: 60px;
}
}

.active .floating:before {
    opacity: 1;
    transition: 500ms;
}

.floating {
    font-family: Inconsolata;
    margin: auto;
    width: 324px;
    height: 204px;

    font-size: 18px;
    border-radius: 18px;
    transform-style: preserve-3d;
    transform-origin: 50% 50%;
    background-image: url('../assets2/visa.png');
    background-size: 100% 100%;
  background-repeat: no-repeat;
background-color: transparent;

}


.mcardback {
    background-image: url('../assets2/mcard.png');
}

.visaback{
    background-image: url('../assets2/visa.png');
}

.logo {
    height: 60px;

    text-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
    margin: 0;
    font-weight: normal;
    filter: drop-shadow(-6.4px 6.2px 8px rgba(0, 0, 0, 0.6));

    background-image: url("http://localhost/cardmate/assets/images/logo/logo.png");
}

.paypal_center {
    height: 300px;
    width: 300px;
    position: absolute;
    top: 20px;
    left: 50%;

    margin-left: -75px;

    filter: drop-shadow(-6.4px 6.2px 8px rgba(0, 0, 0, 0.6));
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg width='150px' height='252px' viewBox='0 0 256 302' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' preserveAspectRatio='xMidYMid'%3E%3Cg%3E%3Cpath d='M217.168476,23.5070146 C203.234077,7.62479651 178.045612,0.815753338 145.823355,0.815753338 L52.3030619,0.815753338 C45.7104431,0.815753338 40.1083819,5.6103852 39.0762042,12.1114399 L0.136468302,259.076601 C-0.637664968,263.946149 3.13311322,268.357876 8.06925331,268.357876 L65.804612,268.357876 L80.3050438,176.385849 L79.8555471,179.265958 C80.8877248,172.764903 86.4481659,167.970272 93.0324607,167.970272 L120.46841,167.970272 C174.366398,167.970272 216.569147,146.078116 228.897012,82.7490197 C229.263268,80.8761167 229.579581,79.0531577 229.854273,77.2718188 C228.297683,76.4477414 228.297683,76.4477414 229.854273,77.2718188 C233.525163,53.8646924 229.829301,37.9325302 217.168476,23.5070146' fill='%2327346A'%3E%3C/path%3E%3Cpath d='M102.396976,68.8395929 C103.936919,68.1070797 105.651665,67.699203 107.449652,67.699203 L180.767565,67.699203 C189.449511,67.699203 197.548776,68.265236 204.948824,69.4555699 C207.071448,69.7968545 209.127479,70.1880831 211.125242,70.6375799 C213.123006,71.0787526 215.062501,71.5781934 216.943728,72.1275783 C217.884341,72.4022708 218.808307,72.6852872 219.715624,72.9849517 C223.353218,74.2002577 226.741092,75.61534 229.854273,77.2718188 C233.525163,53.8563683 229.829301,37.9325302 217.168476,23.5070146 C203.225753,7.62479651 178.045612,0.815753338 145.823355,0.815753338 L52.2947379,0.815753338 C45.7104431,0.815753338 40.1083819,5.6103852 39.0762042,12.1114399 L0.136468302,259.068277 C-0.637664968,263.946149 3.13311322,268.349552 8.0609293,268.349552 L65.804612,268.349552 L95.8875974,77.5798073 C96.5035744,73.6675208 99.0174265,70.4627756 102.396976,68.8395929 Z' fill='%2327346A'%3E%3C/path%3E%3Cpath d='M228.897012,82.7490197 C216.569147,146.069792 174.366398,167.970272 120.46841,167.970272 L93.0241367,167.970272 C86.4398419,167.970272 80.8794007,172.764903 79.8555471,179.265958 L61.8174095,293.621258 C61.1431644,297.883153 64.4394738,301.745495 68.7513129,301.745495 L117.421821,301.745495 C123.182038,301.745495 128.084882,297.550192 128.983876,291.864891 L129.458344,289.384335 L138.631407,231.249423 L139.222412,228.036354 C140.121406,222.351053 145.02425,218.15575 150.784467,218.15575 L158.067979,218.15575 C205.215193,218.15575 242.132193,199.002194 252.920115,143.605884 C257.423406,120.456802 255.092683,101.128442 243.181019,87.5519756 C239.568397,83.4399129 235.081754,80.0437153 229.854273,77.2718188 C229.571257,79.0614817 229.263268,80.8761167 228.897012,82.7490197 L228.897012,82.7490197 Z' fill='%232790C3'%3E%3C/path%3E%3Cpath d='M216.952052,72.1275783 C215.070825,71.5781934 213.13133,71.0787526 211.133566,70.6375799 C209.135803,70.1964071 207.071448,69.8051785 204.957148,69.4638939 C197.548776,68.265236 189.457835,67.699203 180.767565,67.699203 L107.457976,67.699203 C105.651665,67.699203 103.936919,68.1070797 102.4053,68.8479169 C99.0174265,70.4710996 96.5118984,73.6675208 95.8959214,77.5881313 L80.3133678,176.385849 L79.8638711,179.265958 C80.8877248,172.764903 86.4481659,167.970272 93.0324607,167.970272 L120.476734,167.970272 C174.374722,167.970272 216.577471,146.078116 228.905336,82.7490197 C229.271592,80.8761167 229.579581,79.0614817 229.862597,77.2718188 C226.741092,75.623664 223.361542,74.2002577 219.723948,72.9932757 C218.816631,72.6936112 217.892665,72.4022708 216.952052,72.1275783' fill='%231F264F'%3E%3C/path%3E%3C/g%3E%3C/svg%3E");
}

.card_no {

    font-family: kredit-front;
    font-weight: 900;
    font-size: 22px;
    color: #fff;
    position: absolute;
    letter-spacing: 3px;
    bottom: 64px;
    text-shadow: 0 0 5px rgba(0, 0, 0, 0.8);
    text-shadow: -9px 8.7px 6px rgba(0, 0, 0, 0.8);
    width: calc(100% - 3.5rem);
    text-align: center;
    left: 32px;
}

.valid {
    position: absolute;
    bottom: 58px;
    color: #fff;
    font-size: 0.58rem;
    left: 150px;
    text-shadow: 0 0 5px rgba(0, 0, 0, 0.8);
    text-shadow: -9px 8.7px 6px rgba(0, 0, 0, 0.8);
   
}


.valid_date {
    position: absolute;
    font-family: kredit-front;
    font-size: 14px;
    font-weight: bold;
    color: #fff;
    text-shadow: 0 0 5px rgba(0, 0, 0, 0.8);
    text-shadow: -9px 8.7px 6px rgba(0, 0, 0, 0.8);
    bottom: 38px;
    left: 150px;
 
    letter-spacing: 2px;
}

.validto {
    position: absolute;
    bottom: 58px;
    color: #fff;
    font-size: 0.58rem;
    left: 240px;
    text-shadow: 0 0 5px rgba(0, 0, 0, 0.8);
    text-shadow: -9px 8.7px 6px rgba(0, 0, 0, 0.8);
  
}


.validto_date {
    position: absolute;
    font-family: kredit-front;
    font-size: 14px;
    font-weight: bold;
    color: #fff;
    text-shadow: 0 0 5px rgba(0, 0, 0, 0.8);
    text-shadow: -9px 8.7px 6px rgba(0, 0, 0, 0.8);
    bottom: 38px;
    left: 240px;
    letter-spacing: 2px;
}




.holder {
    position: absolute;
    font-family: kredit-front;
    font-size: 13px;
    font-weight: bold;
    color: #fff;
    text-shadow: 0 0 5px rgba(0, 0, 0, 0.8);
    text-shadow: -9px 8.7px 6px rgba(0, 0, 0, 0.8);
    bottom: 9px;
    left: 30px;


    letter-spacing: 2px;

}

.mastercard_icon {
    height: 85px;
    width: 95px;
    float: right;
    position: absolute;
    right: 0;
    bottom: 0;

    filter: drop-shadow(0px 0px 5px rgba(0, 0, 0, 0.3));
    filter: drop-shadow(-6.4px 6.2px 8px rgba(0, 0, 0, 0.6));
    background-repeat: no-repeat;
    background-size: contain;


}

.thickness {
    width: 100%;
    height: 230px;
    border-radius: 8px;
    position: absolute;

}

.thickness:nth-child(2) {

}

.thickness:nth-child(3) {

}
</style>

@endsection
@section('content')





<!--begin::Wrapper-->
<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar pt-4 pt-lg-7 mb-n2 mb-lg-n3">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack flex-row-fluid">
            <!--begin::Toolbar container-->
            <div class="d-flex flex-stack flex-row-fluid">
                <!--begin::Toolbar container-->
                <div class="d-flex flex-column flex-row-fluid">
                    <!--begin::Toolbar wrapper-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold mb-1 mb-lg-3 me-2 fs-7">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                            <a href="{{url('')}}" class="text-white text-hover-primary">
                                <i class="ki-outline ki-home text-gray-700 fs-6"></i>
                            </a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <i class="ki-outline ki-right fs-7 text-gray-700 mx-n1"></i>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-gray-700 fw-bold lh-1">Home</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
           
                </div>
                <!--end::Toolbar container-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-3">
                    <!--begin::Secondary button-->
                    <div class="m-0">
                        <!--begin::Menu-->
                        <a href="{{url('')}}/home/cardlist" class="btn btn-flex btn-sm btn-body btn-color-gray-600 h-35px bg-body fw-bold">Card
                            List</a>

                        <!--end::Menu-->
                    </div>
                    <!--end::Secondary button-->
                    <!--begin::Primary button-->

                    <!--end::Primary button-->
                </div>
                <!--end::Actions-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->




















    <!--begin::Wrapper container-->
    <div class="app-container container-xxl d-flex">
        <!--begin::Main-->
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
            <!--begin::Content wrapper-->
            <div class="d-flex flex-column flex-column-fluid">
                <!--begin::Content-->
                <div id="kt_app_content" class="app-content">
                    <!--begin::Row-->
                    <div class="row g-5 g-xl-10 mb-xl-10">






                        <div class="col-md-7 order-2 order-md-1 mxmargin ">






                        
                            <div class="card mb-5 mb-xxl-8">
                                <div class="card-body p-6 pt-9 pb-0">
                                    <!--begin::Details-->
                                    <div class="d-flex flex-wrap flex-sm-nowrap">

                                        <!--begin::Info-->
                                        <div class="flex-grow-1">


                                            <!--begin::Form-->
                                            <form id="formvalidation" class="form" method="post"
                                                action="{{(route('user.card.usercardreqstore'))}}" autocomplete="off">
                                                @csrf




                                                <!--begin::Error-->
                                                    @if ($errors->any())
                                                    @foreach ($errors->all() as $error)
                                                    <div class="alert alert-primary d-flex align-items-center p-5">
                                                        <i class="ki-duotone  ki-information-5  fs-2hx text-danger me-4"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                                        <div class="d-flex flex-column">
                                                            <h4 class="mb-1 text-dark">Error</h4>
                                                            <span>{{ $error }}</span>
                                                        </div>
                                                    </div>
                                                    @php
                                                    break;
                                                    @endphp
                                                    @endforeach
                                                    @endif


                                                <!--end::Error-->

                                                <!--begin::Wrapper-->
                                                <div class="d-flex flex-column flex-grow-1 pe-8">
                                                    
                                                <div class="fv-row mb-3">

                                                <label class="required fw-semibold fs-6 mb-2">Select Bin Number</label>
                                           
                                                    <style>
                                                    .filterButton {
                                                        display: none;
                                                    }

                                                    #filterButtons {

                                                        transition: background-color 0.3s ease, box-shadow 0.3s ease;
                                                        /* Add smooth transition */
                                                    }
                                                    
                                                    
                                          span.btn.btn-outline.active {
    box-shadow: 0px 0px 16px -9px inset!important;
}

                                                    
                                                    </style>

                                                    <div class="row" style=" width: 100%;">

                                                    @php
                                                        $j = 2;
                                                        $btntypes = ['primary', 'info', 'success', 'danger', 'dark'];
                                                        @endphp



                                                        @foreach($data as $d)

                                                    
                                                         
                                                        @php
                                                        $index = $d->id % 5;
                                                        $btntype = ($j % 2 == 0) ? $btntypes[$index] : $btntypes[4 - $index];
                                                        $j++;
                                                        @endphp

                                                        @php
                                                        $category = \App\cardcategory::find($d->cat_id);


                                                        @endphp




                                                        <label class="col-md-3 col-4" for="{{$d->id}}" >
                                                            <input type="radio" class="filterButton" name="b_id"
                                                                id="{{$d->id}}" value="{{$d->name}}" data-typetxt = "{{$category['cat_name']}}"
                                                                data-img="../{{$category['image']}}"
                                                                data-filter="{{$d->name}}">

                                                                @if($d->tooltipstext!=NULL)
                                                            <span style="font-weight: 700;width: 100%; padding: 6px;" class="btn btn-outline btn-outline-dashed btn-outline-{{$btntype}} btn-active-light-{{$btntype}} btn-sm m-2"   data-bs-toggle="tooltip" data-bs-custom-class="tooltip-inverse" data-placement="top" title="{{$d->tooltipstext}}">{{$d->name}}</span>
                                                        @else
                                                        <span  style="font-weight: 700;width: 100%; padding: 6px;" class="btn btn-outline btn-outline-dashed btn-outline-{{$btntype}} btn-active-light-{{$btntype}} btn-sm m-2">{{$d->name}}</span>
                                                    @endif
                                                    </label>





                                                        @endforeach

                                                    </div>
                                                    </div>
                                               



                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-3">
                                                        <!--begin::Label-->
                                                        <label class="required fw-semibold fs-6 mb-2">Initial Balance</label>
                                                        <!--end::Label-->

                                                        <!--begin::Input-->
                                                        <input type="text" name="balance" id="text_input"
                                                            class="form-control form-control-solid mb-3 mb-lg-0"
                                                            placeholder="" />

                                                        <span id="total_display"
                                                            class="text-gray fw-semibold fs-6 mb-2"></span>

                                                    </div>
                                                    <!--end::Input group-->

                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-3">
                                                        <!--begin::Label-->
                                                        <label class="required fw-semibold fs-6 mb-2">Holder
                                                            Name</label>
                                                        <!--end::Label-->

                                                        <!--begin::Input-->
                                                        <input type="text" name="holdername" id="holdername"
                                                            class="form-control form-control-solid mb-3 mb-lg-0"
                                                            placeholder="" />

                                                    </div>
                                                    <!--end::Input group-->

                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-3">
                                                        <!--begin::Label-->
                                                        <label class="required fw-semibold fs-6 mb-2">Billing
                                                            address</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <textarea name="baddress" id="baddress"
                                                            class="form-control form-control-solid mb-3 mb-lg-0"></textarea>

                                                    </div>
                                                    <!--end::Input group-->



                                                    <div class="row g-9 fv-row mb-10" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]" data-kt-initialized="1">
                                                    <label class="required fw-semibold fs-6">Payment Method</label>
															<!--begin::Col-->
															<div class="col-md-5">
																<label class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-6" data-kt-button="true">
																	<!--begin::Radio button-->
																	<span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
																		<input class="form-check-input" type="radio" name="ptype" value="1" checked="checked">
																	</span>
																	<!--end::Radio button-->
																	<span class="ms-5">
																		<span class="fs-4 fw-bold mb-1 d-block">Wallet</span>
																		<span class="fw-semibold fs-7 text-gray-600">Charge will be deducted from wallet</span>
																	</span>
																</label>
															</div>
															<!--end::Col-->
													
                                                        <!--begin::Col-->
                                                        @php
                                                        $paymentincheckout = 0;
                                                        @endphp
                                                        @if($paymentincheckout==1)
                                                        <div class="col-md-5">
																<label class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-6" data-kt-button="true">
																	<!--begin::Radio button-->
																	<span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
																		<input class="form-check-input" type="radio" name="ptype" value="2" >
																	</span>
																	<!--end::Radio button-->
																	<span class="ms-5">
																		<span class="fs-4 fw-bold mb-1 d-block">Payment</span>
																		<span class="fw-semibold fs-7 text-gray-600">Complete your payment through gateway</span>
																	</span>
																</label>
															</div>
															<!--end::Col-->

                                                            
                                                    @endif
														</div>




                                                    </div>




                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-3">
                                                        <!--begin::Label-->
                                                        <!--begin::Actions-->
                                                        <button id="formvalidation_submit" disabled type="submit"
                                                            class="w-100 btn btn-primary">
                                                            <span class="indicator-label">
                                                                Complete Purchase
                                                            </span>
                                                            <span class="indicator-progress">
                                                                Please wait... <span
                                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                            </span>
                                                        </button>
                                                        <!--end::Actions-->
                                                    </div>
                                                    <!--end::Input group-->





                                            
                                                <!--end::Wrapper-->




                                            </form>
                                            <!--end::Form-->



                                            <script>
                                                        const inputField = document.getElementById('text_input');
                                                        const totalDisplay = document.getElementById('total_display');

                                                       

                                                

                                                        inputField.addEventListener('input', function() {
                                                            const submitButton = document.getElementById('formvalidation_submit');
                                                            const enteredValue = parseFloat(inputField.value);
                                                            if (isNaN(enteredValue) || inputField.value
                                                            .trim() === '') {
                                                                totalDisplay.textContent = 'Minimum card purchase amount is {{$gnl->mincard}}';
                                                                totalDisplay.classList.remove('text-primary');
                                                                totalDisplay.classList.add('text-danger');
                                                                submitButton.disabled = true;
                                                            } else {
                                                              
                                                                if(enteredValue<{{$gnl->mincard}}){
                                                                    totalDisplay.textContent = 'Minimum card purchase amount is {{$gnl->mincard}}';
                                                                    totalDisplay.classList.remove('text-primary');
                                                                    totalDisplay.classList.add('text-danger');
                                                                    submitButton.disabled = true;
                                                                }else{
                                                                    totalDisplay.classList.remove('text-danger');
                                                                    totalDisplay.classList.add('text-primary');
                                                                    const fee = enteredValue * {{$gnl->depositfee}};
                                                                    const roundedfee = fee.toFixed(2);
                                                                    const total = enteredValue + fee;
                                                                    const roundedTotal = total.toFixed(2); // Limit to two digits after the decimal point
                                                             
                                                                    if(roundedTotal>{{ Auth::user()->balance }}){
                                                                            totalDisplay.textContent = `You dont\'t have sufficient balance. Balance required: {{$gnl->cursym}}${roundedTotal}(with fee)`;
                                                                            totalDisplay.classList.remove('text-primary');
                                                                            totalDisplay.classList.add('text-danger');
                                                                            submitButton.disabled = true;
                                                                    }else{
                                                                           totalDisplay.textContent = `Total = ${enteredValue} + ${roundedfee} (Fee {{$gnl->depositfee*100}}%) = ${roundedTotal}`;
                                                                           submitButton.disabled = false;
                                                                    }
                                                                  




                                                                }
                                                               
                                                            }
                                                        });
                                                    </script>

                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Details-->

                                </div>
                            </div>



                            <div class="other-fee-wrapper mob-show des-hide mt-15">
                                <div class="other-fees">
                                    <h4>Note:</h4>
                                    <ul style="list-style-type:none;
    padding-left: 8px;">
                                        <!--<li>
                                    <span><i class="fa-solid fa-arrow-right"></i></span>
                                    <span class="t-span ms-3">#403054 - Balance starting at $5</span>
                                </li>-->

                                        <li>
                                            <span><i class="fa-solid fa-arrow-right"></i></span>
                                            <span class="t-span ms-3">Initial Card Balance: $50</span>
                                        </li>
                                        <li>
                                            <span><i class="fa-solid fa-arrow-right"></i></span>
                                            <span class="t-span ms-3">Add funds by <a href="{{route('user.deposit')}}"> deposit </a> page.</span>
                                        </li>
                                        <li>
                                            <span><i class="fa-solid fa-arrow-right"></i></span>
                                            <span class="t-span ms-3">Cards are subject to a 10% issuance fee, and free top-up.</span>
                                        </li>
                                        <li>
                                            <span><i class="fa-solid fa-arrow-right"></i></span>
                                            <span class="t-span ms-3">Both Visa and Mastercard options are available for
                                                your convenience.</span>
                                        </li>


                                    </ul>
                                    <!--<h5>Custom Amount Notice:</h5>
                            <p>You can't order less than $30 balance for "428837" bin on custom amount card, the minimum balance starting at $5 for "403054" bin.</p>-->
                                </div>
                            </div>




                        </div>

                        <div class="col-md-5 order-1 order-md-2">





                            <div class="floating">
                            

                                    <div class="card_no text" id="cardnumber">
                                        1234 5678 9012 3456
                                    </div>
                                    <div class="valid text">
                                        VALID FROM
                                    </div>
                                    <div class="valid_date text">
                                        <?php echo date('m/y'); ?>
                                    </div>


                                    <div class="validto text">
                                        EXPIRES END
                                    </div>
                                    <div class="validto_date text">
                                       <?php $y2plus = date('y')+2;  echo date('m').'/'.$y2plus; ?>
                                    </div>


                                    <div id="holdernamedis" class="holder text">JOHN DOE</div>
                                    



                             
                                    <div class="row" style="margin-top: 100;position: relative;top: 210px;">
                                    <div class="col-4" style="text-align: center;">
                                        <div class="fw-semibold fs-8 text-gray-400">Card Type</div>
                                        <div id="typetxt" class="fs-4 fw-bold counted">Visa</div>

                                    </div>
                                    <div class="col-4" style="    text-align: center;">
                                        <div class="fw-semibold fs-8 text-gray-400">Currency</div>
                                        <div class="fs-4 fw-bold counted">USD</div>
                                    </div>
                                    <div class="col-4" style="    text-align: center;">
                                        <div class="fw-semibold fs-8 text-gray-400">Issue Fee</div>
                                        <div class="fs-4 fw-bold counted"> {{$gnl->depositfee*100}}%</div>
                                    </div>

                                </div>


                            </div>

                   


                            <div class="other-fee-wrapper mob-hide mt-20">
                                <div class="other-fees">
                                    <h4>Note:</h4>
                                    <ul style="list-style-type:none;
    padding-left: 8px;">
                                        <!--<li>
                                    <span><i class="fa-solid fa-arrow-right"></i></span>
                                    <span class="t-span ms-3">#403054 - Balance starting at $5</span>
                                </li>-->

                                        <li>
                                            <span><i class="fa-solid fa-arrow-right"></i></span>
                                            <span class="t-span ms-3">Initial Card Balance: $50</span>
                                        </li>
                                        <li>
                                            <span><i class="fa-solid fa-arrow-right"></i></span>
                                            <span class="t-span ms-3">Add funds by <a href="{{route('user.deposit')}}"> deposit </a> page.</span>
                                        </li>
                                        <li>
                                            <span><i class="fa-solid fa-arrow-right"></i></span>
                                            <span class="t-span ms-3">Cards are subject to a 10% issuance fee, and free top-up.</span>
                                        </li>
                                        <li>
                                            <span><i class="fa-solid fa-arrow-right"></i></span>
                                            <span class="t-span ms-3">Both Visa and Mastercard options are available for
                                                your convenience.</span>
                                        </li>

                                    </ul>
                                    <!--<h5>Custom Amount Notice:</h5>
                            <p>You can't order less than $30 balance for "428837" bin on custom amount card, the minimum balance starting at $5 for "403054" bin.</p>-->
                                </div>
                            </div>
                        </div>







                    </div>
                    <!--end::Row-->

                </div>
                <!--end::Content-->
            </div>
            <!--end::Content wrapper-->








@endsection
@section('js')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(".floatingx").on('mousemove', function(event) {
    let card_x = getTransformValue(event.clientX, window.innerWidth, -56);
    let card_y = getTransformValue(event.clientY, window.innerHeight, 56);
    let shadow_x = getTransformValue(event.clientX, window.innerWidth, 20);
    let shadow_y = getTransformValue(event.clientY, window.innerHeight, 20);
    let text_shadow_x = getTransformValue(event.clientX, window.innerWidth, 28);
    let text_shadow_y = getTransformValue(event.clientY, window.innerHeight, 28);


    $(".floating").css("transform", "rotateX(" + card_y / 1 + "deg) rotateY(" + card_x + "deg)");
    $(".floating").css("box-shadow", -card_x + "px " + card_y / 1 + "px 55px rgba(0, 0, 0, .55)");
    $(".svg").css("filter", "drop-shadow(" + -shadow_x + "px " + shadow_y / 1 + "px 4px rgba(0, 0, 0, .6))");
    $(".text").css("text-shadow", -text_shadow_x + "px " + text_shadow_y / 1 + "px 6px rgba(0, 0, 0, .8)");


});

function getTransformValue(v1, v2, value) {
    return ((v1 / v2 * value - value / 2) * 1).toFixed(1);
}
</script>


<script>
$(document).ready(function() {
    var activeFilter = null;

    $('#holdername').on('input', function() {
    var holdername = $(this).val(); // Retrieve the value using .val()
    var holdernamedis = $('#holdernamedis');
    holdernamedis.text(holdername); // Set the text of holdernamedis
});



    $('.filterButton').on('change', function() {
        var filterValue = $(this).data('filter').toString();
        var spanElements = $(this).parent().siblings().find('span.btn');
        var cardNumber = $('#cardnumber');

        var newImageUrl = $(this).data('img').toString();
        var newtypetxt = $(this).data('typetxt').toString();


        const divElement = document.querySelector('.floating');
        const typetxt = document.querySelector('#typetxt');

        if (this.checked && activeFilter !== filterValue) {
            activeFilter = filterValue;
            spanElements.removeClass('active');
            $(this).parent().find('span.btn').addClass('active');
            //      applyFilters();

            divElement.style.backgroundImage = `url(${newImageUrl})`;
            typetxt.innerHTML = `${newtypetxt}`;

        }

        if (filterValue.length >= 6) {
            var firstFourDigits = filterValue.substring(0, 4);
            var secondTwoDigits = filterValue.substring(4, 6);
            var maskedNumber = firstFourDigits + ' ' + secondTwoDigits + '** **** ****';
            cardNumber.html(maskedNumber);


        }
    });
});
</script>
@endsection
