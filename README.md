# Azure PHP Web Application

A modern, production-ready PHP web application designed for deployment on Microsoft Azure Web App. This application demonstrates best practices for PHP web development including routing, database connectivity, form validation, and responsive design.

## Features

- ✅ **Clean URL Routing**: Page-based navigation system with sanitized input
- ✅ **Database Connectivity**: PDO-based MySQL/Azure SQL Database support
- ✅ **Contact Form**: Server-side validation with user-friendly error messages
- ✅ **Responsive Design**: Bootstrap 5 framework for mobile-first design
- ✅ **Azure Ready**: Pre-configured for Azure Web App deployment
- ✅ **Environment Variables**: Secure configuration management
- ✅ **Professional UI**: Modern interface with Font Awesome icons
- ✅ **Security**: Input sanitization, prepared statements, XSS protection

## Project Structure

```
.
├── assets/
│   ├── css/
│   │   └── style.css          # Custom styles
│   └── js/
│       └── main.js            # Custom JavaScript
├── config/
│   ├── config.php             # Application configuration
│   └── database.php           # Database connection
├── includes/
│   ├── header.php             # Page header
│   ├── footer.php             # Page footer
│   └── contact_handler.php   # Contact form processing
├── pages/
│   ├── home.php               # Home page
│   ├── about.php              # About page
│   └── contact.php            # Contact page
├── .gitignore                 # Git ignore rules
├── composer.json              # PHP dependencies
├── index.php                  # Application entry point
├── web.config                 # IIS/Azure configuration
└── README.md                  # This file
```

## Requirements

- PHP 7.4 or higher
- MySQL 5.7+ or Azure SQL Database (optional)
- Composer (for dependency management)
- Web server (Apache/IIS/Nginx)

## Local Development Setup

### 1. Clone the Repository

```bash
git clone https://github.com/Assiaamahouch1/Azure_practices.git
cd Azure_practices
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Configure Environment Variables

Create a `.env` file or set environment variables:

```bash
# Application Settings
APP_NAME="Azure PHP Web App"
APP_ENV="development"
APP_DEBUG="true"
BASE_URL="/"

# Database Configuration (optional)
DB_HOST="localhost"
DB_NAME="azure_php_db"
DB_USER="root"
DB_PASSWORD=""

# Email Settings
CONTACT_EMAIL="contact@example.com"
```

### 4. Run Local Server

**Using PHP Built-in Server:**
```bash
php -S localhost:8000
```

**Using XAMPP/WAMP:**
- Place the project in `htdocs` or `www` directory
- Access via `http://localhost/Azure_practices`

### 5. Access the Application

Open your browser and navigate to:
- `http://localhost:8000` (PHP built-in server)
- `http://localhost/Azure_practices` (XAMPP/WAMP)

## Azure Deployment

### Method 1: Azure Portal (Web App)

#### Step 1: Create Azure Web App

