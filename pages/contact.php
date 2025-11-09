<div class="row">
    <div class="col-lg-8 mx-auto">
        <h1 class="mb-4">
            <i class="fas fa-envelope text-primary"></i> Contact Us
        </h1>

        <?php if (isset($_SESSION['contact_success']) && $_SESSION['contact_success']): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <h5 class="alert-heading">
                    <i class="fas fa-check-circle"></i> Success!
                </h5>
                <p>Your message has been received. We'll get back to you as soon as possible.</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['contact_success']); ?>
        <?php endif; ?>

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <p class="card-text">
                    Have a question or feedback? Fill out the form below and we'll get back to you as soon as possible.
                </p>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <form method="POST" action="?page=contact" novalidate>
                    <div class="mb-3">
                        <label for="name" class="form-label">
                            Name <span class="text-danger">*</span>
                        </label>
                        <input 
                            type="text" 
                            class="form-control <?php echo isset($errors['name']) ? 'is-invalid' : ''; ?>" 
                            id="name" 
                            name="name" 
                            value="<?php echo htmlspecialchars($formData['name'] ?? ''); ?>"
                            placeholder="Enter your full name"
                            required
                        >
                        <?php if (isset($errors['name'])): ?>
                            <div class="invalid-feedback">
                                <?php echo htmlspecialchars($errors['name']); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">
                            Email <span class="text-danger">*</span>
                        </label>
                        <input 
                            type="email" 
                            class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : ''; ?>" 
                            id="email" 
                            name="email" 
                            value="<?php echo htmlspecialchars($formData['email'] ?? ''); ?>"
                            placeholder="your.email@example.com"
                            required
                        >
                        <?php if (isset($errors['email'])): ?>
                            <div class="invalid-feedback">
                                <?php echo htmlspecialchars($errors['email']); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="subject" class="form-label">
                            Subject <span class="text-danger">*</span>
                        </label>
                        <input 
                            type="text" 
                            class="form-control <?php echo isset($errors['subject']) ? 'is-invalid' : ''; ?>" 
                            id="subject" 
                            name="subject" 
                            value="<?php echo htmlspecialchars($formData['subject'] ?? ''); ?>"
                            placeholder="Brief subject of your message"
                            required
                        >
                        <?php if (isset($errors['subject'])): ?>
                            <div class="invalid-feedback">
                                <?php echo htmlspecialchars($errors['subject']); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">
                            Message <span class="text-danger">*</span>
                        </label>
                        <textarea 
                            class="form-control <?php echo isset($errors['message']) ? 'is-invalid' : ''; ?>" 
                            id="message" 
                            name="message" 
                            rows="6" 
                            placeholder="Enter your message here..."
                            required
                        ><?php echo htmlspecialchars($formData['message'] ?? ''); ?></textarea>
                        <?php if (isset($errors['message'])): ?>
                            <div class="invalid-feedback">
                                <?php echo htmlspecialchars($errors['message']); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-paper-plane"></i> Send Message
                        </button>
                    </div>

                    <div class="mt-3">
                        <small class="text-muted">
                            <span class="text-danger">*</span> Required fields
                        </small>
                    </div>
                </form>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-map-marker-alt text-primary"></i> Location
                        </h5>
                        <p class="card-text">
                            Deployed on Microsoft Azure<br>
                            Cloud Platform
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-clock text-primary"></i> Response Time
                        </h5>
                        <p class="card-text">
                            We typically respond within 24 hours<br>
                            Monday - Friday
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
