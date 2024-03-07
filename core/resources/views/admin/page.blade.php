@extends('layouts.admin')
@section('page_styles')
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap-fileinput.css')}}">
@endsection
@section('content')






    <div class="tile">
        <div class="card success">
            <div class="card-header bg-success">

                <h2 style="color: #fff;  text-transform: uppercase;">Pages
<!----
                    <a class="btn btn-dark pull-right" data-toggle="modal" data-target="#cardcategory">
                        <i class="fa fa-plus"></i> New Page
                    </a>
--->
                </h2>


            </div>
            <div class="card-body">
                <div class="table-scrollable">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($page as $cat)
                            <tr>
                                <td>
                                #{{$cat->id}}
                                </td>
                        

                                <td>
                               
                                {{$cat->title}}
                                 
                                </td>
                             

                                 <td>
                                 {{ str_limit(strip_tags($cat->content), 100) }}

                                 
                                </td>


                                <td>
                                  
                                   
                              
                                 
                                    <button class="btn btn-success etdbtn" data-toggle="modal" data-target="#dv{{$cat->id}}" data-id="{{$cat->id}}">Edit</button>
                                <!----
                                
                                  

                                    --->



                                    <div id="dv{{$cat->id}}" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Page</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                                </div>
                                                <div class="modal-body">
                                                    <form role="form" method="POST" action="{{route('admin.page.update', $cat->id)}}">
                                                        @csrf
                                                        <div class="modal-body">
                                                           

                                                                <div class="form-group">
                                                                    <strong>Title</strong>
                                                                    <input type="text"  class="form-control"  name="title" placeholder="Title here" value="{{$cat->title}}">      
                                                                
                                                                </div>



                                                               <div class="form-group">
                                                                    <strong>Content</strong>
                                                                    <textarea type="text"  class="form-control" id="content"  name="content" placeholder="Content here">{{$cat->content}}</textarea>        

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
                    {{$page->links()}}
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
                    <form role="form" method="POST" action="{{route('admin.page.store')}}">
                        @csrf
                        <div class="modal-body">


                        <div class="form-group">
                                                                    <strong>Title</strong>
                                                                    <input type="text"  class="form-control"  name="title" placeholder="Title here" value="">      
                                                                
                                                                </div>



                                                               <div class="form-group">
                                                                    <strong>Content</strong>
                                                                    <textarea type="text"  class="form-control" id="content"  name="content" placeholder="Content here"></textarea>        

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