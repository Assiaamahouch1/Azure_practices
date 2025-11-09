    </main>

    <!-- Footer -->
    <footer class="footer mt-auto py-4 bg-dark text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5><i class="fas fa-cloud"></i> <?php echo APP_NAME; ?></h5>
                    <p class="text-muted">A modern PHP web application deployed on Azure Web App</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="text-muted">
                        <i class="fas fa-server"></i> Environment: <?php echo strtoupper(APP_ENV); ?>
                    </p>
                    <p class="text-muted">
                        &copy; <?php echo date('Y'); ?> Azure PHP Web App. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script src="<?php echo BASE_URL; ?>assets/js/main.js"></script>
</body>
</html>
