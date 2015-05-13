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

		function insert($data)
		{
			//get keys from data and inset them to database
			/**
					Each Item should have 
						private $_itemCode;
						private $_category;
						private $_itemName;
						private $_originalPrice;
						private $_price;
						private $_thumbnail;
						private $_detail;
						private $_upload_date;
						private $_exposure;
			
					Data Consists of
						// *************** //
						//  Check Results  //
						// *************** //
						itemCode
						echo $upload_array['category'];
						echo $upload_array['itemName'];
						echo $upload_array['originalPrice'];
						echo $upload_array['price'];
						echo $upload_array['fileupload'];
						echo $upload_array['details'];
						upload_date
						exposure
						**/
			
			
			if($this -> db -> insert('items', $data))
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		
}