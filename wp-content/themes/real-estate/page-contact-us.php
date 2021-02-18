<?php
/*
Template Name: Contact Us
*/
?>
<?php get_header();?>
<!-- content -->
			<div id="content"><div class="inner_copy"><div class="inner_copy">All <a href="http://www.magentothemesworld.com" title="Best Magento Templates">premium Magento themes</a> at magentothemesworld.com!</div></div>
<!-- box begin -->
				<div class="box">
					<div class="bg">
						<div class="extra-bg">
							<div class="inner">
								<div class="img-indent">
									<img alt="" src="<?php echo get_template_directory_uri()?>/assets/images/5page-img1.jpg" /><h1>Contact Us</h1>
									You are supposed to place some contact infromation on this page. You may place a map here with some instructions on how to get to your office or just a contact form. You are supposed to place some contact infromation on this page. You may place a map here with some instructions on how to get to your office or just a contact form. Note that the contact form below is not working.
								</div>
							</div>
						</div>
					</div>
					<div class="bottom"></div>
				</div>
<!-- box end -->
				<div class="indent">
					<h2>Contact Form</h2>
					<form id="contacts-form" action="" method="post">
						<fieldset>
							<div class="field"><label>Your Name:</label><input type="text" value=""/></div>
							<div class="field"><label>Your E-mail:</label><input type="text" value=""/></div>
							<div class="field"><label>Your Website:</label><input type="text" value=""/></div>
							<div class="field"><label>Your Message:</label><textarea cols="1" rows="1"></textarea></div>
							<div class="alignright">
								<a href="#" onclick="document.getElementById('contacts-form').submit()" class="link">Send Your Message!</a>
							</div>
						</fieldset>
					</form>
				</div>
			</div>

<?php get_footer();?>