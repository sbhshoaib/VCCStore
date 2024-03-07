@extends('layouts.admin')
@section('page_styles')
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap-fileinput.css')}}">
@endsection
@section('content')






    <div class="tile">
        <div class="card success">
            <div class="card-header bg-success">

                <h2 style="color: #fff;  text-transform: uppercase;">Card Transactions 
                


                
                    <a class="btn btn-dark pull-right" data-toggle="modal" data-target="#addtran">
                        <i class="fa fa-plus"></i> Add Transaction
                    </a>


                    </h2>
                  

                    <div id="addtran" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Add Transaction</h4>
                                                    <button type="button" class="close" data-dismiss="modal">;</button>

                                                </div>
                                                <div class="modal-body">
                                                    <form role="form" method="POST" action="{{route('admin.card.transactions.store')}}">
                                                        @csrf
                                                        <div class="modal-body">
                                                           
                                                        @php
                                                            $cards = \App\CardRequest::whereIn('status', [1,4,7])->get();
                                    
                                                         @endphp

                                                            <div class="form-group">
                                                                <label>Select Card</label>
                                                                <select name="card_id" class="form-control" style="width: 100%;" id="card_id">
                                                                <option value="">Select Card</option>
                                                                @foreach($cards as $c)
                                                                <option value="{{$c->id}}">{{$c->number}}-{{$c->holdername}}</option>
                                                                @endforeach
                                                                </select>
                                                            </div>


                                                            <div class="form-group">
                                                                <strong>Trx</strong>
                                                                <input type="text"  class="form-control" name="trx" placeholder="Trx Number" >
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Type</label>
                                                                <select name="type" class="form-control" id="type" required>
                                                                <option value="">Type</option>
                                                            
                                                                <option value="deposit">Deposit</option>
                                                                <option value="substract">Substract</option>
                                                    
                                                                </select>
                                                            </div>


                                                            <div class="form-group">
                                                                <strong>Amount</strong>
                                                                <input type="text"  class="form-control" name="amount" placeholder="Amount" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <strong>Message</strong>
                                                                <textarea type="text"  class="form-control" name="message" placeholder="Message"></textarea>
                                                            </div>
                                                        </div>


                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                           
                                                             <button type="submit" onclick="return confirm('Are you sure ?')" class="btn btn-success ">Add</button>
                                                        </div>

                                                    </form>
                                                </div>

                                            </div>

                                        </div>
                    </div>





            </div>
            <div class="card-body">
                <div class="table-scrollable">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>User Name</th>
                            <th>Card Details <th>
                            <th>Amount <th>
                            <th>Trx</th>
                            <th>Status</th>
                            <!------
                            <th>Action</th>
                            ------->
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
                                     {{$cat->amount}} <br>
                                 </td>
                                 <td>
                 
                 </td>
                                 <td>
                                     {{$cat->trx}} <br>
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


                               
                                  
                                   

                                <!---
                               <td>
                                 
                                    @if($cat->status == 1)
                                    <button class="btn btn-danger etdbtn" data-toggle="modal" data-target="#dcl{{$cat->id}}" data-id="{{$cat->id}}">Delete</button>
                                
                                    @elseif($cat->status == 2)
                                    <button class="btn btn-danger etdbtn" data-toggle="modal" data-target="#dcl{{$cat->id}}" data-id="{{$cat->id}}">Delete</button>

                                    @elseif($cat->status == 3)
                                    <button class="btn btn-danger etdbtn" data-toggle="modal" data-target="#dcl{{$cat->id}}" data-id="{{$cat->id}}">Delete</button>
                                    @else
                                    <button class="btn btn-danger etdbtn" data-toggle="modal" data-target="#dcl{{$cat->id}}" data-id="{{$cat->id}}">Delete</button>
                                    @endif
      </td>
                                    ---->







                          
                            </tr>

                        @endforeach
                        <tbody>
                    </table>
                    {{$subcat->links()}}
                </div>
            </div>
        </div>
    </div>






@endsection

@section('page_scripts')
<script>
      $("#card_id").select2({
          placeholder: "Select card number",
          allowClear: true
      });
      $("#multiple").select2({
          placeholder: "Select a programming language",
          allowClear: true
      });
    </script>


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