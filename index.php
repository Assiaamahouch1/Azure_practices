<?php
/**
 * Main index file - Entry point for the PHP web application
 * Handles routing and page rendering
 */

// Start session
session_start();

// Load configuration
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/database.php';

// Get the requested page from URL
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// Sanitize the page parameter
$page = preg_replace('/[^a-zA-Z0-9_-]/', '', $page);

// Define valid pages
$validPages = ['home', 'about', 'contact'];

// Check if page is valid
if (!in_array($page, $validPages)) {
    $page = 'home';
}

// Handle contact form submission
if ($page === 'contact' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once __DIR__ . '/includes/contact_handler.php';
}

// Include header
include __DIR__ . '/includes/header.php';

// Include the requested page
$pageFile = __DIR__ . '/pages/' . $page . '.php';
if (file_exists($pageFile)) {
    include $pageFile;
} else {
    include __DIR__ . '/pages/home.php';
}

// Include footer
include __DIR__ . '/includes/footer.php';
