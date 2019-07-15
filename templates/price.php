<style>
.d_set{ margin-top:5px;}

</style>



<!--<div class="container">
	<div class="col-md-12 col-xs-12">
  <div class="col-md-9 col-xs-5">
			
			</div>
			<div class="col-md-2 col-xs-4">
              <div style="float:right; margin-right:-10px;">Welcome <?php echo $_SESSION['user_data']['name']; ?></div>
              </div>
              
              <div class="col-md-1 col-xs-3">
			<div style="float:left; margin-left:-10px;"><a href="logout.php"> Logout</a></div>
          SSSSSS
			</div>
 
 </div>
</div>-->
<div id="container"> 
          <div class="container" style="border:3px solid #d9d9d9 !important;"> 
		  <div class="col-md-9 col-xs-3" style="margin-top:5px;">
			
			</div>
			<div class="col-md-2 col-xs-6"  style="margin-top:5px;">
            <div style="float:right; margin-right:-10px;">Welcome <?php echo $_SESSION['user_data']['name']; ?></div>
			
			</div>
            <div class="col-md-1 col-xs-3"  style="margin-top:5px;">
            <div align="right" class="but_logout" style="float:left; margin-left:-10px;"><a href="logout.php">Logout</a></div>
            </div>
          	<div class="crumbs"> 
            <ul id="breadcrumbs" class="breadcrumb"> 
            	<li> <a href="index.php" ><i class="icon-chevron-left"></i></a> </li>
            </ul> 
            <h2 style="text-align:center; margin-top:6px; padding-top:5px; font-weight:bolder; " class="sales_set" ><span style="margin-top:5px;">Price & description Setting</span></h2>
           
          </div>
          <div class="row"> 
          	<div class="col-md-12 col-xs-12"> 
			
            	<div class="tabbable tabbable-custom tabbable-full-width"> 
				
               	<div > <!--class="tab-content row"-->
				<?php if(!$message==0){ ?>
                <div class="container" style="background:#DEEC90; border:1px solid #ccc; width:295px; border-radius:25px;">
				<div align="center" style="color:#000;  font-weight:300; margin-bottom:2px;"><?php echo $message;  ?></div>
                </div>
				<?php } ?>
                 <div class="tab-pane active" id="tab_edit_account"> 
					
                 	<form class="form-horizontal" method="post" action=""> 
                      <div class="col-md-12 col-xs-12 col-sm-12"> 
					  <div class="widget">                     
                      <div class="widget-content"> 
                      	<div class="row"> 						
                        	<div class="col-md-6 col-xs-12 col-sm-6" > 
                            	<div class="widget-content"> 
                                	<table class="table table-bordered table-striped"> 
                                    	<!--<thead> 
                                        <tr> 
                                        	<th style="margin:0px; padding:0px; margin-top:-15px;">S.No</th> 
                                            <th> Price</th> 
                                            <th> Items </th> 
                                         </tr>
                                         </thead>-->
										 <tbody>
									<?php
									$product = $user->getProductdata($_SESSION['user_data']['id']);									
									$length = count($product);
									$half_lenght = round($length/2);
									for($i=0;$i<$length;$i++)
									{
										if($half_lenght==$i)
										{
											?>
											</tbody> 
											</table> 
											</div>
												</div>
												<div class="col-md-6 col-xs-12 col-sm-6" > 
													<div class="widget-content"> 
														<table class="table table-bordered table-striped"> 
															<!--<thead> 
															<tr> 
																<th>&nbsp;</th> 
																<th>&nbsp; </th> 
																<th>&nbsp;</th> 
															 </tr>
															 </thead> 	-->													 
															 <tbody> 
										<?php }
										?>											
											<tr> 
                                            	<th><?php echo $i+1; ?></th> 
                                                <td >
                                               <div><strong style=" font-size:20px;">$</strong><input  type="text" class="chines" style="background:#8EE4F5; color:#000; font-weight:bold; width:60px;" name="<?php echo 'price'.$i; ?>" value="<?php echo $product[$i]['price']; ?>" class="input_text1"> </div></td>
												<input type="hidden" class="one_set"  name="<?php echo 'id'.$i; ?>" value="<?php echo $product[$i]['id']; ?>">
												 
                                                <td><input type="text" style="background:#8EE4F5; color:#000; font-weight:bold;" name="<?php echo 'name'.$i; ?>" value="<?php echo $product[$i]['name']; ?>" class="input_text"></td> 
                                            </tr> 
									<?php 
									} 
									?>
                                     </tbody> 
                                   </table> </div>
                            </div>
                          </div> 
                          <div class="col-md-12" style="margin-top:-20px;"> 
                          	<div class="widget-content align-center" style="margin-top:15px;" > 
                             <p class="btn-toolbar btn-toolbar-demo">
                             <button type="submit" class="btn btn-success" name="submit" style="margin:5px; padding:5px 8px;">Save</button> 
                             <button class="btn btn-warning" name="cancel" style="margin:0px; padding:5px 8px;">Cancel</button> 
                             </p>   
                           </div> 
                         </div>                    
                          <div class="widget-content align-center" >
            	<p style="font-size:14px; margin:0px; padding:0px; "> <i class="icon-calendar"></i> <span></span><b id="ti" style="font-family:arial !important;"></b>  <i class="icon-time"></i> <span></span><b id="ht"></b><strong><b id="mt"></b>hr</strong> </p>
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
                
               
                
               <!-- <div class="widget-content align-center">
            	<p><a href="#"> <i class="icon-calendar"></i> <span></span> May 15  2017 </a> <a href="#"> <a href="#"> <i class="icon-time"></i> <span></span> 1330hr</a> </p>
                 </div>-->
                </div>               
                </div>
                </html>
				<script type="text/javascript">
				    $('input[type=text]').on('keypress', function(e) {
						if (e.which == 32)
							return false;
					});
				</script>