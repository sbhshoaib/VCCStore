@extends('fontend.authmaster')
@section('css')

<link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
<link rel="stylesheet" href="https://pattern.kivan-works.com/fonts/kredit.css">
<style>
    * {
        background-repeat: no-repeat;
    }

    .modal.fade.show {
      
    background: #00000045;

}


    .active .floating:before {
        opacity: 1;
        transition: 500ms;
    }

    .floating {
        font-family: Inconsolata;
        margin: auto;
        width: 324px;
        height: 204px;
        max-width: 100%;
        font-size: 18px;
        border-radius: 18px;
        transform-style: preserve-3d;
        transform-origin: 50% 50%;
        background-image: url('../assets2/visa.png');
        background-size: 100% 100%;
        background-repeat: no-repeat;
        background-color: transparent;

    }


    .mcardback {
        background-image: url('../assets2/mcard.png');
    }

    .visaback {
        background-image: url('../assets2/visa.png');
    }

    .logo {
        height: 60px;
        transform: translateZ(30px);
        text-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        margin: 0;
        font-weight: normal;
        filter: drop-shadow(-6.4px 6.2px 8px rgba(0, 0, 0, 0.6));
        z-index: 20;
        background-image: url("http://localhost/cardmate/assets/images/logo/logo.png");
    }

    .paypal_center {
        height: 300px;
        width: 300px;
        position: absolute;
        top: 20px;
        left: 50%;
        transform: translateZ(5px);
        margin-left: -75px;
        z-index: 1;
        filter: drop-shadow(-6.4px 6.2px 8px rgba(0, 0, 0, 0.6));
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg width='150px' height='252px' viewBox='0 0 256 302' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' preserveAspectRatio='xMidYMid'%3E%3Cg%3E%3Cpath d='M217.168476,23.5070146 C203.234077,7.62479651 178.045612,0.815753338 145.823355,0.815753338 L52.3030619,0.815753338 C45.7104431,0.815753338 40.1083819,5.6103852 39.0762042,12.1114399 L0.136468302,259.076601 C-0.637664968,263.946149 3.13311322,268.357876 8.06925331,268.357876 L65.804612,268.357876 L80.3050438,176.385849 L79.8555471,179.265958 C80.8877248,172.764903 86.4481659,167.970272 93.0324607,167.970272 L120.46841,167.970272 C174.366398,167.970272 216.569147,146.078116 228.897012,82.7490197 C229.263268,80.8761167 229.579581,79.0531577 229.854273,77.2718188 C228.297683,76.4477414 228.297683,76.4477414 229.854273,77.2718188 C233.525163,53.8646924 229.829301,37.9325302 217.168476,23.5070146' fill='%2327346A'%3E%3C/path%3E%3Cpath d='M102.396976,68.8395929 C103.936919,68.1070797 105.651665,67.699203 107.449652,67.699203 L180.767565,67.699203 C189.449511,67.699203 197.548776,68.265236 204.948824,69.4555699 C207.071448,69.7968545 209.127479,70.1880831 211.125242,70.6375799 C213.123006,71.0787526 215.062501,71.5781934 216.943728,72.1275783 C217.884341,72.4022708 218.808307,72.6852872 219.715624,72.9849517 C223.353218,74.2002577 226.741092,75.61534 229.854273,77.2718188 C233.525163,53.8563683 229.829301,37.9325302 217.168476,23.5070146 C203.225753,7.62479651 178.045612,0.815753338 145.823355,0.815753338 L52.2947379,0.815753338 C45.7104431,0.815753338 40.1083819,5.6103852 39.0762042,12.1114399 L0.136468302,259.068277 C-0.637664968,263.946149 3.13311322,268.349552 8.0609293,268.349552 L65.804612,268.349552 L95.8875974,77.5798073 C96.5035744,73.6675208 99.0174265,70.4627756 102.396976,68.8395929 Z' fill='%2327346A'%3E%3C/path%3E%3Cpath d='M228.897012,82.7490197 C216.569147,146.069792 174.366398,167.970272 120.46841,167.970272 L93.0241367,167.970272 C86.4398419,167.970272 80.8794007,172.764903 79.8555471,179.265958 L61.8174095,293.621258 C61.1431644,297.883153 64.4394738,301.745495 68.7513129,301.745495 L117.421821,301.745495 C123.182038,301.745495 128.084882,297.550192 128.983876,291.864891 L129.458344,289.384335 L138.631407,231.249423 L139.222412,228.036354 C140.121406,222.351053 145.02425,218.15575 150.784467,218.15575 L158.067979,218.15575 C205.215193,218.15575 242.132193,199.002194 252.920115,143.605884 C257.423406,120.456802 255.092683,101.128442 243.181019,87.5519756 C239.568397,83.4399129 235.081754,80.0437153 229.854273,77.2718188 C229.571257,79.0614817 229.263268,80.8761167 228.897012,82.7490197 L228.897012,82.7490197 Z' fill='%232790C3'%3E%3C/path%3E%3Cpath d='M216.952052,72.1275783 C215.070825,71.5781934 213.13133,71.0787526 211.133566,70.6375799 C209.135803,70.1964071 207.071448,69.8051785 204.957148,69.4638939 C197.548776,68.265236 189.457835,67.699203 180.767565,67.699203 L107.457976,67.699203 C105.651665,67.699203 103.936919,68.1070797 102.4053,68.8479169 C99.0174265,70.4710996 96.5118984,73.6675208 95.8959214,77.5881313 L80.3133678,176.385849 L79.8638711,179.265958 C80.8877248,172.764903 86.4481659,167.970272 93.0324607,167.970272 L120.476734,167.970272 C174.374722,167.970272 216.577471,146.078116 228.905336,82.7490197 C229.271592,80.8761167 229.579581,79.0614817 229.862597,77.2718188 C226.741092,75.623664 223.361542,74.2002577 219.723948,72.9932757 C218.816631,72.6936112 217.892665,72.4022708 216.952052,72.1275783' fill='%231F264F'%3E%3C/path%3E%3C/g%3E%3C/svg%3E");
    }

    .card_no {
        transform: translateZ(40px);
        font-family: kredit-front;
        font-weight: 900;
        font-size: 19px;
        color: #fff;
        position: absolute;
        letter-spacing: 3px;
        bottom: 69px;
        z-index: 2;
        text-shadow: 0 0 5px rgba(0, 0, 0, 0.8);
        text-shadow: -9px 8.7px 6px rgba(0, 0, 0, 0.8);
        width: calc(100% - 3.5rem);
        text-align: center;
        left: 32px;
    }



    .balancetext {
        transform: translateZ(40px);
        font-family: kredit-front;
        font-size: 16px;
        color: #fff;
        position: absolute;
        letter-spacing: 3px;
        bottom: 100px;
        z-index: 2;
        text-shadow: 0 0 5px rgba(0, 0, 0, 0.8);
        text-shadow: -9px 8.7px 6px rgba(0, 0, 0, 0.8);
        font-weight: 900;

        right: 10px;
    }




    .valid {
        position: absolute;
        bottom: 58px;
        color: #fff;
        font-size: 0.58rem;
        left: 150px;
        text-shadow: 0 0 5px rgba(0, 0, 0, 0.8);
        text-shadow: -9px 8.7px 6px rgba(0, 0, 0, 0.8);
        transform: translateZ(30px);
    }


    .valid_date {
        position: absolute;
        font-family: kredit-front;
        font-size: 14px;
        font-weight: bold;
        color: #fff;
        text-shadow: 0 0 5px rgba(0, 0, 0, 0.8);
        text-shadow: -9px 8.7px 6px rgba(0, 0, 0, 0.8);
        bottom: 38px;
        left: 150px;
        z-index: 20;
        transform: translateZ(30px);
        letter-spacing: 2px;
    }

    .securitytext {
        position: absolute;
        bottom: 58px;
        color: #fff;
        font-size: 0.58rem;
        left: 100px;
        text-shadow: 0 0 5px rgba(0, 0, 0, 0.8);
        text-shadow: -9px 8.7px 6px rgba(0, 0, 0, 0.8);
        transform: translateZ(30px);
    }



    .security {
        position: absolute;
        font-family: kredit-front;
        font-size: 14px;
        font-weight: bold;
        color: #fff;
        text-shadow: 0 0 5px rgba(0, 0, 0, 0.8);
        text-shadow: -9px 8.7px 6px rgba(0, 0, 0, 0.8);
        bottom: 38px;
        left: 100px;
        z-index: 20;
        transform: translateZ(30px);
        letter-spacing: 2px;
    }


    .validto {
        position: absolute;
        bottom: 58px;
        color: #fff;
        font-size: 0.58rem;
        left: 240px;
        text-shadow: 0 0 5px rgba(0, 0, 0, 0.8);
        text-shadow: -9px 8.7px 6px rgba(0, 0, 0, 0.8);
        transform: translateZ(30px);
    }


    .validto_date {
        position: absolute;
        font-family: kredit-front;
        font-size: 14px;
        font-weight: bold;
        color: #fff;
        text-shadow: 0 0 5px rgba(0, 0, 0, 0.8);
        text-shadow: -9px 8.7px 6px rgba(0, 0, 0, 0.8);
        bottom: 38px;
        left: 240px;
        z-index: 20;
        transform: translateZ(30px);
        letter-spacing: 2px;
    }




    .holder {
        position: absolute;
        font-family: kredit-front;
        font-size: 13px;
        font-weight: bold;
        color: #fff;
        text-shadow: 0 0 5px rgba(0, 0, 0, 0.8);
        text-shadow: -9px 8.7px 6px rgba(0, 0, 0, 0.8);
        bottom: 9px;
        left: 30px;
        z-index: 20;
        letter-spacing: 2px;
        transform: translateZ(50px);
    }

    .mastercard_icon {
        height: 85px;
        width: 95px;
        float: right;
        position: absolute;
        right: 0;
        bottom: 0;
        transform: translateZ(30px);
        filter: drop-shadow(0px 0px 5px rgba(0, 0, 0, 0.3));
        filter: drop-shadow(-6.4px 6.2px 8px rgba(0, 0, 0, 0.6));
        background-repeat: no-repeat;
        background-size: contain;


    }

    .thickness {
        width: 100%;
        height: 230px;
        border-radius: 8px;
        position: absolute;

        transform: translateZ(-4px);
    }

    .thickness:nth-child(2) {
        transform: translateZ(-8px);
    }

    .thickness:nth-child(3) {
        transform: translateZ(-11px);
    }
