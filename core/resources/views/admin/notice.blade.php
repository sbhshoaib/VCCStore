@extends('layouts.admin')
@section('page_styles')
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap-fileinput.css')}}">
@endsection
@section('content')






    <div class="tile">
        <div class="card success">
            <div class="card-header bg-success">

                <h2 style="color: #fff;  text-transform: uppercase;">Notices

                    <a class="btn btn-dark pull-right" data-toggle="modal" data-target="#cardcategory">
                        <i class="fa fa-plus"></i> New Notice
                    </a>

                </h2>


            </div>
            <div class="card-body">
                <div class="table-scrollable">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($notice as $cat)
                            <tr>
                                <td>
                                #{{$cat->id}}
                                </td>
                              
                                <td>
                                {{$cat->title}}
                                </td>
                            

                             

                                 <td>
                                  
                                    @if($cat->status ==1)
                                    <label class="badge badge-success">Active</label>
                                    @elseif($cat->status == 2)
                                    <label class="badge badge-danger">Inactive</label>
                                    @else
                                        <label class="badge badge-danger">Error</label>
                                    @endif
                                </td>


                                <td>
                                  
                                   
                              
                                 
                                    <button class="btn btn-success etdbtn" data-toggle="modal" data-target="#dv{{$cat->id}}" data-id="{{$cat->id}}">Edit</button>
                                   <a onclick="return confirm('Are you sure to delete the notice ?');" href="{{route('admin.notice.delete', $cat->id)}}"> <button class="btn btn-danger etdbtn">Delete</button></a>

                                    



                                    <div id="dv{{$cat->id}}" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Notice</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                                </div>
                                                <div class="modal-body">
                                                    <form role="form" method="POST" action="{{route('admin.notice.update', $cat->id)}}">
                                                        @csrf
                                                        <div class="modal-body">
                                                           

                                                            <div class="form-group">
                                                                <strong>Title</strong>
                                                                <textarea type="text"  class="form-control"  name="title" placeholder="Title here">{{$cat->title}}</textarea>        
                                                            
                                                            </div>



                                                            <div class="form-group">
                                                                    <strong>Status</strong>
                                                                    <select class="form-control" name="status">
                                                                    
                                                                            <option @if($cat->status=='1') selected @endif value="1">Active</option>
                                                                            <option @if($cat->status=='2') selected @endif  value="2">Incative</option>
                                                            
                                                                    </select>

                                                                </div>


                                                        </div>


                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>

                                                            <button type="submit" class="btn btn-success ">Edit</button>
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
                    {{$notice->links()}}
                </div>
            </div>
        </div>
    </div>






    <div id="cardcategory" class="modal fade" role="dialog">
        <div class="modal-dialog">


            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create Notice</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>


                <div class="modal-body">
                    <form role="form" method="POST" action="{{route('admin.notice.store')}}">
                        @csrf
                        <div class="modal-body">


                            <div class="form-group">
                                <strong>Title</strong>
                                <textarea type="text"  class="form-control"  name="title" placeholder="Title here"></textarea>   
                            
                            </div>

                            
                            <div class="form-group">
                                <strong>Status</strong>
                                <select class="form-control" name="status">
                                   
                                        <option value="1">Active</option>
                                        <option value="2">Incative</option>
                           
                                </select>

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