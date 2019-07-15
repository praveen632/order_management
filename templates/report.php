<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
function ajaxFunc()
{
		$('#mytable1 tbody').remove();
		$('#mytable2 tbody').remove();
		$(document).ajaxStart(function(){
			$("#loader").css("display", "block");
		});
		$(document).ajaxComplete(function(){
			$("#loader").css("display", "none");
		});
		$.ajax({
				type: 'POST',
				url: 'report_div.php',
				data: $('#form1').serializeArray(),
				dataType:'json',
				async: false,
				success: function (data) {
					var name = data;
					console.log(name);	
					var half = name.length/2;
					 for(var i=0;i<name.length;i++)
						{
							var index = i+1;
							var tr="<tbody><tr>";
							var td1="<td>"+name[i]["id"]+"</td>";
							var td2="<td>"+name[i]["date"]+"</td>";
							var td3="<td>"+name[i]["price"]+"</td>";
							var td4="<td>"+name[i]["type"]+"</td></tr></tbody>";							
							if(i<half)
							{																
								$("#mytable1").append(tr+td1+td2+td3+td4); 
							}
							else
							{
								$("#mytable2").append(tr+td1+td2+td3+td4); 
							}
						}						
				}				
			});
}	
function change()
{
	document.getElementById('li2').value=document.getElementById('page').value;
	var length = parseInt(document.getElementById('data_length').value);
	var data_length = parseInt(document.getElementById('page').value);
	if(length <= data_length)
	{
		document.getElementById('pageNavPosition').innerHTML="<span onclick=pageignation(document.getElementById(\'li1\').value,document.getElementById(\'page\').value,1)>1</span>";
		ajaxFunc();		
	}
	else
	{	
		var len = Math.ceil(length / data_length);
		var spam1 = "<span  id='first'>  Prev </span>";
		//var spam2= "";
		var spam2 = "";
		for(var i=1; i<=len; i++)
		{
			var a = "<span onclick=pageignation(document.getElementById(\'li1\').value,document.getElementById(\'page\').value,"+i+")>"+i+"</span>";
			spam2 = spam2 + a;	
		}
		var spam3="<span id=\'last\' onclick=pageignation(document.getElementById(\'li1\').value,document.getElementById(\'page\').value,"+i+")>last</span>";
		document.getElementById('pageNavPosition').innerHTML=spam1+spam2+spam3;
		ajaxFunc();	
	}
}
function pageignation(limit1, limit2, pageno)
{		console.log(limit1);console.log(limit2);
		if(pageno==1)
		{		
		document.getElementById('li1').value = 0 ;
		document.getElementById('li2').value = limit2;
		}
		else
		{
			var $a = parseInt(limit1);
			var $b = parseInt(limit2);
			limit1 = $a + $b;
			limit1 = document.getElementById('li1').value = $b ;
			limit2 = document.getElementById('li2').value = limit2 * pageno
		}
		ajaxFunc();
}
function report()
{
	if(document.getElementById('type1').checked)
	{
		//console.log('cash');
		document.getElementById('type4').value='cash';
	}
	if(document.getElementById('type2').checked)
	{
		document.getElementById('type4').value='card';
	}
	if(document.getElementById('type3').checked)
	{
		document.getElementById('type4').value='all';
	}
	document.getElementById('li1').value=0;
	document.getElementById('li2').value='';
	if(document.getElementById('date4').checked)
	{
		var input1 = document.getElementById('inputField1').value;
		var input2 = document.getElementById('inputField2').value;
		if(input1==""||input2==""){
			$("#error").load("templates/error.php?name=10");
			document.getElementById('error').innerHTML = "<div align='center' style='color:#000;  font-weight:300; margin-bottom:2px;'>Please Fill Start Date and End Date</div>";
		}
		if(input1!=""&&input2!=""){
			document.getElementById('error').innerHTML = "";
		}
	}	
	else
	{
		document.getElementById('error').innerHTML = "";
	}
	if((document.getElementById('type1').checked) && (document.getElementById('date1').checked))
	{		
		ajaxFunc();					
	}
	if((document.getElementById('type1').checked) && (document.getElementById('date2').checked))
	{
		ajaxFunc();
	}
	if((document.getElementById('type1').checked) && (document.getElementById('date3').checked))
	{
		ajaxFunc();
	}
	if((document.getElementById('type1').checked) && (document.getElementById('date4').checked))
	{
		ajaxFunc();
	}
	if((document.getElementById('type2').checked) && (document.getElementById('date1').checked))
	{
		ajaxFunc();
	}
	if((document.getElementById('type2').checked) && (document.getElementById('date2').checked))
	{
		ajaxFunc();
	}
	if((document.getElementById('type2').checked) && (document.getElementById('date3').checked))
	{
		ajaxFunc();
	}
	if((document.getElementById('type2').checked) && (document.getElementById('date4').checked))
	{
		ajaxFunc();
	}
	if((document.getElementById('type3').checked) && (document.getElementById('date1').checked))
	{
		ajaxFunc();
	}
	if((document.getElementById('type3').checked) && (document.getElementById('date2').checked))
	{
		ajaxFunc();
	}
	if((document.getElementById('type3').checked) && (document.getElementById('date3').checked))
	{
		ajaxFunc();
	}
	if((document.getElementById('type3').checked) && (document.getElementById('date4').checked))
	{
		ajaxFunc();
	}
}
$(document).ready(function(){
      var n = $("#pageNavPosition > span").size();
    $("#pageNavPosition > span").on("click", function(){
       var thisBtn = $(this);
        $("#pageNavPosition > span").removeClass('active');
        thisBtn.addClass('active');
        if(thisBtn.index() == (n-2))
        {
            $("#last").hide();
            $("#first").show();
        }
        else if(thisBtn.index() == 1)
        {
            $("#first").hide();
            $("#last").show();
        }
        else
        {
             $("#first").show();
             $("#last").show();
        }
        
    });
    
});
</script>
<style>
.other_set{ margin-left:-14px;}
.loader {
    border: 16px solid #f3f3f3; /* Light grey */
    border-top: 16px solid #3498db; /* Blue */
    border-radius: 50%;
    width: 120px;
    height: 120px;
    animation: spin 2s linear infinite;
}
@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
#pageNavPosition >span{
    
    border:solid 1px red;
    padding:3px 5px;
    float:center;
    margin:2px;
    cursor:pointer;
}
.active{
    
    background:#ccc;
}
</style>
<div class="container">
 <div class="col-md-9 col-xs-3">
			
			</div>
			<div class="col-md-2 col-xs-6">
            <div style="float:right; margin-right:-10px;">Welcome <?php echo $_SESSION['user_data']['name']; ?></div>
			
			</div>
            <div class="col-md-1 col-xs-3">
            <div align="right" class="but_logout" style="float:left; margin-left:-10px;"><a href="logout.php">Logout</a></div>
            </div>
