<nav class="navbar navbar-area navbar-expand-lg navbar-light ">
    <div class="container nav-container">
        <div class="logo-wrapper navbar-brand">
            <a href="{{url('/')}}" class="logo main-logo">
                <img src="{{asset('assets/images/')}}/logo/logo.png" style="width: 160px" alt="logo">
            </a>
        </div>
        <div class="collapse navbar-collapse" id="mirex">
            <!-- navbar collapse start -->
            <ul class="navbar-nav">
            @guest
                <!-- navbar- nav -->
                <li class="nav-item active">
                    <a class="nav-link pl-0" href="{{route('user.index')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('user.about')}}">About us</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('blog.in')}}">Blog</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('contact')}}">Contact us</a>
                </li>

                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown">Account</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('login')}}">Login</a>
                        <a class="dropdown-item" href="{{route('register')}}">Register</a>
                    </div>
                </li>
                @else

 
                     <li class="nav-item">
                        <a class="nav-link" href="{{route('home')}}">Dashboard</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('user.buycard')}}">Buy Card</a>
                    </li>

                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown">My Card</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{route('user.mycard')}}">My Cards</a>
                            <a class="dropdown-item" href="{{route('user.old.card')}}">Used Card</a>
                        </div>
                    </li>



                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('user.deposit')}}">Deposit</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('user.transaction')}}">Transactions</a>
                    </li>

                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown">{{Auth::user()->name}}</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#"> Balance : {{Auth::user()->balance}} {{$gnl->cur}} </a>
                            <a class="dropdown-item" href="{{route('user.change-password')}}">Change Password</a>
                            <a class="dropdown-item" href="{{route('profile.index')}}">Profile</a>
                            <a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>


                @endguest

            </ul>
            <!-- /.navbar-nav -->
        </div>


        <!-- /.navbar btn wrapper -->
        <div class="responsive-mobile-menu">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mirex" aria-controls="mirex"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <!-- navbar collapse end -->
    </div>
</nav>