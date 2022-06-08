<?php
 
/**
 * Template loader for SB Popup Cart Ajax.
 *
 */
class SBPCA_Template_Loader extends Gamajo_Template_Loader {
 
	/**
	 * Prefix for filter names.
	 *
	 * @since 1.0.0
	 * @type string
	 */
	protected $filter_prefix = PLUGIN_PREFIX_SBCPA;
 
	/**
	 * Directory name where custom templates for this plugin should be found in the theme.
	 *
	 * @since 1.0.0
	 * @type string
	 */
	protected $theme_template_directory = THEME_TEMPLATE_URL_SBCPA;
 
	/**
	 * Reference to the root directory path of this plugin.
	 *
	 * @since 1.0.0
	 * @type string
	 */
	protected $plugin_directory = PLUGIN_PATH_SBCPA;

	public function test(){
		return $this->$plugin_directory;
	}
 
}