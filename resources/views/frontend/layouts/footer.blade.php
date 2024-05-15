    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="first-item">
                        <div class="logo">
                        <a href="index.html" class="logo" style="color:black;">
                            Handy Crafts
                            <!-- <img src="assets/images/logo.png"> -->
                        </a>
                        </div>
                        <ul>
                            <li><a href="#">Lahore , Pakistan</a></li>
                            <li><a href="#">handycrfats.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <h4>Shopping &amp; Categories</h4>
                    <ul>
                        <li><a href="#">Decor</a></li>
                        <li><a href="#">Attire</a></li>
                        <li><a href="#">Art</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="#">Homepage</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Help &amp; Information</h4>
                    <ul>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">FAQ's</a></li>
                        <li><a href="#">Shipping</a></li>
                        <li><a href="#">Tracking ID</a></li>
                    </ul>
                </div>
                <div class="col-lg-12">
                    <div class="under-footer">
                        <p>Copyright © 2021 HandyCrafts Co., Ltd. All Rights Reserved. 
                        
                        <br>Design: <a href="https://templatemo.com" target="_parent" title="free css templates">Mahnoor Mansha</a></p>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
   
    <!-- jQuery -->
    <script src="{{URL::asset('assets/js/jquery-2.1.0.min.js')}}"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="{{URL::asset('assets/js/owl-carousel.js')}}"></script>
    <script src="{{URL::asset('assets/js/accordions.js')}}"></script>
    <script src="{{URL::asset('assets/js/datepicker.js')}}"></script>
    <script src="{{URL::asset('assets/js/scrollreveal.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/waypoints.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/jquery.counterup.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/imgfix.min.js')}}"></script> 
    <script src="{{URL::asset('assets/js/slick.js')}}"></script> 
    <script src="{{URL::asset('assets/js/lightbox.js')}}"></script> 
    <script src="{{URL::asset('assets/js/isotope.js')}}"></script> 
    
    <!-- Global Init -->
    <script src="{{URL::asset('assets/js/custom.js')}}"></script>

    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>

  </body>
</html>