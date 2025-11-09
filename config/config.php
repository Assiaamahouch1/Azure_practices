<?php
/**
 * Configuration file
 * Loads environment variables and defines application constants
 */

// Application settings
define('APP_NAME', getenv('APP_NAME') ?: 'Azure PHP Web App');
define('APP_ENV', getenv('APP_ENV') ?: 'production');
define('APP_DEBUG', getenv('APP_DEBUG') === 'true');

// Base URL
define('BASE_URL', getenv('BASE_URL') ?: '/');

// Email settings (for contact form)
define('CONTACT_EMAIL', getenv('CONTACT_EMAIL') ?: 'contact@example.com');

// Timezone
date_default_timezone_set('UTC');

// Error reporting
if (APP_DEBUG) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}
