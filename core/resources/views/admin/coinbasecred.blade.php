@extends('layouts.admin')
@section('page_styles')
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap-fileinput.css')}}">
@endsection
@section('content')






    <div class="tile">
        <div class="card success">
            <div class="card-header bg-success">

                <h2 style="color: #fff;  text-transform: uppercase;">Coinbase INFO
<!----
                    <a class="btn btn-dark pull-right" data-toggle="modal" data-target="#cardcategory">
                        <i class="fa fa-plus"></i> New Page
                    </a>
--->
                </h2>


            </div>
            <div class="card-body">
      
                  
  

                                                    <form role="form" method="POST" action="{{route('admin.coinbasecred.update')}}">
                                                        @csrf
                                                   



<div class="form-group">
    <strong>Api</strong>
    <input type="text" class="form-control" name="api" placeholder="Api Code" value="{{$data->api}}">
</div>

<div class="form-group">
    <strong>Secret</strong>
    <input type="text" class="form-control" name="secret" placeholder="Secret Code" value="{{$data->secret}}">
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