<?php

/**
 * Fired during plugin activation
 *
 * @link       http://test.examplework.website
 * @since      1.0.0
 *
 * @package    My_Test_Plugin
 * @subpackage My_Test_Plugin/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    My_Test_Plugin
 * @subpackage My_Test_Plugin/includes
 * @author     Vasyl M. <v.meleshko90@gmail.com>
 */
class My_Test_Plugin_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

	}

}


<?php get_header(); ?>
 
    <div id="main-content" class="main-content">
 
    <div id="primary" class="content-area">
        <div id="content" class="site-content" role="main">
 
            <header class="archive-header">
                <h1 class="archive-title">
                    <?php post_type_Building(); ?>
                </h1>
            </header><!-- .archive-header -->
             
                         
        </div><!-- #content -->
    </div><!-- #primary -->
    <?php get_sidebar( 'content' ); ?>
</div><!-- #main-content -->
 
<?php
get_sidebar();
get_footer();

<?php //начало выборки терминов для таксономии district_cat
 $terms = get_terms( 'district_cat', array(
    'orderby'    => 'count',
    'hide_empty' => 0
 ) );
 ?>



<?php
// теперь выполняется запрос для каждого семейства
foreach( $terms as $term ) {
 
    // Определение запроса
    $args = array(
        'post_type' => 'building',
        'district_cat' => $term->slug
    );
    $query = new WP_Query( $args );
             
    // вывод названий записей в тегах заголовков
     echo'<h2>' . $term->name . '</h2>';
     
    // вывод списком заголовков записей
    echo '<ul>';
     
        // Начало цикла
        while ( $query->have_posts() ) : $query->the_post(); ?>
 
        <li class="building-listing" id="post-<?php the_ID(); ?>">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </li>
         
        <?php endwhile;
     
    echo '</ul>';
     
    // используем сброс данных записи, чтобы восстановить оригинальный запрос
    wp_reset_postdata();
 
} ?>