<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="description" content="Admin Template,It's modern, responsive and based Design by Google. ">
  <meta name="keywords" content="admin template, dashboard template, flat admin template, responsive admin template,">
  <title>SignUp Form</title>

  <!-- Favicons-->
  <link rel="icon" href="<?php echo WWW_IMAGE_PATH; ?>favicon/favicon-32x32.png" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="<?php echo WWW_IMAGE_PATH; ?>favicon/apple-touch-icon-152x152.png">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="<?php echo WWW_IMAGE_PATH; ?>favicon/mstile-144x144.png">
  <!-- For Windows Phone -->


  <!-- CORE CSS-->
  
  <link href="<?php echo WWW_CSS_PATH; ?>materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo WWW_CSS_PATH; ?>style.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->    
    <link href="<?php echo WWW_CSS_PATH; ?>custom/custom.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo WWW_CSS_PATH; ?>layouts/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">

  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="<?php echo WWW_JS_PATH; ?>plugins/prism/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo WWW_JS_PATH; ?>plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  <style type="text/css">
  .input-field div.error{
    position: relative;
    top: -1rem;
    left: 0rem;
    font-size: 0.8rem;
    color:#FF4081;
    -webkit-transform: translateY(0%);
    -ms-transform: translateY(0%);
    -o-transform: translateY(0%);
    transform: translateY(0%);
  }
  </style>
</head>
<body class="cyan">
<form class="formValidate" id="formValidate" method="post" action="">
  <div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
      <form class="login-form">
        <div class="row">
          <div class="input-field col s12 center">
            <p class="center login-form-text">User Registration</p>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="name" name="name" value="<?php echo $name; ?>" type="text" data-error=".errorTxt1">
			 <div class="errorTxt1"></div>
            <label for="name" class="center-align">Name</label>
          </div>
        </div>
		<div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="uname" name="uname" value="<?php echo $uname; ?>" type="text" data-error=".errorTxt2">
			 <div class="errorTxt2"></div>
            <label for="uname" class="center-align">Username</label>
          </div>
        </div>
		<div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="email" name="email" value="<?php echo $email; ?>" type="text" data-error=".errorTxt3">
			 <div class="errorTxt3"></div>
            <label for="email" class="center-align">Email</label>
          </div>
        </div>
		<div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="password" name="password" type="password" data-error=".errorTxt4">
			 <div class="errorTxt4"></div>
            <label for="password" class="center-align">Password</label>
          </div>
        </div>
		<div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="con_pass" name="con_pass"  type="password" data-error=".errorTxt5">
			 <div class="errorTxt5"></div>
            <label for="con_pass" class="center-align">Confirm Password</label>
          </div>
        </div>
		<div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="ph" name="ph" type="text" value="<?php echo $ph; ?>" data-error=".errorTxt6">
			 <div class="errorTxt6"></div>
            <label for="ph" class="center-align">Phone Nmaber</label>
          </div>
        </div>
		<div class="row">
          <div class="input-field col s12">			  
			  <button class="btn waves-effect waves-light col s12" type="submit" name="action" value="login">Submit
 			 </button>
          </div>
        </div>
		<div class="row">
          <div class="input-field col s12">
			If you are already registered? <a href="login.php">Click here</a>
		  </div>
		</div>
	</form>
	</div>
  </div>
</form>
<!-- ================================================
    Scripts
    ================================================ -->
	<!-- jQuery Library -->
    <script type="text/javascript" src="<?php echo WWW_JS_PATH; ?>plugins/jquery-1.11.2.min.js"></script>    
    <!--angularjs-->
    <script type="text/javascript" src="<?php echo WWW_JS_PATH; ?>plugins/angular.min.js"></script>
    <!--materialize js-->
    <script type="text/javascript" src="<?php echo WWW_JS_PATH; ?>materialize.js"></script>
    <!--prism -->
    <script type="text/javascript" src="<?php echo WWW_JS_PATH; ?>plugins/prism/prism.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="<?php echo WWW_JS_PATH; ?>plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <!-- chartist -->
    <script type="text/javascript" src="<?php echo WWW_JS_PATH; ?>plugins/chartist-js/chartist.min.js"></script>
    
    <!-- chartist -->
    <script type="text/javascript" src="<?php echo WWW_JS_PATH; ?>plugins/jquery-validation/jquery.validate.min.js"></script>
    <script type="text/javascript" src="<?php echo WWW_JS_PATH; ?>plugins/jquery-validation/additional-methods.min.js"></script>
    
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="<?php echo WWW_JS_PATH; ?>plugins.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="<?php echo WWW_JS_PATH; ?>custom-script.js"></script>
	<script type="text/javascript">
    $("#formValidate").validate({
        rules: {
			name: {
                required: true
            },
            uname: {
                required: true
            },
			email: {
                required: true
            },
            password: {
				required: true
			},
			con_pass: {
				required: true
			},
			ph: {
				if(ph.value.length!=10){
					{
						required: true
					}
			},
        },
        //For custom messages
        messages: {
			name:{
                required: "Name required"
            },
			uname:{
                required: "Username required"
            },
			email: {
                required: "Email required"
            },
			password:{
                required: "Password required"
            },
			con_pass:{
                required: "Confirm Password required"
            },
			ph:{
                required: "Phone Number required"
            },
			ph:{
				required: "Phone Number Must be 10 Digit"
			}
        },
        errorElement : 'div',
        errorPlacement: function(error, element) {
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error)
          } else {
            error.insertAfter(element);
          }
        }
     });
    </script>    
    <div id="alerts-container">
        <?php 
            echo(Utlityi::getMessage()); 
            if(isset($_SESSION['message'])){
                unset($_SESSION['message']);
            }
        ?>
    </div>
</body>
</html>
