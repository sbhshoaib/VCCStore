@extends('fontend.authmaster')
@section('css')

                                <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">
                                <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
                                <link rel="stylesheet" href="https://pattern.kivan-works.com/fonts/kredit.css">


                                <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick.min.css'>
                                <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick-theme.min.css'>

                                <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
                                <script src='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick.min.js'></script>

                                <style>
                                    .carousel {
                                        width: 100%;
                                        margin-bottom: 20px auto;
                                    }

                                    .slick-slide {
                                        margin: 10px;
                                    }

                                    .slick-slide img {
                                        width: 100%;
                                        border: 2px solid #fff;
                                    }

                                    .slick-dots li button:before {
                                        font-size: 20px;
                                        color: black;
                                    }


                                    .slick-prev:before,
                                    .slick-next:before {
                                        font-family: 'slick';
                                        font-size: 20px;
                                        line-height: 1;
                                        opacity: .75;
                                        color: #23e299;
                                        -webkit-font-smoothing: antialiased;
                                        -moz-osx-font-smoothing: grayscale;
                                    }
                                </style>






<style>
    * {
        background-repeat: no-repeat;
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
        max-width: 100%;
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

    .visaback {
        background-image: url('../assets2/visa.png');
    }

    .logo {
        height: 60px;
        transform: translateZ(30px);
        text-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        margin: 0;
        font-weight: normal;
        filter: drop-shadow(-6.4px 6.2px 8px rgba(0, 0, 0, 0.6));
        z-index: 20;
        background-image: url("http://localhost/cardmate/assets/images/logo/logo.png");
    }

    .paypal_center {
        height: 300px;
        width: 300px;
        position: absolute;
        top: 20px;
        left: 50%;
        transform: translateZ(5px);
        margin-left: -75px;
        z-index: 1;
        filter: drop-shadow(-6.4px 6.2px 8px rgba(0, 0, 0, 0.6));
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg width='150px' height='252px' viewBox='0 0 256 302' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' preserveAspectRatio='xMidYMid'%3E%3Cg%3E%3Cpath d='M217.168476,23.5070146 C203.234077,7.62479651 178.045612,0.815753338 145.823355,0.815753338 L52.3030619,0.815753338 C45.7104431,0.815753338 40.1083819,5.6103852 39.0762042,12.1114399 L0.136468302,259.076601 C-0.637664968,263.946149 3.13311322,268.357876 8.06925331,268.357876 L65.804612,268.357876 L80.3050438,176.385849 L79.8555471,179.265958 C80.8877248,172.764903 86.4481659,167.970272 93.0324607,167.970272 L120.46841,167.970272 C174.366398,167.970272 216.569147,146.078116 228.897012,82.7490197 C229.263268,80.8761167 229.579581,79.0531577 229.854273,77.2718188 C228.297683,76.4477414 228.297683,76.4477414 229.854273,77.2718188 C233.525163,53.8646924 229.829301,37.9325302 217.168476,23.5070146' fill='%2327346A'%3E%3C/path%3E%3Cpath d='M102.396976,68.8395929 C103.936919,68.1070797 105.651665,67.699203 107.449652,67.699203 L180.767565,67.699203 C189.449511,67.699203 197.548776,68.265236 204.948824,69.4555699 C207.071448,69.7968545 209.127479,70.1880831 211.125242,70.6375799 C213.123006,71.0787526 215.062501,71.5781934 216.943728,72.1275783 C217.884341,72.4022708 218.808307,72.6852872 219.715624,72.9849517 C223.353218,74.2002577 226.741092,75.61534 229.854273,77.2718188 C233.525163,53.8563683 229.829301,37.9325302 217.168476,23.5070146 C203.225753,7.62479651 178.045612,0.815753338 145.823355,0.815753338 L52.2947379,0.815753338 C45.7104431,0.815753338 40.1083819,5.6103852 39.0762042,12.1114399 L0.136468302,259.068277 C-0.637664968,263.946149 3.13311322,268.349552 8.0609293,268.349552 L65.804612,268.349552 L95.8875974,77.5798073 C96.5035744,73.6675208 99.0174265,70.4627756 102.396976,68.8395929 Z' fill='%2327346A'%3E%3C/path%3E%3Cpath d='M228.897012,82.7490197 C216.569147,146.069792 174.366398,167.970272 120.46841,167.970272 L93.0241367,167.970272 C86.4398419,167.970272 80.8794007,172.764903 79.8555471,179.265958 L61.8174095,293.621258 C61.1431644,297.883153 64.4394738,301.745495 68.7513129,301.745495 L117.421821,301.745495 C123.182038,301.745495 128.084882,297.550192 128.983876,291.864891 L129.458344,289.384335 L138.631407,231.249423 L139.222412,228.036354 C140.121406,222.351053 145.02425,218.15575 150.784467,218.15575 L158.067979,218.15575 C205.215193,218.15575 242.132193,199.002194 252.920115,143.605884 C257.423406,120.456802 255.092683,101.128442 243.181019,87.5519756 C239.568397,83.4399129 235.081754,80.0437153 229.854273,77.2718188 C229.571257,79.0614817 229.263268,80.8761167 228.897012,82.7490197 L228.897012,82.7490197 Z' fill='%232790C3'%3E%3C/path%3E%3Cpath d='M216.952052,72.1275783 C215.070825,71.5781934 213.13133,71.0787526 211.133566,70.6375799 C209.135803,70.1964071 207.071448,69.8051785 204.957148,69.4638939 C197.548776,68.265236 189.457835,67.699203 180.767565,67.699203 L107.457976,67.699203 C105.651665,67.699203 103.936919,68.1070797 102.4053,68.8479169 C99.0174265,70.4710996 96.5118984,73.6675208 95.8959214,77.5881313 L80.3133678,176.385849 L79.8638711,179.265958 C80.8877248,172.764903 86.4481659,167.970272 93.0324607,167.970272 L120.476734,167.970272 C174.374722,167.970272 216.577471,146.078116 228.905336,82.7490197 C229.271592,80.8761167 229.579581,79.0614817 229.862597,77.2718188 C226.741092,75.623664 223.361542,74.2002577 219.723948,72.9932757 C218.816631,72.6936112 217.892665,72.4022708 216.952052,72.1275783' fill='%231F264F'%3E%3C/path%3E%3C/g%3E%3C/svg%3E");
    }

    .card_no {
        transform: translateZ(40px);
        font-family: kredit-front;
        font-weight: 900;
        font-size: 19px;
        color: #fff;
        position: absolute;
        letter-spacing: 3px;
        bottom: 69px;
        z-index: 2;
        text-shadow: 0 0 5px rgba(0, 0, 0, 0.8);
        text-shadow: -9px 8.7px 6px rgba(0, 0, 0, 0.8);
        width: calc(100% - 3.5rem);
        text-align: center;
        left: 32px;
    }



    .balancetext {
        transform: translateZ(40px);
        font-family: kredit-front;
        font-size: 16px;
        color: #fff;
        position: absolute;
        letter-spacing: 3px;
        bottom: 100px;
        z-index: 2;
        text-shadow: 0 0 5px rgba(0, 0, 0, 0.8);
        text-shadow: -9px 8.7px 6px rgba(0, 0, 0, 0.8);
        font-weight: 900;

        right: 10px;
    }




    .valid {
        position: absolute;
        bottom: 58px;
        color: #fff;
        font-size: 0.58rem;
        left: 150px;
        text-shadow: 0 0 5px rgba(0, 0, 0, 0.8);
        text-shadow: -9px 8.7px 6px rgba(0, 0, 0, 0.8);
        transform: translateZ(30px);
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
        z-index: 20;
        transform: translateZ(30px);
        letter-spacing: 2px;
    }

    .securitytext {
        position: absolute;
        bottom: 58px;
        color: #fff;
        font-size: 0.58rem;
        left: 100px;
        text-shadow: 0 0 5px rgba(0, 0, 0, 0.8);
        text-shadow: -9px 8.7px 6px rgba(0, 0, 0, 0.8);
        transform: translateZ(30px);
    }



    .security {
        position: absolute;
        font-family: kredit-front;
        font-size: 14px;
        font-weight: bold;
        color: #fff;
        text-shadow: 0 0 5px rgba(0, 0, 0, 0.8);
        text-shadow: -9px 8.7px 6px rgba(0, 0, 0, 0.8);
        bottom: 38px;
        left: 100px;
        z-index: 20;
        transform: translateZ(30px);
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
        transform: translateZ(30px);
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
        z-index: 20;
        transform: translateZ(30px);
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
        z-index: 20;
        letter-spacing: 2px;
        transform: translateZ(50px);
    }

    .mastercard_icon {
        height: 85px;
        width: 95px;
        float: right;
        position: absolute;
        right: 0;
        bottom: 0;
        transform: translateZ(30px);
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

        transform: translateZ(-4px);
    }

    .thickness:nth-child(2) {
        transform: translateZ(-8px);
    }

    .thickness:nth-child(3) {
        transform: translateZ(-11px);
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
                        <li class="breadcrumb-item text-gray-700 fw-bold lh-1">My Cards</li>
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
                        <a href="{{url('')}}/home/cardlist" class="btn btn-flex btn-sm btn-body btn-color-gray-600 h-35px bg-body fw-bold">Card List</a>

                        <!--end::Menu-->
                    </div>
                    <!--end::Secondary button-->
                    <!--begin::Primary button-->
                    <a href="{{url('')}}/home/add_card" class="btn btn-sm btn-flex btn-dark h-35 px-3">
                        <i class="ki-outline ki-plus-square fs-2"></i>Add Card</a>
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
                    <!--begin::Products-->
                    <div class="card card-flush">

                        <!--begin::Card header-->
                        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                            <!--begin::Card title-->

                            <div class="card-title ">

                                <h3 style="width: 100%;">My Cards</h3>
                            </div>
                            <!--end::Card title-->

                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class=" pt-0">







<style>
    .slick-next {
    right: 20px;
      z-index: 1;
}

.slick-prev{
    left: 20px;
     z-index: 1;
}

    
</style>








                            <div class="row">












                                <div class="loader carousel" style=" display: none;">















                                    @if($actvc->count()>0)

                                    @foreach($actvc as $as)


                                    @php
                                    $subcategory = \App\cardsubcategory::where('name',$as->b_id)->first();
                                    $catimg = \App\cardcategory::find($subcategory->cat_id);
                                    @endphp

                                    <div>

                                        <div class="floating" style="background-image:url('../{{$catimg->image}}');">


                                        <div class="m-0 r-5">
                                        <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true" tabindex="0">
																	
                                        
                                        <i style="color: #fff;font-size:large;left: 14px;position: absolute;top: 16px;" class="ki-outline ki-notepad-edit">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                        </i>
															
                                                            
                                                            
                                                                    </button>







                                                                    
                                                                    
                                                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true" style="">
																		<!--begin::Menu item-->
																		<div class="menu-item px-3">
																			<div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Manage Cards</div>
																		</div>
																		<!--end::Menu item-->
																		<!--begin::Menu separator-->
																		<div class="separator mb-3 opacity-75"></div>
																		<!--end::Menu separator-->

																		<!--begin::Menu item-->
																		<div class="menu-item px-3">
																			<a href="#" data-bs-toggle="modal" data-bs-target="#reload_{{$as->id}}" class="menu-link px-3">Reload Card</a>
																		</div>
																		<!--end::Menu item-->
																
																		<!--begin::Menu item-->
																		<div class="menu-item px-3">
																			<a href="#"  data-bs-toggle="modal" data-bs-target="#transaction_{{$as->id}}"  class="menu-link px-3">View Transaction</a>
																		</div>
																		<!--end::Menu item-->

                                                                        <!--begin::Menu item-->
																		<div class="menu-item px-3">
																			<a href="#"  data-bs-toggle="modal" data-bs-target="#withdraw_{{$as->id}}" class="menu-link px-3">Withdraw Card Balance</a>
																		</div>
																		<!--end::Menu item-->


                                                                        <!--begin::Menu item-->
                                                                        <div class="menu-item px-3">
																			<a href="card-deactive/{{$as->id}}" onclick="@if($actvc->count()<2) cantDeactive(event) @else confirmDeactive(event) @endif "  class="menu-link px-3">Deactive Card</a>
																		</div>
																		<!--end::Menu item-->

																		<!--begin::Menu separator-->
																		<div class="separator mt-3 opacity-75"></div>
																		<!--end::Menu separator-->
																		
																	</div>
																	<!--begin::Menu 2-->
																	
																	<!--end::Menu 2-->
																	<!--end::Menu-->
										 </div>


                                            <div class="balancetext" id="cardnumber">
                                                Balance:  {{$as->balance}}{{$gnl->cursym}}
                                            </div>

                                            <div class="card_no text" id="cardnumber">
                                                {{$as->number}}
                                            </div>
                                            <div class="valid text">
                                                VALID FROM
                                            </div>


                                            <div class="securitytext text">
                                            CVC
                                            </div>

                                            <div class="security text">
                                            {{$as->security}}
                                            </div>


                                            <div class="valid_date text">
                                            {{$as->exp}}
                                            </div>


                                            <div class="validto text">
                                                EXPIRES END
                                            </div>
                                            <div class="validto_date text">
                                            {{$as->expto}}
                                            </div>


                                            <div class="holdernamedis holder text">{{$as->holdername}}</div>


                                        </div>

                                    </div>




                                    @endforeach



                                    @else
                                    <div class="p-5">
                                    You don't have any active card yet.
                                    </div>
                                   
                                    @endif






                                </div>
                                
                                                
                                <script>
                                    jQuery(document).ready(function($) {
                                        // Display loader
                                        $('.loader').show();
                                
                                        $('.carousel').slick({
                                            slidesToShow: 3,
                                            dots: false,
                                  
                                            responsive: [{
                                                breakpoint: 900, // Adjust this breakpoint as needed
                                                settings: {
                                                    slidesToShow: 1,
                                                    dots: false // Enable dots for mobile view if needed
                                                }
                                            }]
                                        });
                                
                                        // Hide loader once the slider is fully initialized
                                        $('.carousel').on('init', function() {
                                            $('.loader').hide();
                                        });
                                    });
                                </script>




                            </div>

                        </div>
                        <!--end::Card body-->

                    </div>
                    <!--end::Products-->





                </div>
                <!--end::Content-->






                <!--begin::Content-->
                <div id="kt_app_content" class="app-content">
                    <!--begin::Products-->
                    <div class="card card-flush">

                        <!--begin::Card header-->
                        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                            <!--begin::Card title-->
                            <h3 style="
                                        width: 100%;
                                    ">Card list</h3>
                            <div class="card-title searchtop2">

                                <!--begin::Search-->
                                <div class="d-flex align-items-center position-relative my-1">
                                    <i class="ki-outline ki-magnifier fs-3 position-absolute ms-4"></i>
                                    <input type="text" data-kt-ecommerce-order-filter="search" class="form-control form-control-solid w-100 ps-12" placeholder="Search Cards" />
                                </div>
                                <!--end::Search-->
                            </div>
                            <!--end::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                                <!--begin::Flatpickr

                                <div class="input-group w-250px">
                                    <input class="form-control form-control-solid rounded rounded-end-0" placeholder="Pick date range" id="kt_ecommerce_sales_flatpickr" />
                                    <button class="btn btn-icon btn-light" id="kt_ecommerce_sales_flatpickr_clear">
                                        <i class="ki-outline ki-cross fs-2"></i>
                                    </button>
                                </div>
                                <!--end::Flatpickr-->
                                <div class="w-100 mw-150px">
                                    <!--begin::Select2-->
                                    <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Status" data-kt-ecommerce-order-filter="status">
                                        <option></option>
                                        <option value="all">All</option>

                                        <option value="Active">Active</option>
                                        <option value="Processing">Processing</option>
                                        <option value="Rejected">Rejected</option>
                                        <option value="Deactivate Pending">Deactivate Pending</option>
                                        <option value="Deactivated">Deactivated</option>
                                        <option value="Activating">Activating</option>
                                        <option value="Error">Error</option>

                                    </select>
                                    <!--end::Select2-->
                                </div>

                            </div>
                            <!--end::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="transaction_table">
                                <thead>
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">

                      
                                        <th class="min-w-100px">Card Type</th>
                                        <th class="min-w-100px">Holder Name</th>
                                        <th class="min-w-100px">Number</th>
                                        <th class="min-w-100px">Balance</th>
                                        <th class="min-w-100px">Security</th>
                                        <th class="min-w-100px">Expiry</th>
                                        <th class="text-end min-w-70px">Status</th>
                                        <th class="text-end min-w-70px">Action</th>

                                    </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-600">



                                    @php
                                    $i=0;
                                    @endphp




                                    @foreach($data as $d)

                               
                                    @php 
                                        $reload_card = \App\CardTrans::where('category', 'cardreload')->where('card_id', $d->id)->where('status', '2')->count(); 

                                        if($reload_card > 0) {
                                            $reload_card_message = '<div class="badge badge-light-warning">Reload Pending</div>';
                                        }else{
                                            $reload_card_message='';
                                        }


                                        $reload_card = \App\CardTrans::where('category', 'cardwithdraw')->where('card_id', $d->id)->where('status', '2')->count(); 

                                            if($reload_card > 0) {
                                                $withdraw_card_message = '<div class="badge badge-light-warning">Withdrawal Pending</div>';
                                            }else{
                                                $withdraw_card_message='';
                                            }
                                    @endphp


                                    <tr>

                                        <td data-kt-ecommerce-order-filter="order_id">
                                          
                                            {{$d->c_name}}
                                        </td>



                                        <td>
                                        {{$d->holdername}}
                                        </td>



                                        <td>
                                            <span class="fw-bold">
                                            {{$d->number}}
                                               


                                            </span>
                                        </td>





                                        <td>
                                            <span class="fw-bold">

                                                {{$gnl->cursym}}{{$d->balance}}


                                            </span>
                                        </td>


                                        <td>
                                            <span class="fw-bold">

                                            {{$d->security}}


                                            </span>
                                        </td>


                                        <td>
                                            <span class="fw-bold">
                                            {{$d->expto}}</span>
                                        </td>


                                        @if($d->status == '1')
                                        <td class="text-end pe-0" data-order="Active">
                                            <!--begin::Badges-->
                                            <div class="badge badge-light-success">Active</div>
                                            {!!$reload_card_message!!}{!!$withdraw_card_message!!}
                                            <!--end::Badges-->

                                            @if($d->message != '')
                                            <a href class="badge badge-light-info" data-bs-toggle="modal" data-bs-target="#kt_modal_{{$d->id}}">Show Message</a>
                                            @endif
                                        </td>
                                        @elseif($d->status == '2')
                                        <td class="text-end pe-0" data-order="Processing">
                                            <!--begin::Badges-->
                                            <div class="badge badge-light-warning">Processing</div>
                                            {!!$reload_card_message!!}{!!$withdraw_card_message!!}
                                            <!--end::Badges-->
                                            @if($d->message != '')
                                            <a href class="badge badge-light-info" data-bs-toggle="modal" data-bs-target="#kt_modal_{{$d->id}}">Show Message</a>
                                            @endif
                                        </td>

                                        @elseif($d->status == '3')
                                        <td class="text-end pe-0" data-order="Rejected">
                                            <!--begin::Badges-->
                                            <div class="badge badge-light-danger">Rejected</div>
                                            {!!$reload_card_message!!}{!!$withdraw_card_message!!}
                                            <!--end::Badges-->
                                            @if($d->message != '')
                                            <a href class="badge badge-light-info" data-bs-toggle="modal" data-bs-target="#kt_modal_{{$d->id}}">Show Message</a>
                                            @endif
                                        </td>
                                        @elseif($d->status == '4')
                                        <td class="text-end pe-0" data-order="Deactivate Pending">
                                            <!--begin::Badges-->
                                            <div class="badge badge-light-danger">Deactivate Pending</div>
                                            {!!$reload_card_message!!}{!!$withdraw_card_message!!}
                                            <!--end::Badges-->
                                            @if($d->message != '')
                                            <a href class="badge badge-light-info" data-bs-toggle="modal" data-bs-target="#kt_modal_{{$d->id}}">Show Message</a>
                                            @endif
                                        </td>
                                        @elseif($d->status == '5')
                                        <td class="text-end pe-0" data-order="Deactivated">
                                            <!--begin::Badges-->
                                            <div class="badge badge-danger">Deactivated</div>
                                            {!!$reload_card_message!!}{!!$withdraw_card_message!!}
                                            <!--end::Badges-->
                                            @if($d->message != '')
                                            <a href class="badge badge-light-info" data-bs-toggle="modal" data-bs-target="#kt_modal_{{$d->id}}">Show Message</a>
                                            @endif
                                            
                                        </td>
                          
                                        @elseif($d->status == '7')
                                        <td class="text-end pe-0" data-order="Activating">
                                            <!--begin::Badges-->
                                            <div class="badge badge-light-warning">Activating</div>
                                            {!!$reload_card_message!!}{!!$withdraw_card_message!!}
                                            <!--end::Badges-->
                                            @if($d->message != '')
                                            <a href class="badge badge-light-info" data-bs-toggle="modal" data-bs-target="#kt_modal_{{$d->id}}">Show Message</a>
                                            @endif
                                        </td>
                                        @else
                                        <td class="text-end pe-0" data-order="Error">
                                            <!--begin::Badges-->
                                            <div class="badge badge-light-danger">Error</div>
                                            {!!$reload_card_message!!}{!!$withdraw_card_message!!}
                                            <!--end::Badges-->
                                            @if($d->message != '')
                                            <a href class="badge badge-light-info" data-bs-toggle="modal" data-bs-target="#kt_modal_{{$d->id}}">Show Message</a>
                                            @endif
                                        </td>

                                        @endif


                                        <td class="text-end pe-0" data-order="Error">




                                                                @if($d->status == '1')

                                                                <div class="m-0">
																	<!--begin::Menu-->
																	<button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
																		<i class="ki-outline ki-dots-square fs-1"></i>
																	</button><div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true" style="">
																		<!--begin::Menu item-->
																		<div class="menu-item px-3">
																			<div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Manage Cards</div>
																		</div>
																		<!--end::Menu item-->
																		<!--begin::Menu separator-->
																		<div class="separator mb-3 opacity-75"></div>
																		<!--end::Menu separator-->
																		<!--begin::Menu item-->
																		<div class="menu-item px-3">
																			<a href="#"  data-bs-toggle="modal" data-bs-target="#view_modal_{{$d->id}}"  class="menu-link px-3">View Card</a>
																		</div>
																		<!--end::Menu item-->
																		<!--begin::Menu item-->
																		<div class="menu-item px-3">
																			<a href="#" data-bs-toggle="modal" data-bs-target="#reload_{{$d->id}}" class="menu-link px-3">Reload Card</a>
																		</div>
																		<!--end::Menu item-->
																
																		<!--begin::Menu item-->
																		<div class="menu-item px-3">
																			<a href="#"  data-bs-toggle="modal" data-bs-target="#transaction_{{$d->id}}"  class="menu-link px-3">View Transaction</a>
																		</div>
																		<!--end::Menu item-->

                                                                        <!--begin::Menu item-->
																		<div class="menu-item px-3">
																			<a href="#"  data-bs-toggle="modal" data-bs-target="#withdraw_{{$d->id}}" class="menu-link px-3">Withdraw Card Balance</a>
																		</div>
																		<!--end::Menu item-->

                                                                        <!--begin::Menu item-->
                                                                        <div class="menu-item px-3">
																			<a href="card-deactive/{{$d->id}}" onclick="@if($actvc->count()<2) cantDeactive(event) @else confirmDeactive(event) @endif" class="menu-link px-3">Deactive Card</a>
																		</div>
																		<!--end::Menu item-->

                                                                        <script>


                                                                            function cantDeactive(event) {
                                                                                event.preventDefault();

                                                                                Swal.fire({
                                                                                        text: 'You need at least one card activated',
                                                                                        icon: 'error',
                                                                                        buttonsStyling: false,
                                                                                        confirmButtonText: 'Ok, got it!',
                                                                                        customClass: {
                                                                                            confirmButton: 'btn btn-primary'
                                                                                        }
                                                                                    });
                                                                            }



                                                                            function confirmDeactive(event) {
                                                                                event.preventDefault();

                                                                                Swal.fire({
                                                                                    text: "Are you sure you want to deactive card?",
                                                                                    icon: "warning",
                                                                                    showCancelButton: true,
                                                                                    buttonsStyling: false,
                                                                                    confirmButtonText: "Yes",
                                                                                    cancelButtonText: "No",
                                                                                    customClass: {
                                                                                        confirmButton: "btn fw-bold btn-danger",
                                                                                        cancelButton: "btn fw-bold btn-active-light-primary"
                                                                                    }
                                                                                }).then((result) => {
                                                                                    if (result.isConfirmed) {
                                                                                        // Perform the cancellation process or redirect to the href
                                                                                        window.location.href = event.target.href;
                                                                                    }
                                                                                });
                                                                            }
                                                                        </script>
																		<!--begin::Menu separator-->
																		<div class="separator mt-3 opacity-75"></div>
																		<!--end::Menu separator-->
																		
																	</div>
																	<!--begin::Menu 2-->
																	
																	<!--end::Menu 2-->
																	<!--end::Menu-->
										 </div>


                                                                    @elseif($d->status == '4')

                                                                    <div class="m-0">
																	<!--begin::Menu-->
																	<button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
																		<i class="ki-outline ki-dots-square fs-1"></i>
																	</button><div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true" style="">


                                                                    
                                                                        <!--begin::Menu item-->
                                                                        <div class="menu-item px-3">
																			<div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Manage Cards</div>
																		</div>
																		<!--end::Menu item-->
                                                                        	<!--begin::Menu separator-->
																		<div class="separator mb-3 opacity-75"></div>
                                                                        <!--begin::Menu item-->
																		<div class="menu-item px-3">
																			<a href="#"  data-bs-toggle="modal" data-bs-target="#view_modal_{{$d->id}}"  class="menu-link px-3">View Card</a>
																		</div>
																		<!--end::Menu item-->
																	
																		<!--end::Menu separator-->
                                                                      
																		<!--begin::Menu item-->
																		<div class="menu-item px-3">
																			<a href="#"  data-bs-toggle="modal" data-bs-target="#transaction_{{$d->id}}"  class="menu-link px-3">View Transaction</a>
																		</div>
																		<!--end::Menu item-->

                                                                      


																		<!--end::Menu item-->
																		<!--begin::Menu separator-->
																		<div class="separator mt-3 opacity-75"></div>
																		<!--end::Menu separator-->
																		
																	</div>
																	<!--begin::Menu 2-->
                                                                                            
                                                                </div>
                                                                    @elseif($d->status == '5')

                                                                    <div class="m-0">
																	<!--begin::Menu-->
																	<button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
																		<i class="ki-outline ki-dots-square fs-1"></i>
																	</button><div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true" style="">

                                                                        <!--begin::Menu item-->
                                                                        <div class="menu-item px-3">
																			<div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Manage Cards</div>
																		</div>
																		<!--end::Menu item-->
																		<!--begin::Menu separator-->
																		<div class="separator mb-3 opacity-75"></div>
																		<!--end::Menu separator-->

                                                                        <!--begin::Menu item-->
																		<div class="menu-item px-3">
																			<a href="#"  data-bs-toggle="modal" data-bs-target="#view_modal_{{$d->id}}"  class="menu-link px-3">View Card</a>
																		</div>
																		<!--end::Menu item-->
																		<!--begin::Menu item-->
																		<div class="menu-item px-3">
																			<a href="#"  data-bs-toggle="modal" data-bs-target="#transaction_{{$d->id}}"  class="menu-link px-3">View Transaction</a>
																		</div>
																		<!--end::Menu item-->
                                                                        <!--begin::Menu item-->
                                                                        <div class="menu-item px-3">
																			<a href="card-deactive/{{$d->id}}"  onclick="confirmActive(event)" class="menu-link px-3">Active Card</a>
																		</div>
																		<!--end::Menu item-->
                                                                        <script>
                                                                            function confirmActive(event) {
                                                                                event.preventDefault();

                                                                                Swal.fire({
                                                                                    text: "Are you sure you want to active card?",
                                                                                    icon: "warning",
                                                                                    showCancelButton: true,
                                                                                    buttonsStyling: false,
                                                                                    confirmButtonText: "Yes",
                                                                                    cancelButtonText: "No",
                                                                                    customClass: {
                                                                                        confirmButton: "btn fw-bold btn-danger",
                                                                                        cancelButton: "btn fw-bold btn-active-light-primary"
                                                                                    }
                                                                                }).then((result) => {
                                                                                    if (result.isConfirmed) {
                                                                                        // Perform the cancellation process or redirect to the href
                                                                                        window.location.href = event.target.href;
                                                                                    }
                                                                                });
                                                                            }
                                                                        </script>
																		<!--begin::Menu separator-->
																		<div class="separator mt-3 opacity-75"></div>
																		<!--end::Menu separator-->
																		
																	</div>
																	<!--begin::Menu 2-->
																	
                                                                    </div>
                                                                    @elseif($d->status == '7')
                                                                    <div class="m-0">
																	<!--begin::Menu-->
																	<button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
																		<i class="ki-outline ki-dots-square fs-1"></i>
																	</button><div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true" style="">

                                                                        <!--begin::Menu item-->
                                                                        <div class="menu-item px-3">
																			<div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Manage Cards</div>
																		</div>
																		<!--end::Menu item-->
																		<!--begin::Menu separator-->
																		<div class="separator mb-3 opacity-75"></div>
																		<!--end::Menu separator-->

                                                                        <!--begin::Menu item-->
																		<div class="menu-item px-3">
																			<a href="#"  data-bs-toggle="modal" data-bs-target="#view_modal_{{$d->id}}"  class="menu-link px-3">View Card</a>
																		</div>
																		<!--end::Menu item-->
																		<!--begin::Menu item-->
																		<div class="menu-item px-3">
																			<a href="#"  data-bs-toggle="modal" data-bs-target="#transaction_{{$d->id}}"  class="menu-link px-3">View Transaction</a>
																		</div>
																		<!--end::Menu item-->
                                                                       
																		<!--begin::Menu separator-->
																		<div class="separator mt-3 opacity-75"></div>
																		<!--end::Menu separator-->
																		
																	</div>
																	<!--begin::Menu 2-->
																	
										 </div>
                                            @endif







                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Products-->





                </div>
                <!--end::Content-->





            </div>
            <!--end::Content wrapper-->








                                                <!-----Modal Loop-------->
                                                <!-----Modal Loop-------->
                                                <!-----Modal Loop-------->
                                                <!-----Modal Loop-------->


                                    @foreach($data as $d)




                                    
                                                <!-----VIEW CARD MODAL-------->
                                                <!-----VIEW CARD MODAL-------->
                                                <!-----VIEW CARD MODAL-------->
                                                <!-----VIEW CARD MODAL-------->
                                                <!-----VIEW CARD MODAL-------->
                                             
                                    @if($d->status == '1' || $d->status == '4' || $d->status == '5' || $d->status == '6'|| $d->status == '7')
                                    <div class="modal fade" tabindex="-1" id="view_modal_{{$d->id}}">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title">View Card</h3>

                                                    <!--begin::Close-->
                                                    <div class="btn btn-icon btn-sm btn-danger ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                        <i class="ki-solid ki-cross fs-1"></i>
                                                    </div>
                                                    <!--end::Close-->
                                                </div>

                                                <div class="modal-body">
                                                    @php
                                                    $subcategory = \App\cardsubcategory::where('name',$d->b_id)->first();
                                                    $catimg = \App\cardcategory::find($subcategory->cat_id);
                                                    @endphp
                                                    <div class="floating" style="background-image:url('../{{$catimg->image}}');">
                                                    <div class="balancetext" id="cardnumber">
                                                Balance:  {{$d->balance}}{{$gnl->cursym}}
                                            </div>

                                            <div class="card_no text" id="cardnumber">
                                                {{$d->number}}
                                            </div>
                                            <div class="valid text">
                                                VALID FROM
                                            </div>

                                            
                                            <div class="securitytext text">
                                            CVC
                                            </div>

                                            <div class="security text">
                                            {{$d->security}}
                                            </div>

                                            <div class="valid_date text">
                                            {{$d->exp}}
                                            </div>

                                            <div class="validto text">
                                                EXPIRES END
                                            </div>
                                            <div class="validto_date text">
                                            {{$d->expto}}
                                            </div>


                                            <div class="holdernamedis holder text">{{$d->holdername}}</div>


                                                    </div>




                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif








                                   <!-------------Withdraw Card Modal----------->
                                    <!-------------Withdraw Card Modal----------->
                                    <!-------------Withdraw Card Modal----------->
                                    <!-------------Withdraw Card Modal----------->
                                    <!-------------Withdraw Card Modal----------->




                                                    

                                    @if($d->status != '2' || $d->status != '3' || $d->status != '5' )  <!----Processing, Rejected, Deactivate--->
                                    <div class="modal fade" tabindex="-1" id="withdraw_{{$d->id}}">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title">Withdraw Card Balance</h3>

                                                    <!--begin::Close-->
                                                    <div class="btn btn-icon btn-sm btn-danger ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                        <i class="ki-solid ki-cross fs-1"></i>
                                                    </div>
                                                    <!--end::Close-->
                                                </div>

                                                <div class="modal-body">

                                                Card:
                                                    @php
                                                    $subcategory = \App\cardsubcategory::where('name',$d->b_id)->first();
                                                    $catimg = \App\cardcategory::find($subcategory->cat_id);
                                                    @endphp
                                                    <div class="floating" style="background-image:url('../{{$catimg->image}}');">
                                                    <div class="balancetext" id="cardnumber">
                                                Balance:  {{$d->balance}}{{$gnl->cursym}}
                                            </div>

                                            <div class="card_no text" id="cardnumber">
                                                {{$d->number}}
                                            </div>



                                            <div class="securitytext text">
                                            CVC
                                            </div>

                                            <div class="security text">
                                            {{$d->security}}
                                            </div>


                                            <div class="valid text">
                                                VALID FROM
                                            </div>


                                            <div class="securitytext text">
                                            CVC
                                            </div>

                                            <div class="security text">
                                            {{$d->security}}
                                            </div>


                                            <div class="valid_date text">
                                            {{$d->exp}}
                                            </div>


                                            <div class="validto text">
                                                EXPIRES END
                                            </div>
                                            <div class="validto_date text">
                                            {{$d->expto}}
                                            </div>


                                            <div  class="holdernamedis holder text">{{$d->holdername}}</div>


                                                    </div>



                                                    <form action="{{route('card.withdraw', $d->id)}}" id="withdrawform{{$d->id}}" method="post">
                                                      @CSRF
                                                    <div class="fv-row mt-5">
                                                                <!--begin::Label-->
                                                                <label class="required fw-semibold fs-6 mb-2">Enter Amount</label>
                                                                <!--end::Label-->
                                                                <!--begin::Input-->

                                                                <input required="" type="withdrawamount" id="withdrawamount{{$d->id}}" name="withdrawamount" value="" class="text_inputw form-control form-control-solid mb-3 mb-lg-0">
                                                            <span id="shwoerror_w_{{$d->id}}" class="text-danger"></span>
                                                         
                                                            <span class="total_displayw text-danger"></span>
                                                            </div>
                                                                    
                                                   
                                                   
                                                            </form>




                                                    

                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" id="formvalidation_submitw" onclick="confirmWithdraw{{$d->id}}(event)" class="formvalidation_submitw btn btn-primary">Submit</button>

                                                    <script>


    function confirmWithdraw{{$d->id}}(event) {
        event.preventDefault();

        // Check if reloadamount field is empty or less than 10
        var withdrawAmount = document.getElementById("withdrawamount{{$d->id}}").value;
        var errorSpan = document.getElementById("shwoerror_w_{{$d->id}}");
   

        // Proceed with Swal.fire if reloadamount meets the requirements
        Swal.fire({
            text: "Are you sure you want to withdraw card balance?",
            icon: "warning",
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonText: "Yes",
            cancelButtonText: "No",
            customClass: {
                confirmButton: "btn fw-bold btn-danger",
                cancelButton: "btn fw-bold btn-active-light-primary"
            }
        }).then((result) => {
            if (result.isConfirmed) {
                // Process the form submission
                document.getElementById("withdrawform{{$d->id}}").submit();
            }
        });
    }
</script>



                
                                                </div>

                                                
                                            </div>
                                        </div>
                                    </div>
                                    @endif
















                                            <!----RELOAD CARD MODAL---->
                                            <!----RELOAD CARD MODAL---->
                                            <!----RELOAD CARD MODAL---->
                                            <!----RELOAD CARD MODAL---->
                                            <!----RELOAD CARD MODAL---->







                                            @if($d->status == '1' || $d->status == '4' || $d->status == '5' || $d->status == '7')
                                    <div class="modal fade" tabindex="-1" id="reload_{{$d->id}}">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title">Reload Card</h3>

                                                    <!--begin::Close-->
                                                    <div class="btn btn-icon btn-sm btn-danger ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                        <i class="ki-solid ki-cross fs-1"></i>
                                                    </div>
                                                    <!--end::Close-->
                                                </div>

                                                <div class="modal-body">

                                                Card:
                                                    @php
                                                    $subcategory = \App\cardsubcategory::where('name',$d->b_id)->first();
                                                    $catimg = \App\cardcategory::find($subcategory->cat_id);
                                                    @endphp
                                                    <div class="floating" style="background-image:url('../{{$catimg->image}}');">
                                                    <div class="balancetext" id="cardnumber">
                                                Balance:  {{$d->balance}}{{$gnl->cursym}}
                                            </div>

                                            <div class="card_no text" id="cardnumber">
                                                {{$d->number}}
                                            </div>
                                            <div class="valid text">
                                                VALID FROM
                                            </div>

                                            <div class="securitytext text">
                                            CVC
                                            </div>

                                            <div class="security text">
                                            {{$d->security}}
                                            </div>


                                            <div class="valid_date text">
                                            {{$d->exp}}
                                            </div>


                                            <div class="validto text">
                                                EXPIRES END
                                            </div>
                                            <div class="validto_date text">
                                            {{$d->expto}}
                                            </div>


                                            <div  class="holdernamedis holder text">{{$d->holdername}}</div>


                                                    </div>



                                                    <form action="{{route('card.reload', $d->id)}}" id="reloadform{{$d->id}}" method="post">
                                             @CSRF
                                                    <div class="fv-row mt-5">
                                                                <!--begin::Label-->
                                                                <label class="required fw-semibold fs-6 mb-2">Enter Amount</label>
                                                                <!--end::Label-->
                                                                <!--begin::Input-->

                                                                <input required="" type="reloadamount" id="reloadamount{{$d->id}}" name="reloadamount" value="" class="text_input form-control form-control-solid mb-3 mb-lg-0">
                                                            <span id="shwoerror{{$d->id}}" class="text-danger"></span>
                                                            <span class="total_display text-danger"></span>
                                                            
                                                            </div>
                                                                    
                                                   
                                                   
                                                            </form>




                                                    

                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" id="formvalidation_submit" onclick="confirmReload{{$d->id}}(event)" class="formvalidation_submit btn btn-primary">Submit</button>







                                                    <script>


    function confirmReload{{$d->id}}(event) {
        event.preventDefault();

        // Check if reloadamount field is empty or less than 10
        var reloadAmount = document.getElementById("reloadamount{{$d->id}}").value;
        var errorSpan = document.getElementById("shwoerror{{$d->id}}");
   
        if (reloadAmount === '' || parseFloat(reloadAmount) < 10) {
            // Show error message
            errorSpan.innerText = "Reload amount must be at least 10.";
            return;
        }


        if (reloadAmount === '' || parseFloat(reloadAmount) < 10) {
            // Show error message
            errorSpan.innerText = "Reload amount must be at least 10.";
            return;
        }

        
        // Proceed with Swal.fire if reloadamount meets the requirements
        Swal.fire({
            text: "Are you sure you want to reload the card?",
            icon: "warning",
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonText: "Yes",
            cancelButtonText: "No",
            customClass: {
                confirmButton: "btn fw-bold btn-danger",
                cancelButton: "btn fw-bold btn-active-light-primary"
            }
        }).then((result) => {
            if (result.isConfirmed) {
                // Process the form submission
                document.getElementById("reloadform{{$d->id}}").submit();
            }
        });
    }
</script>



                
                                                </div>

                                                
                                            </div>
                                        </div>
                                    </div>
                                    @endif









                                <!-------MESSAGE MODAL--------->
                                <!-------MESSAGE MODAL--------->
                                <!-------MESSAGE MODAL--------->
                                <!-------MESSAGE MODAL--------->
                                <!-------MESSAGE MODAL--------->







                                    @if($d->message != '')
                                        <div class="modal fade" tabindex="-1" id="kt_modal_{{$d->id}}">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title">Message</h3>

                                                    <!--begin::Close-->
                                                    <div class="btn btn-icon btn-sm btn-danger ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                        <i class="ki-solid ki-cross fs-1"></i>
                                                    </div>
                                                    <!--end::Close-->
                                                </div>

                                                <div class="modal-body">
                                                    <p> {{$d->message}} </p>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif



                                    <!------TRANSACTION MODAL---------->
                                    <!------TRANSACTION MODAL---------->
                                    <!------TRANSACTION MODAL---------->
                                    <!------TRANSACTION MODAL---------->
                                    <!------TRANSACTION MODAL---------->









                                    @if($d->status == '1' || $d->status == '4' || $d->status == '5' || $d->status == '6' || $d->status == '7')
                                    <div class="modal fade" tabindex="-1" id="transaction_{{$d->id}}">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title">Transactions</h3>
                                                    Card no: {{$d->number}}

                                                    <!--begin::Close-->
                                                    <div class="btn btn-icon btn-sm btn-danger ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                        <i class="ki-solid ki-cross fs-1"></i>
                                                    </div>
                                                    <!--end::Close-->
                                                </div>

                                                <div class="modal-body">


                                                <div class="alert alert-warning d-flex align-items-center p-5">
                                                                                    <i class="ki-duotone ki-watch fs-2hx text-info me-4">
                                                                                    <span class="path1"></span>
                                                                                    <span class="path2"></span>
                                                            
                                                                                    </i>
                                                                                    <div class="d-flex flex-column">
                                                                                        <h4 class="mb-1 text-warning">Be patient</h4>
                                                                                        <span>It may take a few minutes for the transaction to appear in the list</span>
                                                                                    </div>
                                                                                </div>



                           <!--begin::Table-->
                           <table class="table align-middle table-row-dashed fs-6 gy-5" id="transaction_table_{{$d->id}}">
                                <thead>
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">

                                        <th class="min-w-100px">SL</th>
                        
                                        <th class="min-w-100px">Details</th>
                                        <th class="min-w-70px">Status</th>
                                        <th class="min-w-100px">Card Amount</th>
                                        
                                        <th class="min-w-100px">Post Balance</th>
                                        <th class="min-w-100px">Trx</th>
                                        <th class="min-w-100px text-end ">Date</th>
                                
                                     

                                    </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-600">



                                    @php
                                    $i=1;
                                    $cardtrans = \App\CardTrans::where('card_id',$d->id)->orderby('created_at', 'desc')->get(); 
                                    @endphp




                                    @foreach($cardtrans as $dtrans)

                                  

                                    <tr>

                                        <td data-kt-ecommerce-order-filter="order_id">
                                            {{$i++}}
                                        </td>

                               

                                        <td>
                                            {{$dtrans->details}}
                                        </td>





                                        @if($dtrans->status == '1')
                                        <td class=" pe-0" data-order="Success">
                                            <!--begin::Badges-->
                                            <div class="badge badge-light-success">Success</div>
                                            <!--end::Badges-->

                                            @if($dtrans->message != '')
                                            <a href class="badge badge-light-info" data-bs-stacked-modal="#kt_modal_stacked_{{$dtrans->id}}">Show Message</a>
                                            @endif
                                        </td>
                                        @elseif($dtrans->status == '2')
                                        <td class="text-end pe-0" data-order="Processing">
                                            <!--begin::Badges-->
                                            <div class="badge badge-light-warning">Processing</div>
                                            <!--end::Badges-->
                                            @if($dtrans->message != '')
                                            <a href class="badge badge-light-info" data-bs-stacked-modal="#kt_modal_stacked_{{$dtrans->id}}">Show Message</a>
                                            @endif
                                        </td>

                                        @elseif($dtrans->status == '3')
                                        <td class="text-end pe-0" data-order="Rejected">
                                            <!--begin::Badges-->
                                            <div class="badge badge-light-danger">Rejected</div>
                                            <!--end::Badges-->
                                            @if($dtrans->message != '')
                                            <a href class="badge badge-light-info" data-bs-stacked-modal="#kt_modal_stacked_{{$dtrans->id}}">Show Message</a>
                                            @endif
                                        </td>
                                        @else
                                        <td class="text-end pe-0" data-order="Error">
                                            <!--begin::Badges-->
                                            <div class="badge badge-light-danger">Error</div>
                                            <!--end::Badges-->
                                            @if($dtrans->message != '')
                                            <a href class="badge badge-light-info" data-bs-toggle="modal" data-bs-target="#kt_modal_{{$dtrans->id}}">Show Message</a>
                                            @endif
                                        </td>

                                        @endif



                                        <td>
                                            

                                            @if($dtrans->type=='+')
                                            <span class="text-success fw-bold">{{$dtrans->type}}{{$gnl->cursym}}{{$dtrans->amount}}</span>
                                            @else
                                            <span class="text-danger fw-bold">{{$dtrans->type}}{{$gnl->cursym}}{{$dtrans->amount}}</span>
                                            @endif
                                        </td>





                           
                                        <td>
                                            <span class="fw-bold">
                                            @if($dtrans->postbalance!=NULL)
                                                {{$gnl->cursym}}{{$dtrans->postbalance}}
                                            @endif

                                            </span>
                                        </td>

                                        <td>
                                            {{$dtrans->trx}}
                                        </td>



                                        <td data-order="@php
                                                            $formattedDate =\Carbon\Carbon::parse($d->created_at)->format('Y-m-d');
                                                            @endphp">
                                            <span class="fw-bold text-end ">
                                                @php
                                                $formattedDate =\Carbon\Carbon::parse($dtrans->created_at)->format('d-m-Y');
                                                @endphp

                                                <!-- Display the formatted date -->
                                                {{$formattedDate}}</span>
                                        </td>







                                        @if($dtrans->message != '')
                                        <div class="modal fade" tabindex="-1" id="kt_modal_stacked_{{$dtrans->id}}"  style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Message</h3>
                            
                            <!--begin::Close-->
                            <div class="btn btn-icon btn-sm btn-danger ms-2" data-bs-dismiss="modal" aria-label="Close">
                                <i class="ki-solid ki-cross fs-1"></i>                            </div>
                            <!--end::Close-->
                        </div>

                        <div class="modal-body">
             
                               {{$dtrans->message}}
                     

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            @endif

                                     
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!--end::Table-->
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif








                                    
@endforeach

       

        <!-------RELOAD CARD MINIMUM-------->
        <!-------RELOAD CARD MINIMUM-------->
        <!-------RELOAD CARD MINIMUM-------->
        <!-------RELOAD CARD MINIMUM-------->
        <!-------RELOAD CARD MINIMUM-------->

                                                <script>
                                                        const inputFields = document.querySelectorAll('.text_input');
                                                        const totalDisplays = document.querySelectorAll('.total_display');
                                                        const submitButtons = document.querySelectorAll('.formvalidation_submit');

                                                        inputFields.forEach((inputField, index) => {
                                                            inputField.addEventListener('input', function () {
                                                                const enteredValue = parseFloat(inputField.value);
                                                                const totalDisplay = totalDisplays[index];
                                                                const submitButton = submitButtons[index];

                                                                if (isNaN(enteredValue) || inputField.value.trim() === '') {
                                                                    totalDisplay.textContent = 'Minimum card reload amount is {{$gnl->minreload}}';
                                                                    totalDisplay.classList.remove('text-primary');
                                                                    totalDisplay.classList.add('text-danger');
                                                                    submitButton.disabled = true;
                                                                } else {
                                                                    if (enteredValue < {{$gnl->minreload}}) {
                                                                        totalDisplay.textContent = 'Minimum card reload amount is {{$gnl->minreload}}';
                                                                        totalDisplay.classList.remove('text-primary');
                                                                        totalDisplay.classList.add('text-danger');
                                                                        submitButton.disabled = true;
                                                                    } else {
                                                                        totalDisplay.classList.remove('text-danger');
                                                                        totalDisplay.classList.add('text-primary');
                                                                        const fee = enteredValue * {{$gnl->reloadfee}};
                                                                        const roundedFee = fee.toFixed(2);
                                                                        const total = enteredValue + fee;
                                                                        const roundedTotal = total.toFixed(2);

                                                                        totalDisplay.textContent = `Total = ${enteredValue} + ${roundedFee} (Fee {{$gnl->reloadfee*100}}%) = ${roundedTotal}`;
                                                                        submitButton.disabled = false;
                                                                    }
                                                                }
                                                            });
                                                        });
                                                    </script>

        

        <!-------WITHDRAW CARD MINIMUM-------->
        <!-------WITHDRAW CARD MINIMUM-------->
        <!-------WITHDRAW CARD MINIMUM-------->
        <!-------WITHDRAW CARD MINIMUM-------->
        <!-------WITHDRAW CARD MINIMUM-------->

                                                        <script>
                                                        const inputFieldsw = document.querySelectorAll('.text_inputw');
                                                        const totalDisplaysw = document.querySelectorAll('.total_displayw');
                                                        const submitButtonsw = document.querySelectorAll('.formvalidation_submitw');

                                                        inputFieldsw.forEach((inputFieldw, index) => {
                                                            inputFieldw.addEventListener('input', function () {
                                                                const enteredValuew = parseFloat(inputFieldw.value);
                                                                const totalDisplayw = totalDisplaysw[index];
                                                                const submitButtonw = submitButtonsw[index];

                                                                if (isNaN(enteredValuew) || inputFieldw.value.trim() === '') {
                                                                    totalDisplayw.textContent = 'Minimum card withdraw amount is {{$gnl->mincwith}}';
                                                                    totalDisplayw.classList.remove('text-primary');
                                                                    totalDisplayw.classList.add('text-danger');
                                                                    submitButtonw.disabled = true;
                                                                } else {
                                                                    if (enteredValuew < {{$gnl->mincwith}}) {
                                                                        totalDisplayw.textContent = 'Minimum card withdraw amount is {{$gnl->mincwith}}';
                                                                        totalDisplayw.classList.remove('text-primary');
                                                                        totalDisplayw.classList.add('text-danger');
                                                                        submitButtonw.disabled = true;
                                                                    } else {
                                                                        totalDisplayw.classList.remove('text-danger');
                                                                        totalDisplayw.classList.add('text-primary');
                                                                        const feew = enteredValuew * {{$gnl->cwithfee}};
                                                                        const roundedFeew = feew.toFixed(2);
                                                                        const totalw = enteredValuew + feew;
                                                                        const roundedTotalw = totalw.toFixed(2);

                                                                        totalDisplayw.textContent = `Total = ${enteredValuew} + ${roundedFeew} (Fee {{$gnl->cwithfee*100}}%) = ${roundedTotalw}`;
                                                                        submitButtonw.disabled = false;
                                                                    }
                                                                }
                                                            });
                                                        });
                                                    </script>


@endsection










@section('js')

<script>
    var elements = Array.prototype.slice.call(document.querySelectorAll("[data-bs-stacked-modal]"));

if (elements && elements.length > 0) {
    elements.forEach((element) => {
        if (element.getAttribute("data-kt-initialized") === "1") {
            return;
        }

        element.setAttribute("data-kt-initialized", "1");

        element.addEventListener("click", function(e) {
            e.preventDefault();

            const modalEl = document.querySelector(this.getAttribute("data-bs-stacked-modal"));

            if (modalEl) {
                const modal = new bootstrap.Modal(modalEl);
                modal.show();
            }
        });
    });
}
</script>

<script>
    "use strict";

    var initEcommerceSalesListing = function(tableId) {
        var e, t, n, r, o, a = (e, n, a) => {
            r = e[0] ? new Date(e[0]) : null, o = e[1] ? new Date(e[1]) : null;
            $.fn.dataTable.ext.search.push((function(e, t, n) {
                var a = r,
                    c = o,
                    l = new Date(moment($(t[5]).text(), "DD/MM/YYYY")),
                    u = new Date(moment($(t[5]).text(), "DD/MM/YYYY"));
                return null === a && null === c || null === a && c >= u || a <= l && null === c || a <= l && c >= u;
            }));
            t.draw();
        };

        var deleteRow = function(n, t) {
            const r = n.querySelector('[data-kt-ecommerce-order-filter="order_id"]').innerText;
            Swal.fire({
                text: "Are you sure you want to delete order: " + r + "?",
                icon: "warning",
                showCancelButton: !0,
                buttonsStyling: !1,
                confirmButtonText: "Yes, delete!",
                cancelButtonText: "No, cancel",
                customClass: {
                    confirmButton: "btn fw-bold btn-danger",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                }
            }).then((function(e) {
                e.value ? Swal.fire({
                    text: "You have deleted " + r + "!.",
                    icon: "success",
                    buttonsStyling: !1,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn fw-bold btn-primary"
                    }
                }).then((function() {
                    t.row($(n)).remove().draw();
                })) : "cancel" === e.dismiss && Swal.fire({
                    text: r + " was not deleted.",
                    icon: "error",
                    buttonsStyling: !1,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn fw-bold btn-primary"
                    }
                });
            }));
        };

        var initTable = function() {
            e = document.querySelector(tableId);
            if (e) {
                t = $(e).DataTable({
                    info: !1,
                    order: [],
                    pageLength: 10,
                    columnDefs: [{
                        orderable: !1,
                    }, {
                        orderable: !1,
                    }]
                });

                t.on("draw", (function() {
                    c();
                }));

                const flatpickrElement = document.querySelector("#kt_ecommerce_sales_flatpickr");
                n = $(flatpickrElement).flatpickr({
                    altInput: !0,
                    altFormat: "d/m/Y",
                    dateFormat: "Y-m-d",
                    mode: "range",
                    onChange: function(e, t, n) {
                        a(e, t, n);
                    }
                });

                document.querySelector('[data-kt-ecommerce-order-filter="search"]').addEventListener("keyup", (function(e) {
                    t.search(e.target.value).draw();
                }));

                const statusFilter = document.querySelector('[data-kt-ecommerce-order-filter="status"]');
                $(statusFilter).on("change", (e => {
                    let n = e.target.value;
                    "all" === n && (n = ""), t.column(6).search(n).draw();
                }));

                c();

                document.querySelector("#kt_ecommerce_sales_flatpickr_clear").addEventListener("click", (e => {
                    n.clear();
                }));

                document.querySelectorAll('[data-kt-ecommerce-order-filter="delete_row"]').forEach((deleteButton => {
                    deleteButton.addEventListener("click", (function(e) {
                        e.preventDefault();
                        const row = e.target.closest("tr");
                        deleteRow(row, t);
                    }));
                }));
            }
        };

        var c = () => {
            e.querySelectorAll('[data-kt-ecommerce-order-filter="delete_row"]').forEach((deleteButton => {
                deleteButton.addEventListener("click", (function(e) {
                    e.preventDefault();
                    const row = e.target.closest("tr");
                    deleteRow(row, t);
                }));
            }));
        };

        return {
            init: initTable
        };
    };

    // Initialize for multiple tables
    KTUtil.onDOMContentLoaded((function() {
        var table1 = initEcommerceSalesListing("#transaction_table");
        table1.init();

  
        // Add more tables as needed...
    }));
</script>




<script>
@foreach($data as $d)
  $("#transaction_table_{{$d->id}}").DataTable();
@endforeach

</script>



<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get all elements with the class "holdername"
        var elements = document.querySelectorAll('.card_no');

        // Iterate through each element
        elements.forEach(function (element) {
            // Get the content of the element
            var content = element.textContent;

            // Replace the 16-digit number with formatted number
            var formattedNumber = content.replace(/(\d{4})/g, '$1 ').trim();

            
            // Update the content of the element
            element.textContent = formattedNumber;
        });
    });
</script>

@endsection