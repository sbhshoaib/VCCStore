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
									
									
									
										<li class="breadcrumb-item text-gray-700 fw-bold lh-1">Referrals</li>
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
										<!--begin::Body-->
										<div class="card-body py-10">
											<!--begin::Overview-->
											<div class="row mb-10">
											
													<h4 class="text-gray-800 mb-0">Your Referral Link</h4>
													<p class="fs-6 fw-semibold text-gray-600 py-4 m-0">You will receive {{$gnl->cursym}}5 commission when someone you referred makes a deposit of $50 or more</p>
													<div class="d-flex">
														<input id="kt_referral_link_input" type="text" class="form-control form-control-solid me-3 flex-grow-1" name="search" value="{{ env('APP_URL') }}/referral/{{Auth::id()}}">
														<button id="kt_referral_program_link_copy_btn" class="btn btn-light btn-active-light-primary fw-bold flex-shrink-0" data-clipboard-target="#kt_referral_link_input">Copy Link</button>
													</div>
											
											</div>
											<!--end::Overview-->
										</div>
										<!--end::Body-->
									</div>
								</div>
								<!--end::Content-->
							</div>
							<!--end::Content wrapper-->
						
						</div>
						<!--end:::Main-->
					</div>
					<!--end::Wrapper container-->




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
											<div class="card-title searchtop">
												<!--begin::Search-->
												<div class="d-flex align-items-center position-relative my-1">
													<i class="ki-outline ki-magnifier fs-3 position-absolute ms-4"></i>
													<input type="text" data-kt-ecommerce-order-filter="search" class="form-control form-control-solid w-100 ps-12" placeholder="Search User" />
												</div>
												<!--end::Search-->
											</div>
											<!--end::Card title-->
											<!--begin::Card toolbar-->
											<div class="card-toolbar flex-row-fluid justify-content-end gap-5 fttop">
												<!--begin::Flatpickr-->
												<div class="input-group w-250px">
													<input class="form-control form-control-solid rounded rounded-end-0" placeholder="Pick date range" id="kt_ecommerce_sales_flatpickr" />
													<button class="btn btn-icon btn-light" id="kt_ecommerce_sales_flatpickr_clear">
														<i class="ki-outline ki-cross fs-2"></i>
													</button>
												</div>
												<!--end::Flatpickr-->
												<div class="w-100 mw-150px ftstatus">
													<!--begin::Select2-->
													<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Status" data-kt-ecommerce-order-filter="status">
														<option></option>
														<option value="all">All</option>

														<option value="Given">Given</option>
														<option value="Pending">Pending</option>
					
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
											<table class="table align-middle table-row-dashed fs-6 gy-5" id="Referral_table">
												<thead>
													<tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
													
														<th class="min-w-100px">User</th>			
														<th class="text-end min-w-100px">Amount</th>
														<th class="text-end min-w-100px">Date</th>
                                                        <th class="text-end min-w-70px">Status</th>
											
													</tr>
												</thead>
												<tbody class="fw-semibold text-gray-600">


                                                
                                                @php
                                                    $i=0;
                                                    @endphp

                                                    @foreach($referlist as $d)


													<tr>
														
														<td data-kt-ecommerce-order-filter="order_id">
															 {{$d->name}}
														</td>
														



														
														

														<td class="text-end">
															<span class="fw-bold">
                                                          
                                                            {{$gnl->cursym}} 5


                                                            </span>
														</td>

                                                   
                                                        <td class="text-end" data-order="       @php
                                                            $formattedDate =\Carbon\Carbon::parse($d->created_at)->format('Y-m-d');
                                                            @endphp">
															<span class="fw-bold">     
                                                            @php
                                                            $formattedDate =\Carbon\Carbon::parse($d->created_at)->format('d-m-Y');
                                                            @endphp

                                                            <!-- Display the formatted date -->
                                                            {{$formattedDate}}</span>
														</td>


                                                        
                                                        @if($d->refstat == '1')
                                                        <td class="text-end pe-0" data-order="Given">
															<!--begin::Badges-->
															<div class="badge badge-light-success">Commision Given</div>
															<!--end::Badges-->
														</td>
                                                            @else
                                                            <td class="text-end pe-0" data-order="Pending">
															<!--begin::Badges-->
															<div class="badge badge-light-danger">Commision Pending</div>
															<!--end::Badges-->
														</td>
                                                            @endif
												
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
						
				

                @endsection
                @section('js')
                <script>

