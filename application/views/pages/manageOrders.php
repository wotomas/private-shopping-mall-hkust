<div class="dreamcrub">
			   	 <ul class="breadcrumbs">
                    <li class="home">
                       <a href="<?php echo base_url(); ?>" title="Go to Home Page">Home</a>&nbsp;
                       <span>&gt;</span>
                    </li>
                    <li class="women">
                        Admin
                    </li>
               </ul>
                <div class="clearfix"></div>
		   </div>
			<h1>Admin Private Page</h1>
			<h2>Welcome <?php echo $username; ?>! Manage Orders in the Shopping Mall!</h2>
			<br>
			
			<div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-list">
					<div class="pages">
       	   </div>
					<div class="clearfix"></div>
					<ul>
					
					<?php
					
					$previousPasscode = 0;
						foreach($orders as $row) {
							if($row['order_complete'] == true)
							{
								continue;
							}
							else 
							{
								//$previousPasscode = $row['order_password'];
								if(0 == strcmp($previousPasscode,$row['order_password'])) {
									echo '<li>
									<a class="cbp-vm-image" href="#">
									 <div class="view view-first">
									  <div class="inner_content clearfix">
										<div class="product_image">
											<div class="product_container">
											   <div class="clearfix"></div>
											 </div>		
										  </div>
										 </div>
									  </div>
									</a>';
									foreach($items as $item) {
										if($item['item_code'] == $row['order_item_code'])
										{
											echo '	<div class="cbp-vm-details"><font size="3"><p>'. $item['item_name'] .' </p></font>
													'. $item['price'] .' HKD x '. $row['quantity'] .'</div>
													</li>';
										}
										else
										{
											continue;
										}
									}
								} else {
									$previousPasscode = $row['order_password'];
									echo '<li>
									<a class="cbp-vm-image" href="#">
									 <div class="view view-first">
									  <div class="inner_content clearfix">
										<div class="product_image">
											<div class="product_container">
											   <div class="cart-left">
												<font size="3">
												 <p class="title">Order Code: <br>'. $row['order_password'] .'</p>
												</font>
											   </div>
											   <font size="1">
											   <div class="price">Made Order at: '. $row['order_date'] .' </div>
											   </font>
											   <font size="1">
											   <div class="price">Made Order By: '. $row['order_user'] .' </div>
											   </font>
											   <div class="clearfix"></div>
											 </div>		
										  </div>
										 </div>
									  </div>
									</a>';
									foreach($items as $item) {
										if($item['item_code'] == $row['order_item_code'])
										{
											echo '	<div class="cbp-vm-details"><font size="3"><p>'. $item['item_name'] .' </p></font>
													'. $item['price'] .' HKD x '. $row['quantity'] .'</div>
													<a class="cbp-vm-icon cbp-vm-add" href="admin/deliverComplete/'. $row['order_password'] .'">Done Delivery</a>
													</li>';
											
										}
										else
										{
											continue;
										}
									}
								}
							}
						}
					?>
					  
						
						
						
						
					</ul>
				</div>
				
				
				<link href="/assets/css/component.css" rel='stylesheet' type='text/css' />
                <script src="/assets/js/cbpViewModeSwitch.js" type="text/javascript"></script>
                <script src="/assets/js/classie1.js" type="text/javascript"></script>
	    </div>
	    <div class="clearfix"> </div>   	
    </div>   
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script language="javascript" type="text/javascript">
$(function () {
    $("#fileupload").change(function () {
        if (typeof (FileReader) != "undefined") {
            var dvPreview = $("#dvPreview");
            dvPreview.html("");
            var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
            $($(this)[0].files).each(function () {
                var file = $(this);
                if (regex.test(file[0].name.toLowerCase())) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var img = $("<img />");
                        img.attr("style", "padding: 2px; height:100px;width: 100px");
                        img.attr("src", e.target.result);
                        dvPreview.append(img);
                    }
                    reader.readAsDataURL(file[0]);
                } else {
                    alert(file[0].name + " is not a valid image file.");
                    dvPreview.html("");
                    return false;
                }
            });
        } else {
            alert("This browser does not support HTML5 FileReader.");
        }
    });
});
</script>