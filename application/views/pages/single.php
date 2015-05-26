		   <div class="dreamcrub">
			   	 <ul class="breadcrumbs">
                    <li class="home">
                       <a href="/" title="Go to Home Page">Home</a>
                       <span>&gt;</span>	
                    </li>
                    <li class="home">&nbsp;
                        <?php echo ucfirst($category); ?>&nbsp;
                        <span>&gt;</span>
                    </li>
                    <li class="women">
                       <?php echo ucfirst($item_name); ?>
                    </li>
                </ul>
                <ul class="previous">
                	<li><a href="index.html">Back to Previous Page</a></li>
                </ul>
                <div class="clearfix"></div>
			   </div>
			   <div class="singel_right">
			     <div class="labout span_1_of_a1">
				<!-- start product_slider -->
				     <ul id="etalage">
							 <?php 
							//thumbnail -> /assets/images/admin/Food2/4.jpg
							//explode 
							$pieces = explode('/', $thumbnail);
							$fileName = array_pop($pieces);
							$path = implode("/",$pieces);
							$files = glob('.'.  $path . "/*.{jpg,gif,png}", GLOB_BRACE);
							foreach($files as $file) {
								//print $file;
								//$file -> ./assets/images/admin/Food2/4.jpg
								$pieces = explode('.', $file);
								$decimal = array_shift($pieces);
								$newPath = implode('.',$pieces);
								echo 	'<li>
											<img class="etalage_thumb_image" src="'. $newPath .'" class="img-responsive" />
											<img class="etalage_source_image" src="'. $newPath .'" class="img-responsive" />
										</li>';
							}
							?>
							<div class="clearfix"> </div>
						</ul>
					<!-- end product_slider -->
			  </div>
			  <div class="cont1 span_2_of_a1">
				<h1> <?php echo ucfirst($item_name); ?></h1>
				<!--
				<ul class="rating">
				   <li><a class="product-rate" href="#"> </a> <span> </span></li>
				   <li><a href="#">1 Review(s) Add Review</a></li>
				   <div class="clearfix"></div>
			    </ul>
				-->
			    <div class="price_single">
				  <span class="reducedfrom"><?php echo $originalprice . ' HKD'; ?></span>
				  <span class="actual"><?php echo $price . ' HKD'; ?></span>
				</div>
				<h2 class="quick">Quick Overview:</h2>
				<p class="quick_desc"> <?php echo $detail; ?></p>
				
			    <ul class="size">
					<h3>Upload Date:</h3>
					<p class="quick_desc"> <?php echo $upload_date; ?></p>
					<!--
					<li><a href="#">Fried Chicken</a></li>
					<li><a href="#">BBQ Chicken</a></li>
					<li><a href="#">Half/Half Chicken</a></li>
					-->
				</ul>
				
				<ul class="product-qty">
				   <span>Quantity:</span>
				   <select>
					 <option>1</option>
					 <option>2</option>
					 <option>3</option>
					 <option>4</option>
					 <option>5</option>
				   </select>
			    </ul>
			    <div class="btn_form">
					<form action="login">
						<input type="submit" value="Add to Cart" title="">
					</form>
				</div>
			</div>
			<div class="clearfix"></div>
		   </div>
		   <div class="sap_tabs">	
				     <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
						  <ul class="resp-tabs-list">
						  	  <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Product Description</span></li>
							  <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Additional Information</span></li>
							  <div class="clear"></div>
						  </ul>				  	 
							<div class="resp-tabs-container">
							    <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
									<div class="facts">
									  <ul class="tab_list">
									  	<li><a href="#"><?php echo $detail; ?>.</a></li>
									  </ul>           
							        </div>
							     </div>	
							      <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
									<div class="facts">
									  <ul class="tab_list">
									    <li><a href="#">By agreeing to buy this product, you are agreeing to to <a href='/aboutus'>terms of conditions</a>. </a></li>
									  </ul>           
							        </div>
							     </div>
							 </div>
					      </div>
					 </div>	
					 <h3 class="like">You Might Also Like</h3>        			
				     <ul id="flexiselDemo3">
						<li><img src="assets/images/pic3.jpg" class="img-responsive"/><div class="grid-flex"><a href="#">Red Pepper Paste</a><p>Stock 8</p></div></li>
						<li><img src="assets/images/pic4.jpg" class="img-responsive"/><div class="grid-flex"><a href="#">Herbal Shampoo Rue</a><p>Stock 15</p></div></li>
						<li><img src="assets/images/pic5.jpg" class="img-responsive"/><div class="grid-flex"><a href="#">Emergency Kit</a><p>Stock 2</p></div></li>
				     </ul>
				    <script type="text/javascript">
					 $(window).load(function() {
						$("#flexiselDemo3").flexisel({
							visibleItems: 3,
							animationSpeed: 1000,
							autoPlay: true,
							autoPlaySpeed: 3000,    		
							pauseOnHover: true,
							enableResponsiveBreakpoints: true,
					    	responsiveBreakpoints: { 
					    		portrait: { 
					    			changePoint:480,
					    			visibleItems: 1
					    		}, 
					    		landscape: { 
					    			changePoint:640,
					    			visibleItems: 2
					    		},
					    		tablet: { 
					    			changePoint:768,
					    			visibleItems: 3
					    		}
					    	}
					    });
					    
					});
				   </script>
				   <script type="text/javascript" src="assets/js/jquery.flexisel.js"></script>
				    <script type="text/javascript">
					 $(window).load(function() {
						$("#flexiselDemo1").flexisel({
							visibleItems: 3,
							animationSpeed: 1000,
							autoPlay: true,
							autoPlaySpeed: 3000,    		
							pauseOnHover: true,
							enableResponsiveBreakpoints: true,
					    	responsiveBreakpoints: { 
					    		portrait: { 
					    			changePoint:480,
					    			visibleItems: 1
					    		}, 
					    		landscape: { 
					    			changePoint:640,
					    			visibleItems: 2
					    		},
					    		tablet: { 
					    			changePoint:768,
					    			visibleItems: 3
					    		}
					    	}
					    });
					    
					});
				   </script>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>   	
</div>