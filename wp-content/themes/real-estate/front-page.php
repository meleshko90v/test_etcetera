<?php
/*
Template Name: Home
*/
?>

<?php get_header();?>

<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">
	<?php
		if( $terms = get_terms( array( 'taxonomy' => 'category', 'orderby' => 'name' ) ) ) : 
 
			echo '<select name="categoryfilter"><option value="">Select category...</option>';
			foreach ( $terms as $term ) :
				echo '<option value="' . $term->term_id . '">' . $term->name . '</option>'; // ID of the category as the value of an option
			endforeach;
			echo '</select>';
		endif;
	?>
	<input type="text" name="price_min" placeholder="Min price" />
	<input type="text" name="price_max" placeholder="Max price" />
	<label>
		<input type="radio" name="date" value="ASC" /> Date: Ascending
	</label>
	<label>
		<input type="radio" name="date" value="DESC" selected="selected" /> Date: Descending
	</label>
	<label>
		<input type="checkbox" name="featured_image" /> Only posts with featured images
	</label>
	<button>Apply filter</button>
	<input type="hidden" name="action" value="myfilter">
</form>
<div id="response"></div>

<script type="text/javascript">jQuery(function($){
	$('#filter').submit(function(){
		var filter = $('#filter');
		$.ajax({
			url:filter.attr('action'),
			data:filter.serialize(), // form data
			type:filter.attr('method'), // POST
			beforeSend:function(xhr){
				filter.find('button').text('Processing...'); // changing the button label
			},
			success:function(data){
				filter.find('button').text('Apply filter'); // changing the button label back
				$('#response').html(data); // insert data
			}
		});
		return false;
	});
});</script>

  <?php dynamic_sidebar('test_sidebar'); ?>

<?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'paged' => $paged ,
                'post_type' => 'post',
                'posts_per_page' => '10',
            );
            $MY_QUERY = new WP_Query( $args );
            if ( $MY_QUERY->have_posts() ) :

                while ( $MY_QUERY->have_posts() ) : $MY_QUERY->the_post(); ?>
                <div class="line-element">
                    <div class="line-element-img">
                    <?php the_post_thumbnail();?>
                </div>
                <div class="line-element-text white-color"><h1><?php the_title(); ?></h1></div>
                <div class="line-element-text white-color"><?php the_content(); ?></div>
                <div class="line-element-text white-color"><?php the_excerpt();?></div>       
                <div class="line-element-link">
                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                </div>
                <div class="line-element-rectangle"></div>
                </div>
                <?php endwhile;

            endif; ?>

<?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'paged' => $paged ,
                'post_type' => 'building',
                'posts_per_page' => '10',
            );
            $MY_QUERY = new WP_Query( $args );
            if ( $MY_QUERY->have_posts() ) :

                while ( $MY_QUERY->have_posts() ) : $MY_QUERY->the_post(); ?>
                <div class="line-element">
                    <div class="line-element-img">
                    <?php the_post_thumbnail();?>
                </div>
                <div class="line-element-text white-color"><h1><?php the_title(); ?></h1></div>
                <div class="line-element-text white-color"><?php the_content(); ?></div>
                <div class="line-element-text white-color"><?php the_excerpt();?></div>
                <div class="line-element-text white-color">название дома: <?php the_field('house_name'); ?></div>
                <div class="line-element-text white-color">местонахождения: <?php the_field('location_coordinates'); ?></div>
                <div class="line-element-text white-color">количество этажей: <?php the_field('floor_number'); ?></div>
                <div class="line-element-text white-color">тип строения: <?php the_field('type_of_building'); ?></div>
                <div class="line-element-text white-color">экологичность: <?php the_field('eco_friendly'); ?></div>
                <div class="line-element-text white-color"><?php if( get_field('img123', get_the_id()) ): ?>
                <img src="<?php echo the_field('img123', get_the_id()); ?>" />
                <?php endif; ?>
                </div>
                <div class="line-element-text white-color">
                <?php
                $hero = get_field('room');
                if( $hero ): ?>
                <div id="room">
                <div class="content">площадь: <?php echo $hero['area']; ?> кв.м</div>
                <div class="content">кол.комнат: <?php echo $hero['quantity_of_rooms']; ?></div>
                <div class="content">балкон: <?php echo $hero['balcony']; ?></div>
                <div class="content">санузел: <?php echo $hero['bathroom']; ?></div>
                <img src="<?php echo esc_url( $hero['picture']['url'] ); ?>" alt="<?php echo esc_attr( $hero['picture']['alt'] ); ?>" />
                </div>
                <?php endif; ?>
                </div>
                <div class="line-element-link">
                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                </div>
                <div class="line-element-rectangle"></div>
                </div>
                <?php endwhile;

                endif; ?>

<!-- content -->
			<div id="content"><div class="inner_copy"><div class="inner_copy">All <a href="" title="Best Magento Templates">premium Magento themes</a> at magentothemesworld.com!</div></div>
<!-- box begin -->
				<div class="box">
					<div class="bg">
						<div class="extra-bg">
							<div class="inner">
								<div class="img-indent">
									<img alt="" src="<?php echo get_template_directory_uri()?>/assets/images/1page-img1.jpg" />
									<h1>Welcome to Our Company!</h1>
									<p>Architecture is a free websites template created by Templates.com team. This website template is optimized for 1024 X 768 screen resolution. It is also XHTML &amp; CSS valid.</p>
									<p>The website template goes with two packages – with PSD source files and without them. PSD source files are avail- able for free for the registered members of Templates.com. The basic package (without PSD is available for anyone without registration).</p>
									This website template has several pages: Home, About us, Article (with Article page), Contact us (note that con-tact us form – doesn’t work), Site
								</div>
							</div>
						</div>
					</div>
					<div class="bottom"></div>
				</div>
<!-- box end -->
				<div class="indent">
					<div class="wrapper">
						<div class="col-1">
							<h2>Our Services</h2>
							<ul>
								<li><a href="#">Sed ut perspiciatis unde</a></li>
								<li><a href="#">Omnis iste natus error</a></li>
								<li><a href="#">Sit voluptatem accusantium</a></li>
								<li><a href="#">Doloremque laudantium</a></li>
								<li><a href="#">Totam rem aperiam</a></li>
								<li><a href="#">Eaque ipsa quae ab illo</a></li>
								<li><a href="#">Inventore veritatis et quasi</a></li>
								<li><a href="#">Architecto beatae vitae</a></li>
								<li><a href="#">Dicta sunt explicabo</a></li>
								<li><a href="#">Nemo enimpsam volutem</a></li>
							</ul>
						</div>
						<div class="col-2">
							<h2>Recent Articles</h2>
							<ul class="img-list">
								<li>
									<img alt="" src="<?php echo get_template_directory_uri()?>/assets/images/1page-img2.png" class="png" /><h3><a href="#">Modern Trends in Architecture</a></h3>
									Here we present you the latest and the most progressive trends in the modern architecture. Among them you will certainly find your inspiration!
								</li>
								<li>
									<img alt="" src="<?php echo get_template_directory_uri()?>/assets/images/1page-img2.png" class="png" /><h3><a href="about-us.html">About Architecture Template</a></h3>
									Free 1028X768 Optimized Website Template from Templates.com! We really hope that you like this template and will use for your websites.
								</li>
								<li>
									<img alt="" src="<?php echo get_template_directory_uri()?>/assets/images/1page-img2.png" class="png" /><h3><a href="#">Various Architectural Styles</a></h3>
									In this sample article you will find interesting information about various styles in architecture.
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>		
<?php get_footer();?>