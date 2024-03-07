<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{$gnl->title}} - {{$gnl->subtitle}}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/logo/icon.png')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/bootstrap-toggle.min.css') }}">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@yield('page_styles')

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    
    <style>
        .table-scrollable {
    overflow-x: auto;
}
    </style>
</head>
<body class="app sidebar-mini rtl">

<header class="app-header">
    <a class="app-header__logo" style="
    padding: 0px;
" href="{{route('admin.dashboard')}}">
        <img src="{{asset('assets/images/logo/logo.png')}}" alt="logo" class="logo-default" style="    width: 143px;
    margin-bottom: 10px;">
    </a>

    <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>


    <ul class="app-nav" >
        <!-- User Menu-->


        @php
        $notifications = \App\AdminNotif::orderBy('id', 'desc')->take(20)->get();

        

        @endphp

        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><span class="badge badge-danger lg">{{$notifications->where('vstat', NULL)->count()}}</span> <i class="fa fa-bell" aria-hidden="true"></i></a>

        
        <ul class="dropdown-menu settings-menu dropdown-menu-right" style="min-width: 300px;     max-height: 450px;
    overflow-y: auto;   padding: 10px;">
        <h3>Notification</h3>
<a href="{{route('admin.allread')}}">Mark all as read</a>
     

        @foreach($notifications as $n)
                <li @if($n->vstat==null) class="bg-warning" @endif>
                    <a  style="text-wrap: inherit;" class="dropdown-item" href="{{route('admin.notifvisit', $n->id)}}"><i class="fa fa-bell fa-lg"></i><b>{{$n->title}}</b><br>{!!$n->subtitle!!}</a>
                
                </li>
           <hr>


                @endforeach  
            
           <hr>
         
            </ul>


            
        </li>







        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">{{Auth::user()->name}} <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li><a class="dropdown-item" href="{{route('admin.new-admin')}}"><i class="fa fa-user fa-lg"></i>Create New Admin </a></li>
                <li><a class="dropdown-item" href="{{route('admin.list-admin')}}"><i class="fa fa-users fa-lg"></i>List of Admin </a></li>
                <li><a class="dropdown-item" href="{{route('admin.change-password')}}"><i class="fa fa-cog fa-lg"></i> Change Password </a></li>

                <li>
                    <a class="dropdown-item" href="#" onclick="event.preventDefault();
document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out fa-lg"></i> Logout
                    </a>

                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>




    </ul>
</header>

<!-- Sidebar menu-->

<div class="app-sidebar__overlay" data-toggle="sidebar"></div>

<main class="app-content">
    <aside class="app-sidebar">


        <ul class="app-menu">
            <li>
                <a class="app-menu__item @if(request()->path() == 'Adminneer/dashboard') active @endif" href="{{route('admin.dashboard')}}">
                    <i class="app-menu__icon fa fa-dashboard"></i>
                    <span class="app-menu__label">Dashboard</span></a>
            </li>


            <li class="treeview">
                <a class="app-menu__item @if(request()->path() == 'Adminneer/card-category') active @endif" href="{{route('admin.card.category')}}" >
                    <i class="app-menu__icon fa fa-caret-square-o-right"></i>
                    <span class="app-menu__label">Card Category</span>
                </a>
            </li>

            <li class="treeview">
                <a class="app-menu__item @if(request()->path() == 'Adminneer/card-subcategory') active @endif" href="{{route('admin.card.subcategory')}}" >
                    <i class="app-menu__icon fa fa-bars"></i>
                    <span class="app-menu__label">Card Bin Number</span>
                </a>
            </li>


            

            <li class="treeview">
                <a class="app-menu__item @if(request()->path() == 'Adminneer/card-request') active @endif" href="{{route('admin.card.request')}}" >
                    <i class="app-menu__icon fa fa-bars"></i>
                    <span class="app-menu__label">Card Request</span>
                </a>
            </li>

            <li class="treeview">
                <a class="app-menu__item @if(request()->path() == 'Adminneer/card-reload') active @endif" href="{{route('admin.card.reload')}}" >
                    <i class="app-menu__icon fa fa-bars"></i>
                    <span class="app-menu__label">Card Reload</span>
                </a>
            </li>

            <li class="treeview">
                <a class="app-menu__item @if(request()->path() == 'Adminneer/card-withdraw') active @endif" href="{{route('admin.card.withdraw')}}" >
                    <i class="app-menu__icon fa fa-bars"></i>
                    <span class="app-menu__label">Card Withdraw</span>
                </a>
            </li>


            <li class="treeview">
                <a class="app-menu__item @if(request()->path() == 'Adminneer/card-transactions') active @endif" href="{{route('admin.card.transactions')}}" >
                    <i class="app-menu__icon fa fa-bars"></i>
                    <span class="app-menu__label">Card Transactions</span>
                </a>
            </li>


            <li class="treeview">
                <a class="app-menu__item @if(request()->path() == 'Adminneer/card-deactive') active @endif" href="{{route('admin.card.deactive')}}" >
                    <i class="app-menu__icon fa fa-bars"></i>
                    <span class="app-menu__label">Card Deactivation</span>
                </a>
            </li>

            <li class="treeview">
                <a class="app-menu__item @if(request()->path() == 'Adminneer/depositlist') active @endif" href="{{route('admin.depositlist')}}" >
                    <i class="app-menu__icon fa fa-bars"></i>
                    <span class="app-menu__label">Deposit</span>
                </a>
            </li>


            <li class="treeview">
                <a class="app-menu__item @if(request()->path() == 'Adminneer/withdrawlist') active @endif" href="{{route('admin.withdrawlist')}}" >
                    <i class="app-menu__icon fa fa-bars"></i>
                    <span class="app-menu__label">Withdraw</span>
                </a>
            </li>

            <li class="treeview">
                <a class="app-menu__item @if(request()->path() == 'Adminneer/pages') active @endif" href="{{route('admin.pages')}}" >
                    <i class="app-menu__icon fa fa-bars"></i>
                    <span class="app-menu__label">Pages</span>
                </a>
            </li>
