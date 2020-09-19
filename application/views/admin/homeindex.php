<?php

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Leasehouse</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include 'layout/css.php'; ?>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900&display=swap" rel="stylesheet">
     <link href="<?php echo base_url();?>up/css/open-iconic-bootstrap.min.css" rel="stylesheet">
      <link href="<?php echo base_url();?>up/css/animate.css" rel="stylesheet">
       <link href="<?php echo base_url();?>up/css/owl.carousel.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>up/css/owl.theme.default.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>up/css/magnific-popup.css" rel="stylesheet">
        <link href="<?php echo base_url();?>up/css/aos.css" rel="stylesheet">
        <link href="<?php echo base_url();?>up/css/ionicons.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>up/css/bootstrap-datepicker.css" rel="stylesheet">
        <link href="<?php echo base_url();?>up/css/jquery.timepicker.css" rel="stylesheet">
        <link href="<?php echo base_url();?>up/css/flaticon.css" rel="stylesheet">
        <link href="<?php echo base_url();?>up/css/icomoon.css" rel="stylesheet">
        <link href="<?php echo base_url();?>up/css/style.css" rel="stylesheet">

  </head>
  <body>
    
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
        <a class="navbar-brand" href="index.html">Leasehouse</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active"><a href="<?php echo base_url();?>" class="nav-link">Home</a></li>
              <li class="nav-item"><a href="#Vacancies" class="nav-link">Vacancies</a></li>
               <li class="nav-item"><a href="#about" class="nav-link">About us</a>
               	 <li class="nav-item"><a href="#happyclients" class="nav-link">Testimonials</a>
              <li class="nav-item"><a href="#faq" class="nav-link">FAQ</a></li>
              <li class="nav-item"><a href="#contact" class="nav-link">Contact</a></li>
             
              <li class="nav-item"><a href="<?php echo base_url();?>auth" class="nav-link">Login</a></li>
            </ul>
          </div>
      </div>
    </nav>
    <!-- END nav -->
    
    <div class="hero-wrap ftco-degree-bg" style="background-image: url('<?php echo base_url();?>images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text justify-content-center align-items-center">
          <div class="col-lg-8 col-md-6 ftco-animate d-flex align-items-end">
            <div class="text text-center">
              <h1 class="mb-4">Welcome To LeaseHouse<br></h1>
              <p style="font-size: 18px;">The most Ever condusive living environment for you</p>
              <form action="#" class="search-location mt-md-5">
                <div class="row justify-content-center">
                  <div class="col-lg-10 align-items-end">
                    <div class="form-group">
                      <div class="form-field">
                        <input type="text" class="form-control" placeholder="search">
                        <button><span class="ion-ios-search"></span></button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="mouse">
        <a href="#" class="mouse-icon">
          <div class="mouse-wheel"><span class="ion-ios-arrow-round-down"></span></div>
        </a>
      </div>
    </div>