</style>

@endsection
@section('content')

<!--begin::Wrapper-->
<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
	<!--begin::Toolbar-->
	<div id="kt_app_toolbar" class="app-toolbar pt-4 pt-lg-7 mb-n2 mb-lg-n3">
		<!--begin::Toolbar container-->
		<div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack flex-row-fluid">
			<!--begin::Toolbar container-->
			<div class="d-flex flex-stack flex-row-fluid">
				<!--begin::Toolbar container-->
				<div class="d-flex flex-column flex-row-fluid">
					<!--begin::Toolbar wrapper-->
					<!--begin::Breadcrumb-->
					<ul class="breadcrumb breadcrumb-separatorless fw-semibold mb-1 mb-lg-3 me-2 fs-7">
						<!--begin::Item-->
						<li class="breadcrumb-item text-gray-700 fw-bold lh-1">
							<a href="{{url('')}}" class="text-white text-hover-primary">
								<i class="ki-outline ki-home text-gray-700 fs-6"></i>
							</a>
						</li>
						<!--end::Item-->


						<!--begin::Item-->
						<li class="breadcrumb-item">
							<i class="ki-outline ki-right fs-7 text-gray-700 mx-n1"></i>
						</li>
						<!--end::Item-->


						<li class="breadcrumb-item text-gray-700 fw-bold lh-1">Dashboard</li>
						<!--end::Item-->
					</ul>
					<!--end::Breadcrumb-->

				</div>
				<!--end::Toolbar container-->
				<!--begin::Actions-->
				<div class="d-flex align-items-center gap-3">
					<!--begin::Secondary button-->
					<div class="m-0">
						<!--begin::Menu-->
						<a href="{{url('')}}/home/cardlist" class="btn btn-flex btn-sm btn-body btn-color-gray-600 h-35px bg-body fw-bold">Card List</a>

						<!--end::Menu-->
					</div>
					<!--end::Secondary button-->
					<!--begin::Primary button-->
					<a href="{{url('')}}/home/add_card" class="btn btn-sm btn-flex btn-dark h-35 px-3">
						<i class="ki-outline ki-plus-square fs-2"></i>Add Card</a>
					<!--end::Primary button-->
				</div>
				<!--end::Actions-->
			</div>
			<!--end::Toolbar container-->
		</div>
		<!--end::Toolbar container-->
	</div>
	<!--end::Toolbar-->












	<!--begin::Wrapper container-->
	<div class="app-container container-xxl d-flex">
		<!--begin::Main-->
		<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
			<!--begin::Content wrapper-->


      





			<div class="d-flex flex-column flex-column-fluid">
				<!--begin::Content-->
				<div id="kt_app_content" class="app-content pb-0">


					<div class="row">



						<div class="col-md-12 mb-4">
						
								<div class="">
                                        



