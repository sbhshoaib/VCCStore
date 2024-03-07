@extends('layouts.admin')
@section('page_styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <link rel="stylesheet" href="{{asset('assets/Adminneer/')}}/css/moris.css">
@endsection
@section('content')
    <div class="row">
        <div class="col-md-3">
            <a href="{{url('Adminneer/users')}}" style="text-decoration: none">
                <div class="widget-small primary"><i class="icon fa fa-users fa-3x"></i>
                    <div class="info">
                        <h4>Users</h4>
                        <p><b>{{$users}}</b></p>
                    </div>
                </div>
            </a>
        </div>


        <div class="col-md-3">
            <a href="{{url('Adminneer/card-subcategory')}}" style="text-decoration: none">
                <div class="widget-small info"><i class="icon fa fa-th fa-3x"></i>
                    <div class="info">
                        <h4>Total Bin</h4>
                        <p><b>{{$subcat}}</b></p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="{{url('Adminneer/card-request')}}" style="text-decoration: none">
                <div class="widget-small warning"><i class="icon fa fa-file fa-3x"></i>
                    <div class="info">
                        <h4>Total Delivered Card</h4>
                        <p><b>{{$dvcard}}</b></p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="{{url('Adminneer/card-transactions')}}" style="text-decoration: none">
                <div class="widget-small danger"><i class="icon fa fa-money fa-3x"></i>
                    <div class="info">
                        <h4>Total Card Transaction</h4>
                        <p><b>{{$cardtrans}}</b></p>
                    </div>
                </div>
            </a>
        </div>
        
        
                        <div class="col-md-3">
            <a href="{{url('Adminneer/card-category')}}" style="text-decoration: none">
                <div class="widget-small danger"><i class="icon fa fa-money fa-3x"></i>
                    <div class="info">
                        <h4>Total Category</h4>
                        <p><b>{{$cat}}</b></p>
                    </div>
                </div>
            </a>
        </div>
        
        
        <div class="col-md-3">
            <a href="{{url('Adminneer/transaction-log')}}" style="text-decoration: none">
                <div class="widget-small warning"><i class="icon fa fa-money fa-3x"></i>
                    <div class="info">
                        <h4>Total Account Transaction</h4>
                        <p><b>{{$trans}}</b></p>
                    </div>
                </div>
            </a>
        </div>
        
              <div class="col-md-3">
            <a href="{{url('Adminneer/card-request')}}" style="text-decoration: none">
                <div class="widget-small primary"><i class="icon fa fa-money fa-3x"></i>
                    <div class="info">
                        <h4>Total Card Request</h4>
                        <p><b>{{$cardreq}}</b></p>
                    </div>
                </div>
            </a>
        </div>
        
        
        
                      <div class="col-md-3">
            <a href="{{url('Adminneer/depositlist')}}" style="text-decoration: none">
                <div class="widget-small info"><i class="icon fa fa-money fa-3x"></i>
                    <div class="info">
                        <h4>Total Deposit</h4>
                        <p><b>{{$totaldepo}}</b></p>
                    </div>
                </div>
            </a>
        </div>
        
        
        
        
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Card Sell History</h3>

                <div id="myfirstchart" ></div>
            </div>

        </div>
    </div>


@endsection

@section('page_scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
        <script>

            $(document).ready(function () {
                new Morris.Bar({
                    element: 'myfirstchart',
                    data: {!! $monthly_play !!},
                    xkey: 'y',
                    ykeys: ['a'],
                    labels: ['Total Card']
                });
            });
        </script>



@endsection