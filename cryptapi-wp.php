<?php
/*
	Plugin Name: Crypt Api
	Description: An Easy Way to Generate Crypto Wallet
	Author: Pedroxam
	Author URI: https://github.com/Pedroxam/cryptoapi-wp-plugin
	Version: 1.0
*/

if ( !function_exists( 'add_action' ) ) {
	exit('Wrong ?!');
}


class CryptoApi
{
    /**
     *  constructor.
     */
    public function __construct()
    {
		// Set plugin constants
		$this->set_plugin_constants();
		
		// Set default callback
		$this->set_plugin_callback();
		
		// Activate plugin when is added
		add_action( 'activated_plugin', array( $this, 'activate_new_site' ) );
		
		// Admin assets hook
        add_action('admin_enqueue_scripts', array($this, 'cryptapi_assets'),99 );
		
		// User assets hook
        add_action('wp_enqueue_scripts', array($this, 'cryptapi_assets'),99 );
		
		// Menu hook
        add_action('admin_menu', array($this, 'add_menu'));
		
		// Shortcode hook
        add_shortcode('cryptapi', array($this, 'add_shortcode'));
    }

	/**
	 * Plugin constants
	 */
    public function set_plugin_constants()
    {
		// Path/URL to root of this plugin, with trailing slash.
		if ( ! defined( 'CRYPT_PATH' ) ) {
			define( 'CRYPT_PATH', plugin_dir_path( __FILE__ ) );
		}
		if ( ! defined( 'CRYPTO_URL' ) ) {
			define( 'CRYPTO_URL', plugin_dir_url( __FILE__ ) );
		}
    }

	/**
	 * Plugin callback
	 */
    public function set_plugin_callback()
    {
		if(
			isset($_GET[get_option('cryptapi_secret_callback')]) 
			or
			isset($_POST[get_option('cryptapi_secret_callback')])
		)
		{
			global $wpdb;

			$table_name = $wpdb->prefix . '_cryptapi_logs';
			
			$req = trim($_SERVER['REQUEST_METHOD']);
			
			if($req == 'POST')
				$method = $_POST;
			else
				$method = $_GET;
			
			$str = '';
			
			foreach($method as $key => $val){
			  $str .= $key . " : " . $val;
			}

			$wpdb->insert( 
				$table_name, 
				array( 
					'time' => current_time( 'mysql' ), 
					'queries' => $str
				) 
			);
		}
    }

	/**
	 Active new site
	 */
    public function activate_new_site()
    {
		if(!get_option('cryptapi_added')){
			self::add_plugin_tables();
		}
		else {
			update_option('cryptapi_added', true);
			update_option('cryptapi_secret_callback', 'c_' . rand());
		}
		
		 // Redirect to the help page
		if( ! wp_doing_ajax() ) {
			exit( wp_redirect( admin_url( 'admin.php?page=cryptapi/help' ) ) );
		}
    }
	
	/**
	 * Add plugin tables
	 */
    private static function add_plugin_tables()
    {
		global $wpdb;

		$table_name = $wpdb->prefix . "_cryptapi_logs";
	   
		$charset_collate = $wpdb->get_charset_collate();

		$sql = "CREATE TABLE $table_name (
		  id mediumint(9) NOT NULL AUTO_INCREMENT,
		  time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		  queries varchar(255) DEFAULT '' NOT NULL,
		  PRIMARY KEY (id)
		) $charset_collate;";
		
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		
		dbDelta( $sql );
    }
	
	/**
	 * Plugin assets
	 */
    public function cryptapi_assets()
    {
        wp_enqueue_style( 'crypt.api', CRYPTO_URL.'style.css');
    }

	/**
	 * Register management page
	 */
    public function add_menu()
    {
		add_menu_page('CryptApi', 'CryptApi', 'manage_options', 'cryptapi');
		add_submenu_page( 'cryptapi', 'Help', 'Help',
			'manage_options', 'cryptapi', array($this, 'main_interface'));
		add_submenu_page( 'cryptapi', 'Logs', 'Logs',
			'manage_options', 'cryptapi/logs', array($this, 'main_interface_logs'));
    }

    /**
     * Menu interface
     */
    public function main_interface()
    {
        require_once CRYPT_PATH . '/inc/help.php';
    }

    /**
     * Menu interface
     */
    public function main_interface_logs()
    {
        require_once CRYPT_PATH . '/inc/logs.php';
    }

	/**
	 * Register shortcode
	 */
    public function add_shortcode($args = [])
    {
        require_once CRYPT_PATH . '/inc/shortcode.php';
    }
}

//Start System
$weekly = new CryptoApi();