<style>

.announcements-container {
  background: #f5f5f5;
  overflow: hidden;
  display: inline-block;
  height: 30px;
  line-height: 30px;
  -webkit-border-top-left-radius: 4px;
  -webkit-border-bottom-left-radius: 4px;
  -moz-border-radius-topleft: 4px;
  -moz-border-radius-bottomleft: 4px;
  border-top-left-radius: 4px;
  border-bottom-left-radius: 4px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0);

  
}

.announcements-container .container-title {
  min-width: 18px;
  height: 100%;
  overflow: hidden;
  padding: 0 15px 0 15px;
  float: left;
  text-align: center;
  font-size: 13px;
  text-transform: uppercase;
  letter-spacing: 1px;
  -webkit-border-top-left-radius: 2px;
  -webkit-border-bottom-left-radius: 2px;
  -moz-border-radius-topleft: 2px;
  -moz-border-radius-bottomleft: 2px;
  border-top-left-radius: 2px;
  border-bottom-left-radius: 2px;
}
.announcements-container .container-title img {
  width: 16px;
  height: 16px;
  vertical-align: middle;
  margin: -5px 3px 0 0;
}
.announcements-container ul.announcements {
    width: calc(100% - 44px);
    float: left;
    height: 30px;
    overflow: hidden;
    list-style-type: none;
    vertical-align: middle;
    background: #fff;
    padding: 10px;
    border-radius: 0px 2px 2px 0px;
}
.announcements-container ul.announcements li {
  width: 100%;
  overflow: hidden;
  font-size: 14px;
  margin: 0 0 15px 0px;
  vertical-align: middle;
  padding: 0;
  line-height: 40px;
  text-align: left;
  height: 38px;
  text-overflow: ;
}

