<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple PHP App on Azure</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            padding: 40px;
            max-width: 800px;
            width: 100%;
        }
        h1 {
            color: #667eea;
            margin-bottom: 30px;
            text-align: center;
            font-size: 2.5em;
        }
        .info-section {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin: 20px 0;
        }
        .info-section h2 {
            color: #764ba2;
            margin-bottom: 15px;
            font-size: 1.5em;
        }
        .info-item {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #e0e0e0;
        }
        .info-item:last-child {
            border-bottom: none;
        }
        .info-label {
            font-weight: bold;
            color: #555;
        }
        .info-value {
            color: #333;
            text-align: right;
        }
        .success-message {
            background: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 10px;
            margin: 20px 0;
            border: 1px solid #c3e6cb;
            text-align: center;
            font-weight: bold;
        }
        .form-section {
            margin: 20px 0;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 2px solid #e0e0e0;
            border-radius: 5px;
            font-size: 16px;
        }
        input[type="text"]:focus {
            outline: none;
            border-color: #667eea;
        }
        button {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: transform 0.2s;
        }
        button:hover {
            transform: translateY(-2px);
        }
        .greeting {
            background: #e7f3ff;
            color: #004085;
            padding: 15px;
            border-radius: 10px;
            margin: 20px 0;
            border: 1px solid #b8daff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🚀 Simple PHP App on Azure</h1>
        
        <div class="success-message">
            ✅ PHP Application Successfully Deployed on Azure Web App!
        </div>

        <?php
        // Handle form submission
        $greeting = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['name'])) {
            $name = htmlspecialchars($_POST['name']);
            $greeting = "Hello, " . $name . "! Welcome to Azure Web App! 👋";
        }
        
        if ($greeting): ?>
            <div class="greeting">
                <strong><?php echo $greeting; ?></strong>
            </div>
        <?php endif; ?>

        <div class="form-section">
            <h2 style="color: #764ba2; margin-bottom: 15px;">Try the Interactive Form</h2>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="name">Enter your name:</label>
                    <input type="text" id="name" name="name" placeholder="Your name here..." required>
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>

        <div class="info-section">
            <h2>📊 Server Information</h2>
            <div class="info-item">
                <span class="info-label">PHP Version:</span>
                <span class="info-value"><?php echo phpversion(); ?></span>
            </div>
            <div class="info-item">
                <span class="info-label">Server Software:</span>
                <span class="info-value"><?php echo $_SERVER['SERVER_SOFTWARE'] ?? 'N/A'; ?></span>
            </div>
            <div class="info-item">
                <span class="info-label">Server Name:</span>
                <span class="info-value"><?php echo $_SERVER['SERVER_NAME'] ?? 'localhost'; ?></span>
            </div>
            <div class="info-item">
                <span class="info-label">Document Root:</span>
                <span class="info-value"><?php echo $_SERVER['DOCUMENT_ROOT'] ?? 'N/A'; ?></span>
            </div>
            <div class="info-item">
                <span class="info-label">Current Time:</span>
                <span class="info-value"><?php echo date('Y-m-d H:i:s'); ?></span>
            </div>
        </div>

        <div class="info-section">
            <h2>🔧 PHP Configuration</h2>
            <div class="info-item">
                <span class="info-label">Max Execution Time:</span>
                <span class="info-value"><?php echo ini_get('max_execution_time'); ?>s</span>
            </div>
            <div class="info-item">
                <span class="info-label">Memory Limit:</span>
                <span class="info-value"><?php echo ini_get('memory_limit'); ?></span>
            </div>
            <div class="info-item">
                <span class="info-label">Upload Max Filesize:</span>
                <span class="info-value"><?php echo ini_get('upload_max_filesize'); ?></span>
            </div>
            <div class="info-item">
                <span class="info-label">Post Max Size:</span>
                <span class="info-value"><?php echo ini_get('post_max_size'); ?></span>
            </div>
        </div>

        <div class="info-section">
            <h2>🌐 Request Information</h2>
            <div class="info-item">
                <span class="info-label">Request Method:</span>
                <span class="info-value"><?php echo $_SERVER['REQUEST_METHOD']; ?></span>
            </div>
            <div class="info-item">
                <span class="info-label">Request URI:</span>
                <span class="info-value"><?php echo $_SERVER['REQUEST_URI'] ?? '/'; ?></span>
            </div>
            <div class="info-item">
                <span class="info-label">User Agent:</span>
                <span class="info-value" style="font-size: 12px;"><?php echo substr($_SERVER['HTTP_USER_AGENT'] ?? 'N/A', 0, 50); ?>...</span>
            </div>
        </div>
    </div>
</body>
</html>
