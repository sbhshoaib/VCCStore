@extends('fontend.authmaster')
@section('css')


<div class="position-fixed top-10 end-0 p-3" style="z-index: 1000;top: 24px;">



    @if(session('success'))
    <div class="toast show alert-success" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="true" data-delay="5000">
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
    <div class="toast show alert-danger" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="true" data-delay="5000">
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
                        <li class="breadcrumb-item text-gray-700 fw-bold lh-1">Withdraw</li>
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
                        <div class="col-md-12">
                            <div class="card mb-5 mb-xxl-8">
                                <div class="card-body pt-9 pb-0">
                                    <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#tab_pane_1">Withdraw Money</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#tab_pane_2">Withdraw History</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="tab_pane_1" role="tabpanel">
                                                <div class="d-flex flex-wrap flex-sm-nowrap">
                                                    <!--begin::Info-->
                                                    <div class="col-md-7 m-auto">


                                                           
                                                @if($pendconf>0)
                                                                                                                 
                                                <div class="alert alert-primary d-flex align-items-center p-5">
                                                    <i class="ki-duotone ki-watch fs-2hx text-primary me-4">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                              
                                                    </i>
                                                    <div class="d-flex flex-column">
                                                        <h4 class="mb-1 text-primary">Pending Confirmation</h4>
                                                        <span>We are processing {{$pendconf}} of your withdrawal. Thanks for your patience.</span>
                                                    </div>
                                                </div>
                                               @endif

                                                     
                                                        <!--begin::Form-->


                                                                @php
                                                                   $canwithdraw = \App\User::find(Auth::id());
                                                                @endphp

                                                        @if($canwithdraw->tcard == NULL)
                                                                        
                                                                           
                                                             <div class="alert alert-warning d-flex align-items-center p-5 mb-15 mt-5">
                                                                                    <i class="ki-duotone ki-watch fs-2hx text-warning me-4">
                                                                                    <span class="path1"></span>
                                                                                    <span class="path2"></span>
                                                            
                                                                                    </i>
                                                                                    <div class="d-flex flex-column">
                                                                                        <h4 class="mb-1 text-warning">Withdraw not activated</h4>
                                                                                        <span>You must purchase at least one card to activate the withdrawal</span>
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                                
                                                         @elseif($pendconf  >1)    
                                                         
                                                             <div class="alert alert-warning d-flex align-items-center p-5 mb-15 mt-5">
                                                                                    <i class="ki-duotone ki-watch fs-2hx text-warning me-4">
                                                                                    <span class="path1"></span>
                                                                                    <span class="path2"></span>
                                                            
                                                                                    </i>
                                                                                    <div class="d-flex flex-column">
                                                                                        <h4 class="mb-1 text-warning">Please wait..</h4>
                                                                                        <span>You have two or more pending withdraw. Wait till clearance</span>
                                                                                    </div>
                                                                                </div>
                                                                                
                                                           @else




                                                                                            <!--begin::Form-->
                                            <form id="formvalidation" class="form" method="post" action="{{(route('user.post.withdraw'))}}" autocomplete="off">
                                           
                                           @csrf

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



                                           <div class="fv-row mb-3">
                                                   <!--begin::Label-->
                                                   <label class="required fw-semibold fs-6 mb-2">Enter Amount</label>
                                                   <!--end::Label-->
                                                   <!--begin::Input-->
                                                  
                                                   <input type="number" name="amount" value="{{old('amount')}}" id="amount" class="form-control form-control-solid mb-3 mb-lg-0">
                                               </div>




                                          



                                           <div class="row g-9 fv-row" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]" data-kt-initialized="1">
                                               <label class="required fw-semibold fs-6">Payment Method</label>
                                                       <!--begin::Col-->



                                                       @foreach($gateways as $gway)
                                                       <div class="col-md-5 mt-3">
                                                           <label class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-6" data-kt-button="true">
                                                               <!--begin::Radio button-->
                                                               <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                                   <input class="form-check-input" type="radio" name="g_id" value="{{$gway->id}}"  @if(old('g_id')==$gway->id) checked="checked" @endif >
                                                               </span>
                                                               <!--end::Radio button-->
                                                               <span class="ms-5">
                                                                   <span class="fs-4 fw-bold mb-1 d-block">{{$gway->name}}</span>
                                                               
                                                               </span>
                                                           </label>
                                                       </div>
                                                       <!--end::Col-->
                                               @endforeach
                                                 
                                                   </div>





                                                   <div class="fv-row mb-3 mt-3">
                                                   <!--begin::Label-->
                                                   <label class="required fw-semibold fs-6 mb-2">Wallet Address</label>
                                                   <!--end::Label-->
                                                   <!--begin::Input-->
                                                   <input type="text" name="address" value="{{old('address')}}"  id="address" class="form-control form-control-solid mb-3 mb-lg-0">

                                                     </div>




                                                            <div class="fv-row mb-3 mb-10 mt-10">
                                                                <!--begin::Label-->
                                                                <!--begin::Actions-->
                                                                <button id="formvalidation_submit" type="submit" class="w-100 btn btn-primary">
                                                                    <span class="indicator-label">
                                                                        Withdraw
                                                                    </span>
                                                                    <span class="indicator-progress">
                                                                        Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                                    </span>
                                                                </button>
                                                                <!--end::Actions-->
                                                            </div>

                                       </form>

                                       @endif
                                                    </div>
                                                </div>
                                            </div>



                                                    <!--=================================
                                                    =====================================

                                                    ----------TRANSACTION TAB -----------
                                                    ----------TRANSACTION TAB -----------
                                                    ----------TRANSACTION TAB -----------

                                                    ====================================
                                                    ==================================-->




                                            <div class="tab-pane fade " id="tab_pane_2" role="tabpanel">
                                                    <!--begin::Products-->
                                                        <!--begin::Card header-->
                                                        <div class="card-header align-items-center pb-5 gap-2 gap-md-5" style="padding: 0px;">
                                                            <!--begin::Card title-->
                                                            <div class="card-title searchtop">
                                                                <!--begin::Search-->
                                                                <div class="d-flex align-items-center position-relative my-1">
                                                                    <i class="ki-outline ki-magnifier fs-3 position-absolute ms-4"></i>
                                                                    <input type="text" data-kt-ecommerce-order-filter="search" class="searchtrans form-control form-control-solid w-250px ps-12" placeholder="Search Withdraw" />
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
                                                                        <option value="Successful">Successful</option>
                                                                        <option value="Pending Confirmation">Pending Confirmation</option>
                                                                        <option value="Payment Pending">Payment Pending</option>
                                                                        <option value="Delayed">Delayed</option>
                                                                        <option value="Failed">Failed</option>
                                                                        <option value="Rejected">Rejected</option>
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

                                                                        <th class="min-w-100px">Order ID</th>
                                                                        <th class="min-w-90px">TRX</th>
                                                                        <th class="min-w-100px">Details</th>
                                                                        <th class="text-end min-w-70px">Status</th>
                                                                        <th class="text-end min-w-100px">Amount</th>
                                                                        <th class="text-end min-w-100px">Fee</th>
                                                                        <th class="text-end min-w-100px">Gateway</th>
                                                                        <th class="text-end min-w-100px">Date</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody class="fw-semibold text-gray-600">



                                                                    @php
                                                                    $i=0;
                                                                    @endphp

                                                                    @foreach($d_data as $ddata)


                                                                    <tr>

                                                                        <td data-kt-ecommerce-order-filter="order_id">
                                                                            {{$ddata->id}}
                                                                        </td>
                                                                        <td>

                                                                            @if($ddata->trx!='')
                                                                            {{$ddata->trx}}
                                                                            @else
                                                                            Trx not available
                                                                            @endif

                                                                        </td>


                                                                        <td>

                                                                            {{$ddata->details}}


                                                                        </td>



                                                                        @if($ddata->status == '1')
                                                                        <td class="text-end pe-0" data-order="Successful">

                                                                            <div class="badge badge-light-success">Successful</div>
                                                                            @if($ddata->message != '')
                                                                                <a href class="badge badge-light-info" data-bs-toggle="modal"
                                                                                    data-bs-target="#kt_modal_{{$ddata->id}}">Show Message</a>
                                                                            @endif

                                                                        </td>
                                                                        @elseif($ddata->status == '2')
                                                                        <td class="text-end pe-0" data-order="Pending Confirmation">
                                                                            <div class="badge badge-light-primary">Pending Confirmation</div>
                                                                            @if($ddata->message != '')
                                                                                <a href class="badge badge-light-info" data-bs-toggle="modal"
                                                                                    data-bs-target="#kt_modal_{{$ddata->id}}">Show Message</a>
                                                                            @endif
                                                                        </td>
                                                                        @elseif($ddata->status == '3')
                                                                        <td class="text-end pe-0" data-order="Rejected">
                                                                            <div class="badge badge-light-danger">Rejected</div>
                                                                        
                                                                            @if($ddata->message != '')
                                                                                <a href class="badge badge-light-info" data-bs-toggle="modal"
                                                                                    data-bs-target="#kt_modal_{{$ddata->id}}">Show Message</a>
                                                                            @endif
                                                                      
                                                                        </td>
                                                                        @else
                                                                        <td class="text-end pe-0" data-order="Error">
                                                                            <div class="badge badge-light-danger">Error</div>
                                                                            @if($ddata->message != '')
                                                                                <a href class="badge badge-light-info" data-bs-toggle="modal"
                                                                                    data-bs-target="#kt_modal_{{$ddata->id}}">Show Message</a>
                                                                            @endif
                                                                        </td>
                                                                        @endif



                                                                        <td class="text-end pe-0" style="color: @if($ddata->type=='-') red @else #01a02e @endif;">
                                                                            <span class="fw-bold"> {{$ddata->type}}{{$gnl->cursym}}{{$ddata->amount}}</span>
                                                                        </td>


                                                                        <td class="text-end">
                                                                            <span class="fw-bold">

                                                                                {{$gnl->cursym}}{{$ddata->fee}}


                                                                            </span>
                                                                        </td>


                                                                        <td class="text-end">
                                                                            <span class="fw-bold">


                                                                                @php
                                                                                $gateway = \App\PaymentG::find($ddata->gateway);
                                                                                if($gateway){
                                                                                echo $gateway['name'];
                                                                                }else{
                                                                                echo 'Internal';
                                                                                }

                                                                                @endphp




                                                                            </span>
                                                                        </td>



                                                                        <td class="text-end" data-order="       @php
                                                                                            $formattedDate =\Carbon\Carbon::parse($ddata->created_at)->format('Y-m-d');
                                                                                            @endphp">
                                                                            <span class="fw-bold">
                                                                                @php
                                                                                $formattedDate =\Carbon\Carbon::parse($ddata->created_at)->format('d-m-Y');
                                                                                @endphp

                                                                                <!-- Display the formatted date -->
                                                                                {{$formattedDate}}
                                                                            </span>
                                                                        </td>

                                                                    </tr>


                                                                    <div class="modal fade" tabindex="-1" id="kt_modal_{{$ddata->id}}">
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
                                                                                    <p> {{$ddata->message}} </p>
                                                                                </div>

                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                            <!--end::Table-->
                                                        </div>
                                                        <!--end::Card body-->
                                                    
                                                    <!--end::Products-->
                                            </div>

                                    </div>

                                </div>











                                

                            </div>
                            <!--end::Row-->

                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Content wrapper-->
                </div>
                <!--end:::Main-->
            </div>
            <!--end::Wrapper container-->


       


