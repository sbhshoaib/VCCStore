@extends('layouts.admin')
@section('page_styles')
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap-fileinput.css')}}">
@endsection
@section('content')






    <div class="tile">
        <div class="card success">
            <div class="card-header bg-success">

                <h2 style="color: #fff;  text-transform: uppercase;">Card Reload Request

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

                                
                                @php
                                    $card = \App\CardRequest::find($cat->card_id);
                                    
                                     @endphp
                                     Holder : {{$card->holdername}} <br>
                                     Number: {{$card->number}} <br>
                                     CVC: {{$card->security}} <br>
                                     Exp From: {{$card->exp}} <br>
                                     Exp To: {{$card->expto}} <br>
                                     Billing Address: {{$card->baddress}} <br>
                                </td>

                               

                                <td>
                 
                                </td>
                                <td>
                                    Amount : {{$cat->amount}} <br>
                                     Fee: {{$cat->price}} <br>
                          
                                 </td>

                                 <td>
                                 
                          
                                 </td>
                                 <td>
                                  
                                    @if($cat->status ==1)
                                    <label class="badge badge-success">Approved</label>
                                    @elseif($cat->status == 2)
                                    <label class="badge badge-warning">Pending</label>
                                    @elseif($cat->status == 3)
                                    <label class="badge badge-danger">Rejected</label>
                                    @else
                                        <label class="badge badge-danger">Error</label>
                                    @endif
                                </td>


                                <td>
                                  
                                   
                              
                                 
                                    @if($cat->status == 1)
                                    <label class="badge badge-success">Activated</label>
                                
                                    @elseif($cat->status == 2)
                                    <button class="btn btn-success etdbtn" data-toggle="modal" data-target="#dv{{$cat->id}}" data-id="{{$cat->id}}">Reload</button>
                                    <button class="btn btn-danger etdbtn" data-toggle="modal" data-target="#dcl{{$cat->id}}" data-id="{{$cat->id}}">Decline</button>

                                    @elseif($cat->status == 3)
                                    <label class="badge badge-danger">Rejected</label>
                                    @else
                                    <label class="badge badge-danger">Error</label>
                                    @endif

                                    








                                    <div id="dv{{$cat->id}}" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Reload Confirm</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                                </div>
                                                <div class="modal-body">
                                                    <form role="form" method="POST" action="{{route('admin.cardreloadapprove', $cat->id)}}">
                                                        @csrf
                                                        <div class="modal-body">
                                                           

                                                            <div class="form-group">
                                                                <strong>Message</strong>
                                                                <textarea type="text"  class="form-control"  name="message" placeholder="Message here">{{$cat->message}}</textarea>
                                                            </div>
                                                        </div>


                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>

                                                            <button type="submit" class="btn btn-success ">Reloaded</button>
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
                                                    <h4 class="modal-title">Decline Reload Request </h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                                </div>
                                                <div class="modal-body">
                                                    <form role="form" method="POST" action="{{route('admin.cardreloaddecline', $cat->id)}}">
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