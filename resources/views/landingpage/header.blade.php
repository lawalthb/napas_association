@php
$header = App\Models\WebHeaders::where('id', 1)->first();

@endphp
<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
  <div class="container d-flex align-items-center">

    <!-- <a href="index.html" class="logo me-auto"><img src="{{asset('landingpage/assets/img/logo.png')}}" alt=""></a> -->
    <!-- Uncomment below if you prefer to use an image logo -->
    <h1 class="logo me-auto"><a href="{{url('/')}}"><img src="{{$header->logo}}">{{$header->site_name}}</a></h1>

    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        <li><a class="nav-link scrollto " href="#hero">Home</a></li>
        <li><a class="nav-link scrollto" href="#about">About</a></li>
        <li><a class="nav-link scrollto" href="#excos">Excos</a></li>
        <li class="dropdown"><a href="#"><span>Membership</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="#registration">Registration</a></li>
            <li><a href="#benefit">Benefits</a></li>
            <li><a href="#registration">Registration</a></li>
            <li><a href="/executives">Executives</a></li>
            <li><a href="#gallery">Gallery</a></li>
            <li><a href="#testimonials">Testimonials</a></li>

          </ul>
        </li>
        <!-- <li><a class="nav-link scrollto" href="#services">Services</a></li> -->

        <li><a class="nav-link scrollto" href="#services">Resources</a></li>
        <li><a class="nav-link scrollto" href="{{route('contest')}}">Contest</a></li>


        <li><a class="nav-link scrollto" href="#contact">Support</a></li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->
    @if(auth()->check())

    <a href="{{route('home')}}" class="appointment-btn scrollto"><span class="d-none d-md-inline">Back to </span>Dashboard</a>
    @else
    <a href="{{route('login')}}" class="appointment-btn scrollto"><span class="d-none d-md-inline">Login to</span> Dashbaord</a>
    @endif


  </div>
</header><!-- End Header -->