<!----
            <li class="treeview @if(request()->path() == 'Adminneer/card-create') is-expanded
@elseif(request()->path() == 'Adminneer/card-list') is-expanded
@endif">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fa fa-credit-card"></i>
                    <span class="app-menu__label">Manage Card </span>
                    <i class="treeview-indicator fa fa-angle-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item  @if(request()->path() == 'Adminneer/card-create') active @endif" href="{{route('admin.card.create')}}">
                            <i class="icon fa fa-plus"></i> Create Card</a></li>
                    <li><a class="treeview-item @if(request()->path() == 'Adminneer/card-list') active @endif" href="{{route('admin.card.index')}}">
                            <i class="icon fa fa-edit"></i>Manage Card</a></li>


                </ul>
            </li>


-------->



<li class="treeview
@if(request()->path() == 'Adminneer/about-section') is-expanded
@elseif(request()->path() == 'Adminneer/transaction-log') is-expanded

@endif">
                <a class="app-menu__item @if(request()->path() == 'Adminneer/transaction-log') active @endif" href="{{route('admin.transaction')}}" >
                    <i class="app-menu__icon fa fa-exchange"></i>
                    <span class="app-menu__label">Transaction</span>
                </a>
            </li>



            <li class="treeview @if(request()->path() == 'Adminneer/users') is-expanded
@elseif(request()->path() == 'Adminneer/user-search') is-expanded
@elseif(request()->path() == 'Adminneer/user-banned') is-expanded
@elseif(request()->path() == 'Adminneer/subscribers') is-expanded
@endif">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fa fa-users"></i>
                    <span class="app-menu__label">Manage Users</span>
                    <i class="treeview-indicator fa fa-angle-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item  @if(request()->path() == 'Adminneer/users') active @endif" href="{{route('admin.users')}}">
                            <i class="icon fa fa-users"></i> All Users</a></li>

                    <li><a class="treeview-item @if(request()->path() == 'Adminneer/user-banned') active @endif" href="{{route('admin.user-ban')}}">
                            <i class="icon fa fa-users" style="color:brown;"></i> Banned Users</a></li>

                </ul>
            </li>


            <li class="treeview
@if(request()->path() == 'Adminneer/general') is-expanded
@elseif(request()->path() == 'Adminneer/logo-icon') is-expanded
@elseif(request()->path() == 'Adminneer/seo') is-expanded
@elseif(request()->path() == 'Adminneer/loginpage') is-expanded
@elseif(request()->path() == 'Adminneer/coinbasecred') is-expanded
@elseif(request()->path() == 'Adminneer/notices') is-expanded
@elseif(request()->path() == 'Adminneer/email-sms') is-expanded @endif">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fa fa-cogs"></i>
                    <span class="app-menu__label">Website Control</span>
                    <i class="treeview-indicator fa fa-angle-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a class="treeview-item  @if(request()->path() == 'Adminneer/general') active  @endif " href="{{route('admin.general')}}">
                            <i class="icon fa fa-cog"></i> General Settings</a>
                    </li>

                    <li>
                        <a class="treeview-item  @if(request()->path() == 'Adminneer/notices') active  @endif " href="{{route('admin.notices')}}">
                            <i class="icon fa fa-cog"></i> Notice</a>
                    </li>


                    <li>
                        <a class="treeview-item  @if(request()->path() == 'Adminneer/seo') active  @endif " href="{{route('admin.seo')}}">
                            <i class="icon fa fa-cog"></i> Seo</a>
                    </li>
                    <li>
                        <a class="treeview-item  @if(request()->path() == 'Adminneer/loginpage') active  @endif " href="{{route('admin.loginpage')}}">
                            <i class="icon fa fa-cog"></i> Loginpage</a>
                    </li>


                    <li>
                        <a class="treeview-item  @if(request()->path() == 'Adminneer/coinbasecred') active  @endif " href="{{route('admin.coinbasecred')}}">
                            <i class="icon fa fa-cog"></i>Coinbase Api</a>
                    </li>


                    <li><a class="treeview-item @if(request()->path() == 'Adminneer/logo-icon') active  @endif" href="{{route('admin.logo')}}">
                            <i class="icon fa fa-picture-o"></i> Logo and Icon</a></li>
                    <li><a class="treeview-item @if(request()->path() == 'Adminneer/email-sms') active @endif" href="{{route('admin.email')}}">
                            <i class="icon fa fa-envelope"></i> Email and SMS</a></li>
                </ul>
            </li>

         




        </ul>
    </aside>
    <div class="row">
        <div class="col-md-12">
            @include('layouts.error')
            @yield('content')
        </div>
    </div>
</main>
<script src="{{asset('assets/admin/js/jquery-3.2.1.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="{{asset('assets/admin/js/popper.min.js')}}"></script>
<script src="{{asset('assets/admin/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/admin/js/main.js')}}"></script>
<script src="{{asset('assets/admin/js/plugins/pace.min.js')}}"></script>
<script src="{{asset('assets/admin/js/plugins/bootstrap-notify.min.js')}}"></script>
<script src="{{asset('assets/admin/js/bootstrap-toggle.min.js')}}"></script>
@yield('page_scripts')
@include('layouts.message')
</body>
</html>