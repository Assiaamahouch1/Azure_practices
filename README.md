# Azure_practices

## Simple PHP App for Azure Web App

This is a simple PHP web application designed to be deployed on Azure Web App. The application demonstrates basic PHP functionality and displays server information.

### Features

- 🎨 Modern, responsive UI with gradient design
- 📝 Interactive form with POST request handling
- 📊 Server and PHP configuration information display
- ✅ Azure Web App deployment ready
- 🔒 XSS protection with input sanitization

### Local Development

#### Prerequisites

- PHP 7.4 or higher
- Composer (optional, for dependency management)

#### Running Locally

1. Clone the repository:
```bash
git clone https://github.com/Assiaamahouch1/Azure_practices.git
cd Azure_practices
```

2. Start the PHP built-in server:
```bash
php -S localhost:8000
```

3. Open your browser and navigate to:
```
http://localhost:8000
```

### Deploying to Azure Web App

#### Method 1: Azure Portal (Web-based Deployment)

1. **Create an Azure Web App**:
   - Go to [Azure Portal](https://portal.azure.com)
   - Click "Create a resource" → "Web App"
   - Configure:
     - **Subscription**: Select your subscription
     - **Resource Group**: Create new or use existing
     - **Name**: Choose a unique name (e.g., `my-php-app-demo`)
     - **Publish**: Code
     - **Runtime stack**: PHP 8.x
     - **Operating System**: Linux or Windows
     - **Region**: Choose nearest region
   - Click "Review + Create" → "Create"

2. **Deploy using Local Git**:
   - In your Web App, go to "Deployment Center"
   - Select "Local Git" as the source
   - Copy the Git URL
   - Add Azure as a remote:
     ```bash
     git remote add azure <your-git-url>
     git push azure main
     ```

3. **Deploy using GitHub Actions** (Recommended):
   - In your Web App, go to "Deployment Center"
   - Select "GitHub" as the source
   - Authorize Azure to access your GitHub
   - Select this repository
   - Azure will create a GitHub Actions workflow automatically

#### Method 2: Azure CLI Deployment

1. **Install Azure CLI**:
```bash
# For Ubuntu/Debian
curl -sL https://aka.ms/InstallAzureCLIDeb | sudo bash

# For macOS
brew install azure-cli

# For Windows
# Download from https://aka.ms/installazurecliwindows
```

2. **Login to Azure**:
```bash
az login
```

3. **Create a Resource Group**:
```bash
az group create --name myResourceGroup --location eastus
```

4. **Create an App Service Plan**:
```bash
az appservice plan create --name myAppServicePlan --resource-group myResourceGroup --sku F1 --is-linux
```

5. **Create a Web App**:
```bash
az webapp create --resource-group myResourceGroup --plan myAppServicePlan --name my-php-app-demo --runtime "PHP:8.2"
```

6. **Deploy the code**:
```bash
# Using zip deployment
zip -r app.zip . -x "*.git*" ".DS_Store"
az webapp deployment source config-zip --resource-group myResourceGroup --name my-php-app-demo --src app.zip
```

#### Method 3: VS Code Azure Extension

1. Install the "Azure App Service" extension in VS Code
2. Sign in to Azure
3. Right-click on your project folder
4. Select "Deploy to Web App"
5. Follow the prompts to create or select a Web App

### File Structure

```
Azure_practices/
├── index.php          # Main application file
├── composer.json      # PHP dependency configuration
├── .gitignore        # Git ignore rules
└── README.md         # This file
```

### Azure Web App Configuration

The application works out-of-the-box with Azure Web App's default PHP configuration. However, you can customize settings:

1. **Application Settings**:
   - Go to your Web App in Azure Portal
   - Navigate to "Configuration" → "Application settings"
   - Add custom environment variables if needed

2. **PHP Version**:
   - Go to "Configuration" → "General settings"
   - Select your preferred PHP version (8.0+)

3. **Custom PHP.ini Settings**:
   - Create a `.user.ini` file in the root directory
   - Add custom PHP configuration

### Troubleshooting

- **500 Error**: Check the application logs in Azure Portal under "Log stream"
- **PHP Version Issues**: Ensure your Azure Web App is configured for PHP 7.4+
- **File Permissions**: Azure handles permissions automatically, but ensure no hardcoded paths
- **Deployment Issues**: Check deployment logs in "Deployment Center" → "Logs"

### Testing the Application

Once deployed, your application will be available at:
```
https://<your-app-name>.azurewebsites.net
```

The application displays:
- A welcome message
- An interactive form to test POST requests
- Server information (PHP version, server software, etc.)
- PHP configuration details
- Request information

### Security Notes

- Input sanitization is implemented using `htmlspecialchars()`
- No sensitive data is stored or logged
- All form inputs are validated
- XSS protection is in place

### Next Steps

- Add a database connection (Azure MySQL or PostgreSQL)
- Implement user authentication
- Add more complex business logic
- Set up continuous deployment with GitHub Actions
- Configure custom domain and SSL

### License

MIT License

### Support

For issues or questions, please open an issue in the GitHub repository.