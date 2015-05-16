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
			<h2>Welcome <?php echo $username; ?>! Add Items to Shopping Mall!</h2>
			<br>
			
			
			<?php echo form_open_multipart('verifyuploaditem');?>
			<form>
			<div class="col-md-6 login-right">
				  <div>
					<span>Item Name<label>*</label></span>
					<input type="text" id="itemName" name="itemName" value="<?php echo set_value('itemName'); ?>" /> 
				  </div>
				  <div>
					<span>Original Price<label>*</label></span>
					<input type="text" id="originalPrice" name="originalPrice" value="<?php echo set_value('originalPrice'); ?>"/> 
				  </div>
				  <div>
					<span>Current Price<label>*</label></span>
					<input type="text" id="price" name="price" value="<?php echo set_value('price'); ?>"/> 
				  </div>
				  <div>
					<span>Details<label>*</label></span>
					<textarea id="details" name="details" rows="5" value="<?php echo set_value('details'); ?>">Enter Details Here </textarea>
				  </div>
				  <br>
				  <?php echo validation_errors(); ?>
			</div>
			<div class="col-md-6 login-right">
				 <div>
					<span>Category<label>*</label></span>
						<input type="radio" id="category" name="category" value="food" checked /> Food <br />
						<input type="radio" id="category" name="category" value="drink" /> Drink <br />
						<input type="radio" id="category" name="category" value="utility" /> Utility <br />
				 </div>
				 <br>
				 <div>
					<span>Image<label>*</label></span>
						<input id="fileupload" name="fileupload[]" type="file" multiple="multiple" />
					<hr />
					<span>Preview<label>*</label></span>
					<div id="dvPreview">
					</div>
				 </div><br />
				 <input type="submit" value="submit">
				 
			</div>
			</form>
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