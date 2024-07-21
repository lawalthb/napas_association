@php
$contact = App\Models\WebContacts::where('id', 1)->first();

$header = App\Models\WebHeaders::where('id', 1)->first();

@endphp


<!-- ======= Footer ======= -->
<footer id="footer">
  <div class="footer-top">
    <div class="container">
      <div class="row">

        <div class="col-lg-3 col-md-6">
          <div class="footer-info">
            <h3><img src="{{$header->logo}}" width="100px" >
          
            {{$header->site_name}}</h3>
              <strong>Phone:</strong>{{$contact->phone}}<br>
              <strong>Email:</strong>{{$contact->email1}}<br>
          
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <!-- <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a> -->
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-md-6 footer-links">
          <h4>Menu</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="/">Home</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#services">Resources</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#registration">Membership</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#events">Events</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Account</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="/loginPage">Login</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="/loginPage">Registration</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="/loginPage">My Profile</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="/loginPage">Election</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="/loginPage">Contests</a></li>
          </ul>
        </div>

        <!-- <div class="col-lg-4 col-md-6 footer-newsletter">
          <h4>Visitor's Newsletter</h4>
          
          <form action="" method="post">
            <input type="email" name="email"><input type="submit" value="Subscribe">
          </form>

        </div> -->

      </div>
    </div>
  </div>

  <div class="container">
    <div class="copyright">
      &copy; 2024 Copyright <strong><span> {{$header->site_name}}</span></strong>. 
    </div>
    <div class="credits">

    Legacy 2024 Excos
    </div>
  </div>
</footer><!-- End Footer -->