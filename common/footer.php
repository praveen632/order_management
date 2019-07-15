          </body> 
</html>
<script>	
	function current($data, $type)
	{		
		var url = "report.php?date=" + $data + "&type=" + $type;
		window.location.href = url;
	}
	function cur_date($type)
	{		
		var date1 = document.getElementById("inputField1").value;
		var date2 = document.getElementById("inputField2").value;
		if(date1=='')
		{
			alert("Please Select The Date");
		}
		else if(date2=='')
		{
			alert("Please Select The Date");
		}
		else
		{
		var url = "report.php?date=" + date1 +'/'+ date2 + "&type=" + $type;
		//alert(url);
		window.location.href = url;
		}
	}	
</script>