.lowheight {
    display: block;
    height: 30px;
    color: #fff;
}
.announcements-container ul.announcements li a {
  width: 100%;
  margin-top: -15px;
  text-decoration: none;
  -webkit-transition: color 0.5s ease-out;
  -moz-transition: color 0.5s ease-out;
  -o-transition: color 0.5s ease-out;
  transition: color 0.5s ease-out;
  white-space: nowrap;

  text-overflow: ;
}

@media screen and (max-width: 900px) {
  .announcements-container ul.announcements li a {
    white-space: nowrap;

    text-overflow: marquee;
    /* You can customize marquee properties here */
  }
  
}
@keyframes marquee {
    0%   { transform: translateX(100%); }
    100% { transform: translateX(-100%); }
  }

 @media only screen and (max-width: 900px) {
    /* Apply marquee effect for mobile devices */
    .lowheight {
      white-space: nowrap;

    }
  }


/* Custom style for Bootstrap tooltip container */
.tooltip-inner {
    max-width: 90%;
    /* If max-width does not work, try using width instead */
    width: 90%; 
    margin: auto!important;
}



</style>
<!-- partial:index.partial.html -->
<div class="announcements-container" style="width: 100%;">
  <div class="container-title bg-dark text-white"><i class="fa-solid fa-bullhorn text-white"></i></div>
  <ul class="announcements bg-success text-white">


@foreach($notices as $n)
    <li><a class="lowheight" id="noticeticker{{$n->id}}" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-inverse" data-bs-placement="bottom" title="{{$n->title}}">{{$n->title}}</a></li>
 @endforeach
 
  </ul>
</div>
<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script>


  /*
  News Ticker - Shoaib Bin Habib
  Date: 2024-01-24
  GitHub: github.com/sbhshoaib
*/
  // JavaScript to check if it's a mobile device and add marquee effect
  document.addEventListener("DOMContentLoaded", function() {
    if (isMobileDevice()) {
      addMarqueeEffect();
    }
  });

  function isMobileDevice() {
    return window.innerWidth <= 600; // Adjust the threshold based on your design
  }

  function addMarqueeEffect() {
    var marqueeElements = document.getElementsByClassName("lowheight");

    for (var i = 0; i < marqueeElements.length; i++) {
      var element = marqueeElements[i];
      element.classList.add("marquee");
      element.style.animation = "marquee 10s linear infinite"; // Adjust the duration and timing function as needed
    }
  }



var hoveredAnnouncement = null;

function announcementTicker() {
  $(".announcements")
    .filter(function(item) {
      return !$(this).is(hoveredAnnouncement);
    })
    .each(function() {
      var announcementList = $(this);

      announcementList.find("li:first").slideUp(function() {
        // Check if the data-bs-toggle attribute is present
        var hasTooltip = $(this).attr('data-bs-toggle') !== undefined;

        // Remove the attribute
        $(this).removeAttr('data-bs-toggle');

        // Append to the end of the list
        announcementList.append($(this).slideDown(function() {
          // If it was the first announcement and had the tooltip attribute, add it back
          if (hasTooltip && announcementList.is(':first-child')) {
            $(this).attr('data-bs-toggle', 'tooltip');
          }
        }));
      });
    });
}

setInterval(announcementTicker, 20000);

