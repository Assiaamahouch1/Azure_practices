<?php
/**
 * Database configuration
 * Supports both MySQL and Azure SQL Database
 */

// Database configuration from environment variables
define('DB_HOST', getenv('DB_HOST') ?: 'localhost');
define('DB_NAME', getenv('DB_NAME') ?: 'azure_php_db');
define('DB_USER', getenv('DB_USER') ?: 'root');
define('DB_PASS', getenv('DB_PASSWORD') ?: '');
define('DB_CHARSET', 'utf8mb4');

/**
 * Get database connection
 * @return PDO|null
 */
function getDbConnection() {
    static $pdo = null;
    
    if ($pdo === null) {
        try {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            
            $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
        } catch (PDOException $e) {
            if (APP_DEBUG) {
                die("Database connection failed: " . $e->getMessage());
            } else {
                error_log("Database connection failed: " . $e->getMessage());
                return null;
            }
        }
    }
    
    return $pdo;
}

/**
 * Test database connection
 * @return bool
 */
function testDbConnection() {
    try {
        $pdo = getDbConnection();
        if ($pdo) {
            $stmt = $pdo->query('SELECT 1');
            return $stmt !== false;
        }
        return false;
    } catch (Exception $e) {
        error_log("Database test failed: " . $e->getMessage());
        return false;
    }
}
