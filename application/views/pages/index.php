		   <div class="content_right-box">
			<div class="col-md-8">
			  <div class="grid1">
				<h5><?php echo $items[0]['item_name']; ?></h5>
				  <div class="view view-first">
					 <img src="<?php echo $items[0]['thumbnail']; ?>" class="img-responsive" alt=""/>
					   <a href="<?php echo base_url('sales/'. $items[0]['category']);?>"><div class="mask">
						<h3>Quick Look</h3>
						<p>-----Or----</p>
						<h4>Add To Basket</h4>
					  </div></a>
				   </div> 
				<h6><?php echo $items[0]['price']; ?> HKD</h6>
			   </div>
			  
			   <div class="grid1 box4">
			    <h5><?php echo $items[1]['item_name']; ?></h5>
   				  <div class="view view-first">
                     <img src="<?php echo $items[1]['thumbnail']; ?>" class="img-responsive" alt=""/>
                     <a href="<?php echo base_url('sales/'. $items[1]['category']);?>"><div class="mask mask1">
   			            <h3>Quick Look</h3>
                        <p>-----Or----</p>
                        <h4>Add To Basket</h4>
                      </div></a>
   				  </div> 
               <h6><?php echo $items[1]['price']; ?> HKD</h6>
			  </div>
			  
			</div>
			
			<div class="col-md-4">
			 <?php
			 $count = 0;
			 foreach($items as $item){
				 if($count++ < 2 ){
					continue;
				 } else if($count > 6) {
					break;
				 } else {
					 echo '<a href="'. base_url('sales/'. $item['category']) .'"><div class="grid2">
					  <div class="view view-first">
						 <img src="'. $item['thumbnail'] .'" class="img-responsive" alt=""/>
						  <h5>'. $item['item_name'] .'</h5>
						  <h6>'. $item['price'].' HKD</h6>
					  </div> 
				   </a></div>';
				 }
			 }
			 ?>
			</div>
			<div class="clearfix"> </div>
		   </div>
		   <!--
		   <div class="box3">
			   <div class="col-md-4">
			    <a href="<?php echo base_url('single');?>"> <div class="grid3 view view-first">
			   	   <img src="assets/images/pic6.jpg" class="img-responsive" alt=""/>
			   	</div></a>
			   </div>
			   <div class="col-md-4">
			     <a href="<?php echo base_url('single');?>"><div class="grid3  view view-first">
			   	   <img src="assets/images/pic7.jpg" class="img-responsive" alt=""/>
			   	 </div></a>
			   </div>
			   <div class="col-md-4">
			     <a href="<?php echo base_url('single');?>"><div class="grid3 view view-first">
			   	   <img src="assets/images/pic8.jpg" class="img-responsive" alt=""/>
			   	 </div></a>
			   </div>
			   <div class="clearfix"> </div>
			</div>
			
			<div class="box4">
				<div class="col-md-6">
				 <div class="grid1">
				    <h5>UV Block Sleeves</h5>
	   				  <div class="view view-first">
	                     <img src="assets/images/pic9.jpg" class="img-responsive" alt=""/>
	   				       <a href="<?php echo base_url('single');?>"><div class="mask mask2">
	   			            <h3>Quick Look</h3>
	                        <p>-----Or----</p>
	                        <h4>Add To Basket</h4>
	                      </div></a>
	                   </div> 
		               <h6>19 HKD</h6>
				  </div>
				</div>
				<div class="col-md-6">
				   <div class="grid1">
				    <h5>Korean Snack Set</h5>
	   				  <div class="view view-first">
	                     <img src="assets/images/pic10.jpg" class="img-responsive" alt=""/>
	   				       <a href="<?php echo base_url('single');?>"><div class="mask mask2">
	   			            <h3>Quick Look</h3>
	                        <p>-----Or----</p>
	                        <h4>Add To Basket</h4>
	                      </div></a>
	                   </div> 
		               <h6>95 HKD</h6>
				  </div>
				</div>
				<div class="clearfix"> </div>
			</div>
			-->
		</div>
		<div class="clearfix"> </div>
	</div>
</div>   