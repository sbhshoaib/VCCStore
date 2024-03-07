@extends('fontend.master')
@section('css')

@endsection

@section('content')

     



    <!-- about page content area start -->
    <section class="about-page-content-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about-page-content-inner"><!-- about page content inner -->
                        <h2 class="title">My Cards</h2>

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="tile">
                                    <div class="panel-group">
                                        <div class="panel panel-default">

                                            <div class="panel-body">
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                    <tr class="text-center">
                                                        <th>Card Name</th>
                                                        <th>Bought Time</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @if(count($usercard) > 0)
                                                        @foreach($usercard as $tr)
                                                            <tr class="text-center" id="tr_{{$tr->id}}">
                                                            
                                                                <td>{{$tr->cats->cat_name}} -> {{$tr->card->name}}</td>
                                                                <td>{{Carbon\Carbon::parse($tr->created_at)->format('d F Y - g:i A')}}</td>
                                                                <td>
                                                                    <button class="btn btn-info btn-sm btn-block dtlsviebtn" data-toggle="modal"  data-target="#dtlsviebtnnn{{$tr->id}}" data-id="{{$tr->id}}" data-details="{{$tr->card->card_details}}" data-image="{{asset($tr->card->card_image)}}">View</button>
                                                                </td>
                                                            </tr>
                                                            <div id="dtlsviebtnnn{{$tr->id}}" class="modal fade" role="dialog">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header headeingall">
                                                                            <h4 class="modal-title" style="text-align: center">{{$tr->card->name}}</h4>
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="modal-body">
                                                                                <div class="form-group">
                                                                                    <h4 class="fulldetls">{!! $tr->card_details !!}</h4>
                                                                                    <br>
                                                                                    @if(!empty($tr->card_image))
                                                                                        <img src="{{asset('assets/images/cardimage/'.$tr->card_image)}}" style="width: 100%;height: 200px">
                                                                                    @else

                                                                                    @endif
                                                                                    <input type="hidden" name="delid" value="" class="delid">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer" >
                                                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                                            @if($tr->status == 0)
                                                                                <button type="button" class="btn btn-default pull-right" data-id="{{$tr->id}}">Used</button>
                                                                            @else
                                                                                <button type="button" class="btn btn-primary pull-right markused" data-id="{{$tr->id}}">Mark As Used</button>
                                                                            @endif
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="4"><h3 style="text-align: center">Sorry ! Right now you don't have any card.</h3></td>
                                                        </tr>
                                                    @endif
                                                    </tbody>
                                                </table>
                                                {{$usercard->links()}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div><!-- //.about page content inner -->
                </div>
            </div>
        </div>
    </section>
    <!-- about page content area end -->
@endsection























@section('js')
<script>

"use strict";
var KTAppEcommerceSalesListing = function () {
   var e, t, n, r, o, a = (e, n, a) => {
         r = e[0] ? new Date(e[0]) : null, o = e[1] ? new Date(e[1]) : null, $.fn.dataTable.ext.search.push((function (e, t, n) {
            var a = r,
               c = o,
               l = new Date(moment($(t[5]).text(), "DD/MM/YYYY")),
               u = new Date(moment($(t[5]).text(), "DD/MM/YYYY"));
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
         (e = document.querySelector("#transaction_table")) && ((t = $(e).DataTable({
            info: !1,
            order: [],
            pageLength: 10,
            columnDefs: [{
               orderable: !1,
      
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
@endsection