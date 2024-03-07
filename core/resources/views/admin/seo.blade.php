@extends('layouts.admin')
@section('page_styles')
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap-fileinput.css')}}">
@endsection
@section('content')






    <div class="tile">
        <div class="card success">
            <div class="card-header bg-success">

                <h2 style="color: #fff;  text-transform: uppercase;">SEO INFO
<!----
                    <a class="btn btn-dark pull-right" data-toggle="modal" data-target="#cardcategory">
                        <i class="fa fa-plus"></i> New Page
                    </a>
--->
                </h2>


            </div>
            <div class="card-body">
      
                  
  

                                                    <form role="form" method="POST" action="{{route('admin.seo.update')}}">
                                                        @csrf
                                                   



<div class="form-group">
    <strong>Home Title</strong>
    <input type="text" class="form-control" name="home" placeholder="Home Title" value="{{$data->home}}">
</div>

<div class="form-group">
    <strong>Cards Title</strong>
    <input type="text" class="form-control" name="cards" placeholder="Cards Title" value="{{$data->cards}}">
</div>

<div class="form-group">
    <strong>Add Card</strong>
    <input type="text" class="form-control" name="addcard" placeholder="Add Card" value="{{$data->addcard}}">
</div>

<div class="form-group">
    <strong>Transaction</strong>
    <input type="text" class="form-control" name="trans" placeholder="Transaction" value="{{$data->trans}}">
</div>

<div class="form-group">
    <strong>Profile</strong>
    <input type="text" class="form-control" name="profile" placeholder="Profile" value="{{$data->profile}}">
</div>

<div class="form-group">
    <strong>Referral</strong>
    <input type="text" class="form-control" name="refer" placeholder="Referral" value="{{$data->refer}}">
</div>

<div class="form-group">
    <strong>Withdraw</strong>
    <input type="text" class="form-control" name="withdraw" placeholder="Withdraw" value="{{$data->withdraw}}">
</div>



<div class="form-group">
    <strong>Meta Login</strong>
    <textarea class="form-control" name="metalogin" placeholder="Meta Login">{{$data->metalogin}}</textarea>
</div>

<div class="form-group">
    <strong>Meta Signup</strong>
    <textarea class="form-control" name="metasignup" placeholder="Meta Signup">{{$data->metasignup}}</textarea>
</div>

<div class="form-group">
    <strong>Meta Forget Password</strong>
    <textarea class="form-control" name="metaforgetpass" placeholder="Meta Forget Password">{{$data->metaforgetpass}}</textarea>
</div>

<div class="form-group">
    <strong>Meta Privacy Page</strong>
    <textarea class="form-control" name="metaprivacy" placeholder="Meta Privacy">{{$data->metaprivacy}}</textarea>
</div>
<div class="form-group">
    <strong>Meta Contact</strong>
    <textarea class="form-control" name="metacontact" placeholder="Meta Contact">{{$data->metacontact}}</textarea>
</div>

<div class="form-group">
    <strong>Meta Refund and return policy</strong>
    <textarea class="form-control" name="metarrp" placeholder="Meta RRPs">{{$data->metarrp}}</textarea>
</div>

<div class="form-group">
    <strong>Meta Terms & Condition</strong>
    <textarea class="form-control" name="metaterms" placeholder="Meta Terms">{{$data->metaterms}}</textarea>
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