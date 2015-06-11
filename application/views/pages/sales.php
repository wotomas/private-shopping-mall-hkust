		   <div class="dreamcrub">
			   	 <ul class="breadcrumbs">
                    <li class="home">
                       <a href="<?php echo base_url(); ?>" title="Go to Home Page">Home</a>
                       <span>&gt;</span>	
                    </li>
                    <li class="home">&nbsp;
                        Sales&nbsp;
                        <span>&gt;</span>
                    </li>
                    <li class="women">
                       <?php echo ucfirst($category); ?>
                    </li>
               </ul>
                <ul class="previous">
                </ul>
                <div class="clearfix"></div>
			   </div>
			   <div class="mens-toolbar">
                 <div class="sort">
               	   <div class="sort-by">
		            <label>Sort By</label>
		            <select>
		                            <option value="">
		                    Position                </option>
		                            <option value="">
		                    Name                </option>
		                            <option value="">
		                    Price                </option>
		            </select>
		            <a href=""><img src="<?php echo base_url("assets/images/arrow2.gif"); ?>" alt="" class="v-middle"></a>
                   </div>
    		     </div>
				 
    	        <ul class="women_pagenation dc_paginationA dc_paginationA06">
			     <li><a href="#" class="previous">Page:</a></li>
			     <li class="active"><a href="#">1</a></li>
				 <!--
			     <li><a href="#">2</a></li>
				 -->
		  	    </ul>
                <div class="clearfix"></div>		
		        </div>		
				<div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid">
					<div class="cbp-vm-options">
						<a href="#" class="cbp-vm-icon cbp-vm-grid cbp-vm-selected" data-view="cbp-vm-view-grid" title="grid">Grid View</a>
						<a href="#" class="cbp-vm-icon cbp-vm-list" data-view="cbp-vm-view-list" title="list">List View</a>
					</div>
					<div class="pages">   
        	 <div class="limiter visible-desktop">
               <label>Show</label>
                  <select>
                            <option value="" selected="selected">
                    9                </option>
                            <option value="">
                    15                </option>
                            <option value="">
                    30                </option>
                  </select> per page        
               </div>
       	   </div>
					<div class="clearfix"></div>
					<ul>
					  <?php 
					  $number = 0;
					  foreach($items as $item) 
					  {
						echo '<li>
							<a class="cbp-vm-image" href="/single/'. $category .'/'. $number .'">
							 <div class="view view-first">
					   		  <div class="inner_content clearfix">
								<div class="product_image">
									<img src="'. $item['thumbnail'] .'" class="img-responsive" alt=""/>
									<div class="product_container">
									   <div class="cart-left">
										 <p class="title">'. $item['item_name'] .'</p>
									   </div>
									   <div class="price">'. $item['price'] .' HKD</div>
									   <div class="clearfix"></div>
								     </div>		
								  </div>
			                     </div>
		                      </div>
		                    </a>
							<div class="cbp-vm-details">
								'. $item['detail'] .'
							</div>
							<a class="cbp-vm-icon cbp-vm-add" href="/single/'. $category .'/'. $number .'">Add to cart</a>
						</li>';
						$number++;
					  }
					  ?>
					</ul>
				</div>
				<link href="<?php echo base_url("assets/css/component.css"); ?>" rel='stylesheet' type='text/css' />
                <script src="<?php echo base_url("assets/js/cbpViewModeSwitch.js"); ?>" type="text/javascript"></script>
                <script src="<?php echo base_url("assets/js/classie1.js"); ?>" type="text/javascript"></script>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>   	
</div>