1. Log in to [Azure Portal](https://portal.azure.com)
2. Click **Create a resource** > **Web App**
3. Configure:
   - **Subscription**: Choose your subscription
   - **Resource Group**: Create new or use existing
   - **Name**: Choose a unique name (e.g., `my-php-webapp`)
   - **Runtime stack**: PHP 8.0 or higher
   - **Region**: Choose nearest region
   - **Plan**: Choose appropriate pricing tier
4. Click **Review + Create** > **Create**

#### Step 2: Configure Application Settings

1. Go to your Web App in Azure Portal
2. Navigate to **Configuration** > **Application settings**
3. Add the following settings:

```
APP_NAME = "Azure PHP Web App"
APP_ENV = "production"
APP_DEBUG = "false"
BASE_URL = "/"
CONTACT_EMAIL = "your-email@example.com"

# Database settings (if using Azure Database for MySQL)
DB_HOST = "your-mysql-server.mysql.database.azure.com"
DB_NAME = "your-database-name"
DB_USER = "your-username@your-mysql-server"
DB_PASSWORD = "your-password"
```

4. Click **Save**

#### Step 3: Deploy Code

**Option A: Local Git Deployment**

1. In your Web App, go to **Deployment Center**
2. Choose **Local Git** as source
3. Copy the Git URL
4. In your local project:

```bash
git remote add azure <Git-URL>
git push azure main
```

**Option B: GitHub Actions**

1. In **Deployment Center**, choose **GitHub**
2. Authorize and select your repository
3. Azure will create a GitHub Actions workflow
4. Push changes to trigger automatic deployment

**Option C: FTP Deployment**

1. Go to **Deployment Center** > **FTP credentials**
2. Use FTP client to upload files to `/site/wwwroot`

**Option D: VS Code**

1. Install Azure App Service extension
2. Sign in to Azure
3. Right-click on Web App > **Deploy to Web App**

#### Step 4: Verify Deployment

1. Navigate to `https://your-app-name.azurewebsites.net`
2. Verify all pages work correctly
3. Test the contact form
4. Check database connectivity (if configured)

### Method 2: Azure CLI

```bash
# Login to Azure
az login

# Create resource group
az group create --name myResourceGroup --location eastus

# Create App Service plan
az appservice plan create --name myAppServicePlan --resource-group myResourceGroup --sku B1 --is-linux

# Create web app
az webapp create --resource-group myResourceGroup --plan myAppServicePlan --name my-php-webapp --runtime "PHP|8.0"

# Configure app settings
az webapp config appsettings set --resource-group myResourceGroup --name my-php-webapp --settings \
    APP_NAME="Azure PHP Web App" \
    APP_ENV="production" \
    APP_DEBUG="false"

# Deploy from local Git
az webapp deployment source config-local-git --name my-php-webapp --resource-group myResourceGroup

# Get deployment URL
az webapp deployment list-publishing-credentials --name my-php-webapp --resource-group myResourceGroup

# Push code
git remote add azure <deployment-url>
git push azure main
```

## Database Setup (Optional)

### Azure Database for MySQL

1. **Create MySQL Server:**
   ```bash
   az mysql server create --resource-group myResourceGroup \
     --name my-mysql-server --location eastus \
     --admin-user myadmin --admin-password <password> \
     --sku-name B_Gen5_1
   ```

2. **Create Database:**
   ```bash
   az mysql db create --resource-group myResourceGroup \
     --server-name my-mysql-server --name azure_php_db
   ```

3. **Configure Firewall:**
   ```bash
   az mysql server firewall-rule create --resource-group myResourceGroup \
     --server my-mysql-server --name AllowAzureServices \
     --start-ip-address 0.0.0.0 --end-ip-address 0.0.0.0
   ```

4. **Update App Settings** with database credentials

### Database Schema

The contact form automatically creates this table:

```sql
CREATE TABLE contact_submissions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL,
    subject VARCHAR(200) NOT NULL,
    message TEXT NOT NULL,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

## Configuration

### Environment Variables

| Variable | Description | Default |
|----------|-------------|---------|
| `APP_NAME` | Application name | "Azure PHP Web App" |
| `APP_ENV` | Environment (development/production) | "production" |
| `APP_DEBUG` | Enable debug mode | "false" |
| `BASE_URL` | Base URL path | "/" |
| `CONTACT_EMAIL` | Contact email address | "contact@example.com" |
| `DB_HOST` | Database host | "localhost" |
| `DB_NAME` | Database name | "azure_php_db" |
| `DB_USER` | Database username | "root" |
| `DB_PASSWORD` | Database password | "" |

### web.config

The `web.config` file configures IIS for:
- URL rewriting for clean URLs
- Default document (index.php)
- Error handling

## Features in Detail

### Routing System

The application uses a simple but effective routing system:
- URL parameter: `?page=home|about|contact`
- Input sanitization to prevent directory traversal
- Fallback to home page for invalid routes

### Database Connectivity

- PDO-based for security (prepared statements)
- Singleton pattern for connection management
- Environment-based configuration
- Support for both MySQL and Azure SQL
- Graceful error handling

### Contact Form

- Server-side validation
- Protection against XSS attacks
- User-friendly error messages
- Database storage of submissions
- Success feedback

### Security Features

- Input sanitization and validation
- Prepared statements (SQL injection prevention)
- XSS protection with `htmlspecialchars()`
- Environment-based configuration
- Secure session management

## Troubleshooting

### Issue: Page shows "500 Internal Server Error"

**Solution:**
1. Check PHP error logs in Azure Portal
2. Ensure `web.config` is properly uploaded
3. Verify PHP version compatibility
4. Enable debug mode temporarily: `APP_DEBUG="true"`

### Issue: Database connection fails

**Solution:**
1. Verify database credentials in App Settings
2. Check firewall rules allow Azure services
3. Test connection string locally
4. Review database server status

### Issue: Static files (CSS/JS) not loading

**Solution:**
1. Clear browser cache
2. Check file paths in header.php
3. Verify files uploaded to correct directory
4. Check IIS static content settings

### Issue: Contact form not submitting

**Solution:**
1. Check PHP error logs
2. Verify form action URL
3. Test database connectivity
4. Check file permissions

## Monitoring and Logging

### Azure Application Insights

1. Enable Application Insights in Azure Portal
2. Add instrumentation key to app settings
3. Monitor performance and errors

### Log Viewing

```bash
# View live logs
az webapp log tail --name my-php-webapp --resource-group myResourceGroup

# Download logs
az webapp log download --name my-php-webapp --resource-group myResourceGroup
```

## Performance Optimization

1. **Enable Output Caching**: Configure in web.config
2. **Use Azure CDN**: For static assets
3. **Database Connection Pooling**: Enabled by default
4. **Composer Optimization**: `composer install --optimize-autoloader --no-dev`
5. **Azure Cache for Redis**: For session management at scale

## Best Practices

- ✅ Use environment variables for sensitive data
- ✅ Keep dependencies updated
- ✅ Enable HTTPS (free with Azure)
- ✅ Regular backups of database
- ✅ Monitor application performance
- ✅ Implement rate limiting for forms
- ✅ Use Azure Key Vault for secrets
- ✅ Enable Azure Application Insights

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## License

This project is open source and available under the [MIT License](LICENSE).

## Support

For issues and questions:
- Create an issue in this repository
- Contact: contact@example.com

## Resources

- [Azure App Service Documentation](https://docs.microsoft.com/azure/app-service/)
- [PHP on Azure Documentation](https://docs.microsoft.com/azure/app-service/quickstart-php)
- [Azure Database for MySQL](https://docs.microsoft.com/azure/mysql/)
- [Bootstrap Documentation](https://getbootstrap.com/docs/)

---

**Built with ❤️ for Azure deployment**