<!DOCTYPE html>
<html lang="en"> 
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
 <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0"/> 
 <title>Order Management</title> 
 <link href="<?php echo PUBLIC_PATH; ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <link href="<?php echo PUBLIC_PATH; ?>assets/css/main.css" rel="stylesheet" type="text/css"/> 
  <link href="<?php echo PUBLIC_PATH; ?>assets/css/plugins.css" rel="stylesheet" type="text/css"/> 
  <link href="<?php echo PUBLIC_PATH; ?>assets/css/responsive.css" rel="stylesheet" type="text/css"/> 
  <link href="<?php echo PUBLIC_PATH; ?>assets/css/icons.css" rel="stylesheet" type="text/css"/> 
  <link href="<?php echo PUBLIC_PATH; ?>assets/css/login.css" rel="stylesheet" type="text/css"/>
   <link rel="stylesheet" href="<?php echo PUBLIC_PATH; ?>assets/css/fontawesome/font-awesome.min.css"> 
   <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'> 
   <script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>assets/js/libs/jquery-1.10.2.min.js"></script> 
   <script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>bootstrap/js/bootstrap.min.js"></script> 
   <script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>assets/js/libs/lodash.compat.min.js"></script> 
   <script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>plugins/uniform/jquery.uniform.min.js"></script> 
   <script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>plugins/validation/jquery.validate.min.js"></script> 
   <script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>plugins/nprogress/nprogress.js"></script> 
   <script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>assets/js/login.js"></script>
   <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
   <script>$(document).ready(function(){Login.init()});</script> 
   </head> 
   <body class="login"> 
   		<div class="logo"> <img src="<?php echo PUBLIC_PATH; ?>assets/img/logo.png" alt="logo"/> 
        <strong>E-</strong>POS </div> 
        <div class="box"> 
        	<div class="content"> 
            	<form class="form-vertical login-form" action="" method="post"> 
                	<h3 class="form-title">Sign In to your Account</h3> 
                    <div class="alert fade in alert-danger" style="display: none;">
                    	 <i class="icon-remove close" data-dismiss="alert"></i> Enter any username and password. 
                    </div> 
                    <div class="form-group"> 
                        <div class="input-icon"> <i class="icon-user"></i> 
                        <input type="text" name="username" id="uname" class="form-control" placeholder="Username" autofocus required /> 
                        </div> 
                    </div> 
                    <div class="form-group"> 
                    	<div class="input-icon"> <i class="icon-lock"></i> 
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required /> 
                        </div> 
                     </div> 
					 <?php
						if(!$message==0)
						{
					 ?>
					 <div class="container" style="background:#F44346; color:#fff; border-radius:25px; width:290px; margin-bottom:2px;">
					 <label class="checkbox pull-left">
						<?php echo $message ; ?>
					 </label>
					 </div>
						<?php } ?>						
                     <div class="form-actions"> <label class="checkbox pull-left">
                     <input type="checkbox" class="uniform" name="remember"> Remember me</label> 
                     <button type="submit" name="action" class="submit btn btn-primary pull-right"> Sign In <i class="icon-angle-right"></i> </button> 
                     </div> 
                </form>                      
                     <form class="form-vertical register-form" action="" method="post" style="display: none;"> 
                     <h3 class="form-title">Sign Up for Free</h3> 
						<div class="form-group"> <div class="input-icon"> <i class="icon-user"></i> 
                        	<input type="text" name="name" class="form-control" placeholder="Name" autofocus  required /> 
                            </div> 
                        </div> 
                     	<div class="form-group"> <div class="input-icon"> <i class="icon-user"></i> 
                        	<input type="text" name="username" class="form-control" placeholder="Username" autofocus  required /> 
                            </div> 
                        </div> 
                        <div class="form-group"> 
                        	<div class="input-icon"> <i class="icon-lock"></i> 
                            	<input type="password" name="password1" id="password1" class="form-control" placeholder="Password" id="register_password" required /> 
                            </div> 
                        </div> 
                        <div class="form-group"> 
                        	<div class="input-icon"> <i class="icon-ok"></i> 
                        		<input type="password" name="password_confirm" id="password_confirm" class="form-control" placeholder="Confirm Password"  required />
                        	</div> 
                        </div> 
                        <div class="form-group"> <div class="input-icon"> <i class="icon-envelope"></i> 
                        <input type="text" name="email" pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}" class="form-control" placeholder="Email address" onblur="checkEmailAvailability();"   required /> 
                        </div>
						</div>
						<div class="form-group"> <div class="input-icon"> <i class="icon-envelope"></i> 
                        <input type="text" name="ph" pattern="[0-9]{10}" class="form-control" placeholder="Phone Number" required /> 
                        </div>
                       </div> 
                         <div class="form-group spacing-top"> 
                         	<label class="checkbox"><input type="checkbox" class="uniform" name="remember" required > I agree to the <a href="javascript:void(0);">Terms of Service</a>
                            </label> 
                        	<label for="remember" class="has-error help-block" generated="true" style="display:none;"></label> 
                          </div> 
                          <div class="form-actions"> 
                          <button type="button" class="back btn btn-default pull-left"> <i class="icon-angle-left"></i> Back</i></button> 
                          <button type="submit" name="sign_up" class="submit btn btn-primary pull-right"> Sign Up <i class="icon-angle-right"></i> </button> 
                          </div> 
                          </form> 
                       </div> 
                       <div class="inner-box"> 
                       	<div class="content"> <i class="icon-remove close hide-default"></i> <a href="#" class="forgot-password-link">Forgot Password?</a> 
                        <form class="form-vertical forgot-password-form hide-default" action="" method="post"> 
                        <div class="form-group"> <div class="input-icon"> 
                        	<i class="icon-envelope"></i> 
                            	<input type="text" name="email" class="form-control" placeholder="Enter email address" required /> 
                         </div> 
                      </div> 
                      <button type="submit" name="reset" class="submit btn btn-default btn-block"> Reset your Password </button> 
                      </form> 
                      <div class="forgot-password-done hide-default"> 
                      <i class="icon-ok success-icon"></i> <span>Great. We have sent you an email.</span> </div> </div> </div> </div> 
                      <!--<div class="single-sign-on"> <span>or</span> 
                      <button class="btn btn-facebook btn-block"> <i class="icon-facebook"></i> Sign in with Facebook </button> 
                      <button class="btn btn-twitter btn-block"> <i class="icon-twitter"></i> Sign in with Twitter </button> 
                      <button class="btn btn-google-plus btn-block"> <i class="icon-google-plus"></i> Sign in with Google </button> 
                   </div>--> 
                   <div class="footer"> <a href="" class="sign-up">Don't have an account yet? <strong>Sign Up</strong></a> 
                   </div> 
				   <script type="text/javascript">
				   if(location.host=="envato.stammtec.de"||location.host=="themes.stammtec.de")
				   {
					   var _paq=_paq||[];
						_paq.push(["trackPageView"]);
						_paq.push(["enableLinkTracking"]);
						(function(){
							var a=(("https:"==document.location.protocol)?"https":"http")+"://analytics.stammtec.de/";
							_paq.push(["setTrackerUrl",a+"piwik.php"]);
							_paq.push(["setSiteId","17"]);
							var e=document,c=e.createElement("script"),b=e.getElementsByTagName("script")[0];
							c.type="text/javascript";
							c.defer=true;c.async=true;
							c.src=a+"piwik.js";
							b.parentNode.insertBefore(c,b)
							})
							()
					};
                   </script>
                   </body> 

				</html>