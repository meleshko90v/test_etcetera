<?php
/*
*Template part for displaying page content in single-my-template-building
*/
?>

<?php get_header();?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
<!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

                <div class="line-element">
                    <div class="line-element-img">
                    <?php the_post_thumbnail();?>
                </div>
                <div class="line-element-text white-color"><?php the_content(); ?></div>
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
                <div class="line-element-text white-color">краткое содержание: <?php the_excerpt();?></div>
                </div>
                <?php endif; ?>
                </div>
                <div class="line-element-link">
                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                </div>
                <div class="line-element-rectangle"></div>
                </div>

	<footer class="entry-footer">
		<?php real_estate_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
<div>

    
<?php
get_sidebar();
get_footer();