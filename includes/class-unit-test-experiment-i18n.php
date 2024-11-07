<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://khalinoid.com
 * @since      1.0.0
 *
 * @package    Unit_Test_Experiment
 * @subpackage Unit_Test_Experiment/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Unit_Test_Experiment
 * @subpackage Unit_Test_Experiment/includes
 * @author     Khalid <khalinoid@gmail.com>
 */
class Unit_Test_Experiment_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'unit-test-experiment',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