</div>
<div id="container"> 
          <div class="container" style="border:3px solid #d9d9d9 !important;">
			
          	<div class="crumbs"> 
            <ul id="breadcrumbs" class="breadcrumb"> 
            	<li> <a href="index.php" ><i class="icon-chevron-left"></i></a> </li>
            </ul> 
            <h2 style="text-align:center; margin-top:6px; padding-top:5px; font-weight:bolder;" class="sales_set" >SALES REPORT</h2>
           
          </div>
          <div class="row"> 
          	<div class="col-md-12"> 
            	<div class="tabbable tabbable-custom tabbable-full-width"> 
               	<div class="tab-content row"> 
                 <div class="tab-pane active" id="tab_edit_account"> 
				 <div class="form-horizontal" style="background:#fff;" >
                 	<form class="form-horizontal" id="form1">
                      <div class="col-md-12"> <div class="widget">                     
                      <div class="widget-content"> 
                      	<div class="row"> 
                        	<div class="col-md-6 col-sm-6">
                             <div class="widget box">  
                             
                            <div class="widget-header" style="background:#1eaa91; width:50%; border: 1px solid #fff !important;
"> <h4 style=" color:#fff;">Payment Period:</h4> </div>
                            <div class=""> 
                            <div id="day">
									<div class="col-md-6"> 	
									<input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['user_data']['id']; ?>">
									<input type="hidden" name="date_input" value="<?php echo date("Y m d"); ?>">
									<input type="hidden" name="limit1" id="li1" value='<?php echo $limit1;?>'>
									<input type="hidden" name="limit2" id="li2" value='<?php echo $limit2;?>'>
									 <label class="checkbox other_set"><input type="radio" name="date" id="date1" value="<?php echo 'cur'; ?>"  <?php if($date=='cur'){ echo "checked";} ?> >Current Day</label>
									 <label class="checkbox other_set"><input type="radio" name="date" id="date2" value="<?php echo 'cur_month'; ?>"  checked >Current Months</label>
									 <label class="checkbox other_set"><input type="radio" name="date" id="date3" value="<?php echo 'prv'; ?>"  <?php if($date=='prv'){ echo "checked";} ?> >last Months</label> 									
									 </div>
									 <div class="col-md-6 col-sm-6"> 
									 <label class="checkbox other_set" ><input type="radio" name="date" id="date4" value="<?php echo 'date_from'; ?>"  <?php if($date=='date_from'){ echo "checked";} ?>>Other</label>
									 <div class="form-group" style="margin-left:3px;"> <label class="col-md-2 col-sm-3  control-label" >Start: </label>                              
									 <div class="col-md-10 col-sm-9" ><input type="text" class="start_setx" name="start" id="inputField1" autocomplete="off" readonly   onclick="date_validate()" value="<?php //echo $start; ?>"/></div>  
									  </div>
									  <div class="form-group" style="margin-left:3px;"> <label class="col-md-2 col-sm-3 control-label">End: </label> 
									 
									 <div class="col-md-10 col-sm-9"><input type="text" class="start_setx" name="End"id="inputField2" autocomplete="off" readonly   onclick="date_validate()" value="<?php //echo $end; ?>" /></div>  
									  </div>
									   </div>
							 </div>
                             </div>
                             </div> </div>                             
                             <div class="col-md-6 col-sm-6"> <div class="widget box">  
                            <div class="widget-header" style="background:#1eaa91; width:50%;"> <h4 style="color:#fff;">Payment Method:</h4> </div>
                            <div class="form-group">
								<div class="col-md-12" id="type"> 
									<label class="col-md-4 inline"><input type="radio" class="uniform" id="type1" name="type" value="<?php echo "cash"; ?>" <?php if($type=='cash'){ echo "checked";} ?>> Cash </label>
									<label class="col-md-4 inline"><input type="radio" class="uniform" id="type2" name="type" value="<?php echo "card"; ?>"  <?php if($type=='card'){ echo "checked";} ?>> Card</label>
									<label class="col-md-4 inline"><input type="radio" class="uniform" id="type3" name="type" value="<?php echo "all"; ?>"  <?php if($type=='all'){ echo "checked";} ?>> All</label>									
								</div>
							</div>                           
                             </div> 
								<p > <input style="margin-top:20px;" type="button" onclick="report()" class="btn btn-info btn-block" value="GENERATE">  </p> 
								<p >
								<div class="col-md-6 col-sm-6">
									<select name="type4" id="type4" style="width:100%" readonly>
										<option value="payment">Payment Type</option>
										<option value="cash" <?php if($type=='cash'){ echo 'selected';} ?>>Cash</option>
										<option value="card"<?php if($type=='card'){ echo 'selected';} ?> >Card</option>
										<option value="all"<?php if($type=='all'){ echo 'selected';} ?> >All</option>
									</select>
									</div>
									<div class="col-md-6 col-sm-6">
									<select name="page" id='page' onchange="change()" style="width:100%">
									<?php for($i=1;$i<=5;$i++){ ?>
										<option value="<?php echo $i*20; ?>" <?php if($page_row==$i*20){ echo 'selected';} ?> >Show <?php echo $i*20; ?> Per Page</option>
									<?php } ?>
									</select>
									</div>
								</p>
							 </div>
                        </div>  
					<div id="error">

					</div>
					<div id="loader" class="loader" align="center" style="display: none">
						
					</div>					
					<div>
                  
                      	<div class="row"> 
                        	<div class="col-md-6 col-sm-6"> 
                            	<div class="widget-content"> 								
                                	<table class="table table-bordered table-striped" id="mytable1">
									<thead> 
                                        <tr id="tr11"> 
                                        	<th style=" margin:0px; padding;0px;">S.No</th> 
                                            <th> Date</th>
                                             <th>Amount</th> 
                                            <th> Type </th> 
                                         </tr> 
                                     </thead>
									 <?php
										$data = explode(' ', date('Y m d'));
										$month=$data[1];
										$data[1]=$month;
										$data =$data[0]."-".$data[1];
										$id=$_SESSION['user_data']['id'];
										$product = $user->getfilter_pro_month($id, $data, $limit1, $limit2);
										$length = count($product);
										?>
										<input type="hidden" name="data_length" id="data_length" value="<?php echo $page_data; ?>">
										<?php 
										$half_lenght = round($length/2);
										for($i=$limit1;$i<$length;$i++)
										{											
											if($half_lenght==$i || $half_lenght==1)
												{
									?>										
									</table>
								</div>
							</div>
								<div class="col-md-6 col-sm-6"> 
									<div class="widget-content"> 
										<table class="table table-bordered table-striped" id="mytable2" > 
											<!--<thead> 
												<tr id="tr21"> 
													<th>S.No</th> 
													<th> Date</th>
													 <th>Amount</th> 
													<th> Type </th> 
												</tr> 	
											</thead>-->
											<?php
												}
											?>
											<tbody> 
                                         	<tr> 
                                            	<th><?php echo $i+1; ?></th> 
                                                <td><?php echo $product[$i]['date'];  ?></td> 
                                                <td><strong>$</strong><?php echo $product[$i]['price']; ?></td> 
                                                <td><?php echo $product[$i]['type']; ?></td> 
                                            </tr> 
											<?php
												}
											?>
											</tbody>
										</table>
									</div>
                            </div>
                          <div class="col-md-12"> 
                          	<div class="widget-content align-center"> 
                             <p class="btn-toolbar btn-toolbar-demo">
                             </p>   
                           </div> 
                         </div>
                        
						</div>
                         
                      </div> 
                   </div> 
                </div> 
                </div> 
				</form>
                </div> 
                </div> 
                 <div align="center" id="page_div">
						  <div id="pageNavPosition" style="display: block; margin-top:-15px;">
							 <span  id="first" >  Prev </span> 
							 <?php
								for($i=1;$i<=$num_page;$i++){
									?>
									
									<span onclick="pageignation(document.getElementById('li1').value, document.getElementById('page').value, <?php echo $i; ?>)"><?php echo $i; ?></span>
								<?php
								 
								}
								?>
								<span id="last" onclick="pageignation(document.getElementById('li1').value, document.getElementById('page').value, <?php echo $i; ?>)"> Next </span>
						  </div>
                          <br>
						<div class="widget-content align-center" >
            	<p style="font-size:16px;"> <i class="icon-calendar"></i> <span></span><b id="ti" style="font-family:arial !important;"></b>  <i class="icon-time"></i> <span></span><b id="ht"></b><strong><b id="mt"></b>hr</strong> </p>
                 </div>
                          </div> 
                </div>
                
             </div> 
                </div>
                </div>
                </div>
                </div>
				