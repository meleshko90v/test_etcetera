<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package real_estate
 */

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Home - Home Page | Architecture - Free Website Template from Templates.com </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta name="description" content="Place your description here" />
<meta name="keywords" content="put, your, keyword, here" />
<meta name="author" content="Templates.com - website templates provider" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="layout.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 8]>
	<link href="ie_style.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if lte IE 7]>
	<script type="text/javascript" src="js/ie_png.js"></script>
	<script type="text/javascript">
	  ie_png.fix('.png, .box .bg, .box .extra-bg, .box .bottom, #content.top-bg')
	</script>
<![endif]-->
<?php wp_head(); ?>
</head>
<body id="page1">
<div class="tail-top">
	<div class="tail-bottom">
		<div id="main">
<!-- header -->
			<div id="header">
				<div class="row-1">
					 <?php wp_nav_menu(array(
                      'menu_id' 	=> '',
                      'menu_class'	=> 'nav',
                      'container'	=> '',
                      'items_wrap'	=> '<ul id="%1$s" class="%2$s">%3$s</ul>'
                      ));
                      ?>
				</div>
				<div class="row-2">
					<div class="indent">
						<a href="<?php echo home_url();?>"><img alt="" src="<?php echo get_template_directory_uri()?>/assets/images/logo.jpg" /></a>
					</div>
				</div>
				<div class="row-3">
					<div class="slogan">
						<span class="style1">We Build</span>
						<span class="style2">The Future </span>
						<span class="style3">For You!</span>
					</div>
				</div>
			</div>