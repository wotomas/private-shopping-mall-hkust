<?php
class Admin_Model extends CI_Model {
		private $_loginID;
		private $_password;
		private $_joinDate;
		
        public function __construct()
        {
			parent::__construct();
        }

		//getter and setter
		public function getLoginID()
		{
			return $this->$_loginID;
		}
		public function setLoginID($value)
		{
			$this->$_loginID = $value;
		}	
		public function getPassword()
		{
			return $this->$_password;
		}
		public function setPassword($value)
		{
			$this->$_password = $value;
		}
		public function getJoinDate()
		{
			return $this->$_joinDate;
		}
		public function setJoinDate($value)
		{
			$this->$_joinDate = $value;
		}
		
		function login($username, $password)
		{
			$this -> db -> select('id, password, join_date');
			$this -> db -> from('administrators');
			$this -> db -> where('id', $username);
			$this -> db -> where('password', $password);
			$this -> db -> limit(1);
		 
			$query = $this -> db -> get();
		 
			if($query -> num_rows() == 1)
			{
				return $query->result();
			}
			else
			{
				return false;
			}
		}
		function register($data)
		{
			if($this -> db -> insert('administrators', $data))
			{
				return true;
			}
			else
			{
				return false;
			}
		}

				
		//commit the object into database
		public function commit()
		{	
			/**
					Each Users should have 
					private $_loginID;
					private $_password;
					private $_joinDate;
			**/
			$data = array(
					'id' => $this->$_loginID,
					'password' => $this->$_password,
					'join_date' => $this->$_joinDate
			);
			
			//if this objects id exists, update DB 
			if($this->_id > 0){
				//if DB is updated with the ID values, return true
				if($this->db->update("administrators", $data, array("id" => $this->$_loginID))){
					return true;
				} 
			} else {
				if($this->db->insert("administrators", $data)){
					$this->_id = $this->db->insert_id();
					return true;
				}
			}
			return false;
		}
		
}