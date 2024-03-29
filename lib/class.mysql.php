<?php
	class Mysql{
		static private $link = null;
		static private $info = array(
			'last_query' => null,
			'num_rows' => null,
			'insert_id' => null
		);
		static private $connection_info = array();
		static private $where;
		static private $limit;
		static private $order;		
		function __construct(){
			self::$connection_info = array('host' => DB_HOST, 'user' => DB_USER, 'pass' => DB_PASS, 'db' => DB_NAME);
		}		
		function __destruct(){
			if(is_resource(self::$link)) _close(self::$link);
		}		
		/**
		 * Setter methodf
		 */		
		static private function set($field, $value){
			self::$info[$field] = $value;
		}		
		/**
		 * Getter methods
		 */		
		public function last_query(){
			return self::$info['last_query'];
		}		
		public function num_rows(){
			return self::$info['num_rows'];
		}		
		public function insert_id(){
			return self::$info['insert_id'];
		}		
		/**
		 * Create or return a connection to the MySQL server.
		 */		
		static private function connection(){
			if(!is_resource(self::$link) || empty(self::$link)){
				if(($link = mysqli_connect(self::$connection_info['host'], self::$connection_info['user'], self::$connection_info['pass'])) && mysqli_select_db($link,self::$connection_info['db'])){
					self::$link = $link;
					mysqli_set_charset($link,'utf8');
				}else{
					throw new Exception('Could not connect to MySQL database.');
				}
			}
			return self::$link;
		}		
		/**
		 * MySQL Where methods
		 */		
		static private function __where($info, $type = 'AND'){
			$link = self::connection();
			$where = self::$where;
			foreach($info as $row => $value){
				if(empty($where)){
					$where = sprintf("WHERE `%s`='%s'", $row, mysqli_real_escape_string(self::$link,$value));
				}else{
					$where .= sprintf(" %s `%s`='%s'", $type, $row, mysqli_real_escape_string(self::$link,$value));
				}
			}
			self::$where = $where;
		}		
		public function where($field, $equal = null){
			if(is_array($field)){
				self::__where($field, 'AND');
			}else{
				self::__where(array($field => $equal), 'AND');
			}
			return $this;
		}
				
		public function and_where($field, $equal = null){
			return $this->where($field, $equal);
		}		
		public function or_where($field, $equal = null){
			if(is_array($field)){
				self::__where($field, 'OR');
			}else{
				self::__where(array($field => $equal), 'or');
			}
			return $this;
		}
		/**
		 * MySQL limit method
		 */		
		public function limit($limit){
			self::$limit = 'LIMIT '.$limit;
			return $this;
		}		
		/**
		 * MySQL Order By method
		 */		
		public function order_by($by, $order_type = 'DESC'){
			$order = self::$order;
			if(is_array($by)){
				foreach($by as $field => $type){
					if(is_int($field) && !preg_match('/(DESC|desc|ASC|asc)/', $type)){
						$field = $type;
						$type = $order_type;
					}
					if(empty($order)){
						$order = sprintf("ORDER BY `%s` %s", $field, $type);
					}else{
						$order .= sprintf(", `%s` %s", $field, $type);
					}
				}
			}else{
				if(empty($order)){
					$order = sprintf("ORDER BY `%s` %s", $by, $order_type);
				}else{
					$order .= sprintf(", `%s` %s", $by, $order_type);
				}
			}
			self::$order = $order;
			return $this;
		}		
		/**
		 * MySQL query helper
		 */		
		static private function extra(){
			$extra = '';
			if(!empty(self::$where)) $extra .= ' '.self::$where;
			if(!empty(self::$order)) $extra .= ' '.self::$order;
			if(!empty(self::$limit)) $extra .= ' '.self::$limit;
			// cleanup
			self::$where = null;
			self::$order = null;
			self::$limit = null;
			return $extra;
		}		
		/**
		 * MySQL Query methods
		 */		
		public function query($qry, $return = false){
			$link = self::connection();
			self::set('last_query', $qry);
			$result = mysqli_query(self::$link,$qry);
			if(is_resource($result)){
				self::set('num_rows', mysqli_num_rows($result));
			}
			if($return){
				if(preg_match('/LIMIT 1/', $qry)){
					$data = mysqli_fetch_assoc($result);
					mysqli_free_result($result);
					return $data;
				}else{
					$data = array();
					while($row = mysqli_fetch_assoc($result)){
						$data[] = $row;
					}
					mysqli_free_result($result);
					return $data;
				}
			}
			return true;
		}
		public function combo_like($table, $id, $type, $data, $limit1, $limit2){
			$link = self::connection();				
			$sql="select * from ".$table." where user_pro_id='".$id."' and type='".$type."'  and date like '".$data."%' limit ".$limit1.", ".$limit2."";
			if(!($result = mysqli_query(self::$link,$sql))){ 
				throw new Exception('Error executing MySQL query: '.$sql.'. MySQL error '.mysqli_errno(self::$link).': '.mysqli_error(self::$link));
				$data = false;
			}elseif(mysqli_num_rows($result)){  
				$num_rows = mysqli_num_rows($result);
				self::set('num_rows', $num_rows);
				if($num_rows === 0){
					$data = false;
				}elseif(preg_match('/LIMIT 1/', $sql)){
					$data = mysqli_fetch_assoc($result);
				}else{
					$data = array();
					while($row = mysqli_fetch_assoc($result)){
						$data[] = $row;
					}
				}
			}else{ 
				$data = false;
			}
			mysqli_free_result($result);
			return $data;
		}
		public function like($table, $id, $data, $limit1, $limit2){
			$link = self::connection();				
			$sql="select * from ".$table." where user_pro_id='".$id."' and date like '".$data."%' limit ".$limit1.", ".$limit2."";
			if(!($result = mysqli_query(self::$link,$sql))){ 
				throw new Exception('Error executing MySQL query: '.$sql.'. MySQL error '.mysqli_errno(self::$link).': '.mysqli_error(self::$link));
				$data = false;
			}elseif(mysqli_num_rows($result)){  
				$num_rows = mysqli_num_rows($result);
				self::set('num_rows', $num_rows);
				if($num_rows === 0){
					$data = false;
				}elseif(preg_match('/LIMIT 1/', $sql)){
					$data = mysqli_fetch_assoc($result);
				}else{
					$data = array();
					while($row = mysqli_fetch_assoc($result)){
						$data[] = $row;
					}
				}
			}else{ 
				$data = false;
			}
			mysqli_free_result($result);
			return $data;
		}	
		public function get_row_num($id, $table)
		{
			$link = self::connection();
			//SELECT * FROM `product_history` WHERE user_pro_id=1 LIMIT 0, 20
			$sql="select count(*)as num from ".$table." where user_pro_id=".$id." LIMIT 0,20";
			if(!($result = mysqli_query(self::$link,$sql))){ 
				throw new Exception('Error executing MySQL query: '.$sql.'. MySQL error '.mysqli_errno(self::$link).': '.mysqli_error(self::$link));
				$data = false;
			}elseif(mysqli_num_rows($result)){ 				
					$data = mysqli_fetch_assoc($result);				
			}else{ 
				$data = false;
			}
			//print_r($data);
			mysqli_free_result($result);
			return $data;
			//"select * from ".$table." where user_pro_id='".$id."'and date BETWEEN '".$doj[0]."' and '".$doj[1]."'";
			
		}
		public function get_limit_type($table, $id, $type, $limit1, $limit2)
		{
			$link = self::connection();	
			echo $sql="select * from ".$table." where user_pro_id='".$id."' and type='".$type."' limit ".$limit1.",".$limit2."";
			if(!($result = mysqli_query(self::$link,$sql))){ 
				throw new Exception('Error executing MySQL query: '.$sql.'. MySQL error '.mysqli_errno(self::$link).': '.mysqli_error(self::$link));
				$data = false;
			}elseif(mysqli_num_rows($result)){  
				$num_rows = mysqli_num_rows($result);
				self::set('num_rows', $num_rows);
				if($num_rows === 0){
					$data = false;
				}elseif(preg_match('/LIMIT 1/', $sql)){
					$data = mysqli_fetch_assoc($result);
				}else{
					$data = array();
					while($row = mysqli_fetch_assoc($result)){
						$data[] = $row;
					}
				}
			}else{ 
				$data = false;
			}
			mysqli_free_result($result);
			return $data;
		}
		public function get_limit($id, $table, $limit1, $limit2)
		{
			$link = self::connection();	
			$sql="select * from ".$table." where user_pro_id='".$id."' limit ".$limit1.",".$limit2."";
			if(!($result = mysqli_query(self::$link,$sql))){ 
				throw new Exception('Error executing MySQL query: '.$sql.'. MySQL error '.mysqli_errno(self::$link).': '.mysqli_error(self::$link));
				$data = false;
			}elseif(mysqli_num_rows($result)){  
				$num_rows = mysqli_num_rows($result);
				self::set('num_rows', $num_rows);
				if($num_rows === 0){
					$data = false;
				}elseif(preg_match('/LIMIT 1/', $sql)){
					$data = mysqli_fetch_assoc($result);
				}else{
					$data = array();
					while($row = mysqli_fetch_assoc($result)){
						$data[] = $row;
					}
				}
			}else{ 
				$data = false;
			}
			mysqli_free_result($result);
			return $data;
		}			
		public function between($table, $id, $data){
			$doj = explode('/',$data);
			$link = self::connection();				
			$sql="select * from ".$table." where user_pro_id='".$id."'and date BETWEEN '".$doj[0]."' and '".$doj[1]."'";
			if(!($result = mysqli_query(self::$link,$sql))){ 
				throw new Exception('Error executing MySQL query: '.$sql.'. MySQL error '.mysqli_errno(self::$link).': '.mysqli_error(self::$link));
				$data = false;
			}elseif(mysqli_num_rows($result)){  
				$num_rows = mysqli_num_rows($result);
				self::set('num_rows', $num_rows);
				if($num_rows === 0){
					$data = false;
				}elseif(preg_match('/LIMIT 1/', $sql)){
					$data = mysqli_fetch_assoc($result);
				}else{
					$data = array();
					while($row = mysqli_fetch_assoc($result)){
						$data[] = $row;
					}
				}
			}else{ 
				$data = false;
			}
			mysqli_free_result($result);
			return $data;
		}
		public function between_combo_date($table, $id, $data){
			$doj = explode('/',$data);
			$link = self::connection();				
			$sql="select * from ".$table." where user_pro_id='".$id."'and date BETWEEN '".$doj[0]."' and '".$doj[1]."'";
			if(!($result = mysqli_query(self::$link,$sql))){ 
				throw new Exception('Error executing MySQL query: '.$sql.'. MySQL error '.mysqli_errno(self::$link).': '.mysqli_error(self::$link));
				$data = false;
			}elseif(mysqli_num_rows($result)){  
				$num_rows = mysqli_num_rows($result);
				self::set('num_rows', $num_rows);
				if($num_rows === 0){
					$data = false;
				}elseif(preg_match('/LIMIT 1/', $sql)){
					$data = mysqli_fetch_assoc($result);
				}else{
					$data = array();
					while($row = mysqli_fetch_assoc($result)){
						$data[] = $row;
					}
				}
			}else{ 
				$data = false;
			}
			mysqli_free_result($result);
			return $data;
		}
		public function between_combo_date_pro($table, $id, $type, $data,  $limit1, $limit2){
			$doj = explode('/',$data);
			$link = self::connection();				
			echo $sql="select * from ".$table." where user_pro_id='".$id."'and type='".$type."' and date BETWEEN '".$doj[0]."' and '".$doj[1]."' limit ".$limit1.",".$limit2."";
			if(!($result = mysqli_query(self::$link,$sql))){ 
				throw new Exception('Error executing MySQL query: '.$sql.'. MySQL error '.mysqli_errno(self::$link).': '.mysqli_error(self::$link));
				$data = false;
			}elseif(mysqli_num_rows($result)){  
				$num_rows = mysqli_num_rows($result);
				self::set('num_rows', $num_rows);
				if($num_rows === 0){
					$data = false;
				}elseif(preg_match('/LIMIT 1/', $sql)){
					$data = mysqli_fetch_assoc($result);
				}else{
					$data = array();
					while($row = mysqli_fetch_assoc($result)){
						$data[] = $row;
					}
				}
			}else{ 
				$data = false;
			}
		}
		public function combo_date_month_pro($table, $id, $type, $data,  $limit1, $limit2){
			//$doj = explode('/',$data);
			$link = self::connection();				
			$sql="select * from ".$table." where user_pro_id='".$id."'and type='".$type."' and date like '".$data."%' limit ".$limit1.",".$limit2."";
			if(!($result = mysqli_query(self::$link,$sql))){ 
				throw new Exception('Error executing MySQL query: '.$sql.'. MySQL error '.mysqli_errno(self::$link).': '.mysqli_error(self::$link));
				$data = false;
			}elseif(mysqli_num_rows($result)){  
				$num_rows = mysqli_num_rows($result);
				self::set('num_rows', $num_rows);
				if($num_rows === 0){
					$data = false;
				}elseif(preg_match('/LIMIT 1/', $sql)){
					$data = mysqli_fetch_assoc($result);
				}else{
					$data = array();
					while($row = mysqli_fetch_assoc($result)){
						$data[] = $row;
					}
				}
			}else{ 
				$data = false;
			}
			mysqli_free_result($result);
			return $data;
		}	
		public function combo_date_month_pro_between($table, $id, $type, $data,  $limit1, $limit2){
		{
			$doj = explode('/',$data);
			$link = self::connection();				
			$sql="select * from ".$table." where user_pro_id='".$id."' and type='".$type."' and date BETWEEN '".$doj[0]."' and '".$doj[1]."' limit ".$limit1.",".$limit2."";
			if(!($result = mysqli_query(self::$link,$sql))){ 
				throw new Exception('Error executing MySQL query: '.$sql.'. MySQL error '.mysqli_errno(self::$link).': '.mysqli_error(self::$link));
				$data = false;
			}elseif(mysqli_num_rows($result)){  
				$num_rows = mysqli_num_rows($result);
				self::set('num_rows', $num_rows);
				if($num_rows === 0){
					$data = false;
				}elseif(preg_match('/LIMIT 1/', $sql)){
					$data = mysqli_fetch_assoc($result);
				}else{
					$data = array();
					while($row = mysqli_fetch_assoc($result)){
						$data[] = $row;
					}
				}
			}else{ 
				$data = false;
			}
			mysqli_free_result($result);
			return $data;				
		}
		}
		public function between_combo_date_pro_type($table, $id, $data,  $limit1, $limit2){
		$doj = explode('/',$data);
		$link = self::connection();				
		$sql="select * from ".$table." where user_pro_id='".$id."' and date BETWEEN '".$doj[0]."' and '".$doj[1]."' limit ".$limit1.",".$limit2."";
		if(!($result = mysqli_query(self::$link,$sql))){ 
			throw new Exception('Error executing MySQL query: '.$sql.'. MySQL error '.mysqli_errno(self::$link).': '.mysqli_error(self::$link));
				$data = false;
			}elseif(mysqli_num_rows($result)){  
				$num_rows = mysqli_num_rows($result);
				self::set('num_rows', $num_rows);
				if($num_rows === 0){
					$data = false;
				}elseif(preg_match('/LIMIT 1/', $sql)){
					$data = mysqli_fetch_assoc($result);
				}else{
					$data = array();
					while($row = mysqli_fetch_assoc($result)){
						$data[] = $row;
					}
				}
			}else{ 
				$data = false;
			}
			mysqli_free_result($result);
			return $data;
		}
				
		public function between_combo($table, $id, $type, $data){
			$doj = explode('/',$data);
			$link = self::connection();				
			$sql="select * from ".$table." where user_pro_id='".$id."'and type = '".$type."' and date BETWEEN '".$doj[0]."' and '".$doj[1]."'";
			if(!($result = mysqli_query(self::$link,$sql))){ 
				throw new Exception('Error executing MySQL query: '.$sql.'. MySQL error '.mysqli_errno(self::$link).': '.mysqli_error(self::$link));
				$data = false;
			}elseif(mysqli_num_rows($result)){  
				$num_rows = mysqli_num_rows($result);
				self::set('num_rows', $num_rows);
				if($num_rows === 0){
					$data = false;
				}elseif(preg_match('/LIMIT 1/', $sql)){
					$data = mysqli_fetch_assoc($result);
				}else{
					$data = array();
					while($row = mysqli_fetch_assoc($result)){
						$data[] = $row;
					}
				}
			}else{ 
				$data = false;
			}
			mysqli_free_result($result);
			return $data;
		}	
		public function get($table, $select = '*'){
			//echo $table ;
			//echo $select;
			$link = self::connection();
			if(is_array($select)){
				$cols = '';
				foreach($select as $col){
					$cols .= "`{$col}`,";
				}
				$select = substr($cols, 0, -1);
			} 
			$sql = sprintf("SELECT %s FROM %s%s", $select, $table, self::extra());
			self::set('last_query', $sql);
			if(!($result = mysqli_query(self::$link,$sql))){ 
				throw new Exception('Error executing MySQL query: '.$sql.'. MySQL error '.mysqli_errno(self::$link).': '.mysqli_error(self::$link));
				$data = false;
			}elseif(mysqli_num_rows($result)){  
				$num_rows = mysqli_num_rows($result);
				self::set('num_rows', $num_rows);
				if($num_rows === 0){
					$data = false;
				}elseif(preg_match('/LIMIT 1/', $sql)){
					$data = mysqli_fetch_assoc($result);
				}else{
					$data = array();
					while($row = mysqli_fetch_assoc($result)){
						$data[] = $row;
					}
				}
			}else{ 
				$data = false;
			}
                        
			mysqli_free_result($result);
			return $data;
		}
		
		public function insert($table, $data){
			$link = self::connection();
			$fields = '';
			$values = '';
			foreach($data as $col => $value){
				$fields .= sprintf("`%s`,", $col);
				$values .= sprintf("'%s',", mysqli_real_escape_string(self::$link, $value));
			}
			$fields = substr($fields, 0, -1);
			$values = substr($values, 0, -1);
			$sql = sprintf("INSERT INTO %s (%s) VALUES (%s)", $table, $fields, $values);
			self::set('last_query', $sql);
			if(!mysqli_query(self::$link,$sql)){
				throw new Exception('Error executing MySQL query: '.$sql.'. MySQL error '.mysqli_errno(self::$link).': '.mysqli_error(self::$link));
			}else{
				self::set('insert_id', mysqli_insert_id(self::$link));
				return mysqli_insert_id(self::$link);
			}
		}		
		public function update($table, $info){
			if(empty(self::$where)){
				throw new Exception("Where is not set. Can't update whole table.");
			}else{
				$link = self::connection();
				$update = '';
				foreach($info as $col => $value){
					$update .= sprintf("`%s`='%s', ", $col, mysqli_real_escape_string(self::$link, $value));
				}
				$update = substr($update, 0, -2);
				//print_r($update);
				$sql = sprintf("UPDATE %s SET %s%s", $table, $update, self::extra());
				self::set('last_query', $sql);
				if(!mysqli_query(self::$link,$sql)){
					throw new Exception('Error executing MySQL query: '.$sql.'. MySQL error '.mysqli_errno(self::$link).': '.mysqli_error(self::$link));
				}else{
					return true;
				}
			}
		}		
		public function delete($table){
			if(empty(self::$where)){
				throw new Exception("Where is not set. Can't delete whole table.");
			}else{
				$link =self::connection();
				$sql = sprintf("DELETE FROM %s%s", $table, self::extra());
				self::set('last_query', $sql);
				if(!mysqli_query(self::$link,$sql)){
					throw new Exception('Error executing MySQL query: '.$sql.'. MySQL error '.mysqli_errno(self::$link).': '.mysqli_error(self::$link));
				}else{
					return true;
				}
			}
		}	
	}