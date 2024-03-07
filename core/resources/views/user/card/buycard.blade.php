@extends('fontend.master')
@section('css')

@endsection
@section('content')
    <!-- testimonial page content area start-->

    @extends('fontend.authmaster')
@section('css')

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
                        <a href="#" class="btn btn-flex btn-sm btn-body btn-color-gray-600 h-35px bg-body fw-bold"
                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">History</a>
                        <!--begin::Menu 1-->
                        <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true"
                            id="kt_menu_64b780a6cfff2">
                            <!--begin::Header-->
                            <div class="px-7 py-5">
                                <div class="fs-5 text-dark fw-bold">Filter Options</div>
                            </div>
                            <!--end::Header-->

                        </div>
                        <!--end::Menu 1-->
                        <!--end::Menu-->
                    </div>
                    <!--end::Secondary button-->
                    <!--begin::Primary button-->
                  <a  href="{{url('')}}/home/add_card" class="btn btn-sm btn-flex btn-dark h-35 px-3">
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
                    <!--begin::Row-->
                    <div class="row g-5 g-xl-10 mb-xl-10">







                    <div class="card mb-5 mb-xxl-8">
										<div class="card-body pt-9 pb-0">
											<!--begin::Details-->
											<div class="d-flex flex-wrap flex-sm-nowrap">
										
												<!--begin::Info-->
												<div class="flex-grow-1">
													<!--begin::Title-->
													<div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
														<!--begin::User-->
														<div class="d-flex flex-column">
															<!--begin::Name-->
															<div class="d-flex align-items-center mb-2">
																<span  class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">Welcome {{Auth::user()->name}}</span>
																
															</div>
															<!--end::Name-->

														</div>
														<!--end::User-->
    
													</div>
													<!--end::Title-->
													<!--begin::Stats-->
													<div class="d-flex flex-wrap flex-stack">
														<!--begin::Wrapper-->
														<div class="d-flex flex-column flex-grow-1 pe-8">
															<!--begin::Stats-->
															<div class="d-flex flex-wrap">
																<!--begin::Stat-->
																<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
																	<!--begin::Number-->
																	<div class="d-flex align-items-center">
																	
																		<div class="fs-2 fw-bold counted" data-kt-countup="true" data-kt-countup-value="4500" data-kt-countup-prefix="$" data-kt-initialized="1">{{ \App\card::where('user_id', \Illuminate\Support\Facades\Auth::id())->count() }}</div>
																	</div>
																	<!--end::Number-->
																	<!--begin::Label-->
																	<div class="fw-semibold fs-6 text-gray-400">Total Purchased Card</div>
																	<!--end::Label-->
																</div>
																<!--end::Stat-->

															</div>
															<!--end::Stats-->
														</div>
														<!--end::Wrapper-->
														<!--begin::Progress-->
														<div class="d-flex align-items-center w-200px w-sm-300px flex-column mt-3">
															<div class="d-flex justify-content-between w-100 mt-auto mb-2">
																<span class="fw-semibold fs-6 text-gray-400">Profile Compleation</span>
																<span class="fw-bold fs-6">50%</span>
															</div>
															<div class="h-5px mx-3 w-100 bg-light mb-3">
																<div class="bg-success rounded h-5px" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
															</div>
														</div>
														<!--end::Progress-->
													</div>
													<!--end::Stats-->
												</div>
												<!--end::Info-->
											</div>
											<!--end::Details-->
								
										</div>
									</div>







                        <div class="col-md-4">
                            <!--begin::Card widget 7-->
                            <div class="card">
                                <!--begin::Header-->
                                <div class="card-header pt-5">
                                    <a href="{{url('home/transaction')}}">
                                        <!--begin::Title-->
                                        <h4>Deposit Now</h4>
                                        <!--end::Title-->
                                        <span class="post">Total Payment Method:
                                            {{\App\Gateway::where('status', 1)->count()}}</span>
                                    </a>
                                </div>
                                <!--end::Header-->
                            </div>
                            <!--end::Card widget 7-->
                        </div>



                        <div class="col-md-4">
                            <!--begin::Card widget 7-->
                            <div class="card">
                                <!--begin::Header-->
                                <div class="card-header pt-5">
                                    <a href="{{url('home/transaction')}}">
                                        <!--begin::Title-->
                                        <h4>Buy Card</h4>
                                        <!--end::Title-->
                                        <span class="post">Total Card Category:
                                            {{\App\cardcategory::where('status', 1)->count()}}</span>
                                    </a>
                                </div>
                                <!--end::Header-->
                            </div>
                            <!--end::Card widget 7-->
                        </div>


















                    </div>
                    <!--end::Row-->

                </div>
                <!--end::Content-->
            </div>
            <!--end::Content wrapper-->
            <!--begin::Footer-->
            <div id="kt_app_footer" class="app-footer d-flex flex-column flex-md-row flex-center flex-md-stack pb-3">
                <!--begin::Copyright-->
                <div class="text-dark order-2 order-md-1">
                    <span class="text-muted fw-semibold me-1">2023&copy;</span>
                    <a href="https://keenthemes.com" target="_blank"
                        class="text-gray-800 text-hover-primary">Keenthemes</a>
                </div>
                <!--end::Copyright-->
                <!--begin::Menu-->
                <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                    <li class="menu-item">
                        <a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
                    </li>
                    <li class="menu-item">
                        <a href="https://devs.keenthemes.com" target="_blank" class="menu-link px-2">Support</a>
                    </li>
                    <li class="menu-item">
                        <a href="https://1.envato.market/EA4JP" target="_blank" class="menu-link px-2">Purchase</a>
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
@endsection
@section('js')

@endsection

    <!-- testimonial page content area end-->
@endsection