"use strict";
var KTAppEcommerceSalesListing = function () {
   var e, t, n, r, o, a = (e, n, a) => {
         r = e[0] ? new Date(e[0]) : null, o = e[1] ? new Date(e[1]) : null, $.fn.dataTable.ext.search.push((function (e, t, n) {
            var a = r,
               c = o,
               l = new Date(moment($(t[2]).text(), "DD/MM/YYYY")),
               u = new Date(moment($(t[2]).text(), "DD/MM/YYYY"));
            return null === a && null === c || null === a && c >= u || a <= l && null === c || a <= l && c >= u
         })), t.draw()
      },
      c = () => {
         e.querySelectorAll('[data-kt-ecommerce-order-filter="delete_row"]').forEach((e => {
            e.addEventListener("click", (function (e) {
               e.preventDefault();
               const n = e.target.closest("tr"),
                  r = n.querySelector('[data-kt-ecommerce-order-filter="order_id"]').innerText;
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
               }).then((function (e) {
                  e.value ? Swal.fire({
                     text: "You have deleted " + r + "!.",
                     icon: "success",
                     buttonsStyling: !1,
                     confirmButtonText: "Ok, got it!",
                     customClass: {
                        confirmButton: "btn fw-bold btn-primary"
                     }
                  }).then((function () {
                     t.row($(n)).remove().draw()
                  })) : "cancel" === e.dismiss && Swal.fire({
                     text: r + " was not deleted.",
                     icon: "error",
                     buttonsStyling: !1,
                     confirmButtonText: "Ok, got it!",
                     customClass: {
                        confirmButton: "btn fw-bold btn-primary"
                     }
                  })
               }))
            }))
         }))
      };
   return {
      init: function () {
         (e = document.querySelector("#Referral_table")) && ((t = $(e).DataTable({
            info: !1,
            order: [],
            pageLength: 10,
            columnDefs: [{
               orderable: !1,
                target: 0
            }, {
               orderable: !1,
             
            }]
         })).on("draw", (function () {
            c()
         })), (() => {
            const e = document.querySelector("#kt_ecommerce_sales_flatpickr");
            n = $(e).flatpickr({
               altInput: !0,
               altFormat: "d/m/Y",
               dateFormat: "Y-m-d",
               mode: "range",
               onChange: function (e, t, n) {
                  a(e, t, n)
               }
            })
         })(), document.querySelector('[data-kt-ecommerce-order-filter="search"]').addEventListener("keyup", (function (e) {
            t.search(e.target.value).draw()
         })), (() => {
            const e = document.querySelector('[data-kt-ecommerce-order-filter="status"]');
            $(e).on("change", (e => {
               let n = e.target.value;
               "all" === n && (n = ""), t.column(2).search(n).draw()
            }))
         })(), c(), document.querySelector("#kt_ecommerce_sales_flatpickr_clear").addEventListener("click", (e => {
            n.clear()
         })))
      }
   }
}();
KTUtil.onDOMContentLoaded((function () {
   KTAppEcommerceSalesListing.init()
}));

</script>

<script>
    "use strict";var KTAccountReferralsReferralProgram={init:function(){var e,r;e=document.querySelector("#kt_referral_program_link_copy_btn"),r=document.querySelector("#kt_referral_link_input"),new ClipboardJS(e).on("success",(function(s){var n=e.innerHTML;r.classList.add("bg-success"),r.classList.add("text-inverse-success"),e.innerHTML="Copied!",setTimeout((function(){e.innerHTML=n,r.classList.remove("bg-success"),r.classList.remove("text-inverse-success")}),3e3),s.clearSelection()}))}};KTUtil.onDOMContentLoaded((function(){KTAccountReferralsReferralProgram.init()}));
</script>
@endsection