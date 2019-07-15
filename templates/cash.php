<style>
 .back_btn{ color:#fff; background:#f9f9f9; padding:10px 15px; border-radius:25px; align-items:center; width:60px; float:right; margin-bottom:20px !important; margin-top:-20px; border:1px solid #000; }
  .back_btn a{ color:#000; text-align:center; font-weight:bold; text-decoration:none; }

</style>
<div class="container" style="border:3px solid #d9d9d9 !important; margin:auto; height:auto;  padding:0px !important; ">
	<div class="crumbs" style="width:100%;"> 
            <!--<ul id="breadcrumbs" class="breadcrumb"> 
            	<li class="li_set"> <a href="index.php" style="font-size:24px;"><i class="icon-chevron-left"></i></a> </li>
            </ul> -->
            <h2 style="text-align:center; margin-top:6px; padding-top:5px; font-weight:bolder;">CASH PAYMENT</h2>
             
    </div>
	<div class="row" > 
    
          	<div class="col-md-12 "> 
            	<div class="tabbable tabbable-custom tabbable-full-width"> 
               	<div class="tab-content row"> 
                 <div class="tab-pane active" id="tab_edit_account"> 
                 	<form class="form-horizontal" action="#" style="margin-left:30px;"> 
                      <div class="col-md-12"> <div class="widget">                     
                      <div class="widget-content"> 
                      	<div class="row"> 
						<p>Thank You for Purchasing Product</p>
						<p>Your Transaction id : <?php echo $trans; ?></p>
						<p>Your Total Price : <?php echo $price; ?></p>
						<p>Date : <span id="datetime"></span></p>
						</div>
					  </div>
					  </div>					
				 </div>
				 </form>
				</div>
				</div>
				</div>
			</div>
	</div>
     <div class="back_btn"><a href="index.php">Back</a></div>
    
    
    
</div>
<script>
setTimeout(function () {
   window.location.href= 'index.php'; // the redirect goes here

},5000);
</script>