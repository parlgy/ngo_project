
<!DOCTYPE html>


<html lang="en" class="no-js">

<!-- Head -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
  <title>FAITH AND ACTION INTERNATIONAL</title>

  <!-- Meta -->
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  

  <!-- Bootstrap Styles -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> 

  <!-- Vendor Styles -->
  <link rel="stylesheet" type="text/css" href="vendors/font-awesome/css/fontawesome-all.min.css">
  <link rel="stylesheet" type="text/css" href="vendors/slick-carousel/slick.css"> 
  <link rel="stylesheet" type="text/css" href="fonts/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="vendors/magnific-popup/magnific-popup.css">
  <link rel="stylesheet" type="text/css" href="css/hovereffects.css"> 
  <!-- Theme Styles -->
  <link href="css/scrolling-nav.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="css/theme.css">
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <script type="text/javascript" src="https://code.jquery.com/jquery.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<!-- End Head -->

<body style="height: 100vh;">
  <!-- Header -->
  <header id="top">
    <!-- Navbar --> 
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="index"><b>FAITH AND ACTION</b></a>  
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
           <span class="ti-menu text-white"></span>
       </button>
       <div class="collapse navbar-collapse" id="navbarResponsive">
           <ul class="navbar-nav ml-auto">
             <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#top">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#services">Services</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#portfolio">Gallery</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#team">Team</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle  js-scroll-trigger" href="#c" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  counties
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item js-scroll-trigger" href="#">KAKAMEGA</a>
                  <a class="dropdown-item" href="#">Bungoma</a>
                  <a class="dropdown-item" href="#">Busia</a>
                  <a class="dropdown-item" href="#">Vihiga</a>
                  <a class="dropdown-item" href="#">Tranz-Nzoia</a>
              </div>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="contact ">Contact</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="membershipform">Register</a>
        </li>
    </ul>
</div>
</div>
</div>


</div>
</nav>
<!-- End Navbar --> 

</header>
<!-- End Header -->
<main role="main">
    <section class="wt-section" id="services">
        <div class="container">
            <div class="row justify-content-md-center pb-lg-4 mb-lg-5 mb-4">
            <div class="col-md-4 col-sm-12 w-md-50 mx-auto mb-0">
                <div class="card">
                <div class="card-head text-center">
                    <h5>FAITH AND ACTION INTERNATIONAL REGISTRATION FORMS</h5>
                    <hr>
                </div>               
                    <div class ="card-body p2">
                      <div class="form-group">
                         <label for="county">Type of Registration</label>
                         <select class="form-control form-control-sm" name = "county" id ="wes">
                            <option>Select Registration type</option>
                            <option>Member Registration</option>
                            <option>Member Subscription</option>
                            <option>Welfare Registration</option>
                            <option>Welfare Subscription</option>
                        </select>
                    </div>
                    <hr>
                    <div id="formhere"></div>
                </div>

            </div>
        </div>
    </div>
</div>
</section>

</main>

<!-- jQuery file  -->
<script type ="text/javascript">
 $("#subcounty").change(function(){
  var x = $("#subcounty").val();
  xmlhttp = new XMLHttpRequest();
  xmlhttp.open("GET","conn.php?subcounty="+x,false);
  xmlhttp.send(null);
  $("#ward").html(xmlhttp.responseText);

});
 $("#wes").change(function(){
  var x = $("#wes").val();
  if(x == "Member Registration"){
      $("#formhere").load('regm');
  }else if(x =="Welfare Registration"){
    $("#formhere").load('wel');
}else if(x =="Member Subscription"){
  $("#formhere").load('regs');
}else if(x =="Select Registration type"){
  $("#formhere").innerHTML = "";
}else if(x =="Welfare Subscription"){
  $("#formhere").load('wels');
}

});
</script>
<!-- JS Script Files --> 
<script src="vendors/jquery.min.js"></script>
<script src="vendors/jquery.migrate.min.js"></script>
<script src="vendors/popper.min.js"></script>
<script src="vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="vendors/jquery-easing/jquery.easing.min.js"></script>

<!-- Components Vendor  --> 
<script src="vendors/slick-carousel/slick.min.js"></script>
<script src="vendors/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="vendors/counters/waypoint.min.js"></script>
<script src="vendors/counters/counterup.min.js"></script>

<script src="contact/jqBootstrapValidation.js"></script>
<script src="contact/contact_me.js"></script>
<script src="js/scrolling-nav.js"></script>
<!--Plugin Initialize-->
<script src="js/global.js"></script>

<!-- Theme Components and Settings --> 
<script src="vendors/carousel.js"></script>
<script src="vendors/counters.js"></script>

<!-- END JAVASCRIPTS -->

</body>
<!-- End Body -->

<!-- Footer -->
<footer class="bg-dark py-5" style="flex: 1; left: 0; bottom: 0; width: 100%;">
  <div class="container">
    <div class="row">
      <div class="col-md-8 text-center text-md-left mb-3 mb-md-0">
        <small class="text-white"><a class="text-white"></a>. <br/>&copy; All Rights Reserved</small>
    </div>

    <div class="col-md-4 align-self-center">
        <ul class="list-inline text-center text-md-right mb-0">
          <li class="list-inline-item mx-2" data-toggle="tooltip" data-placement="top" title="Facebook">
            <a class="text-white" target="_blank" href="https://www.facebook.com">
              <i class="fab fa-facebook"></i>
          </a>
      </li>
      <li class="list-inline-item mx-2" data-toggle="tooltip" data-placement="top" title="Instagram">
        <a class="text-white" target="_blank" href="https://www.instagram.com">
          <i class="fab fa-instagram"></i>
      </a>
  </li>
  <li class="list-inline-item mx-2" data-toggle="tooltip" data-placement="top" title="Twitter">
    <a class="text-white" target="_blank" href="https://twitter.com">
      <i class="fab fa-twitter"></i>
  </a>
</li>
<li class="list-inline-item mx-2" data-toggle="tooltip" data-placement="top" title="Dribbble">
    <a class="text-white" target="_blank" href="https://dribbble.com">
      <i class="fab fa-dribbble"></i>
  </a>
</li>
</ul>
</div>
</div>
</div>
</footer>
<!-- End Footer -->
</html>



<div class="container">




</body>
</html>