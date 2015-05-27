<div class="dreamcrub">
			   	 <ul class="breadcrumbs">
                    <li class="home">
                       <a href="/" title="Go to Home Page">Home</a>&nbsp;
                       <span>&gt;</span>
                    </li>
                    <li class="women">
                        Admin
                    </li>
               </ul>
                <ul class="previous">
                	<li><a href="index.html">Back to Previous Page</a></li>
                </ul>
                <div class="clearfix"></div>
		   </div>
			<h1>Admin Private Page</h1>
			<h2>Welcome <?php echo $username; ?>! Manage Items in the Shopping Mall!</h2>
			<br>
			
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
					$temp = $this->item_model->getAll();
						foreach($temp as $row) {
							echo '<li>
							<a class="cbp-vm-image" href="single">
							 <div class="view view-first">
					   		  <div class="inner_content clearfix">
								<div class="product_image">
									<img src="' . $row['thumbnail'] . '" class="img-responsive" alt=""/>
									<div class="product_container">
									   <div class="cart-left">
										<font size="6">
										 <p class="title">'. $row['item_name'] .'</p>
										</font>
									   </div>
									   <font size="5">
									   <div class="price">'. $row['price'] .' HKD</div>
									   </font>
									   <div class="clearfix"></div>
								     </div>		
								  </div>
			                     </div>
		                      </div>
		                    </a>
							<div class="cbp-vm-details">'. $row['detail'] .'</div>
								<a class="cbp-vm-icon cbp-vm-add" href="admin/removeitem/'. $row['item_code'] .'">Remove</a>
								<!--
								<a class="cbp-vm-icon cbp-vm-add" href="admin/edititem/'. $row['item_code'] .'">Edit</a>
								-->
							</li>';
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