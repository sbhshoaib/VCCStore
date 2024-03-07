@extends('layouts.admin')
@section('page_styles')
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap-fileinput.css')}}">
@endsection
@section('content')






    <div class="tile">
        <div class="card success">
            <div class="card-header bg-info">

                <h2 style="color: #fff; text-transform: uppercase;">Card Request

                <!---
                    <a class="btn btn-dark pull-right" data-toggle="modal" data-target="#cardcategory">
                        <i class="fa fa-plus"></i> New Bin
                    </a>

                    --->
                </h2>


            </div>
            <div class="card-body">
                <div class="table-scrollable">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>User</th>
                            <th>TRX</th>
                            <th>Details<th>

                            <th>Amount </th>
                            <th>Fee</th>
                            <th>Gateway</th>
                            <th>Date</th>
                           
                            <th>Status</th>
                            <th>Proof</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($depositd as $cat)
                            <tr>
                                <td>
                                #{{$cat->id}}
                                </td>
                                <td>
                          
                                    @php
                                    $userd = \App\User::find($cat->user_id);
                                    
                                     @endphp

                                     Name: {{$userd['name']}} <br>
                                     Username: <a href="user/{{$cat->user_id}}">{{$userd['username']}}</a> <br>
                                     Email: {{$userd['email']}} 
                                </td>
                                <td>
                                     {{$cat->trx}}
                                </td>

                               
                                <td>
                                     {{$cat->details}}
                                </td>
                                <td>
                                    
                                </td>

                                <td>
                                {{$cat->amount}}
                                </td>


                                <td>
                                {{$cat->fee}}
                                </td>

                                <td>

                                @php
                                    $gateway = \App\PaymentG::find($cat->gateway);
                                    
                                     @endphp
                             {{$gateway['name']}}
                                 </td>

                                 <td>
                                 {{$cat->created_at}}
                          
                                 </td>
                                <td>
                                    @if($cat->status == 0)
                                    <label class="badge badge-danger">Api Error</label>
                                    @elseif($cat->status == 1)
                                        <label class="badge badge-success">Successfull</label>
                                
                                    @elseif($cat->status == 2)
                                        <label class="badge badge-primary">Pending Confirmation</label>
                                    @elseif($cat->status == 3)
                                        <label class="badge badge-warning">Pending Payment</label>
                                    @elseif($cat->status == 4)
                                    <label class="badge badge-danger">Delayed</label>
                                    @elseif($cat->status == 5)
                                    <label class="badge badge-danger">Failed</label>
                                    @elseif($cat->status == 6)
                                    <label class="badge badge-danger">Rejected</label>
                                    @else
                                        <label class="badge badge-danger">Error</label>
                                    @endif
                                </td>


                                  <td>
                                  @if($cat->proof != NULL)
                                  <button class="btn btn-danger etdbtn" data-toggle="modal" data-target="#proof{{$cat->id}}" data-id="{{$cat->id}}">Show Proof</button>    
                                  
                                  
                                  
                                  
                                  
                                  
                                  <div id="proof{{$cat->id}}" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Proof </h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                                </div>
                                                <div class="modal-body">
                                                  
                                                <img style="max-width: 100%;" src="../{{$cat->proof}}" alt="">
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                  
                                  
                                  
                                  
                                  
                                  
                                  @endif
                                </td>



                                <td>
                                  
                 


                                   @if($cat->status == 1 && $cat->gateway == 2)
                                   <!----
                                        <button class="btn btn-danger etdbtn" data-toggle="modal" data-target="#undo{{$cat->id}}" data-id="{{$cat->id}}">Undo</button>    
-->
                                        <label class="badge badge-success">Nothing to do</label>
                                      
                                        @elseif($cat->status == 1 && $cat->gateway == 1)
                                        <label class="badge badge-success">Nothing to do</label>
                                        @elseif($cat->status == 0)
                                        <label class="badge badge-danger">Api Error</label>
                                        @elseif($cat->status == 2)
                                          <button class="btn btn-success etdbtn" data-toggle="modal" data-target="#dv{{$cat->id}}" data-id="{{$cat->id}}">Approve</button>
                                          <button class="btn btn-danger etdbtn" data-toggle="modal" data-target="#dcl{{$cat->id}}" data-id="{{$cat->id}}">Decline</button>
                                      
                                    @elseif($cat->status == 3)
                                        <label class="badge badge-warning">Pending Payment</label>
                                    @elseif($cat->status == 4)
                                    <label class="badge badge-danger">Delayed</label>
                                    @elseif($cat->status == 5)
                                    <label class="badge badge-danger">Failed</label>
                                    @elseif($cat->status == 6)
                                    <label class="badge badge-danger">Rejected</label>
                                    @else
                                        <label class="badge badge-danger">Error</label>
                                    @endif





                                    <div id="dv{{$cat->id}}" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Confirm </h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                                </div>
                                                <div class="modal-body">
                                                    <form role="form" method="POST" action="{{route('admin.deposit_approve', $cat->id)}}">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <strong>Message</strong>
                                                                <textarea type="text"  class="form-control"  name="message" placeholder="Message here">{{$cat->message}}</textarea>
                                                            </div>
                                                        </div>


                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success ">Confirm</button>
                                                        </div>

                                                    </form>
                                                </div>

                                            </div>

                                        </div>
                                    </div>






                                    <div id="dcl{{$cat->id}}" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Deposit Decline</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                                </div>
                                                <div class="modal-body">
                                                    <form role="form" method="POST" action="{{route('admin.depositdecline', $cat->id)}}">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <strong>Message</strong>
                                                                <textarea type="text"  class="form-control"  name="message" placeholder="Message here">{{$cat->message}}</textarea>
                                                            </div>
                                                        </div>


                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger ">Decline</button>
                                                        </div>

                                                    </form>
                                                </div>

                                            </div>

                                        </div>
                                    </div>






                                    <div id="undo{{$cat->id}}" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Undo Deposit </h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                                </div>
                                                <div class="modal-body">
                                                    <form role="form" method="POST" action="{{route('admin.undoreq', $cat->id)}}">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <strong>Message</strong>
                                                                <textarea type="text"  class="form-control"  name="message" placeholder="Message here">{{$cat->message}}</textarea>
                                                            </div>
                                                        </div>


                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-info ">Undo</button>
                                                        </div>

                                                    </form>
                                                </div>

                                            </div>

                                        </div>
                                    </div>




                                </td>
                            </tr>

                        @endforeach
                        <tbody>
                    </table>
                    {{$depositd->links()}}
                </div>
            </div>
        </div>
    </div>




@endsection

@section('page_scripts')

    <script>
        $(document).ready(function () {



            $('.catdelete').click(function (e) {
                e.preventDefault();
                $('#deletecat').modal('show');
                var id = $(this).data('id');
                $('.delid').val(id);
            })

        })
    </script>

@endsection