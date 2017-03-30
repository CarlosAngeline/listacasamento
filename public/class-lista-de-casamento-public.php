<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       #
 * @since      1.0.0
 *
 * @package    Lista_De_Casamento
 * @subpackage Lista_De_Casamento/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Lista_De_Casamento
 * @subpackage Lista_De_Casamento/public
 * @author     CARLOS EDUARDO ANGELINE <edu_fecap@hotmail.com>
 */
class Lista_De_Casamento_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Lista_De_Casamento_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Lista_De_Casamento_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/lista-de-casamento-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Lista_De_Casamento_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Lista_De_Casamento_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/lista-de-casamento-public.js', array( 'jquery' ), $this->version, false );

	}

	//Criar o post type produtos
	
	function create_register_produtos() { 
		register_post_type( 'Produtos',
			array(
				'labels' => array(
					'name' => 'Produtos',
					'singular_name' => 'Produto',
					'add_new' => 'Add New Produto',
					'add_new_item' => 'Add New Produto',
					'edit' => 'Edit',
					'edit_item' => 'Edit Produto',
					'new_item' => 'New Produto',
					'view' => 'View',
					'view_item' => 'View Produto',
					'search_items' => 'Search Produto',
					'not_found' => 'No Produto found',
					'not_found_in_trash' => 'No Produto found in Trash',
					'parent' => 'Parent Produto'
				),
	
				'public' => true,
				'menu_position' => 4,
				'supports' => array( 'title' ),
				'taxonomies' => array( '' ),
				'has_archive' => true
			)
		);
	}

//Criar o post type Noivos

	function create_register_noivos() { 
		register_post_type( 'Noivos',
			array(
				'labels' => array(
					'name' => 'Noivos',
					'singular_name' => 'Noivo',
					'add_new' => 'Add New',
					'add_new_item' => 'Add New Noivo',
					'edit' => 'Edit',
					'edit_item' => 'Edit Noivo',
					'new_item' => 'New Noivo',
					'view' => 'View',
					'view_item' => 'View Noivo',
					'search_items' => 'Search Noivos',
					'not_found' => 'No Noivos found',
					'not_found_in_trash' => 'No Noivos found in Trash',
					'parent' => 'Parent Noivos'
				),
	
				'public' => true,
				'menu_position' => 3,
				'supports' => array( 'title' ),
				'taxonomies' => array( '' ),
				'has_archive' => true
			)
		);
	}


/* Listar Noivos */

	public function listar_Noivos( $atts ) {

		// Attributes
		extract( shortcode_atts(
			array(
				'single_url' => '',
			),
			$atts ) );

		$args = array( 
			'post_type' 	 => 'noivos', 
			'posts_per_page' => 10 
		);

		ob_start();

		$loop = new WP_Query( $args );

		if ( $loop->have_posts() ) :
			while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<h2>
					<a href="<?php echo esc_url( $single_url . '?noivos=' . get_the_ID() ); ?>">
						<?php the_title(); ?>
					</a>
				</h2>
			<?php endwhile;
		endif; 

		$output = ob_get_clean();

		wp_reset_postdata();
		
		return $output;
	}


/* Listar produtos */

	public function listar_Produtos( $atts ) {

		// Attributes
		extract( shortcode_atts(
			array(
				'single_url' => '',
			),
			$atts ) );

		$args = array( 
			'post_type' 	 => 'produtos', 
			'posts_per_page' => 10 
		);

		ob_start();

		$loop = new WP_Query( $args );

		if ( $loop->have_posts() ) :
			while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<h2>
					<a href="<?php echo esc_url( $single_url . '?produto=' . get_the_ID() ); ?>">
						<?php the_title(); ?>
					</a>
				</h2>
			<?php endwhile;
		endif; 

		$output = ob_get_clean();

		wp_reset_postdata();
		
		return $output;
	}



	


}