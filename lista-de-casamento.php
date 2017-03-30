<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              #
 * @since             1.0.0
 * @package           Lista_De_Casamento
 *
 * @wordpress-plugin
 * Plugin Name:       Lista de Casamento
 * Plugin URI:        #
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            CARLOS EDUARDO ANGELINE
 * Author URI:        #
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       lista-de-casamento
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-lista-de-casamento-activator.php
 */
function activate_lista_de_casamento() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-lista-de-casamento-activator.php';
	Lista_De_Casamento_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-lista-de-casamento-deactivator.php
 */
function deactivate_lista_de_casamento() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-lista-de-casamento-deactivator.php';
	Lista_De_Casamento_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_lista_de_casamento' );
register_deactivation_hook( __FILE__, 'deactivate_lista_de_casamento' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-lista-de-casamento.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_lista_de_casamento() {

	$plugin = new Lista_De_Casamento();
	$plugin->run();

}
run_lista_de_casamento();