<section class="ftco-section goto-here" id="Vacancies" style="background: lightgrey">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12 heading-section text-center ftco-animate mb-5">
            <span class="subheading">Vacancies</span>
            <h2 class="mb-2">Exclusive Offer For You</h2>
          </div>
        </div>
    </div>
       
   <!--------------------- vacancie here------>

   <div class="container"> 
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel ftco-owl">
            	<?php foreach ($rooms as $room): ?>
              <div class="item">
                <div class="testimony-wrap py-4">
                  <div class="text">
                    <p class="mb-4">
                    	<ul style="color: green;"><?php echo $room['info_type'];?></ul>
                    	<ul style="color: purple;">@<del><?php echo $room['rent']*1.10;?></del>><?php echo $room['rent'];?></ul>
                    </p>
                    <div class="d-flex align-items-center">
                      <div class="user-img" style="background-image: url(<?php echo $room['picture']?>)"></div>
                      <div class="pl-3">
                        <p class="name"><?php echo $room['house_name'];?></p>
                        <span class="position" style="color: darkblue"><?php echo $room['plot_name'];?></span><br/>
                        <span><?php echo $room['plot_code']."  " .$room['plot_name'];?></span>
                      </div>
                      <button class="btn btn-info house" id="<?php echo $room['house_id'];?>">Read more---</button>
                    </div>
                  </div>
                </div>
              </div>
               <?php endforeach ?>
            </div>
          </div>
        </div>
      </div>
                 
              
   <!--------------------- end vacancie here------>
    </section>

    <section class="ftco-section goto-here" id="about" style="background: wheat">
      <div class="container">
      	<div class="row justify-content-center">
          <div class="col-md-12 heading-section text-center ftco-animate mb-5">
            <span class="subheading">About</span>
            <h2 class="mb-2">About Us</h2>
          </div>
        </div>
    </div>
        <div class="row no-gutters">
          <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(<?php echo base_url();?>images/bg_1.jpg);">
          </div>
          <div class="col-md-6 wrap-about py-md-5 ftco-animate">
            <div class="heading-section p-md-5">
              <h2 class="mb-4">We Put People First.</h2>

              <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
              <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section style="background: wheat" class="ftco-counter img" id="section-counter">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
            <div class="block-18 py-4 mb-4">
              <div class="text text-border d-flex align-items-center">
                <strong class="number" data-number="305">0</strong>
                <span>Area <br>Population</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
            <div class="block-18 py-4 mb-4">
              <div class="text text-border d-flex align-items-center">
                <strong class="number" data-number="1090">0</strong>
                <span>Total <br>Properties</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
            <div class="block-18 py-4 mb-4">
              <div class="text text-border d-flex align-items-center">
                <strong class="number" data-number="209">0</strong>
                <span>Average <br>House</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
            <div class="block-18 py-4 mb-4">
              <div class="text d-flex align-items-center">
                <strong class="number" data-number="67">0</strong>
                <span>Total <br>Branches</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section style="background: lightgreen" class="ftco-section testimony-section" id="happyclients">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <span class="subheading">Testimonial</span>
            <h2 class="mb-3">Happy Clients</h2>
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel ftco-owl">
            	<?php foreach ($happies as $happy): ?>
              <div class="item">
                <div class="testimony-wrap py-4">
                  <div class="text">
                    <p class="mb-4"><?php echo $happy['testimonial'];?>.</p>
                    <div class="d-flex align-items-center">
                      <div class="user-img" style="background-image: url(<?php echo $happy['image'];?>)"></div>
                      <div class="pl-3">
                        <p class="name"><?php echo $happy['fname']."  ".$happy['lname'];?></p>
                        <span class="position"><?php echo $happy['date'];?></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          <?php endforeach ?>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section class="ftco-section ftco-no-pt" id="faq">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <span class="subheading">FAQ</span>
            <h2>Frequently Asked Questions</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-sm-12 text-center">
            <div class="white-box">
                        <div class="panel-group" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="font-bold"> How can i purchase my admin ? </a> </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer la. </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title"> <a class="collapsed font-bold" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" > How to modify Navigation ? </a> </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingThree">
                                    <h4 class="panel-title"> <a class="font-bold collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree" > How to get yearly Support? </a> </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                    <div class="panel-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, inable VHS. </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingFour"> <a class="collapsed font-bold panel-title" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour"> How to take a tour? </a> </div>
                                <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                    <div class="panel-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, inable VHS. </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
        </div>
                    
      </div>
  </section>
      		<section>
      <div class="container" id="contact">
      	 <div class="row justify-content-center mb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <span class="subheading">Contact</span>
            <h2>Contact Us</h2>
          </div>
        </div>
        <div class="row d-flex mb-5 contact-info justify-content-center">
        	<div class="col-md-8">
        		<div class="row mb-5">
		          <div class="col-md-4 text-center py-4">
		          	<div class="icon">
		          		<span class="icon-map-o"></span>
		          	</div>
		            <p><span>Address:<br/></span> 203 Fake Mountain view,  721 Nairobi Kenya 10016</p>
		          </div>
		          <div class="col-md-4 text-center border-height py-4">
		          	<div class="icon">
		          		<span class="icon-mobile-phone"></span>
		          	</div>
		            <p><span>Phone:<br/></span> <a href="tel://0713765197">+254 713 765 197</a></p>
		          </div>
		          <div class="col-md-4 text-center py-4">
		          	<div class="icon">
		          		<span class="icon-envelope-o"></span>
		          	</div>
		            <p><span>Email:</span> <a href="mailto:justinekibor98@gmail.com.com">justinekibor98@gmail.com</a></p>
		          </div>
		        </div>
          </div>
        </div>
        <div class="row block-9 justify-content-center mb-5">
          <div class="col-md-8">
          	<h2 class="text-center">If you got any questions/preference <br>please do not hesitate to send us a message</h2> 
          </div>
          <div class="col-md-4">
          	                        <div class="white-box">
                            <a class="popup-with-form btn btn-primary" href="#test-form">Click here to send</a>
                            <!-- form itself -->
                            <form id="test-form" class="mfp-hide white-popup-block">
                                <h1>Contact form</h1>
                                <fieldset style="border:0;">
                                  <div class="form-group">
                                        <label class="control-label" for="me">Name</label>
                                        <input type="text" class="form-control" id="fname" name="name" placeholder="Name"  required="">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="inputEmail">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" required="">
                                    </div>
                                    Property wishing to own:
                          <div class="form-group">
                           <select name="prefer" id="prefer" class="form-control">
                           	<option value="0">select</option>
                           	<option value="shop">Shop</option>
                           	 <option value="1beedroom">One bedroom</option>
                           	<option value="2beedroom">Two bedroom</option>
                           	 <option value="betsitter">Betsitter</option>
                           	<option value="single">Single</option>
                           </select>
                                    </div>
                           <div class="form-group">
                           	Message:
                <textarea name="message" id="message" cols="30" rows="3" class="form-control" placeholder="Message" required=""></textarea>
              </div>
                                    <button  class="btn btn-lg btn-success pull pull-right messo">send</button>
                                </fieldset>
                            </form>
                        </div>
 
          	    
          </div>

        </div>
 </div>
</section>

   
      

      <div class="container" style="background: black; margin-bottom: 0px; color: white">

        <div class="row">
          <div class="col-md-12 text-center">
  
            <p style="color: white;"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved .
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div> <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

<?php include 'layout/js.php'; ?>
   
  </body>
</html>
<script>
	        $(document).ready(function(){
              $(".house").click(function(){
              	var id = $(this).attr("id");
               window.location="<?php echo base_url();?>HomeController/vacancies?id="+id;
    });
  $(document).on('click', '.messo', function(){
   var name = $('#fname').val();
   var email = $('#email').val();
   var prefer = $('#prefer').val();
   var message = $('#message').val();
   if(prefer != 0){
   $.ajax({
    url:"<?php echo base_url();?>HomeController/send",
    method:"POST",
    data:{name:name,email:email,prefer:prefer,message:message},
    success:function(data)
    {
        alert(data);
        window.location ="<?php echo base_url();?>#contact";
    }
   });
 }
 else{
 	alert("Kindly select your preference");
 }

 });
                 });
</script>
<style>
	body{
		margin-bottom: 0px;
	}
</style>