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
                        <li class="breadcrumb-item text-gray-700 fw-bold lh-1">Deposit</li>
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
                                            <a class="nav-link active" data-bs-toggle="tab" href="#tab_pane_1">Deposit Money</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#tab_pane_2">Deposit History</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="tab_pane_1" role="tabpanel">
                                                <div class="d-flex flex-wrap flex-sm-nowrap">
                                                    <!--begin::Info-->
                                                    <div class="col-md-7 m-auto">



                                                @if($penddeposit>0)
                                                                                                        
                                                <div class="alert alert-warning d-flex align-items-center p-5">
                                                    <i class="ki-duotone ki-information-4  fs-2hx text-warning me-4">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    </i>
                                                    <div class="d-flex flex-column">
                                                        <h4 class="mb-1 text-warning">Warning</h4>
                                                        <span>You have {{$penddeposit}} pending deposit to pay.</span>
                                                    </div>
                                                </div>
                                                @endif


                                                           
                                                @if($pendconf>0)
                                                                                                                 
                                                <div class="alert alert-primary d-flex align-items-center p-5">
                                                    <i class="ki-duotone ki-watch fs-2hx text-primary me-4">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                              
                                                    </i>
                                                    <div class="d-flex flex-column">
                                                        <h4 class="mb-1 text-primary">Pending Confirmation</h4>
                                                        <span>We are verifying {{$pendconf}} of your payment. Thanks for your patience.</span>
                                                    </div>
                                                </div>
                                               @endif



                                                            @if($pendconf + $penddeposit >2)
                                                                            <div class="alert alert-warning d-flex align-items-center p-5">
                                                                                    <i class="ki-duotone ki-watch fs-2hx text-warning me-4">
                                                                                    <span class="path1"></span>
                                                                                    <span class="path2"></span>
                                                            
                                                                                    </i>
                                                                                    <div class="d-flex flex-column">
                                                                                        <h4 class="mb-1 text-warning">Please wait..</h4>
                                                                                        <span>You have three or more pending deposits. Wait till clearance</span>
                                                                                    </div>
                                                                                </div>
                                                           @else

                                                   



                                                        <!--begin::Form-->
                                                        <form id="formvalidation" class="form" enctype="multipart/form-data" method="post" action="{{(route('deposit.paymentprocess'))}}" autocomplete="off">
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

                                                                <input required type="number" id="amountField" name="amount" value="{{old('amount')}}" id="amount" class="form-control form-control-solid mb-3 mb-lg-0">
                                                            </div>
                                                            <div class="row g-9 fv-row" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]" data-kt-initialized="1">
                                                                <label class="required fw-semibold fs-6">Payment Method</label>
                                                                <!--begin::Col-->
                                                                <div class="col-md-6 mt-3">
                                                                    <label class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-6" data-kt-button="true">
                                                                        <!--begin::Radio button-->
                                                                        <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                                            <input required  onchange="handleRadioChange()" class="form-check-input" type="radio" name="g_id"  id="g_id"  value="1" @if(old('g_id')!='2' ) checked="checked" @endif>
                                                                        </span>
                                                                        <!--end::Radio button-->
                                                                        <span class="ms-5">
                                                                            <span class="">All Cryptocurrency</span>
                                                                            <span class="fs-4 fw-bold mb-1 d-block">Automatic</span>

                                                                        </span>
                                                                    </label>
                                                                </div>
                                                                <!--end::Col-->

                                                                <!--begin::Col-->
                                                                <div class="col-md-6 mt-3 ">
                                                                    <label class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-6" data-kt-button="true">
                                                                        <!--begin::Radio button-->
                                                                        <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                                            <input required  onchange="handleRadioChange()" class="form-check-input" type="radio" name="g_id" value="2" @if(old('g_id')=='2' ) checked="checked" @endif>
                                                                        </span>
                                                                        <!--end::Radio button-->
                                                                        <span class="ms-5">
                                                                            <span class="">USDT</span>
                                                                            <span class="fs-4 fw-bold mb-1 d-block">Instant</span>

                                                                        </span>
                                                                    </label>
                                                                </div>
                                                                <!--end::Col-->
                                                            </div>



                                                                <style>
                                                                    .bg-success{
                                                                            background-color: #8c00ff!important;
                                                                    }
                                                                </style>


                                        <div class="btn btn-outline btn-outline-dashed text-start p-6 mt-10" id="manualpaymentbox" style="display: none;">
											<!--begin::Overview-->
											<div class="fv-row row mb-10">
											
													<h4 class="text-gray-800 mb-0">Manual Payment (Crypto Currency)</h4>
													<p class="fs-6 fw-semibold text-gray-600 py-4 m-0">Please pay amount of total <span style="font-weight: bold;color: black;">{{$gnl->cursym}}</span><span id="manualamount" style="
    font-weight: bold;
    color: black;
