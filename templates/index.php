<style>
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
  display:none;
  position:fixed;
  text-align:center;
  top:190px;
  margin-left:20px;
  z-index:9999;
  
}

}
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
<script type="text/javascript">
function c(val)
{
	document.getElementById("d").value=val;
}

function v(val, opr)
{	
    var arr = ['0','1','2','3','4','5','6','7','8','9'];
    var el = document.getElementById("d");
    var cur_pos = el.value.slice(0, el.selectionStart).length;
	var str1 = el.value.substring(0,cur_pos);
	var str2 = el.value.substring(cur_pos);
	document.getElementById("d").value = str1;
	if(opr=="cal" || opr=="aurth")
	{
	    if($('#state').val() == "pr" && $.inArray(val,arr)>-1 && $('#d').val().charAt($('#d').val().length-1) != '*')
		    document.getElementById("d").value+= "*"+val;
		else
		    document.getElementById("d").value+=val;
	}
	
	if(opr=="pr")
	{
		if($('#state').val() != "pr"){
		   if(document.getElementById("d").value == ''){
		      document.getElementById("d").value+=val;
		   }
		   else
		   {
		      var val1=document.getElementById("d").value;
			  var lastchar = val1.charAt(val1.length-1);
			  if(!$.isNumeric(lastchar)){
				 document.getElementById("d").value+=val;
			  }
			  else
			  {
		        document.getElementById("d").value+= "*"+val;
			  }
		   }
		 }
		 else
		 {
		    document.getElementById("d").value+= "+"+val;
		 }
	}
	
	document.getElementById("d").value += str2;  
	document.getElementById("d").focus();
	$('#state').val(opr);
}

function reset()
{
    $('#state').val('re');
    $("#d").val('');
    $("#userinput").val('');
}
function back() {
    $('#state').val('back');
    var value = document.getElementById("d").value;
    document.getElementById("d").value = value.substr(0, value.length - 1);
	if($("#d").val() == ''){
	   $("#userinput").val('');
	}
}
function e() 
{ 
	try 
	{ 
		var val = document.getElementById("d").value;
		val = val.replace(/\$/gi, "");
		var firstchar = val.substring(0,1);
		var lastchar = val.charAt(val.length-1);
		if(!$.isNumeric(lastchar)){
		    val = val.substring(0, val.length-1);
		}
	   var out = eval(val);
	   if(typeof out != 'undefined'){
          document.getElementById("userinput").value = '$'+out; 
	   }
	} 
	catch(e) 
	{
	  //c('Error') 
	} 
}
function cash()
{
	var inp=document.getElementById('userinput').value;
	var inp = inp.replace(/\$/gi, "");
	if(inp == '' || inp <=0){
		 alert("Amount should be more than $0 to proceed");
		 return false;
	}else{
	 var url = "cash.php?userinput=" + $("#userinput").val();
     window.location.href = url;
	}
}

