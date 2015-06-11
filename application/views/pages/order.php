		   <div class="dreamcrub">
			   	 <ul class="breadcrumbs">
                    <li class="home">
                       <a href="<?php echo base_url(); ?>" title="Go to Home Page">Home</a>
                       <span>&gt;</span>	
                    </li>
                    <li class="women">
                       <?php echo ucfirst($title); ?>
                    </li>
               </ul>
                <div class="clearfix"></div>
			   </div>
				<div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid">
					<div class="cbp-vm-options">
						<a href="#" class="cbp-vm-icon cbp-vm-grid cbp-vm-selected" data-view="cbp-vm-view-grid" title="grid">Grid View</a>
					</div>
					<div class="pages">   

       	   </div>
					<div class="clearfix"></div>
					<ul>
					  <?php 
					  $number = 0;
					  $totalPrice = 0;
					  foreach($carts as $item) 
					  {
						echo '<li>
							 <div class="view view-first">
					   		  <div class="inner_content clearfix">
								<div class="product_image">
									<img src="'. $item['thumbnail'] .'" class="img-responsive" alt=""/>
									<div class="product_container">
									   <div class="price">Price: '. $item['price'] .' x '. $item['quantity'] .' HKD</div>
									   <div class="price">Cart Date: '. $item['cart_date'] .'</div>
									   <div class="clearfix"></div>
								    </div>		
								  </div>
			                     </div>
		                      </div>
						</li>';
						$number++;
						$totalPrice = $totalPrice + $item['price'] * $item['quantity'];
					  }
					  ?>
					</ul>
					
					<div>
					<?php echo form_open('order/confirm'); ?>
						<h2> Total Price: <?php echo $totalPrice; ?> HKD</h2>
							<div class="register-but">
							<input type="submit" value="Confirm Order">
							</div>
						</form>
					</div>
					
					
				</div>
				<link href="<?php echo base_url("assets/css/component.css"); ?>" rel='stylesheet' type='text/css' />
                <script src="<?php echo base_url("assets/js/cbpViewModeSwitch.js"); ?>" type="text/javascript"></script>
                <script src="<?php echo base_url("assets/js/classie1.js"); ?>" type="text/javascript"></script>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>   	
</div>