">0</span> in the address below and submit proof of payment. We will manually verify your payment</p>
                                                	
                                                    <img src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=TL62inhyn2Akcn1KiwiD7DQxfvaoz2Ni8u&chf=bg,s,00000000" style="
    width: 160px;
    margin: auto;
    padding: 15px;
">
                                                    
                                                    
                                                    <div class="d-flex">
														<input  id="kt_referral_link_input" type="text" class="form-control form-control-solid me-3 flex-grow-1" name="search" value="TL62inhyn2Akcn1KiwiD7DQxfvaoz2Ni8u">
														<a id="kt_referral_program_link_copy_btn" class="btn btn-light btn-active-light-primary fw-bold flex-shrink-0" data-clipboard-target="#kt_referral_link_input">Copy Address</a>
													</div>




                                                    <div class="fv-row mb-3 mt-10">
                                                                <!--begin::Label-->
                                                                <label class="required fw-semibold fs-6 mb-2">Submit proof</label>
                                                                <!--end::Label-->
                                                                <!--begin::Input-->

                                                                <input  type="file"  name="proof" id="proof" class="form-control form-control-solid mb-3 mb-lg-0">
                                                            <span class="text-grey">Please submit a screenshot with transaction hash.</span>
                                                            <br><span class="text-grey"">Supported file type: jpeg,png,jpg,gif. Max Size: 4MB</span>
                                                            </div>







											</div>
											<!--end::Overview-->
										</div>



                                                 




                                                            <div class="fv-row mb-3 mb-10 mt-10">
                                                                <!--begin::Label-->
                                                                <!--begin::Actions-->
                                                                <button id="formvalidation_submit" type="submit" class="w-100 btn btn-primary">
                                                                    <span class="indicator-label">
                                                                        Procceed
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
                                                                    <input type="text" data-kt-ecommerce-order-filter="search" class="searchtrans form-control form-control-solid w-250px ps-12" placeholder="Search Deposit" />
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
                                                                        <td class="text-end pe-0" data-order="Payment Pending">
                                                                            <div class="badge badge-light-warning">Payment Pending</div>
                                                                            <a href="{{$ddata->payurl}}"><span class="badge badge-light-info">Pay Now</span></a>
                                                                            @if($ddata->message != '')
                                                                                <a href class="badge badge-light-info" data-bs-toggle="modal"
                                                                                    data-bs-target="#kt_modal_{{$ddata->id}}">Show Message</a>
                                                                            @endif
                                                                      
                                                                        </td>
                                                                        @elseif($ddata->status == '4')
                                                                        <td class="text-end pe-0" data-order="Delayed">
                                                                            <div class="badge badge-light-info">Delayed</div>
                                                                            @if($ddata->message != '')
                                                                                <a href class="badge badge-light-info" data-bs-toggle="modal"
                                                                                    data-bs-target="#kt_modal_{{$ddata->id}}">Show Message</a>
                                                                            @endif
                                                                        </td>
                                                                        @elseif($ddata->status == '5')
                                                                        <td class="text-end pe-0" data-order="Failed">
                                                                            <div class="badge badge-light-danger">Failed</div>
                                                                            @if($ddata->message != '')
                                                                                <a href class="badge badge-light-info" data-bs-toggle="modal"
                                                                                    data-bs-target="#kt_modal_{{$ddata->id}}">Show Message</a>
                                                                            @endif
                                                                        </td>
                                                                        @elseif($ddata->status == '6')
                                                                        <td class="text-end pe-0" data-order="Rejected">
                                                                            <div class="badge badge-light-danger">Rejected</div>
                                                                            @if($ddata->message != '')
                                                                                <a href class="badge badge-light-info" data-bs-toggle="modal"
                                                                                    data-bs-target="#kt_modal_{{$ddata->id}}">Show Message</a>
                                                                            @endif
                                                                        </td>
                                                                        @elseif($ddata->status == '0')
                                                                        <td class="text-end pe-0" data-order="Error">
                                                                            <div class="badge badge-light-info">Api Error</div>
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
  // Function to update the span content
  function updateManualAmount() {
    // Retrieve the input value from the 'amount' field
    var inputAmount = document.getElementById('amountField').value;

    // Set the input value as the content of the span with ID 'manualamount'
    document.getElementById('manualamount').textContent = inputAmount;
  }

  // Call the function to update the span content when the input changes
  document.getElementById('amountField').addEventListener('input', updateManualAmount);
</script>

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
        const form = document.getElementById('formvalidation');
