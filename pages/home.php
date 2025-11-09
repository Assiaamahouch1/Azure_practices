<div class="row">
    <div class="col-12">
        <!-- Hero Section -->
        <div class="jumbotron bg-light p-5 rounded-3 mb-4">
            <h1 class="display-4">
                <i class="fas fa-cloud text-primary"></i> Welcome to Azure PHP Web App
            </h1>
            <p class="lead">A modern PHP web application demonstrating best practices for Azure Web App deployment.</p>
            <hr class="my-4">
            <p>This application showcases routing, database connectivity, form handling, and responsive design using Bootstrap.</p>
            <a class="btn btn-primary btn-lg" href="?page=about" role="button">
                <i class="fas fa-info-circle"></i> Learn More
            </a>
        </div>

        <!-- Features Section -->
        <h2 class="mb-4">Key Features</h2>
        <div class="row g-4 mb-4">
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-route text-primary"></i> Smart Routing
                        </h5>
                        <p class="card-text">
                            Clean URL routing system with support for multiple pages and dynamic content.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-database text-primary"></i> Database Ready
                        </h5>
                        <p class="card-text">
                            PDO-based database connectivity with support for MySQL and Azure SQL Database.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-cloud text-primary"></i> Azure Ready
                        </h5>
                        <p class="card-text">
                            Pre-configured with web.config and environment variable support for seamless Azure deployment.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- System Info Section -->
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <i class="fas fa-info-circle"></i> System Information
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled mb-0">
                            <li><strong>PHP Version:</strong> <?php echo phpversion(); ?></li>
                            <li><strong>Server Software:</strong> <?php echo $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown'; ?></li>
                            <li><strong>Environment:</strong> <?php echo strtoupper(APP_ENV); ?></li>
                            <li><strong>Application:</strong> <?php echo APP_NAME; ?></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-success text-white">
                        <i class="fas fa-database"></i> Database Status
                    </div>
                    <div class="card-body">
                        <?php
                        $dbConnected = testDbConnection();
                        if ($dbConnected):
                        ?>
                            <div class="alert alert-success mb-0" role="alert">
                                <i class="fas fa-check-circle"></i> Database connection successful!
                                <hr>
                                <small>Connected to: <?php echo DB_NAME; ?> on <?php echo DB_HOST; ?></small>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-warning mb-0" role="alert">
                                <i class="fas fa-exclamation-triangle"></i> Database not configured or unavailable.
                                <hr>
                                <small>Configure database credentials in environment variables.</small>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Links -->
        <div class="alert alert-info mt-4" role="alert">
            <h5 class="alert-heading"><i class="fas fa-rocket"></i> Get Started</h5>
            <p>Explore the application features:</p>
            <ul class="mb-0">
                <li><a href="?page=about" class="alert-link">Learn about this application</a></li>
                <li><a href="?page=contact" class="alert-link">Send us a message via the contact form</a></li>
            </ul>
        </div>
    </div>
</div>
