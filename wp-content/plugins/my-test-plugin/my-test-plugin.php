<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://test.examplework.website
 * @since             1.0.0
 * @package           My_Test_Plugin
 *
 * @wordpress-plugin
 * Plugin Name:       my-test-plugin
 * Plugin URI:        http://test.examplework.website
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Vasyl M.
 * Author URI:        http://test.examplework.website
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       my-test-plugin
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'MY_TEST_PLUGIN_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-my-test-plugin-activator.php
 */
function activate_my_test_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-my-test-plugin-activator.php';
	My_Test_Plugin_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-my-test-plugin-deactivator.php
 */
function deactivate_my_test_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-my-test-plugin-deactivator.php';
	My_Test_Plugin_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_my_test_plugin' );
register_deactivation_hook( __FILE__, 'deactivate_my_test_plugin' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-my-test-plugin.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_my_test_plugin() {

	$plugin = new My_Test_Plugin();
	$plugin->run();

}
run_my_test_plugin();





// регистрируем пользовательский тип записей 'building'
function wptp_create_post_type() {
    $labels = array( 
        'name' => __( 'Building' ),
        'singular_name' => __( 'building' ),
        'add_new' => __( 'New building' ),
        'add_new_item' => __( 'Add New building' ),
        'edit_item' => __( 'Edit building' ),
        'new_item' => __( 'New building' ),
        'view_item' => __( 'View building' ),
        'search_items' => __( 'Search building' ),
        'not_found' =>  __( 'No building Found' ),
        'not_found_in_trash' => __( 'No building found in Trash' ),
    );
    $args = array(
        'labels' => $labels,
        'menu_position' => 5,
        'has_archive' => true,
        'public' => true,
        'hierarchical' => false,
        'supports' => array(
            'title', 
            'editor', 
            'excerpt', 
            'custom-fields', 
            'thumbnail',
            'page-attributes'
        ),
        'taxonomies' => array( 'post_tag', 'category'), 
    );
    register_post_type( 'building', $args );
} 
add_action( 'init', 'wptp_create_post_type' );


// регистрируем таксономию 'district'
function wptp_register_taxonomy() {
    register_taxonomy( 'district_cat', 'building',
        array(
            'labels' => array(
                'name'              => 'Район',
                'singular_name'     => 'район',
                'search_items'      => 'Search район',
                'all_items'         => 'All район',
                'edit_item'         => 'Edit район',
                'update_item'       => 'Update район',
                'add_new_item'      => 'Add New район',
                'new_item_name'     => 'New район Name',
                'menu_name'         => 'Район',
            ),
            'public' => true,
            'has_archive' => true,
            'hierarchical' => true,
            'sort' => true,
            'args' => array( 'orderby' => 'term_order' ),
            'rewrite' => array( 'slug' => 'district' ),
            'show_admin_column' => true,
            'page-attributes' => true
        )
    );
}
add_action( 'init', 'wptp_register_taxonomy' );

function register_my_widgets(){
	register_sidebar( array(
		'name'          => 'Test Sidebar',
		'id'            => "test_sidebar",
	    'before_widget' => '<div id="%1$s" class="widget %2$s">',
	    'after_widget'  => '</div>',
	    'before_title'  => '<h2 class="widgettitle">',
	    'after_title'   => '</h2>' 
	));
}
add_action( 'widgets_init', 'register_my_widgets' );



class trueTopPostsWidget extends WP_Widget {
 
	/*
	 * создание виджета
	 */
	function __construct() {
		parent::__construct(
			'true_top_widget', 
			'Недвижимости', // заголовок виджета
			array( 'description' => 'объект недвижимости' ) // описание
		);
	}
 


	/*
	 * фронтэнд виджета
	 */
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] ); // к заголовку применяем фильтр (необязательно)
		$posts_per_page = $instance['posts_per_page'];
 
		echo $args['before_widget'];
 
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];
 
		$q = new WP_Query("posts_per_page=$posts_per_page&orderby=comment_count");
		if( $q->have_posts() ):
			?><ul><?php

			while( $q->have_posts() ): $q->the_post();
				?><li><a href="<?php the_permalink() ?>"><?php the_title() ?></a></li><?php
			endwhile;

			?></ul><?php
		endif;
	wp_reset_postdata();
	echo $args['after_widget'];

$args = array(
    'post_type'      => 'building',
    'post_status'    => 'publish',
    'posts_per_page' => 10,
);

$query = new WP_Query( $args );

if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
        $query->the_post();
        // Ваш код по выводу поста
        	$args = array('post_type' => 'building', 'posts_per_page' => 1, 'taxonomy' => 'district_cat'  );
	$myposts = get_posts( $args );
	foreach( $myposts as $post ){ setup_postdata($post);
		?>
        <ul><li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li></ul>
		<?php
	}
	wp_reset_postdata();
    }
} else {
    echo 'Ничего не найдено';
}

wp_reset_postdata();
	}
 
	/*
	 * бэкэнд виджета
	 */
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		if ( isset( $instance[ 'posts_per_page' ] ) ) {
			$posts_per_page = $instance[ 'posts_per_page' ];
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Заголовок</label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'posts_per_page' ); ?>">Количество постов:</label> 
			<input id="<?php echo $this->get_field_id( 'posts_per_page' ); ?>" name="<?php echo $this->get_field_name( 'posts_per_page' ); ?>" type="text" value="<?php echo ($posts_per_page) ? esc_attr( $posts_per_page ) : '10'; ?>" size="3" />
		</p>
		<?php 
	}
 
	/*
	 * сохранение настроек виджета
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['posts_per_page'] = ( is_numeric( $new_instance['posts_per_page'] ) ) ? $new_instance['posts_per_page'] : '10'; // по умолчанию выводятся 10 постов
		return $instance;
	}
}
 
/*
 * регистрация виджета
 */
function true_top_posts_widget_load() {
	register_widget( 'trueTopPostsWidget' );
}
add_action( 'widgets_init', 'true_top_posts_widget_load' );





add_shortcode( 'my_short', 'short_func' );

function short_func(){
	 return 'test_short';
}
