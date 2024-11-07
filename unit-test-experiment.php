<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://khalinoid.com
 * @since             1.0.0
 * @package           Unit_Test_Experiment
 *
 * @wordpress-plugin
 * Plugin Name:       Unit Test Experiment
 * Plugin URI:        https://khalinoid.com/unit-test
 * Description:       A simple plugin designed as a learning experiment to explore unit testing in WordPress. 
 * Version:           1.0.0
 * Author:            Khalid
 * Author URI:        https://khalinoid.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       unit-test-experiment
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
define( 'UNIT_TEST_EXPERIMENT_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-unit-test-experiment-activator.php
 */
function activate_unit_test_experiment() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-unit-test-experiment-activator.php';
	Unit_Test_Experiment_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-unit-test-experiment-deactivator.php
 */
function deactivate_unit_test_experiment() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-unit-test-experiment-deactivator.php';
	Unit_Test_Experiment_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_unit_test_experiment' );
register_deactivation_hook( __FILE__, 'deactivate_unit_test_experiment' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-unit-test-experiment.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_unit_test_experiment() {

	$plugin = new Unit_Test_Experiment();
	$plugin->run();

}
run_unit_test_experiment();
