Debug Backtrace

Author: Andrii Shuliak
Version: 1.0.0
License: GPL2
Plugin URI: https://github.com/upandrii/debug-backtrace

⸻

Description

Debug Backtrace is a lightweight WordPress plugin that helps developers diagnose PHP notices by automatically showing a full backtrace.

It is particularly useful for identifying code that triggers errors too early (e.g., before init) or for debugging translation loading issues and other timing-sensitive problems.

⸻

Features
	•	Display full PHP backtrace when a Notice occurs.
	•	Show detailed information: error message, file, line, and function call chain.
	•	Admin panel notification if:
	•	WP_DEBUG is disabled.
	•	WP_DEBUG_DISPLAY is disabled.
	•	E_NOTICE is not included in error_reporting().
	•	Easy to enable/disable via settings inside the code ($settings array).
	•	Minimal performance overhead.

⸻

Requirements
	•	WordPress 5.0 or higher
	•	PHP 7.0 or higher
	•	WP_DEBUG should be enabled in your wp-config.php:

define('WP_DEBUG', true);
define('WP_DEBUG_DISPLAY', true);



⸻

Installation
	1.	Download or clone the plugin repository.
	2.	Upload the debug-backtrace folder into your WordPress site’s /wp-content/plugins/ directory.
	3.	Activate the plugin through the WordPress admin panel (Plugins > Installed Plugins > Debug Backtrace).
	4.	Ensure that WP_DEBUG and WP_DEBUG_DISPLAY are enabled in your wp-config.php file.

⸻

Usage

Once the plugin is activated:
	•	Whenever a PHP Notice occurs, a detailed backtrace will be printed directly on the screen.
	•	If debug settings are incorrectly configured, a warning notice will appear in the WordPress admin dashboard.

You can control plugin behavior by adjusting the $settings array inside the Debug_Backtrace class:

private $settings = array(
    'show_backtrace' => true,
    'log_to_file'    => false,
    'log_to_db'      => false,
    'log_to_email'   => false,
);

(Currently, only show_backtrace is active; other options are reserved for future development.)

⸻

Roadmap
	•	Add option to log notices to file (debug.log).
	•	Add database logging.
	•	Add email notifications for critical notices.
	•	Add admin settings page for easier control.

⸻

License

This plugin is licensed under the GPL2 License.
You can freely use, modify, and distribute it under the same license.

See LICENSE for more details.

⸻

Credits

Developed by Andrii Shuliak.
GitHub Profile

⸻