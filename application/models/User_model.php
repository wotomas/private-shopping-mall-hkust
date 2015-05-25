<?php
class User_model extends CI_Model {
		private $_key;
		private $_id;
		private $_password;
		private $_first_name;
		private $_last_name;
		
        public function __construct()
        {
			parent::__construct();
        }
		
		function login($username, $password)
		{
			$this -> db -> select('id, password, first_name, last_name');
			$this -> db -> from('users');
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
		function checkID($username)
		{
			$this -> db -> select('id, password, first_name, last_name');
			$this -> db -> from('users');
			$this -> db -> where('id', $username);
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
			if($this -> db -> insert('users', $data))
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		
}