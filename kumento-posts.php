<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://kumento.com/
 * @since             1.0.0
 * @package           Kumento_Posts
 *
 * @wordpress-plugin
 * Plugin Name:       Kumento Posts
 * Plugin URI:        https://kumento.com/
 * Description:       Display posts from Kumento Content
 * Version:           1.0.0
 * Author:            Ulrik Vander
 * Author URI:        https://kumento.com//
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       kumento-posts
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
define( 'KUMENTO_POSTS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-kumento-posts-activator.php
 */
function activate_kumento_posts() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-kumento-posts-activator.php';
	Kumento_Posts_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-kumento-posts-deactivator.php
 */
function deactivate_kumento_posts() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-kumento-posts-deactivator.php';
	Kumento_Posts_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_kumento_posts' );
register_deactivation_hook( __FILE__, 'deactivate_kumento_posts' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-kumento-posts.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_kumento_posts() {

	$plugin = new Kumento_Posts();
	$plugin->run();

}
run_kumento_posts();
