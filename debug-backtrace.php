<?php
/*
Plugin Name: Debug Backtrace
Plugin URI: https://github.com/upandrii/debug-backtrace
Description: Shows backtrace for PHP Notices to help identify early translation or execution errors.
Version: 1.0.0
Author: Andrii Shuliak
License: GPL2
*/


if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (!class_exists('Debug_Backtrace')) {

    class Debug_Backtrace {

        /**
         * Plugin settings
         * @var array
         */
        private $settings = array(
            'show_backtrace' => true,
            'log_to_file' => false,
            'log_to_db' => false,
            'log_to_email' => false,
        );

        /**
         * Construct
         */
        public function __construct() {
            add_action('plugins_loaded', [$this, 'setup']);
            add_action('admin_notices', [$this, 'admin_notice_check_debug']);
        }

        /**
         * Init notice
         */
        public function setup() {
            if(
                $this->settings['show_backtrace']
                && (defined('WP_DEBUG') && WP_DEBUG)
                ) {
                set_error_handler([$this, 'handle_notice']);
            }
        }

        /**
         * Handle notice
         */
        public function handle_notice($errno, $errstr, $errfile, $errline) {
            if (error_reporting() & $errno) {
                echo "<pre>Notice: $errstr\nFile: $errfile\nLine: $errline\n";
                    debug_print_backtrace();
                echo "</pre>";
            }
            return true;
        }

        /**
         * Show admin notice if debug settings are wrong
         */
        public function admin_notice_check_debug() {
            $problems = [];

            if (!defined('WP_DEBUG') || !WP_DEBUG) {
                $problems[] = 'WP_DEBUG is not enabled.';
            }

            if (!defined('WP_DEBUG_DISPLAY') || !WP_DEBUG_DISPLAY) {
                $problems[] = 'WP_DEBUG_DISPLAY is not enabled.';
            }

            if (!(error_reporting() & E_NOTICE)) {
                $problems[] = 'E_NOTICE is not included in error_reporting.';
            }

            if (!empty($problems)) {
                echo '<div class="notice notice-error">';
                echo '<p><strong>Debug Backtrace:</strong></p>';
                echo '<ul>';
                foreach ($problems as $problem) {
                    echo '<li>' . esc_html($problem) . '</li>';
                }
                echo '</ul>';
                echo '</div>';
            }
        }
    }

    $dbon_instance = new Debug_Backtrace();
}