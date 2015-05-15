<?php
if($title == 'Index')
{
	echo '<div class="content_top">';
}
else
{
	echo '<div class="about_top">';
}
?>
	<div class="container">
		<div class="col-md-3">
			<ul class="menu1">
				<li class="item1"><a href="#" class="">Admin Jobs<img class="arrow-img" src="assets/images/arrow.png" alt=""/> </a>
					<ul class="cute" style="display: none; overflow: hidden;">
						<li class="subitem1"><a href="<?php echo base_url('sales');?>">Add Items</a></li>
						<li class="subitem2"><a href="<?php echo base_url('manageItems');?>">Manage Items</a></li>
						<li class="subitem3"><a href="<?php echo base_url('addAdmin');?>">Add Admin</a></li>
					</ul>
		         </li>
			 </ul>
			<!--initiate accordion-->
		<script type="text/javascript">
			$(function() {
			    var menu1_ul = $('.menu1> li > ul'),
			           menu1_a  = $('.menu1 > li > a');
			    menu1_ul.hide();
			    menu1_a.click(function(e) {
			        e.preventDefault();
			        if(!$(this).hasClass('active')) {
			            menu1_a.removeClass('active');
			            menu1_ul.filter(':visible').slideUp('normal');
			            $(this).addClass('active').next().stop(true,true).slideDown('normal');
			        } else {
			            $(this).removeClass('active');
			            $(this).next().stop(true,true).slideUp('normal');
			        }
			    });
			
			});
		</script>
		<div class="box1">
			<ul class="box1_list">
				<li><a href="<?php echo base_url('admin');?>">Add Items</a></li>
				<li><a href="<?php echo base_url('manageItems');?>">Manage Items</a></li>
				<li><a href="<?php echo base_url('addAdmin');?>">Add Admin</a></li>
			</ul>
		</div>
		</div>
		<div class="col-md-9 content_right">
		   <!--
		   <div class="client_box">
			<ul class="clients">
				<li><img src="assets/images/c1.png" class="img-responsive" alt=""/></li>
				<li><img src="assets/images/c2.png" class="img-responsive" alt=""/></li>
				<li><img src="assets/images/c3.png" class="img-responsive" alt=""/></li>
				<li><img src="assets/images/c4.png" class="img-responsive" alt=""/></li>
			</ul>
		   </div>
		   -->