function handleRadioChange() {
    // Define form element
    var validator;

    var radioValue = document.querySelector('input[name="g_id"]:checked').value;
    var manualInputBox = document.getElementById('manualpaymentbox');

     if (radioValue === '1') {
        manualInputBox.style.display = 'none';
              validator = FormValidation.formValidation(
                    form,
                    {
                        fields: {
                            'amount': {
                                validators: {
                                    notEmpty: {
                                        message: 'Please enter an amount'
                                    },
                                    greaterThan: {
                                        message: 'Minimum deposit amount is {{$gnl->mindepo}}',
                                        min: {{$gnl->mindepo-1}}
                                    }
                                }
                            },
                            'g_id': {
                                validators: {
                                    notEmpty: {
                                        message: 'Select a method of payment'
                                    }
                                }
                            },
                            'proof': {
                                validators: {} // Empty initially
                            }
                        
                    },
        
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            bootstrap: new FormValidation.plugins.Bootstrap5({
                                rowSelector: '.fv-row',
                                eleInvalidClass: 'fv-invalid',
                                eleValidClass: 'fv-valid'
                            })
                        }
                    }
                );

     
     } else {
        manualInputBox.style.display = 'block';
              manualInputBox.scrollIntoView({ behavior: 'smooth' });
            
               validator = FormValidation.formValidation(
                    form,
                    {
                        fields: {
                            'amount': {
                                validators: {
                                    notEmpty: {
                                        message: 'Please enter an amount'
                                    },
                                    greaterThan: {
                                        message: 'Minimum deposit amount is {{$gnl->mindepo}}',
                                        min: {{$gnl->mindepo-1}}
                                    }
                                }
                            },
                            'g_id': {
                                validators: {
                                    notEmpty: {
                                        message: 'Select a method of payment'
                                    }
                                }
                            },
                            'proof': {
                                validators: {
                                    notEmpty: {
                                        message: 'Upload a proof to verify your payment'
                                    },
                                }
                            }
                        
                    },
        
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            bootstrap: new FormValidation.plugins.Bootstrap5({
                                rowSelector: '.fv-row',
                                eleInvalidClass: 'fv-invalid',
                                eleValidClass: 'fv-valid'
                            })
                        }
                    }
                );

     }

     return validator;
    };



    // Submit button handler
   
    const submitButton = document.getElementById('formvalidation_submit');
    submitButton.addEventListener('click', function (e) {
        var validator = handleRadioChange();
        // Prevent default button action
        e.preventDefault();

        // Validate form before submit
        if (validator) {
            validator.validate().then(function (status) {
              //  console.log('validated!');

                if (status === 'Valid') {
                    // Show loading indication
                    submitButton.setAttribute('data-kt-indicator', 'on');

                    // Disable button to avoid multiple clicks
                    submitButton.disabled = true;

                    // Your form data
                    var formData = new FormData(document.getElementById('formvalidation'));
                    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    formData.append('_token', csrfToken);

                    // AJAX request
                    fetch('{{(route('deposit.paymentprocess'))}}', {
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
                    .catch(error => {
                        console.error('Error:', error);
                        // Handle errors here
                    });
                }else{
                    const firstInvalidField = form.querySelector('.fv-row:not(.fv-valid)').querySelector('input, select, textarea');
                    if (firstInvalidField) {
                        // Scroll to the first invalid field
                        firstInvalidField.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                }
            });
        }
    });



//handleRadioChange();
</script>



    @if(session('depositcancel'))
    
    
    
<script>
    // Your JavaScript code
    // Show the SweetAlert
    Swal.fire({
        text: '{{ session('depositcancel') }}',
        icon: 'error',
        buttonsStyling: false,
        showConfirmButton: false,
        // confirmButtonText: 'Ok, got it!',
        // customClass: {
        //     confirmButton: 'btn btn-primary'
        // }
    });

    // Use setTimeout to hide the SweetAlert after 2 seconds
    setTimeout(function() {
        Swal.close(); // Close the SweetAlert
    }, 2000);
</script>


    @endif







<script>
    "use strict";var KTAccountReferralsReferralProgram={init:function(){var e,r;e=document.querySelector("#kt_referral_program_link_copy_btn"),r=document.querySelector("#kt_referral_link_input"),new ClipboardJS(e).on("success",(function(s){var n=e.innerHTML;r.classList.add("bg-success"),r.classList.add("text-inverse-success"),e.innerHTML="Copied!",setTimeout((function(){e.innerHTML=n,r.classList.remove("bg-success"),r.classList.remove("text-inverse-success")}),3e3),s.clearSelection()}))}};KTUtil.onDOMContentLoaded((function(){KTAccountReferralsReferralProgram.init()}));
</script>
@endsection