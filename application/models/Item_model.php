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
		
		function getAll()
		{
			//SELECT * FROM `items` WHERE 1
			
			$this -> db -> select('*');
			$this -> db -> from('items');
		 
			$query = $this -> db -> get();
			$data = array();
			
			if ($query->num_rows() > 0)
			{
			   foreach ($query->result() as $row)
			   {
				  $temp = array(
					'item_code' => $row->item_code,
					'category' => $row->category,
					'item_name' => $row->item_name,
					'originalprice' => $row->originalprice,
					'price' => $row->price,
					'thumbnail' => $row->thumbnail,
					'detail' => $row->detail,
					'upload_date' => $row->upload_date,
					'exposure' => $row->exposure
					);
				  $data[] = $temp;
			   }
			}
				
			
			return $data;
		}
		
		function getAllFromCategory($category)
		{
			//SELECT * FROM `items` WHERE 1
			
			$this -> db -> select('*');
			$this -> db -> from('items');
			$this -> db -> where('category', $category);
		 
			$query = $this -> db -> get();
			$data = array();
			
			if ($query->num_rows() > 0)
			{
			   foreach ($query->result() as $row)
			   {
				  $temp = array(
					'item_code' => $row->item_code,
					'category' => $row->category,
					'item_name' => $row->item_name,
					'originalprice' => $row->originalprice,
					'price' => $row->price,
					'thumbnail' => $row->thumbnail,
					'detail' => $row->detail,
					'upload_date' => $row->upload_date,
					'exposure' => $row->exposure
					);
				  $data[] = $temp;
			   }
			}
				
			
			return $data;
		}
		
		function remove($id)
		{
			//Select 
			$this -> db -> select('*');
			$this -> db -> from('items');
			$this -> db -> where('item_code', $id);
			$this -> db -> limit(1);
		 
			$query = $this -> db -> get();
			if ($query->num_rows() > 0)
			{
			   foreach ($query->result() as $row)
			   {
				  $temp = array(
					'thumbnail' => $row->thumbnail
					);
			   }
			}
			
			
			$thumbnailPath = $temp['thumbnail'];
			
			
			$pieces = explode('/', $thumbnailPath);
			$fileName = array_pop($pieces);
			$path = implode("/",$pieces);
			$path = '.' . $path;
			
			//DELETE FROM `items` WHERE `item_code`= $id
			$data = array(
				'item_code' => $id
				);
			
			if($this -> db -> delete('items', $data)) {
					if (is_dir($path) === true)
					{
						$files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path), RecursiveIteratorIterator::CHILD_FIRST);

						foreach ($files as $file)
						{
							if (in_array($file->getBasename(), array('.', '..')) !== true)
							{
								if ($file->isDir() === true)
								{
									rmdir($file->getPathName());
								}

								else if (($file->isFile() === true) || ($file->isLink() === true))
								{
									unlink($file->getPathname());
								}
							}
						}

						return rmdir($path);
					}

					else if ((is_file($path) === true) || (is_link($path) === true))
					{
						return unlink($path);
					}
					
					//able to remove from database but can not remove from disk
					return false;
			}
			else {
				return false;
			}
		 
			
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