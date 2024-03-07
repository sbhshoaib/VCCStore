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
                            <th>User Name</th>
                            <th>Card Details <th>
                            <th>Balance <th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($subcat as $cat)
                            <tr>
                                <td>
                                #{{$cat->id}}
                                </td>
                                <td>
                          
                                    @php
                                    $userd = \App\User::find($cat->u_id);
                                    
                                     @endphp

                                     Name: {{$userd['name']}} <br>
                                     Username: <a href="user/{{$cat->u_id}}">{{$userd['username']}}</a> <br>
                                     Email: {{$userd['email']}} 
                                </td>
                                <td>
                                     Holder : {{$cat->holdername}} <br>
                                     @if($cat->b_id==$cat->number)
                                     Bin Number: {{$cat->b_id}} <br>
                                     @else
                                     Number: {{$cat->number}} <br>
                                     @endif
                                     CVC: {{$cat->security}} <br>
                                     Exp From: {{$cat->exp}} <br>
                                     Exp To: {{$cat->expto}} <br>
                                     Billing Address: {{$cat->baddress}} <br>
                                </td>

                               

                                <td>
                 
                                </td>
                                <td>
                                    Balance : {{$cat->balance}} <br>
                                     Price: {{$cat->price}} <br>
                          
                                 </td>

                                 <td>
                                 
                          
                                 </td>
                                <td>
                                    @if($cat->status == 1)
                                        <label class="badge badge-success">Delivered</label>
                                
                                    @elseif($cat->status == 2)
                                        <label class="badge badge-warning">Pending</label>
                                        
                                    @elseif($cat->status == 3)
                                    <label class="badge badge-danger">Declined</label>
                                    @elseif($cat->status == 4)
                                    <label class="badge badge-danger">Deactivation Pending</label>
                                    @elseif($cat->status == 5)
                                    <label class="badge badge-danger">Deactivated</label>
                                    @elseif($cat->status == 7)
                                    <label class="badge badge-warning">Activation Pending</label>
                                    @else
                                        <label class="badge badge-danger">Error</label>
                                    @endif
                                </td>


                                <td>
                                  
                                   
                              
                                    @if($cat->status == 1)
                                    <button class="btn btn-info etdbtn" data-toggle="modal" data-target="#undo{{$cat->id}}" data-id="{{$cat->id}}">Undo</button>    
                                    @elseif($cat->status == 2)
                                    <button class="btn btn-success etdbtn" data-toggle="modal" data-target="#dv{{$cat->id}}" data-id="{{$cat->id}}">Delivery</button>
                                    <button class="btn btn-danger etdbtn" data-toggle="modal" data-target="#dcl{{$cat->id}}" data-id="{{$cat->id}}">Decline</button>
                                    @elseif($cat->status == 3)
                                    <button class="btn btn-info etdbtn" data-toggle="modal" data-target="#undo{{$cat->id}}" data-id="{{$cat->id}}">Undo</button>    
                                    @elseif($cat->status == 4)
                                    <label class="badge badge-danger">Deactivation Pending</label>
                                    @elseif($cat->status == 5)
                                    <label class="badge badge-danger">Deactivated</label>
                                    @elseif($cat->status == 7)
                                    <label class="badge badge-warning">Activation Pending</label>
                                    @else
                                    <label class="badge badge-danger">Error</label>
                                    @endif


                                    <div id="dv{{$cat->id}}" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Card Delivery </h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                                </div>
                                                <div class="modal-body">
                                                    <form role="form" method="POST" action="{{route('admin.cardrequestdeliver', $cat->id)}}">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <strong>Card Number</strong>

                                                                @php
                                                                    if($cat->number==''){
                                                                            $number = $cat->b_id;
                                                                    }else{
                                                                        $number = $cat->number;
                                                                    }

                                                                @endphp
                                                                <input type="number" required  class="form-control" value="{{$number}}" name="number" placeholder="Card Number" >
                                                            </div>


                                                            <div class="form-group">
                                                                <strong>Holder Name</strong>
                                                                <input type="text"  required class="form-control" value="{{$cat->holdername}}" name="holdername" placeholder="Holder Name" >
                                                            </div>





                                                            <div class="form-group">
                                                                <strong>Expiary From</strong>
                                                                <input type="text"  required class="form-control" value="{{$cat->exp}}" name="exp" placeholder="" >
                                                            </div>
                                                            <div class="form-group">
                                                                <strong>Expiary To</strong>
                                                                <input type="text"  required class="form-control" value="{{$cat->expto}}" name="expto" placeholder="" >
                                                            </div>

                                                            <div class="form-group">
                                                                <strong>Secuirty Number</strong>
                                                                <input type="text"  class="form-control" value="{{$cat->security}}" name="security" placeholder="889" >
                                                            </div>


                                                            <div class="form-group">
                                                                <strong>Message</strong>
                                                                <textarea type="text"  class="form-control"  name="message" placeholder="Message here">{{$cat->message}}</textarea>
                                                            </div>
                                                        </div>


                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success ">Deliver</button>
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
                                                    <h4 class="modal-title">Card Decline </h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                                </div>
                                                <div class="modal-body">
                                                    <form role="form" method="POST" action="{{route('admin.cardrequestdecline', $cat->id)}}">
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
                                                    <h4 class="modal-title">Undo Request </h4>
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
                    {{$subcat->links()}}
                </div>
            </div>
        </div>
    </div>






    <div id="cardcategory" class="modal fade" role="dialog">
        <div class="modal-dialog">


            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create Bin</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>


                <div class="modal-body">
                    <form role="form" method="POST" action="{{route('admin.subcategory.store')}}">
                        @csrf
                        <div class="modal-body">


                            <div class="form-group">
                                <strong>Select Category</strong>
                                <select class="form-control" name="cat_id">
                                    @foreach($cate as $data)
                                        <option value="{{$data->id}}">{{$data->cat_name}}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="form-group">
                                <strong>Bin Number</strong>
                                <input type="text"  class="form-control" name="name" placeholder="Bin Number" >
                            </div>

                            

                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success ">Create</button>
                        </div>

                    </form>
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