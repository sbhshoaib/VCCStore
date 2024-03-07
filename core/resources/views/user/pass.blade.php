@extends('fontend.authmaster')
@section('css')


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
									
									
										<li class="breadcrumb-item text-gray-700 fw-bold lh-1">Account Setting</li>
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
										<a href="{{url('')}}/home/cardlist" class="btn btn-flex btn-sm btn-body btn-color-gray-600 h-35px bg-body fw-bold" >Card List</a>
								
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
								<div id="kt_app_content" class="app-content pb-0">




                                <div class="card mb-5 mb-xl-10">
										<!--begin::Card header-->
										<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
											<!--begin::Card title-->
											<div class="card-title m-0">
												<h3 class="fw-bold m-0">Change Password</h3>
											</div>
											<!--end::Card title-->
										</div>
										<!--begin::Card header-->
										<!--begin::Content-->
										<div id="kt_account_settings_profile_details" class="collapse show">
											<!--begin::Form-->
											<form  method="post" action="{{ route('user.password-update') }}">
                                                @csrf
												<!--begin::Card body-->
												<div class="card-body border-top p-9">
											
											

                                                        <div class="row mb-1">
																<div class="col-lg-4">
																	<div class="fv-row mb-0 fv-plugins-icon-container">
																		<label for="currentpassword" class="form-label fs-6 fw-bold mb-3">Current Password</label>
																		<input type="password" class="form-control form-control-lg form-control-solid" name="passwordold" id="currentpassword">
																	<div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
																</div>
																<div class="col-lg-4">
																	<div class="fv-row mb-0 fv-plugins-icon-container">
																		<label for="newpassword" class="form-label fs-6 fw-bold mb-3">New Password</label>
																		<input type="password" class="form-control form-control-lg form-control-solid" name="password" id="newpassword">
																	<div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
																</div>
																<div class="col-lg-4">
																	<div class="fv-row mb-0 fv-plugins-icon-container">
																		<label for="confirmpassword" class="form-label fs-6 fw-bold mb-3">Confirm New Password</label>
																		<input type="password" class="form-control form-control-lg form-control-solid" name="password_confirmation" id="confirmpassword">
																	<div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
																</div>










															</div>

                                                </div>

                                                


												<!--begin::Actions-->
												<div class="card-footer d-flex justify-content-end py-6 px-9">
												
													<button type="submit" class="btn btn-primary">Save Changes</button>
												</div>
												<!--end::Actions-->
											<input type="hidden"></form>
											<!--end::Form-->
										</div>
										<!--end::Content-->
									</div>








								<!--end::Content-->
							</div>
							<!--end::Content wrapper-->
						
						</div>
						<!--end:::Main-->
					</div>
					<!--end::Wrapper container-->



				</div>
				<!--end::Wrapper-->

                @endsection
                @section('js')

                @endsection