$(function() {  
  $(".announcements").hover(
    function() {
      hoveredAnnouncement = $(this);
    },
    function() {
      hoveredAnnouncement = null;
    }
  );
});
</script>


                                </div>
                        
                        </div>
        




						<div class="col-md-7">
							<div class="card mb-5 mb-xl-10">
								<div class="card-body pt-9 pb-10">
									<!--begin::Details-->
									<div class="d-flex flex-wrap flex-sm-nowrap">
										<!--begin: Pic-->
										<div class="me-7 mb-4">
											<div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">


												@if(Auth::user()->image==NULL)
												<img alt="user_image" src="{{ env('APP_URL') }}/assets2/media/avatars/avater.png" alt="user" />
												@else
												<img alt="user_image" src="{{Auth::user()->image}}" alt="user" />
												@endif


											</div>
										</div>
										<!--end::Pic-->
										<!--begin::Info-->
										<div class="flex-grow-1">
											<!--begin::Title-->
											<div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
												<!--begin::User-->
												<div class="d-flex flex-column">
													<!--begin::Name-->
													<div class="d-flex align-items-center mb-2">
														<a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">{{Auth::user()->name}}</a>
														<!-----
																<a href="#">
																	<i class="ki-outline ki-verify fs-1 text-primary"></i>
																</a>
															-->
													</div>
													<!--end::Name-->
													<!--begin::Info-->
													<div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
														<a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
															<i class="ki-outline ki-profile-circle fs-4 me-1"></i>{{Auth::user()->username}}</a>

													</div>
													<!--end::Info-->
												</div>
												<!--end::User-->

											</div>
											<!--end::Title-->
											<!--begin::Stats-->
											<div class="d-flex flex-wrap flex-stack">
												<!--begin::Wrapper-->
												<div class="d-flex flex-column flex-grow-1 ">
													<!--begin::Stats-->
													<div class="">
														<!--begin::Stat-->
														
														
														<div class= "row">
														    
														    <div class="col-6 col-md-6 " > 
														    
														    		<div class="border border-gray-300 border-dashed rounded p-2 px-4 " > 
															<!--begin::Number-->
															<div class="d-flex align-items-center">

																<div class="fs-2 fw-bold counted">{{$gnl->cursym}}{{Auth::user()->balance}}</div>
															</div>
															<!--end::Number-->
															<!--begin::Label-->
															<div class="fw-semibold fs-8 text-gray-400">My Balance</div>
															<!--end::Label-->
														</div>
														</div>
														<!--end::Stat-->
														
														 <div class="col-6 col-md-6 " > 
														    
														    		<div class="border border-gray-300 border-dashed rounded p-2 px-4 " > 
															<!--begin::Number-->
															<div class="d-flex align-items-center">

																<div class="fs-2 fw-bold counted">{{$gnl->cursym}}{{\App\CardRequest::where('status', '1')->where('u_id', Auth::id())->sum('balance')}}</div>
															</div>
															<!--end::Number-->
															<!--begin::Label-->
															<div class="fw-semibold fs-8 text-gray-400">Total Card Balance</div>
															<!--end::Label-->
														</div>
														</div>
														
														
																    <div class="col-6 col-md-6 mt-4" > 
														    
														    		<div class="border border-gray-300 border-dashed rounded p-3 px-4 " > 
															<!--begin::Number-->
															<div class="d-flex align-items-center">

																<div class="fs-2 fw-bold counted">{{\App\CardRequest::where('status', '1')->where('u_id', Auth::id())->count()}}</div>
															</div>
															<!--end::Number-->
															<!--begin::Label-->
															<div class="fw-semibold fs-8 text-gray-400">Active Cards</div>
															<!--end::Label-->
														</div>
														</div>
														<!--end::Stat-->
														
														 <div class="col-6 col-md-6 mt-4" > 
														    
														    		<div class="border border-gray-300 border-dashed rounded p-3 px-4 " > 
															<!--begin::Number-->
															<div class="d-flex align-items-center">

																<div class="fs-2 fw-bold counted">{{$gnl->cursym}}{{Auth::user()->totaldeposit}}</div>
															</div>
															<!--end::Number-->
															<!--begin::Label-->
															<div class="fw-semibold fs-8 text-gray-400">Total Deposit</div>
															<!--end::Label-->
														</div>
														</div>
														
														
														
														</div>
									
														
														
														
														
													
													</div>
													<!--end::Stats-->
												</div>
												<!--end::Wrapper-->

											</div>
											<!--end::Stats-->
										</div>
										<!--end::Info-->
									</div>
									<!--end::Details-->

								</div>
							</div>


						</div>

						<div class="col-md-5">
							<div class="card mb-5 mb-xl-10">
								<div class="pt-10">




								


                                <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick.min.css'>
                                <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick-theme.min.css'>


                                <style>
                 
                                    .slick-next {
                                    right: 20px;
                                    z-index: 1;
                                }

                                .slick-prev{
                                    left: 20px;
                                    z-index: 1;
                                }

    


                                    .carousel {
                                        width: 100%;
                                        margin-bottom: 20px auto;
                                    }

                                    .slick-slide {
                                        margin: 10px;
                                    }

                                    .slick-slide img {
                                        width: 100%;
                                        border: 2px solid #fff;
                                    }

                                    .slick-dots li button:before {
                                        font-size: 20px;
                                        color: black;
                                    }


                                    .slick-prev:before,
                                    .slick-next:before {
                                        font-family: 'slick';
                                        font-size: 20px;
                                        line-height: 1;
                                        opacity: .75;
                                        color: #23e299;
                                        -webkit-font-smoothing: antialiased;
                                        -moz-osx-font-smoothing: grayscale;
                                    }
                                </style>





								@if($actvc->count()>0)


                                <div class="loader carousel" style=" display: none;">
								@foreach($actvc as $as)


								@php
								$subcategory = \App\cardsubcategory::where('name',$as->b_id)->first();
								$catimg = \App\cardcategory::find($subcategory->cat_id);
								@endphp

								<div>

                               


								<div class="floating lozad" style="background-image:url('{{$catimg->image}}');">


				

									<div class="balancetext" id="cardnumber">
										Balance:  {{$as->balance}}{{$gnl->cursym}}
									</div>

									<div class="card_no text" id="cardnumber">
										{{$as->number}}
									</div>
									<div class="valid text">
										VALID FROM
									</div>


									<div class="securitytext text">
									CVC
									</div>

									<div class="security text">
									{{$as->security}}
									</div>


									<div class="valid_date text">
									{{$as->exp}}
									</div>


									<div class="validto text">
										EXPIRES END
									</div>
									<div class="validto_date text">
									{{$as->expto}}
									</div>


									<div class="holdernamedis holder text">{{$as->holdername}}</div>


								</div>

							</div>




							@endforeach


                            </div> <!----Carousel end --->

							@else
						

                            <div class="p-10 pt-0" style="
    height: 253px;
    text-align: center;
