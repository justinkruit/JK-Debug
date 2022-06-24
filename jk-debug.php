<?php

/**
 * Plugin Name:  JK Debug
 * Plugin URI:   https://github.com/justinkruit/jk-debug/
 * Description:  Debug for WordPress
 *
 * Version:      1.0.0
 *
 * Author:       Justin Kruit
 * Author URI:   https://justinkruit.com
 */
?>

<?php

require_once plugin_dir_path(__FILE__) . 'vendor/autoload.php';

$firephp = FirePHP::getInstance(true);

$firephp->fb('dsfd', 'dff');


class Debug {

  protected static $instance;

  	/**
	 * Method to return the Monolog instance
	 *
	 * @return FirePHP
	 */
  static public function getDebugger() {
    if (!self::$instance) {
      self::configureInstance();
    }

    return self::$instance;
  }

  /**
   * Configure Monolog to use a rotating files system.
   *
   * @return FirePHP
   */
  protected static function configureInstance() {
    $firephp = FirePHP::getInstance(true);
    self::$instance = $firephp;
  }

  public static function debugger($object) {
   return self::getDebugger()->fb($object);
  }

  public static function info($object, $label = null, $options = array()) {
    self::getDebugger()->info($object, $label, $options);
  }
}
