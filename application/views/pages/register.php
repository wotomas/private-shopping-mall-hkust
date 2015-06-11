		   <div class="dreamcrub">
			   	 <ul class="breadcrumbs">
                    <li class="home">
                       <a href="<?php echo base_url(); ?>" title="Go to Home Page">Home</a>&nbsp;
                       <span>&gt;</span>
                    </li>
                    <li class="women">
                        Login
                    </li>
               </ul>
                <ul class="previous">
                </ul>
                <div class="clearfix"></div>
		   </div>
		   
			  
		   <div class="register">
		  	  <?php echo form_open('verifynormalregister'); ?>
			  <?php echo validation_errors(); ?>
			  <hr>
				 <div class="register-top-grid">
					<h3>PERSONAL INFORMATION</h3>
					 <div>
						<span>First Name<label>*</label></span>
						<input type="text" id="first_name" name="first_name" value="<?php echo set_value('first_name'); ?>" /> 
					 </div>
					 <div>
						<span>Last Name<label>*</label></span>
						<input type="text" id="last_name" name="last_name" value="<?php echo set_value('last_name'); ?>"/> 
					 </div>
					 <div class="clearfix"> </div>
					   <a class="news-letter">
					   </a>
					 </div>
				     <div class="register-bottom-grid">
						    <h3>LOGIN INFORMATION</h3>
							<div>
								 <span>Login ID<label>*</label></span>
								 <input type="text" id="username" name="username" value="<?php echo set_value('username'); ?>"/> 
							</div>
							<a class="news-letter">
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
				   </form>
				</div>
		   </div>
	    </div>
	    <div class="clearfix"> </div>   	
    </div>   
</div>