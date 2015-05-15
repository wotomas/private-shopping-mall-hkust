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
			<h2>Welcome! Add New Admins!</h2>
			<br>
			<div class="register">
				<?php
				echo form_open('verifyadminadd'); 
				?>
				
				<?php echo validation_errors(); ?>
				<form>
				     <div class="register-bottom-grid">
						    <h3>LOGIN INFORMATION</h3>
							 <div>
								<span>Login Username<label>*</label></span>
								<input type="text" id="adminUsername" name="adminUsername" value="<?php echo set_value('adminUsername'); ?>" />
							 </div>
							 <div class="clearfix"> </div>
								<a class="news-letter" href="#">
								
								</a>
							 <div>
								<span>Password<label>*</label></span>
								<input type="password" id="password" name="password" /> 
							 </div>
							 <div>
								<span>Confirm Password<label>*</label></span>
								<input type="password" id="passwordCheck" name="passwordCheck" /> 
							 </div>
							 <div class="clearfix"> </div>
					 </div>
					<div class="clearfix"> </div>
					 
					<div class="register-but">
						   <input type="submit" value="submit">
						   <div class="clearfix"> </div>
					</div>
				</form>
		   </div>
			
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