function card()
{
	  var inp=document.getElementById('userinput').value;
	  var inp = inp.replace(/\$/gi, "");
	  if(inp == '' || inp<=0){
		 alert("Amount should be more than $0 to proceed");
		 return false;
	}else{
		  $('#loader').show();
		  $('body').css('background', 'lightgray');
		  setTimeout(function(){ 
			  window.location.href = "card_done.php?user_input="+$("#userinput").val();
		  }, 4000);
	  }
}
</script>
<style type="text/css">
.input1{ background:#333;}
@media only screen and (max-width: 736px) {
   .loader{
       	 
		   top:180px; 
		   margin-left:-87px !important;
   }
</style>
<div class="col-md-12 col-sm-12 col-xs-12  col-lg-12">
<div class="col-md-5 col-sm-5 col-xs-6  col-lg-5"></div>
<div class="col-md-2 col-sm-2 col-xs-2  col-lg-2" style="align:center;">  
<div class="loader loder_set" id="loader"></div>
</div>
<div class="col-md-5 col-sm-5 col-xs-4  col-lg-5"></div>
</div>
<div class="container" style="border:2px solid #ccc; padding:5px;">
	

 

          
          <div class="container" > 
         	<div class="col-md-12 col-xs-12 col-sm-12">
			<div class="col-md-8 col-xs-4 col-sm-8">
			 &nbsp;
			</div>
              
              <div class="col-md-4 col-xs-8 col-sm-4">  
			    <div style="float:right">Welcome <?php echo $_SESSION['user_data']['name']; ?>&nbsp;<a href="logout.php"> Logout</a></div>
          
			</div>
 
 </div>
 </div>
 
 <div class="container">
          <div class="row"> 
          	<div class="col-md-12"> 
            	<div class="tabbable tabbable-custom tabbable-full-width"> 
               	<div class="tab-content row"> 
                 <div class="tab-pane active" id="tab_edit_account"> 
                 	
                      <div class="col-md-12"> 
                      <div class="widget">
                      <div class="widget-content"> 
                      	<div class="row"> 
                        	<div class="col-md-6 col-lg-6 col-sm-6" style=" margin-top:15px;"> 
                            	 <div id="result" class=" cal_teb">
                                 <div class="col-md-11 col-sm-10 col-xs-10" >
								 <input type="text" id="d" class="form-control input-sm chat-input input1  cal_teb remove_border1" placeholder="" onkeyup="e();" size="25"/ style="background:#d2d2d2; height:62px; margin-top:-5px; padding-left:0px !important; border-style: none!important; width:105%; font-size:20px !important;"  autocomplete="off" readonly required >
								 </div>
								 </div>
								<!--<div style=" font-size:24px; margin-top:20px;">
								 <strong >$</strong>
								 </div>	-->
								 <div id="result" class="cal_teb">
                                 <div class="col-md-11 col-sm-10 col-xs-10">
                                 <input type="text" id="userinput" name="userinput" class="form-control  chat-input input1 remove_border1" placeholder="TOTAL" readonly size="25" style="background:#d2d2d2; height:62px; margin-top:-5px; padding-left:0px !important; font-size:20px !important;">
								 <input type="hidden" name="date" id="date" value="<?php echo date("dMy"); ?>">
								 <input type="hidden" name="time" id="time" value="<?php echo date("h:i:s"); ?>">
								 </div>
                                 </div>
								 
                                <div id="main">
             <div id="first-rows" >
              <button value="1" class="btn-style num-bg num first-child" onclick='v("1","cal");e()'><strong><span style="font-size:25px;">1</span></strong></button>
              <button value="2" class="btn-style num-bg num" onclick='v("2","cal");e()'><strong> <span style="font-size:25px;">2</span></strong></button>
              <button value="3" class="btn-style num-bg num" onclick='v("3","cal");e()'><strong><span style="font-size:25px;">3</span></strong></button>
              <button value="4" class="btn-style num-bg num" onclick='v("4","cal");e()'><strong><span style="font-size:25px;">4</span></strong></button>
              <button value="5" class="btn-style num-bg num" onclick='v("5","cal");e()'><strong><span style="font-size:25px;">5</span></strong></button>
            </div>
                 
               <div class="rows">
                   <button value="6" class="btn-style num-bg num first-child" onclick='v("6","cal");e()'><strong><span style="font-size:25px;">6</span></strong></button>
                   <button value="7" class="btn-style num-bg num " onclick='v("7","cal");e()'><strong><span style="font-size:25px;">7</span></strong></button>
                   <button value="8" class="btn-style num-bg num" onclick='v("8","cal");e()'><strong><span style="font-size:25px;">8</span></strong></button>
                   <button value="9" class="btn-style num-bg num" onclick='v("9","cal");e()'><strong><span style="font-size:25px;">9</span></strong></button>
                   <button value="0" class="btn-style num-bg num" onclick='v("0","cal");e()'><strong><span style="font-size:25px;">0</span></strong></button>
                   
                </div>
                 
                 <div class="rows" style="margin-top:5px;">
               		<button value="+" class="btn-style num-bg num first-child" onclick='v("+","aurth")'><strong><span style="font-size:25px;">+</span></strong></button>
                    <button value="-" class="btn-style num-bg num" onclick='v("-","aurth")'><strong><span style="font-size:25px;">-</span></strong></button>
                    <button value="*" class="btn-style num-bg num" onclick='v("*","aurth")'><strong><span style="font-size:25px;">x</span></strong></button>
                  <button value="c" class="btn-style num-bg num" onclick='reset();'><strong><span style="font-size:25px;">C</span></strong></button>
                  <button value="." class="btn-style num-bg num" onclick='back();e()'><span style="font-size:25px;"><img src="img/backspace.png" width="20" height="20"></span><!--<strong><img src="https://cdn.iconscout.com/public/images/icon/free/png-512/return-enter-key-keyboard-3f90ec6b7f7f4ac8-512x512.png" width="20"  ></strong>--></button>
                 
                 </div>
                
             </div>			
             			<div class="row">			
					   
					 <div class="col-md-6 col-sm-6">
						<button type="submit" style="background-color:#ed6223; height:65px; color:#fff; " name ="card" id="card" onclick="card()" class="btn btn-icon input-block-level">
						<!--<i class="icon-credit-card"></i>--><span>CARD PAYMENT</span>
						</button>
					 </div> 
					<div class="col-md-6 col-sm-6" > 
						<button type="submit" style="background-color:#00a8a7; height:65px; color:#fff; " onclick="cash()" name ="cash" id="c" class="btn btn-icon input-block-level ">
						<!--<i class="icon-money"></i>--><span>CASH PAYMENT </span>
						</button>
					 </div> 
					</div>
					
																			  
		   <div class=" row">
				<div class="col-md-4 col-xs-12 col-sm-4"> <a href="user_profile.php" class="btn btn-icon input-block-level"> <i class="fa fa-bars" aria-hidden="true" ></i><div class="ram_set" style="text-align:center !important;margin-left:1px;">USER SETTING</div> </a> </div>
				   <div class="col-md-4 col-xs-12 col-sm-4"> <a href="price.php" class="btn btn-icon input-block-level"> <i class="fa fa-handshake-o" aria-hidden="true"></i><div class="ram_set" style="text-align:center !important;margin-left:1px;">PRICE SETTING</div> </a> </div>
					  <div class="col-md-4 col-xs-12 col-sm-4"> <a href="report.php" class="btn btn-icon input-block-level"><i class="fa fa-signal" aria-hidden="true"></i><div class="ram_set" style="text-align:center !important;margin-left:1px;">SALES REPORT</div> </a> </div>
							</div>					   
							</div>                           	
	<div class="col-md-6 col-sm-6" style="margin-top:5px;">
						<?php
						$product = $user->getProductdata($_SESSION['user_data']['id']);									
						$length = count($product);
						for($i=0;$i<$length;$i++)
						{
							if($product[$i]['price']!="" && $product[$i]['price']!="0")
							{
							?>
						
							<div class="col-md-4 col-sm-4" style="padding:0px 10px !important;">
							<div style="background-color:#52c0aa !important; color:#fff; font-family:arial !important; font-size:15px !important; font-weight:normal !important;height:85px; width:100%;padding:7px 0px !important;text-align:center;" href="#" class="btn btn-icon input-block-level" onclick='v("$<?php echo $product[$i]['price']; ?>","pr");e()'>
								 <i class="icon"><?php echo "$".$product[$i]['price']; ?></i>
								  <p>
									 <?php
										$ar_str = mb_split ("#", $product[$i]['name']);
									 ?>
									 <?php echo trim($ar_str[0]).'<br />'.trim(isset($ar_str[1])?$ar_str[1]:'');?>
								</p>
							</div>
							</div>	 							
							<?php
							}
						}
						?>	                          											
				</div>
			  </div> 
			  </div> 
		  </div> 
	   </div> 
       <div class="widget-content align-center" style="margin-top:-30px;" >
	<p style="font-size:18px;"> <i class="icon-calendar"></i> <span></span><b id="ti" style="font-family:arial !important;"></b>  <i class="icon-time"></i> <span></span><b id="ht"></b><b id="mt"></b><strong>hr</strong ></p>
	 </div>
	</div> 
	</div> 
	</div> 
	</div> 
	</div> 
	
   
	</div> 
  </div>        
               
<?php  ?>
<input type="hidden" id="state" name="state">