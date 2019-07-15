<?php
header("Content-Type: text/html;charset=utf-8");
//print_r($_SESSION['user_data']);
/*if(!isset($_SESSION['user_data']) || $_SESSION['user_data']['user_id']<=0) {
  header('Location:login.php');  
}*/
if(!isset($_SESSION['user_data'])) {
  header('Location:login.php');  
}
?>
<!DOCTYPE html>
 <html lang="en"> 
<head> 
<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0"/> 
<title>Order Management</title> 
<link href="<?php echo PUBLIC_PATH; ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo PUBLIC_PATH; ?>assets/css/main.css" rel="stylesheet" type="text/css"/> 
<link href="<?php echo PUBLIC_PATH; ?>assets/css/plugins.css" rel="stylesheet" type="text/css"/> 
<link href="<?php echo PUBLIC_PATH; ?>assets/css/responsive.css" rel="stylesheet" type="text/css"/> 
<link href="<?php echo PUBLIC_PATH; ?>assets/css/icons.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" media="all" href="jsDatePick_ltr.min.css" />
<script type="text/javascript" src="jsDatePick.min.1.3.js"></script> 
<link rel="stylesheet" href="<?php echo PUBLIC_PATH; ?>assets/css/fontawesome/font-awesome.min.css"> 
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css"> 
<script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>assets/js/libs/jquery-1.10.2.min.js"></script> 
<script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script> 
<script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>bootstrap/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>assets/js/libs/lodash.compat.min.js"></script> 
<script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>plugins/touchpunch/jquery.ui.touch-punch.min.js"></script> 
<script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>plugins/event.swipe/jquery.event.move.js"></script> 
<script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>plugins/event.swipe/jquery.event.swipe.js"></script> 
<script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>assets/js/libs/breakpoints.js"></script> 
<script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>plugins/respond/respond.min.js"></script> 
<script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>plugins/cookie/jquery.cookie.min.js"></script> 
<script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>plugins/slimscroll/jquery.slimscroll.min.js"></script> 
<script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>plugins/slimscroll/jquery.slimscroll.horizontal.min.js"></script> 
<script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>plugins/sparkline/jquery.sparkline.min.js"></script> 
<script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>plugins/flot/jquery.flot.min.js"></script> 
<script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>plugins/flot/jquery.flot.tooltip.min.js"></script> 
<script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>plugins/flot/jquery.flot.resize.min.js"></script> 
<script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>plugins/flot/jquery.flot.time.min.js"></script> 
<script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>plugins/flot/jquery.flot.growraf.min.js"></script> 
<script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>plugins/daterangepicker/moment.min.js"></script> 
<script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>plugins/daterangepicker/daterangepicker.js"></script> 
<script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>plugins/blockui/jquery.blockUI.min.js"></script> 
<script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>assets/js/app.js"></script> 
<script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>assets/js/plugins.js"></script> 
<script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>assets/js/plugins.form-components.js"></script> 
<script>$(document).ready(function(){App.init();Plugins.init();FormComponents.init()});</script> 
<script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>assets/js/custom.js"></script> 
<script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>assets/js/demo/charts/chart_filled_blue.js"></script>
<script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>time_zone/jquery-1.9.0.min.js"></script>
 <script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>time_zone/jstz-1.0.4.min.js"></script>
 <script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>time_zone/moment.min.js"></script>
 <script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>time_zone/moment-timezone.js"></script>
 <script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>time_zone/moment-timezone-data.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
   @media only screen and (min-device-width : 320px) and (max-device-width : 568px) {
       .first-child{ margin-left:20px;!important;}
	}   
</style>
<script type="text/javascript">
      $(document).ready(function() {
        var tz = jstz.determine();
        var timezone = tz.name();
        //alert(timezone);
        //$("#tz").html(timezone);
        
        // display current time based on user location
        var current_date =  moment().tz(timezone).format('D MMMM YYYY');
		var current_time = moment().tz(timezone).format('H');
		var current_min = moment().tz(timezone).format('mm');
		var datetime = moment().tz(timezone).format('YYYYMMDD H:mm:ss');
        $("#ti").html(current_date);
        $("#ht").html(current_time);
		$("#mt").html(current_min);
		$("#datetime").html(datetime);
      });
 </script>
<script type="text/javascript">
	window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"inputField1",
			dateFormat:"%Y-%m-%d"			
		});
		new JsDatePick({
			useMode:2,
			target:"inputField2",
			dateFormat:"%Y-%m-%d"			
		});
	};
</script> 
</head> 
<body> 