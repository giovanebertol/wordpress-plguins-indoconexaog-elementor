<?php
/**
 * Plugin Name: Indoconexaog Elementor
 * Description: Create unlimited widgets with Elementor Page Builder.
 * Plugin URI:  https:/conexaogtecnologia.com.br/indo/
 * Version:     1.0.0
 * Author:      Conexaog  Tecnologia
 * Author URI:  https:/conexaogtecnologia.com.br/indo
 * Text Domain: conexaog-elementor
 * Domain Path: /languages/
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
/**
 * Main Conexao G Elementor Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */
final class ConexaogElementor {

	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 *
	 * @var string The plugin version.
	 */
	const VERSION = '1.0.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum Elementor version required to run the plugin.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '5.5';

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @static
	 *
	 * @var ConexaogElementor The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @static
	 *
	 * @return ConexaogElementor An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {

		add_action( 'init', [ $this, 'i18n' ] );
		add_action( 'plugins_loaded', [ $this, 'init' ] );

	}

	/**
	 * Load Textdomain
	 *
	 * Load plugin localization files.
	 *
	 * Fired by `init` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function i18n() {

		load_plugin_textdomain( 'conexaog-elementor' );

	}

	/**
	 * Initialize the plugin
	 *
	 * Load the plugin only after Elementor (and other plugins) are loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed load the files required to run the plugin.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init() {

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}

		add_action( 'elementor/init', [ $this, 'add_elementor_category' ], 1 );

		// Add Plugin actions
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'register_frontend_scripts' ], 10 );

		// Register Widget Styles
		add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'register_frontend_styles' ] );

		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );

		// Register controls
		//add_action( 'elementor/controls/controls_registered', [ $this, 'register_controls' ] );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'conexaog-elementor' ),
			'<strong>' . esc_html__( 'Indoconexaog Elementor', 'conexaog-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'conexaog-elementor' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'conexaog-elementor' ),
			'<strong>' . esc_html__( 'Indoconexaog Elementor', 'conexaog-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'conexaog-elementor' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'conexaog-elementor' ),
			'<strong>' . esc_html__( 'Indoconexaog Elementor', 'conexaog-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'conexaog-elementor' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Add Elementor category.
	 */
	public function add_elementor_category() {
    	\Elementor\Plugin::instance()->elements_manager->add_category('conexaog-elementor',
	      	array(
					'title' => __( 'Indoconexaog Elementor', 'conexaog-elementor' ),
					'icon'  => 'fa fa-plug',
	      	) 
	    );
	}

	/**
	* Register Frontend Scripts
	*
	*/
	public function register_frontend_scripts() {
	wp_register_script( 'conexaog-elementor', plugin_dir_url( __FILE__ ) . 'assets/js/conexaog-elementor.js', array( 'jquery' ), self::VERSION );
	}


	/**
	* Register Frontend styles
	*
	*/
	public function register_frontend_styles() {
	wp_register_style( 'conexaog-elementor', plugin_dir_url( __FILE__ ) . 'assets/css/conexaog-elementor.css', self::VERSION );
	}




	/**
	 * Init Widgets
	 *
	 * Include widgets files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init_widgets() { 

		// Include Widget files
		require_once plugin_dir_path( __FILE__ ) . 'widgets/slider-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/about-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/services.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/projects.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/interior-area.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/work-process.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/testimonial.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/cta-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/blog-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/slider-2-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/page-banner-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/about-2.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/achievements.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/team.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/faq.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/contact-banner.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/contact-widget.php';		
		require_once plugin_dir_path( __FILE__ ) . 'widgets/project-details-1.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/project-details-2.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/gallery-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/single-project-types.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/related-projects.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/project-details-slider.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/project-details-3.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/slider-post-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/empreendimentos-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/empreendimentos-retrato-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/empreendimentos-destaques-widget.php';		
		require_once plugin_dir_path( __FILE__ ) . 'widgets/image-text-widget.php';		
		require_once plugin_dir_path( __FILE__ ) . 'widgets/NewsletterWidget.php';		
		require_once plugin_dir_path( __FILE__ ) . 'widgets/class-blog-cards-soft.php';		
		require_once plugin_dir_path( __FILE__ ) . 'widgets/hero-about-banner.php';		
		require_once plugin_dir_path( __FILE__ ) . 'widgets/timeline-veritical.php';		
		require_once plugin_dir_path( __FILE__ ) . 'widgets/timeline-years.php';		

		
		// Register widget
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ConexaogElementor\Widget\BdevsSlider() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ConexaogElementor\Widget\BdevsAbout() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ConexaogElementor\Widget\BdevsServices() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ConexaogElementor\Widget\BdevsProjects() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ConexaogElementor\Widget\BdevsInteriorArea() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ConexaogElementor\Widget\BdevsWorkProcess() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ConexaogElementor\Widget\BdevsTestimonial() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ConexaogElementor\Widget\BdevsCTA() );		
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ConexaogElementor\Widget\BdevsBlog() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ConexaogElementor\Widget\BdevsSlider2() );		
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ConexaogElementor\Widget\BdevsPageBanner() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ConexaogElementor\Widget\BdevsAbout2() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ConexaogElementor\Widget\BdevsAchievements() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ConexaogElementor\Widget\BdevsTeam() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ConexaogElementor\Widget\BdevsFAQ() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ConexaogElementor\Widget\BdevsContactBanner() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ConexaogElementor\Widget\BdevsContact() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ConexaogElementor\Widget\BdevsProjectDetails1() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ConexaogElementor\Widget\BdevsProjectDetails2() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ConexaogElementor\Widget\BdevsGallery() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ConexaogElementor\Widget\BdevsSingleProjectTypes() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ConexaogElementor\Widget\BdevsRelatedProjects() );		
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ConexaogElementor\Widget\BdevsProjectDetailsSlider() );		
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ConexaogElementor\Widget\BdevsProjectDetails3() );		
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ConexaogElementor\Widget\SliderPostWidget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ConexaogElementor\Widget\EmpreendimentosWidget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ConexaogElementor\Widget\EmpreendimentosRetratoWidget () );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ConexaogElementor\Widget\EmpreendimentosDestaquesWidget () );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ConexaogElementor\Widget\ImageTextWidget () );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ConexaogElementor\Widget\NewsletterWidget () );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ConexaogElementor\Widget\BlogCardsSoft () );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ConexaogElementor\Widget\HeroAboutBanner () );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ConexaogElementor\Widget\TimelineVertical () );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ConexaogElementor\Widget\TimelineYears () );
	}

	/** 
	 * register_controls description
	 * @return [type] [description]
	 */
	public function register_controls() {

		$controls_manager = \Elementor\Plugin::$instance->controls_manager;
		$controls_manager->register_control( 'slider-widget', new Test_Control1() );
	
	}

	/**
	 * Prints the Elementor Page content.
	 */
	public static function get_content( $id = 0 ) {
		if ( class_exists( '\ElementorPro\Plugin' ) ) {
			echo do_shortcode( '[elementor-template id="' . $id . '"]' );
		} else {
			echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $id );
		}
	}

}

ConexaogElementor::instance();
