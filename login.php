<?php
include('include/includes.php');
	if (!empty($_POST['username']) && !empty($_POST['password'])) {
		$user = new User();
        $username = $_POST['username'];
        $pass = $_POST['password'];
	    $login = $user->login($pass,$username);
		if($login) 
		{
		    $_SESSION['user_data']=$login[0];
			header('Location: index.php');
		}
	    else 
		{
			$type = 'login';
            $message =  "Username Or Password Not Match";
		}
		
	}
	else
	{
		$type="";
		 $message = "";
	}
	if(isset($_POST['sign_up']))
	{
		if($_POST['password1']!=$_POST['password_confirm'])
		{
			$message = "Password and Confirm password shuld be same type";
		}
		else
		{
			$sq= new Mysql();
			$ch= new User();
			$table=CMS_USERS;
			$table1=CMS_PRODUCT;
			$email=$_POST['email'];
			$username=$_POST['username'];
			$data['name']=$_POST['name'];
			$data['username']=$username;
			$data['email']=$email;
			$data['password']=md5($_POST['password1']);
			$data['phone']=$_POST['ph'];
			$user_conf=$ch->cheakusername($username);
			//print_r($user_conf);
			if(!$user_conf==TRUE)
			{
				$email_conf=$ch->cheakemail($email);
				if(!$email_conf==TRUE)
				{
					$sq->insert($table, $data);
					$re = $ch->getLastid();
					$length=count($re);
					$id = $re[$length-1]['id'];
						for($i=0;$i<15;$i++)
						{
							$name=$i+1;
							$data['id']="";
							$data1['name']= ''."Pizza".$name.'';
							$data1['price']=5;
							$data1['user_id']=$id;
							$sq->insert($table1, $data1);
							$username = $username;
							$pass = $_POST['password1'];
							$login = $ch->login($pass,$username);
							//print_r($login);
							if($login) 
							{
								$_SESSION['user_data']=$login[0];
								header('Location: index.php');
							}
						}
					//$message = ""
					//header('Location:login.php');
					//exit;
				}
				else{
					$type = 'sign_up';
					$message = "Email Already Exist";
				}
			}
			else{
				$type = 'sign_up';
				$message = "Please choose Another Username";
			}
		}
	}
	if(isset($_POST['reset']))
	{
		$user = new User();
		$email=$_POST['email'];
		$email_conf=$user->cheakemail($email);
		//print_r($email_conf);
		if($email_conf==TRUE)
		{
			  $result = $user->email($email);			  
			  $sendmail = $user->sendmail($email, $result);
				if (!$sendmail=="true") {
					$type='reset';
					$message = "Your email ID is not Valid";				  
			  } else {
					$message = "Please Check your mail to reset password";			  
			  }
		}
		else
		{
			$type='reset';
			$message = "this is not Valid ID";
		}
		
	}
	if(isset($_GET['msg']))
	{
		//$type='reset';
		$message = $_GET['msg'];
	}
include(DIR_TEMPLATE_PATH.'login.php');
?>