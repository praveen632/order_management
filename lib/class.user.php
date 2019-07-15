<?php
	class User{
			//echo "hi";
			//$table = CMS_PRODUCT;
            public $db ;
                public  function __construct() {
                $this->db = new Mysql();
				$this->table = CMS_USERS;
				$this->table1 = CMS_PRODUCT;
				$this->table2 = CMS_HISTORY;				
            }        
            public function getClients($select = '*'){
                $results = $this->db->order_by('client_id', 'ASC')->get(CMS_CLIENTS, $select);
                if($results)
                    return $results;

                return false;
            }
			public function get_table_num($id)
			{
				$results = $this->db->get_row_num($id, CMS_HISTORY);
				return $results;
			}
			public function update_table($id, $data)
			{
				$result = $this->db->where(array('id'=>$id))->update(CMS_PRODUCT, $data);				
				//print_r($result);
				//$table1=$this->table1;
				//$tableUpdate= $this->db->update($table1, $data);
			}
			public function update_table_history($id, $data)
			{
			   $result = $this->db->where(array('id'=>$id))->update(CMS_HISTORY, $data);				
			}
			public function update_user_table($id, $data)
			{
				$result = $this->db->where(array('id'=>$id))->update(CMS_USERS, $data);			
			}
			public function update_user_rest_table($id, $data)
			{
				$result = $this->db->where(array('email'=>$id))->update(CMS_USERS, $data);
				return $result;
			}			
			public function getLastid()
			{
				$results=$this->db->get(CMS_USERS, '*');
				if($results)
				{
					return $results;
				}
				else{
					return false;
				}
			}
			public function getFilter($data)
			{
				  $results = $this->db->where($data)->get(CMS_USERS);
				  print_r($results);
				  return $results;
			}
            public function getClient($id){
                $results = $this->db->where(['role_id' => $id])->get(CMS_USERS);
                if($results)
                    return $results['0'];
                return false;
            }
			public function authorize($userName,$password) {
                //$this->db->where(array('user_name'=>$userName,'user_password'=>$password,'status'=>1));
				$this->db->where(array('username'=>$userName,'password'=>$password));
                $userData = $this->db->get(CMS_USERS);
				print_r($userData);
                if($userData) {
                    return $userData;
                } else {
                    return false;
                }
            }
			public function getProductdata($user_id)
			{
				$this->db->where(array('user_id'=>$user_id));
                $userData = $this->db->get(CMS_PRODUCT);
				return $userData;
			}
			public function getfilter_pro($id, $date)
			{
				$this->db->where(array('user_pro_id'=>$id));
                $userData = $this->db->get(CMS_HISTORY);
				return $userData;
			}
			public function getfilter_pro_type($id, $date)
			{
				$this->db->where(array('user_pro_id'=>$id, 'type'=>$date));
                $userData = $this->db->get(CMS_HISTORY);
				return $userData;
			}
			public function getfilter_pro_month_type($id, $type, $limit1, $limit2)
			{				
				$userData = $this->db->get_limit_type(CMS_HISTORY, $id, $type, $limit1, $limit2);
				return $userData;
			}
			public function getfilter_pro_month_combo($id, $type, $date, $limit1, $limit2)
			{				
				$userData = $this->db->combo_date_month_pro(CMS_HISTORY, $id, $type, $date, $limit1, $limit2);
				return $userData;
			}
			public function getfilter_pro_month_combo_between($id, $type, $date, $limit1, $limit2)
			{				
				$userData = $this->db->combo_date_month_pro_between(CMS_HISTORY, $id, $type, $date, $limit1, $limit2);
				return $userData;
			}
			public function getfilter_pro_month_combo_type($id, $date, $limit1, $limit2)
			{
				$userData = $this->db->between_combo_date_pro_type(CMS_HISTORY, $id, $date, $limit1, $limit2);
				return $userData;
			}
			
			//public function getfilter_pro_between_combo_date(
			public function getfilter_pro_month($id, $date, $limit1, $limit2)
			{
				$userData = $this->db->like(CMS_HISTORY, $id, $date, $limit1, $limit2);
				return $userData;
			}
			public function getfilter_pro_between_combo($id, $type, $date)
			{
				$userData = $this->db->between_combo(CMS_HISTORY, $id, $type, $date);
				//return $userData;
			}
			public function getfilter_pro_between($id, $date)
			{
				$userData = $this->db->between(CMS_HISTORY, $id, $date);
				//return $userData;
			}
			public function getProductdata_report($user_id, $limit1, $limit2)
			{
				//echo $limit1;
				//echo $limit2;
				//$this->db->where(array('user_pro_id'=>$user_id));
				//echo "hi";
                $userData = $this->db->get_limit($user_id, CMS_HISTORY, $limit1, $limit2);
				return $userData;
			}
			public function login($pass, $username){
				$this->db->where(array('username'=>$username,'password'=>md5($pass)));
                $userData = $this->db->get(CMS_USERS);
            if ($userData)   
            {				  
                return $userData;  
            }  
            else  
            {  
                return FALSE;  
            }   
			} 
			public function cheakusername($username){
			$this->db->where(array('username'=>$username));
			$userData = $this->db->get(CMS_USERS);
            if ($userData)   
            {  
				return TRUE;
            }  
            else  
            {   
                return FALSE;  
            }   
			}	
			public function cheakemail($email){
			$this->db->where(array('email'=>$email));
			$userData = $this->db->get(CMS_USERS);
			//print_r($userData);
            if ($userData)   
            {  
				return TRUE;
            }  
            else  
            {   
                return FALSE;  
            }   
			}
			public function cheakemail_profile($id, $email){
				$this->db->where(array('id'=>$id,'email'=>$email));
                $userData = $this->db->get(CMS_USERS);
            if ($userData)   
            {  
				return TRUE;
            }  
            else  
            {   
                return FALSE;  
            }   
			}			
			public function email($email){
				$this->db->where(array('email'=>$email));
				$userData = $this->db->get(CMS_USERS);
            if ($userData)   
            {  
				return $userData[0]['name'];
            }  
            else  
            {  
               return FALSE;
            }   
			}
			public function insert_pro_his($table3, $data)
			{
				 return $this->db->insert($table3, $data);
			}
			public function sendmail($email, $name){
			$ut = new Utlityi();
			$email1=$ut->secureEncode($email);			
			//echo $email;
			//exit;
			include('mail/class.phpmailer.php');
			$mail = new PHPMailer(true);            
			$mail->IsSMTP();   
			try {
			$mail->SMTPAuth   = true;
			$mail->SMTPSecure  = 'ssl';
			$link = "Dear ".$name." <a href='http://localhost/order_management/resetpassword.php?key=".$email1."'>click here</a> reset password"; 
			$mail->Host       = "smtp.gmail.com";           
			$mail->Port       = "465";   
			$mail->SMTPDebug = 1;                
			$mail->Username   = "unnatitechsolution@gmail.com";  
			$mail->Password   = "unnatitech@322411!2";
			$mail->SetFrom("unnatitechsolution@gmail.com", "Reset Password");
			$mail->AddAddress($email, "dshahi");
			$mail->Subject = "Reset Password" ;
			$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; 
			$mail->MsgHTML($link);
			$mail->Send();
			return true;
			} catch (phpmailerException $e) {
			//echo $e->errorMessage();
			return false;
			} catch (Exception $e) {
			return false;        
			}        
			}	
	}