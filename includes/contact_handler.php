<?php
/**
 * Contact form handler
 * Validates and processes contact form submissions
 */

$errors = [];
$success = false;
$formData = [
    'name' => '',
    'email' => '',
    'subject' => '',
    'message' => ''
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $formData['name'] = trim($_POST['name'] ?? '');
    $formData['email'] = trim($_POST['email'] ?? '');
    $formData['subject'] = trim($_POST['subject'] ?? '');
    $formData['message'] = trim($_POST['message'] ?? '');
    
    // Validate name
    if (empty($formData['name'])) {
        $errors['name'] = 'Name is required';
    } elseif (strlen($formData['name']) < 2) {
        $errors['name'] = 'Name must be at least 2 characters';
    } elseif (strlen($formData['name']) > 100) {
        $errors['name'] = 'Name must not exceed 100 characters';
    }
    
    // Validate email
    if (empty($formData['email'])) {
        $errors['email'] = 'Email is required';
    } elseif (!filter_var($formData['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Please enter a valid email address';
    }
    
    // Validate subject
    if (empty($formData['subject'])) {
        $errors['subject'] = 'Subject is required';
    } elseif (strlen($formData['subject']) < 3) {
        $errors['subject'] = 'Subject must be at least 3 characters';
    } elseif (strlen($formData['subject']) > 200) {
        $errors['subject'] = 'Subject must not exceed 200 characters';
    }
    
    // Validate message
    if (empty($formData['message'])) {
        $errors['message'] = 'Message is required';
    } elseif (strlen($formData['message']) < 10) {
        $errors['message'] = 'Message must be at least 10 characters';
    } elseif (strlen($formData['message']) > 2000) {
        $errors['message'] = 'Message must not exceed 2000 characters';
    }
    
    // If no errors, process the form
    if (empty($errors)) {
        // In a real application, you would:
        // 1. Save to database
        // 2. Send email notification
        // 3. Integrate with a mail service
        
        // For demonstration, we'll just log it
        $logMessage = sprintf(
            "[%s] Contact form submission - Name: %s, Email: %s, Subject: %s\n",
            date('Y-m-d H:i:s'),
            $formData['name'],
            $formData['email'],
            $formData['subject']
        );
        error_log($logMessage);
        
        // Try to save to database if connection is available
        try {
            $pdo = getDbConnection();
            if ($pdo) {
                // Create table if it doesn't exist
                $pdo->exec("CREATE TABLE IF NOT EXISTS contact_submissions (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    name VARCHAR(100) NOT NULL,
                    email VARCHAR(255) NOT NULL,
                    subject VARCHAR(200) NOT NULL,
                    message TEXT NOT NULL,
                    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                )");
                
                // Insert submission
                $stmt = $pdo->prepare("INSERT INTO contact_submissions (name, email, subject, message) VALUES (?, ?, ?, ?)");
                $stmt->execute([
                    $formData['name'],
                    $formData['email'],
                    $formData['subject'],
                    $formData['message']
                ]);
            }
        } catch (Exception $e) {
            error_log("Failed to save contact submission: " . $e->getMessage());
        }
        
        $success = true;
        $_SESSION['contact_success'] = true;
        
        // Clear form data on success
        $formData = [
            'name' => '',
            'email' => '',
            'subject' => '',
            'message' => ''
        ];
    }
}
