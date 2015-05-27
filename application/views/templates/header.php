<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->library('session');
$this->load->model('cart_model','',TRUE);

if($this->session->logged_in_user)
{
	$session_data = $this->session->logged_in_user;
	$userID = $session_data['username'];
} 
else 
{
}
?>
<!DOCTYPE HTML>
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<html>
<head>
<title>HKUST KSA Korean Shopping Mall :: <?php echo $title; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="<?php echo base_url("assets/css/bootstrap.css"); ?>" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="<?php echo base_url("assets/css/style.css"); ?>" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<!--webfont-->
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-1.11.1.min.js"); ?>"></script>



<!----details-product-slider--->
<!-- Include the Etalage files -->
<link rel="stylesheet" href="<?php echo base_url("assets/css/etalage.css"); ?>">
<script src="<?php echo base_url("assets/js/jquery.etalage.min.js"); ?>"></script>
				<!-- Include the Etalage files -->
				<script>
						jQuery(document).ready(function($){
			
							$('#etalage').etalage({
								thumb_image_width: 300,
								thumb_image_height: 400,
								
								show_hint: true,
								click_callback: function(image_anchor, instance_id){
									alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
								}
							});
							// This is for the dropdown list example:
							$('.dropdownlist').change(function(){
								etalage_show( $(this).find('option:selected').attr('class') );
							});

					});
				</script>
				<!----//details-product-slider--->	
			<script src="<?php echo base_url("assets/js/easyResponsiveTabs.js"); ?>" type="text/javascript"></script>
		    <script type="text/javascript">
			    $(document).ready(function () {
			        $('#horizontalTab').easyResponsiveTabs({
			            type: 'default', //Types: default, vertical, accordion           
			            width: 'auto', //auto or any width like 600px
			            fit: true   // 100% fit in a container
			        });
			    });
			   </script>	
</head>
<body>
<?php 
if($title == 'Index')
{
	echo '<div class="index-banner">';
}
else
{
	echo '<div class="sales">';
}
?>
    <div class="container">   		
	  <div class="header_top">
	  	<div class="logo">
			<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url("assets/images/logo.png"); ?>" alt=""/></a>
		</div>
		<div class="header-bottom-right">
	       <ul class="icon1 sub-icon1 profile_img">
					 <li><a class="active-icon c1" href="#">My Cart </a><div class="rate"><?php echo $cartSize ?></div>
						<ul class="sub-icon1 list">
						  <h3>Recently added item<?php echo '('. $cartSize .')'; ?></h3>
						  <div class="shopping_cart">
								<?php 
								$number = 0;
								foreach($carts as $cart) {
									echo 	'<div class="cart_box">
												<div class="hidden" id="hidden">'. $cart['cart_code'] .'</div> 
												<div class="message'. $number .'">
													<a href="/cart/remove/' .$cart['cart_code'] .'"> <div class="alert-close alert-close'. $number .'"> </div> </a>';
							
									echo 	'			<div class="list_img"><img src="'. $cart['thumbnail'] .'" class="img-responsive" alt=""/></div>
														<div class="list_desc"><h4>Added to Cart: <a href="">'. $cart['cart_date'] .'</a></h4>'. $cart['quantity'] .' x<span class="actual">
														'. $cart['price'] .'</span></div>
														<div class="clearfix"></div>
												</div>
											</div>';
											
									echo '	<script>$(document).ready(function(c) {
												$(".alert-close'. $number .'").on("click", function(c){
													$(".message'. $number .'").fadeOut("slow", function(c){
														$(".message'. $number .'").remove();
														var myDiv = document.getElementById("totalPrice");
														var hiddenDiv = document.getElementById("hidden");
														myDiv.innerHTML = "Changed"';
									echo '			});
												});	  
											});
											</script>';
									$number++;
								}
								?>
	                        </div>
	                        <div class="total">
	                        	<div class="total_left">CartSubtotal : </div>
	                        	<div class="total_right" id="totalPrice">
								<?php 
									$totalPrice = 0;
									foreach($carts as $cart) {
										$totalPrice += $cart['price'] * $cart['quantity'];
									}
									echo $totalPrice;
								?>
									
								</div>
	                        	<div class="clearfix"></div>
	                        </div>
                            <div class="login_buttons">
							  <div class="check_button"><a href="checkout.html">Check out</a></div>
								<?php 
								//$sessionID = session_id();
								//echo $sessionID;
								//echo $username;
								if($this->session->logged_in_user || $this->session->logged_in_admin) {
									echo '<div class="login_button"><a href="/admin/logout">Logout</a></div>';
								}
								else {
									echo '<div class="login_button"><a href="/login">Login</a></div>';
								}
								?>
							  <div class="clearfix"></div>
						    </div>
					      <div class="clearfix"></div>
						</ul>
					 </li>
		      </ul>
              <div class="clearfix"></div>
          </div>
		<div class="menu">																
			<a href="#" class="right_bt" id="activator"><img src="<?php echo base_url("assets/images/menu.png"); ?>" alt=""/></a>
				<div class="box" id="box">
				   <div class="box_content_center">
					   <div class="menu_box_list">
						   <ul>
							   <li><a href="">New Arrival</a></li>
							   <li class="active"><a href="<?php echo base_url('sales'); ?>">Sales</a></li> 
							   <li><a href="/collection">Collection</a></li> 
							   <li><a href="/aboutus">About Us</a></li>
							   <li><a href="/contact">Contact</a></li>
						   </ul>
						</div>
						<a class="boxclose" id="boxclose"><img src="<?php echo base_url("assets/images/close.png"); ?>" alt=""/></a>
					  </div>                
					</div>
			                 <script type="text/javascript">
								var $ = jQuery.noConflict();
									$(function() {
										$('#activator').click(function(){
												$('#box').animate({'left':'0px'},500);
										});
										$('#boxclose').click(function(){
												$('#box').animate({'left':'-3300px'},500);
										});
									});
									$(document).ready(function(){
									
									//Hide (Collapse) the toggle containers on load
									$(".toggle_container").hide(); 
									
									//Switch the "Open" and "Close" state per click then slide up/down (depending on open/close state)
									$(".trigger").click(function(){
										$(this).toggleClass("active").next().slideToggle("slow");
										return false; //Prevent the browser jump to the link anchor
									});
									
									});
								</script>
			         </div> 	
			         <div class="clearfix"></div>		
		      </div>
	</div>
<?php
if($title == 'Index')
{
	echo 	'<div class="wmuSlider example1">
			    <article style="position: absolute; width: 100%; opacity: 0;"> 
				   	<div class="banner-wrap">
						<h1>Bring Korea Closer</h1>
					</div>
				 </article>
				 <article style="position: absolute; width: 100%; opacity: 0;"> 
				   	<div class="banner-wrap">
						<h1>For HKUST University Students</h1>
					</div>
				 </article>
				  <article style="position: absolute; width: 100%; opacity: 0;"> 
				   	<div class="banner-wrap">
						<h1>Feel Like Home</h1>
					</div>
				 </article>
				</div>
                  <script src="'. base_url("assets/js/jquery.wmuSlider.js") .'"></script> 
					<script>
       				     $(".example1").wmuSlider();         
   					</script> 	           	      
			</div>';
}
else
{
	echo '</div>';
}
?>