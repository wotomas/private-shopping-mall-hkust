<?php
class Order_Model extends CI_Model {
		private $_order_code;
		private $_order_user;
		private $_quantity;
		private $_order_item_code;
		private $_order_date;
		private $_order_complete;
		private $_order_password;
		
        public function __construct()
        {
			parent::__construct();
        }
		
		function getAll()
		{
			//SELECT * FROM `items` WHERE 1
			
			$this -> db -> select('*');
			$this -> db -> from('orders');
		 
			$query = $this -> db -> get();
			$data = array();
			
			if ($query->num_rows() > 0)
			{
			   foreach ($query->result() as $row)
			   {
				  $temp = array(
					'order_code' => $row->order_code,
					'order_user' => $row->order_user,
					'quantity' => $row->quantity,
					'order_item_code' => $row->order_item_code,
					'order_date' => $row->order_date,
					'order_complete' => $row->order_complete,
					'order_password' => $row->order_password
					);
				  $data[] = $temp;
			   }
			}
			return $data;
		}
				
		function deliverComplete($passcode)
		{
			$data = array(
               'order_complete' => 1
            );
			//Select 
			$this -> db -> select('*');
			$this -> db -> from('orders');
			$this -> db -> where('order_password', $passcode);
			//update
			$this -> db -> update('orders', $data);
		}
		
		function insert($data)
		{
			if($this -> db -> insert('orders', $data))
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		
}