<script>
			
</script>
<div id="container" > 
<style>
.input_set{ width:100%; border-radius:5px; height:40px;}
.input_set1{ margin-top:20px;}
</style>
          <div class="container" style="border:3px solid #d9d9d9 !important; "> 
          	<div class="crumbs"> 
            <ul id="breadcrumbs" class="breadcrumb"> 
            <li> <a href="index.php" style="font-size:24px;"><i class="icon-chevron-left"></i></a> </li>
            </ul> 
            <h2 style="text-align:center; margin-top:6px; padding-top:5px; font-weight:bolder;">Card Payment</h2>          
			</div> 
                      <div class="col-md-3"></div>
                      <div class="col-md-6 col-xs-6" style="margin-bottom:20px;">
                      <form method="post" action="card_done.php">
                            <p>Name(as it appears in your card)</p>
							<input type="hidden" name="user_input" id="user_input" value="<?php echo $_GET['userinput']; ?>">
                            <input type="text" name="name" id="name" class="input_set" placeholder="Name" required>
                            <p class="input_set1">Card Number(no dashes of spaces)</p>
                            <input type="text" name="card" id="card" title="card no." pattern="[0-9]{16}" class="input_set" placeholder="16-Digite Card Number" required >
                            <p class="input_set1" >Expiration Date</p>
							<select name="month" id="month">
								<option value="0">0</option>
							<?php for($i=0;$i<12;$i++){ ?>
								<option value="<?php echo $i+1; ?>"><?php echo $i+1; ?></option>
							<?php } ?>
							</select>
							<select name="year" id="year" >
								<option value="0">0</option>
							<?php $year = 1961; 
							for($i=1961;$i<2002;$i++){ 
								 ?>
								<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
							<?php } ?>
							</select>
							<p class="input_set1">Security Code(3 on back, Amax:4 on font)</p>
							<div class="col-md-2">
							<input type="text" name="cvv" id="cvv" pattern="[0-9]{3}" title="CVV No"  class="input_set"  placeholder="CVV." required style="margin-left:-15px;">
							</div>
							<div class="col-md-10"></div>
                            <div class="col-md-3" style="clear:both; float:center;"> <button class="btn btn-lg btn-primary" id="nating" onclick="show_submit()" style=" margin-top:10px; margin-left:-10px;">Submit</button></div>
                     <div class="col-md-9"></div>                           
                      </form>                       
                      </div>
                      <div class="col-md-3"></div>
                </div>
                
               </div>