">
                            You don't have any active card yet.
                            <img src="{{ env('APP_URL') }}/assets/no_card.svg" style="margin: auto;height: 202px;max-width: 100%;">
							
                            </div>
							@endif


								<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
                                <script src='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick.min.js'></script>
                                
                                                
                                <script>
                                    jQuery(document).ready(function($) {
                                        // Display loader
                                        $('.loader').show();
                                
                                        $('.carousel').slick({
                                            slidesToShow: 1,
                                            dots: false,
                                  
                                            responsive: [{
                                                breakpoint: 900, // Adjust this breakpoint as needed
                                                settings: {
                                                    slidesToShow: 1,
                                                    dots: false // Enable dots for mobile view if needed
                                                }
                                            }]
                                        });
                                
                                        // Hide loader once the slider is fully initialized
                                        $('.carousel').on('init', function() {
                                            $('.loader').hide();
                                        });
                                    });
                                </script>

								</div>
							</div>


						</div>


						<div class="col-md-12">
							<div class="card mb-5 mb-xl-10">
							<div class="card-header border-1 ">
											<!--begin::Card title-->
											<div class="card-title m-0">
												<h3 class="fw-bold m-0">Recent Transaction</h3>
											</div>
											<!--end::Card title-->
										</div>


								<div class="card-body pt-9 pb-10">



								@if($tran->count()>0)
								<!--begin::Table-->
								<div class="table-responsive">

		
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="transaction_table">
                                <thead>
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">

                                        <th class="min-w-90px">TRX</th>
										<th class="min-w-100px">Details</th>
                                        <th class="text-end min-w-70px">Status</th>
                                        <th class="text-end min-w-100px">Amount</th>
                                        <th class="text-end min-w-100px">Balance</th>
                                        <th class="text-end min-w-100px">Gateway</th>
                                        <th class="text-end min-w-100px">Date</th>

                                    </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-600">



                                    @php
                                    $i=0;
                                    @endphp

                                    @foreach($tran as $d)


                                    <tr>

                                        
                                        <td>

                                            @if($d->trx!='')
                                            {{$d->trx}}
                                            @else
                                            Trx not available
                                            @endif

                                        </td>


										<td>

										{{$d->details}}
                                    
                                            

                                     
                                        

                                    
									

										</td>

                                                @php
                                                $withdrawstat='';
                                                @endphp
                                               @if($d->category=='withdraw')
                                                @php
                                                $withdrawd = \App\WithdrawData::where('trnsid', $d->id)->first();
                                                @endphp
                                    

                                                @if($withdrawd->status=='1')
                                                    @php
                                                        $withdrawstat =  '<div class="badge badge-light-success">Withdraw Successful</div>';
                                                    @endphp
                                                @elseif($withdrawd->status=='2')
                                                  @php
                                                        $withdrawstat =  '<div class="badge badge-light-warning">Withdraw Pending</div>';
                                                    @endphp
                                                @elseif($withdrawd->status=='3')
                                                   @php
                                                        $withdrawstat =  '<div class="badge badge-light-danger">Withdraw Rejected</div>';
                                                    @endphp
                                                @else
                                                   @php
                                                        $withdrawstat =  '<div class="badge badge-light-danger">Withdraw Error</div>';
                                                    @endphp
                                                @endif
                                                @endif

                                        @if($d->success == '1')
                                        <td class="text-end pe-0" data-order="Successful">
                                            <!--begin::Badges-->
                                            <div class="badge badge-light-success">Successful</div>
                                            @if($d->message != '')
                                            <a href class="badge badge-light-info" data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_{{$d->id}}">Show Message</a>
                                            @endif

                                            {!!$withdrawstat!!}
                                            <!--end::Badges-->
                                        </td>
                                        @elseif($d->success == '2')
                                        <td class="text-end pe-0" data-order="Pending">
                                            <!--begin::Badges-->
                                            <div class="badge badge-light-warning">Pending</div>
                                            <!--end::Badges-->
											@if($d->message != '')
                                            <a href class="badge badge-light-info" data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_{{$d->id}}">Show Message</a>
                                            @endif
                                            {{$withdrawstat}}
                                        </td>
                                        @elseif($d->success == '3')
                                        <td class="text-end pe-0" data-order="Rejected">
                                            <!--begin::Badges-->
                                            <div class="badge badge-light-danger">Rejected</div>
                                            <!--end::Badges-->
											@if($d->message != '')
                                            <a href class="badge badge-light-info" data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_{{$d->id}}">Show Message</a>
                                            @endif
                                            {{$withdrawstat}}
                                        </td>
                                        @else
                                        <td class="text-end pe-0" data-order="Error">
                                            <!--begin::Badges-->
                                            <div class="badge badge-light-danger">Error</div>
                                            <!--end::Badges-->
											@if($d->message != '')
                                            <a href class="badge badge-light-info" data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_{{$d->id}}">Show Message</a>
                                            @endif
                                            {{$withdrawstat}}
                                        </td>
                                        @endif




                                        


                                        <td class="text-end pe-0"
                                            style="color: @if($d->type=='-') red @else #01a02e @endif;">
                                            <span class="fw-bold"> {{$d->type}}{{$gnl->cursym}}{{$d->amount}}</span>
                                        </td>


                                        <td class="text-end">
                                            <span class="fw-bold">

                                                {{$gnl->cursym}}{{$d->balance}}


                                            </span>
                                        </td>


                                        <td class="text-end">
                                            <span class="fw-bold">

                                                @if($d->g_id=='1')
                                                BTC
                                                @elseif($d->g_id=='2')
                                                USDT
                                                @elseif($d->g_id=='3')

                                                @else
                                                Internal
                                                @endif



                                            </span>
                                        </td>



                                        <td class="text-end" data-order="       @php
                                                            $formattedDate =\Carbon\Carbon::parse($d->created_at)->format('Y-m-d');
                                                            @endphp">
                                            <span class="fw-bold">
                                                @php
                                                $formattedDate =\Carbon\Carbon::parse($d->created_at)->format('d-m-Y');
                                                @endphp

                                                <!-- Display the formatted date -->
                                                {{$formattedDate}}
                                            </span>
                                        </td>

                                    </tr>


                                    <div class="modal fade" tabindex="-1" id="kt_modal_{{$d->id}}">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title">Message</h3>

                                                    <!--begin::Close-->
                                                    <div class="btn btn-icon btn-sm btn-danger ms-2"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <i class="ki-duotone ki-cross fs-1"><span
                                                                class="path1"></span><span class="path2"></span></i>
                                                    </div>
                                                    <!--end::Close-->
                                                </div>

                                                <div class="modal-body">
                                                    <p> {{$d->message}} </p>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    @endforeach
                                </tbody>
                            </table>
                            <!--end::Table-->
							</div>

							@else
										You have no transaction.
							@endif
								</div>
							</div>


						</div>























										<!------------CARD TRANSACTION----------->
										<!------------CARD TRANSACTION----------->
										<!------------CARD TRANSACTION----------->
										<!------------CARD TRANSACTION----------->
										<!------------CARD TRANSACTION----------->
										<!------------CARD TRANSACTION----------->
										<!------------CARD TRANSACTION----------->
										<!------------CARD TRANSACTION----------->
										<!------------CARD TRANSACTION----------->
										<!------------CARD TRANSACTION----------->













						<div class="col-md-12">
							<div class="card mb-5 mb-xl-10">
							<div class="card-header border-1 ">
											<!--begin::Card title-->
											<div class="card-title m-0">
												<h3 class="fw-bold m-0">Recent Card Transaction</h3>
											</div>
											<!--end::Card title-->
										</div>


								<div class="card-body pt-9 pb-10">



								@if($cardtrns->count()>0)
								<!--begin::Table-->
								<div class="table-responsive">

		
								<table class="table align-middle table-row-dashed fs-6 gy-5" id="">
                                <thead>
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">

                                        <th class="min-w-100px">Details</th>
                                        <th class="min-w-70px">Status</th>
                                        <th class="min-w-100px">Amount</th>
                                        
                                        <th class="min-w-100px">Balance</th>
                                        <th class="min-w-100px">Trx</th>
                                        <th class="min-w-100px text-end ">Date</th>
                                
                                     

                                    </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-600">







                                    @foreach($cardtrns as $dtrans)

                                  

                                    <tr>

                                      

                               

                                        <td>
                                            {{$dtrans->details}}
                                        </td>





                                        @if($dtrans->status == '1')
                                        <td class="pe-0" data-order="Success">
                                            <!--begin::Badges-->
                                            <div class="badge badge-light-success">Success</div>
                                            <!--end::Badges-->

                                            @if($dtrans->message != '')
                                            <a href class="badge badge-light-info" data-bs-stacked-modal="#kt_modal_stacked_{{$dtrans->id}}">Show Message</a>
                                            @endif
                                        </td>
                                        @elseif($dtrans->status == '2')
                                        <td class=" pe-0" data-order="Processing">
                                            <!--begin::Badges-->
                                            <div class="badge badge-light-warning">Processing</div>
                                            <!--end::Badges-->
                                            @if($dtrans->message != '')
                                            <a href class="badge badge-light-info" data-bs-stacked-modal="#kt_modal_stacked_{{$dtrans->id}}">Show Message</a>
                                            @endif
                                        </td>

                                        @elseif($dtrans->status == '3')
                                        <td class="pe-0" data-order="Rejected">
                                            <!--begin::Badges-->
                                            <div class="badge badge-light-danger">Rejected</div>
                                            <!--end::Badges-->
                                            @if($dtrans->message != '')
                                            <a href class="badge badge-light-info" data-bs-stacked-modal="#kt_modal_stacked_{{$dtrans->id}}">Show Message</a>
                                            @endif
                                        </td>
                                        @else
                                        <td class="pe-0" data-order="Error">
                                            <!--begin::Badges-->
                                            <div class="badge badge-light-danger">Error</div>
                                            <!--end::Badges-->
                                            @if($dtrans->message != '')
                                            <a href class="badge badge-light-info" data-bs-toggle="modal" data-bs-target="#kt_modal_{{$dtrans->id}}">Show Message</a>
                                            @endif
                                        </td>

                                        @endif



                                        <td>
                                            

                                            @if($dtrans->type=='+')
                                            <span class="text-success fw-bold">{{$dtrans->type}}{{$gnl->cursym}}{{$dtrans->amount}}</span>
                                            @else
                                            <span class="text-danger fw-bold">{{$dtrans->type}}{{$gnl->cursym}}{{$dtrans->amount}}</span>
                                            @endif
                                        </td>





                           
                                        <td>
                                            <span class="fw-bold">
                                            @if($dtrans->postbalance!=NULL)
                                                {{$gnl->cursym}}{{$dtrans->postbalance}}
                                            @endif

                                            </span>
                                        </td>

                                        <td>
                                            {{$dtrans->trx}}
                                        </td>



                                        <td data-order="@php
                                                            $formattedDate =\Carbon\Carbon::parse($dtrans->created_at)->format('Y-m-d');
                                                            @endphp">
                                            <span class="fw-bold text-end ">
                                                @php
                                                $formattedDate =\Carbon\Carbon::parse($dtrans->created_at)->format('d-m-Y');
                                                @endphp

                                                <!-- Display the formatted date -->
                                                {{$formattedDate}}</span>
                                        </td>







                                        @if($dtrans->message != '')
                                        <div class="modal fade" tabindex="-1" id="kt_modal_stacked_{{$dtrans->id}}"  style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered ">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title">Message</h3>
                                                        
                                                        <!--begin::Close-->
                                                        <div class="btn btn-icon btn-sm btn-danger ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                           <i class="ki-solid ki-cross fs-1"></i>
                                                           </div>
                                                        <!--end::Close-->
                                                    </div>

                                                    <div class="modal-body">
                                        
                                                        {{$dtrans->message}}
                                                

                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @endif

                                     
                                    </tr>
                                    @endforeach
                                </tbody>
        </table>
                            <!--end::Table-->
							</div>

							@else
										You have no card transaction.
							@endif
								</div>
							</div>


						</div>





					</div>


					@endsection
					@section('js')

					@endsection