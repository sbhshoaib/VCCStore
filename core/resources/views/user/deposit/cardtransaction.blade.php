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


                        <li class="breadcrumb-item text-gray-700 fw-bold lh-1">Card Transactions</li>
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
                    <!--begin::Products-->
                    <div class="card card-flush">
                        <!--begin::Card header-->
                        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                            
                                <h3 class="w-100 mt-5" >Card transactions</h3>
                                <span class="w-100" >To see your account transaction click <a href="{{url('home/transaction')}}"> here</a></span>
                                
                            <!--begin::Card title-->
                            <div class="card-title searchtop">
                                
                                
                                <!--begin::Search-->
                                <div class="d-flex align-items-center position-relative my-1">
                                    <i class="ki-outline ki-magnifier fs-3 position-absolute ms-4"></i>
                                    <input type="text" data-kt-ecommerce-order-filter="search"
                                        class="searchtrans form-control form-control-solid w-250px ps-12"
                                        placeholder="Search Transaction" />
                                </div>
                                <!--end::Search-->
                            </div>
                            <!--end::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar flex-row-fluid justify-content-end gap-5 fttop">
                                <!--begin::Flatpickr-->
                                <div class="input-group w-250px">
                                    <input class="form-control form-control-solid rounded rounded-end-0"
                                        placeholder="Pick date range" id="kt_ecommerce_sales_flatpickr" />
                                    <button class="btn btn-icon btn-light" id="kt_ecommerce_sales_flatpickr_clear">
                                        <i class="ki-outline ki-cross fs-2"></i>
                                    </button>
                                </div>
                                <!--end::Flatpickr-->
                                <div class="w-100 mw-150px ftstatus">
                                    <!--begin::Select2-->
                                    <select class="form-select form-select-solid" data-control="select2"
                                        data-hide-search="true" data-placeholder="Status"
                                        data-kt-ecommerce-order-filter="status">
                                        <option></option>
                                        <option value="all">All</option>

                                        <option value="Success">Success</option>
                                        <option value="Processing">Processing</option>
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


                                                <th class="min-w-100px">Card No</th>
                        
                                        <th class="min-w-100px">Details</th>
                                              <th class="min-w-100px">Trx</th>
                                        <th class="min-w-70px">Status</th>
                                        <th class="min-w-100px">Card Amount</th>
                                        
                                        <th class="min-w-100px">Post Balance</th>
                                  
                                        <th class="min-w-100px text-end ">Date</th>
                                
                      

                                    </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-600">



                                    @php
                                    $i=0;
                                    @endphp

                                     @foreach($tran as $dtrans)

                                                            
                                           @php
                                              $i=1;
                                           $cardinfo = \App\CardRequest::find($dtrans->card_id); 
                                           @endphp
                                    <tr>



                                        <td data-kt-ecommerce-order-filter="order_id">
                                            {{$cardinfo->number}}
                                        </td>

                               

                                        <td>
                                            {{$dtrans->details}}
                                        </td>




                                        <td>
                                            {{$dtrans->trx}}
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
                                        <td class="pe-0" data-order="Processing">
                                            <!--begin::Badges-->
                                            <div class="badge badge-light-warning">Processing</div>
                                            <!--end::Badges-->
                                            @if($dtrans->message != '')
                                            <a href class="badge badge-light-info" data-bs-stacked-modal="#kt_modal_stacked_{{$dtrans->id}}">Show Message</a>
                                            @endif
                                        </td>

                                        @elseif($dtrans->status == '3')
                                        <td class="pe-0" data-order="Rejected">
                                            <!--begin::Badges-->
                                            <div class="badge badge-light-danger">Rejected</div>
                                            <!--end::Badges-->
                                            @if($dtrans->message != '')
                                            <a href class="badge badge-light-info" data-bs-stacked-modal="#kt_modal_stacked_{{$dtrans->id}}">Show Message</a>
                                            @endif
                                        </td>
                                        @else
                                        <td class="pe-0" data-order="Error">
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




                                        <td  class="min-w-100px text-end " data-order="@php
                                                            $formattedDate =\Carbon\Carbon::parse($dtrans->created_at)->format('Y-m-d');
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
var KTAppEcommerceSalesListing = function() {
    var e, t, n, r, o, a = (e, n, a) => {
            r = e[0] ? new Date(e[0]) : null, o = e[1] ? new Date(e[1]) : null, $.fn.dataTable.ext.search.push((
                function(e, t, n) {
                    var a = r,
                        c = o,
                        l = new Date(moment($(t[6]).text(), "DD/MM/YYYY")),
                        u = new Date(moment($(t[6]).text(), "DD/MM/YYYY"));
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
@endsection