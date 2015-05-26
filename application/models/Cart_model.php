<?php
class Cart_Model extends CI_Model {
		private $_cart_code;
		private $_cart_user;
		private $_cart_item_code;
		private $_quantity;
		private $_cart_date;
		
		
        public function __construct()
        {
			parent::__construct();
        }
		
		function getAll($user)
		{
			//SELECT * FROM `items` WHERE 1
			
			$this -> db -> select('*');
			$this -> db -> from('cart');
			$this -> db -> where('cart_user', $user);
			
			$query = $this -> db -> get();
			$data = array();
			
			if ($query->num_rows() > 0)
			{
			   foreach ($query->result() as $row)
			   {
				  $temp = array(
					'cart_code' => $row->cart_code,
					'cart_user' => $row->cart_user,
					'cart_item_code' => $row->cart_item_code,
					'quantity' => $row->quantity,
					'cart_date' => $row->cart_date
					);
				  $data[] = $temp;
			   }
			}
				
			
			return $data;
		}
		
		function remove($user, $id)
		{
			//Select
			$data = array(
				'cart_code' => $id,
				'cart_user' => $user
				);
				
			$this->db->delete('cart', $data);
			
			return $this->db->affected_rows() > 0;
			
		}
			
		
		function insert($data)
		{
			if($this -> db -> insert('cart', $data))
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		
}