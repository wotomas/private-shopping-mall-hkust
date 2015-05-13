<?php
class Item_Model extends CI_Model {
		private $_itemCode;
		private $_category;
		private $_itemName;
		private $_originalPrice;
		private $_price;
		private $_thumbnail;
		private $_detail;
		private $_upload_date;
		private $_exposure;
		
        public function __construct()
        {
			parent::__construct();
        }

		function inset($data)
		{
			//get keys from data and inset them to database
			
		}

		
}