@endsection




@section('js')

<script>
    "use strict";
    var KTAppEcommerceSalesListing = function() {
        var e, t, n, r, o, a = (e, n, a) => {
                r = e[0] ? new Date(e[0]) : null, o = e[1] ? new Date(e[1]) : null, $.fn.dataTable.ext.search.push((
                    function(e, t, n) {
                        var a = r,
                            c = o,
                            l = new Date(moment($(t[7]).text(), "DD/MM/YYYY")),
                            u = new Date(moment($(t[7]).text(), "DD/MM/YYYY"));
                        return null === a && null === c || null === a && c >= u || a <= l && null === c || a <=
                            l && c >= u
                    })), t.draw()
            },
            c = () => {
                e.querySelectorAll('[data-kt-ecommerce-order-filter="delete_row"]').forEach((e => {
                    e.addEventListener("click", (function(e) {
                        e.preventDefault();
                        const n = e.target.closest("tr"),
                            r = n.querySelector('[data-kt-ecommerce-order-filter="order_id"]')
                            .innerText;
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
            init: function() {
                (e = document.querySelector("#transaction_table")) && ((t = $(e).DataTable({
                    info: !1,
                    order: [],
                    pageLength: 10,
                    columnDefs: [{
                        orderable: !1,

                    }, {
                        orderable: !1,

                    }]
                })).on("draw", (function() {
                    c()
                })), (() => {
                    const e = document.querySelector("#kt_ecommerce_sales_flatpickr");
                    n = $(e).flatpickr({
                        altInput: !0,
                        altFormat: "d/m/Y",
                        dateFormat: "Y-m-d",
                        mode: "range",
                        onChange: function(e, t, n) {
                            a(e, t, n)
                        }
                    })
                })(), document.querySelector('[data-kt-ecommerce-order-filter="search"]').addEventListener(
                    "keyup", (function(e) {
                        t.search(e.target.value).draw()
                    })), (() => {
                    const e = document.querySelector('[data-kt-ecommerce-order-filter="status"]');
                    $(e).on("change", (e => {
                        let n = e.target.value;
                        "all" === n && (n = ""), t.column(3).search(n).draw()
                    }))
                })(), c(), document.querySelector("#kt_ecommerce_sales_flatpickr_clear").addEventListener(
                    "click", (e => {
                        n.clear()
                    })))
            }
        }
    }();
    KTUtil.onDOMContentLoaded((function() {
        KTAppEcommerceSalesListing.init()
    }));
</script>

<script>

document.addEventListener('DOMContentLoaded', function () {
    // Define form element
    const form = document.getElementById('formvalidation');

    // Init form validation rules.
    const validator = FormValidation.formValidation(
        form,
        {
            fields: {
                'amount': {
                    validators: {
                        notEmpty: {
                            message: 'Please enter an amount'
                        },
                        greaterThan: {
                            message: 'Minimum withdrawal amount is {{$gnl->minwith}}',
                            min: {{$gnl->minwith-1}}
                        }
                    }
                },
                'g_id': {
                    validators: {
                        notEmpty: {
                            message: 'Please enter a payment method'
                        }
                    }
                },
                'address': {
                    validators: {
                        notEmpty: {
                            message: 'Please enter wallet address'
                        }
                    }
                }
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap: new FormValidation.plugins.Bootstrap5({
                    rowSelector: '.fv-row',
                    eleInvalidClass: '',
                    eleValidClass: ''
                })
            }
        }
    );

    // Submit button handler
    const submitButton = document.getElementById('formvalidation_submit');
    submitButton.addEventListener('click', function (e) {
        // Prevent default button action
        e.preventDefault();

        // Validate form before submit
        if (validator) {
            validator.validate().then(function (status) {
                console.log('validated!');

                if (status === 'Valid') {
                    // Show loading indication
                    submitButton.setAttribute('data-kt-indicator', 'on');

                    // Disable button to avoid multiple clicks
                    submitButton.disabled = true;


                    // Your form data
                    var formData = new FormData(document.getElementById('formvalidation'));
                    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    formData.append('_token', csrfToken);

                            Swal.fire({
                                text: "Are you sure you want to withdraw amount?",
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
                                
                            


                    // AJAX request
                    fetch('{{ route('user.post.withdraw') }}', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Remove loading indication
                        submitButton.removeAttribute('data-kt-indicator');

                        // Enable button
                        submitButton.disabled = false;

                        if (data.status === 'success') {
                           // Show error message
                           Swal.fire({
                                text: data.message,
                                icon: 'success',
                                buttonsStyling: false,
                                showConfirmButton:false,
                              //  confirmButtonText: 'Ok, got it!',
                            //    customClass: {
                             //       confirmButton: 'btn btn-primary'
                           //     }
                            });
                            setTimeout(function() {
                                window.location.href = data.url; // Replace with your redirect URL
                            }, 2000);
                           
                        } else if (data.status === 'error') {
                            // Show error message
                            Swal.fire({
                                text: data.message,
                                icon: 'error',
                                buttonsStyling: false,
                                confirmButtonText: 'Ok, got it!',
                                customClass: {
                                    confirmButton: 'btn btn-primary'
                                }
                            });
                        } else {
                            // Handle other cases if needed
                        }
                    })

                    })
                    .catch(error => {
                        console.error('Error:', error);
                        // Handle errors here
                    });
                }
            });
        }
    });
});

</script>


@endsection



