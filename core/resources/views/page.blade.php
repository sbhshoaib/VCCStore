@extends('fontend.authmaster')
@section('css')


@section('content')

			<!--begin::Wrapper-->
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
			




<!--begin::Wrapper container-->
<div class="app-container container-xxl d-flex">
						<!--begin::Main-->
						<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
							<!--begin::Content wrapper-->
							<div class="d-flex flex-column flex-column-fluid">
								<!--begin::Content-->
								<div id="kt_app_content" class="app-content pb-0">
                                <div class="card mb-5 mb-xl-10">
										<!--begin::Body-->
										<div class="card-body py-10">
											

                        <h1>{{$page->title}}</h1>

                        <hr>


                        <br>

                        {!!$page->content!!}




										</div>
										<!--end::Body-->
									</div>
								</div>
								<!--end::Content-->
							</div>
							<!--end::Content wrapper-->
		


				
					
					
						
						
				

                @endsection
                @section('js')
             
                @endsection