		   <div class="dreamcrub">
			   	 <ul class="breadcrumbs">
                    <li class="home">
                       <a href="index.html" title="Go to Home Page">Home</a>&nbsp;
                       <span>&gt;</span>
                    </li>
                    <li class="women">
                        Login
                    </li>
               </ul>
                <ul class="previous">
                	<li><a href="index.html">Back to Previous Page</a></li>
                </ul>
                <div class="clearfix"></div>
		   </div>
		   <div class="register">
			  <div class="col-md-6 login-right">
			  	<h3>REGISTERED CUSTOMERS</h3>
				<p>If you have an account with us, please log in.</p>
				
				<?php echo form_open('verifylogin'); ?>
				  <div>
					<span>Email Address<label>*</label></span>
					<input type="text" id="username" name="username" /> 
				  </div>
				  <div>
					<span>Password<label>*</label></span>
					<input type="password" id="password" name="password" /> 
				  </div>
				  <a class="forgot" href="#">Forgot Your Password?</a>
				  <input type="submit" value="Login">
				  <br>
				  <?php 
				  		echo validation_errors();
				  ?>
			    </form>
			   </div>
			    <div class="col-md-6 login-left">
			  	 <h3>NEW CUSTOMERS</h3>
				 <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
				 <a class="acount-btn" href="register">Create an Account</a>
			   </div>	
			   <div class="clearfix"> </div>
		   </div>
	    </div>
	    <div class="clearfix"> </div>   	
    </div>   
</div>