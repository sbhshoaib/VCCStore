@extends('layouts.admin')
@section('page_styles')
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap-fileinput.css')}}">
@endsection
@section('content')






    <div class="tile">
        <div class="card success">
            <div class="card-header bg-success">

                <h2 style="color: #fff;  text-transform: uppercase;">Loginpage INFO
<!----
                    <a class="btn btn-dark pull-right" data-toggle="modal" data-target="#cardcategory">
                        <i class="fa fa-plus"></i> New Page
                    </a>
--->
                </h2>


            </div>
            <div class="card-body">
      
                  
  

                                                    <form role="form" method="POST" action="{{route('admin.loginpage.update')}}">
                                                        @csrf
                                                   



<div class="form-group">
    <strong>Logo</strong>
    <input type="text" class="form-control" name="logo" placeholder="Logo" value="{{$data->logo}}">
</div>

<div class="form-group">
    <strong>Image</strong>
    <input type="text" class="form-control" name="image" placeholder="Image" value="{{$data->image}}">
</div>

<div class="form-group">
    <strong>Content</strong>
    <textarea type="text" class="form-control" name="content" placeholder="Content">{{$data->content}}</textarea>
</div>

                                                            <button type="submit" class="btn btn-success ">Save</button>
                                                        
                                                        
                                                        
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