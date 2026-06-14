# WebFiori App Template

<p align="center">
  <img width="90px" height="90px" src="https://webfiori.com/assets/images/favicon.png" alt="WebFiori Logo">
</p>

<p align="center">
  <a href="https://github.com/WebFiori/app/actions"><img src="https://github.com/WebFiori/app/workflows/PHP%20Build/badge.svg?branch=main" alt="Build Status"></a>
  <a href="https://github.com/WebFiori/app/releases"><img src="https://img.shields.io/github/release/WebFiori/app.svg?label=latest" alt="Latest Release"></a>
  <a href="https://packagist.org/packages/webfiori/app"><img src="https://img.shields.io/packagist/dt/webfiori/app?color=light-green" alt="Downloads"></a>
</p>

The default application template for [WebFiori Framework](https://github.com/WebFiori/framework). Use this as a starting point to create new WebFiori projects.

## Requirements

- PHP >= 8.1
- Extensions: `json`, `mbstring`, `fileinfo`, `openssl`
- [Composer](https://getcomposer.org/)

## Quick Start

```bash
composer create-project webfiori/app my-site
cd my-site
php -S localhost:8080 -t public
```

Then open http://localhost:8080 in your browser.

## Project Structure

```
├── public/             # Web server document root
│   ├── index.php       # Application entry point
│   ├── .htaccess       # Apache rewrite rules
│   ├── web.config      # IIS rewrite rules
│   └── assets/         # Static files (CSS, JS, images)
├── App/                # Application source code
│   ├── Apis/           # REST API services
│   ├── Commands/       # Custom CLI commands
│   ├── Config/         # Configuration files (auto-generated)
│   ├── Database/       # Migrations, seeders, tables
│   ├── Domain/         # Domain entities
│   ├── Health/         # Health check implementations
│   ├── Ini/            # Initialization and route definitions
│   ├── Langs/          # Internationalization files
│   ├── Middleware/     # Custom middleware
│   ├── Pages/          # Page controllers and views
│   ├── Policies/       # ABAC policy classes
│   ├── Storage/        # Sessions, logs, uploads (not web-accessible)
│   └── Tasks/          # Background jobs and scheduled tasks
├── tests/              # PHPUnit tests
├── composer.json
├── webfiori            # CLI entry point (Linux/macOS)
└── webfiori.bat        # CLI entry point (Windows)
```

## Customizing the App Directory

By default, the framework uses `App/` as the application root directory. To change this, edit the first parameter of `App::initiate()` in `public/index.php`:

```php
App::initiate('MyApp', 'public', __DIR__);
```

Reasons you might want to rename it:

- Gives your project a distinct identity instead of a generic `App/` folder.
- Avoids naming conflicts if you're integrating WebFiori into an existing project that already has an `App/` directory.
- Makes it easier to distinguish between multiple WebFiori-based projects in the same workspace.

## Running Tests

```bash
composer test
```

## Code Style

This project uses [PHP CS Fixer](https://github.com/PHP-CS-Fixer/PHP-CS-Fixer) for code style enforcement.

```bash
composer cs-check   # Check for violations (dry run)
composer cs-fix     # Auto-fix violations
```

## CLI Usage

WebFiori includes a CLI tool for common tasks:

```bash
# Linux/macOS
php webfiori

# Windows
webfiori.bat
```

Common commands:

```bash
php webfiori create:service       # Create a new API service
php webfiori create:middleware    # Create a new middleware
php webfiori create:migration    # Create a database migration
php webfiori create:command      # Create a custom CLI command
php webfiori migrations:run      # Run pending migrations
php webfiori migrations:step     # Interactively apply/skip migrations
php webfiori routes:cache        # Build route cache for production
php webfiori services:list       # List auto-discovered API services
php webfiori help                # Show all available commands
```

## Documentation

- [Getting Started](https://webfiori.com/learn)
- [API Reference](https://webfiori.com/docs)
- [Framework Repository](https://github.com/WebFiori/framework)

## Contributing

For information on how to contribute, see [the contribution guide](https://webfiori.com/contribute).

## Reporting Issues

- For bugs and feature requests, [open an issue](https://github.com/WebFiori/app/issues/new).
- For security vulnerabilities, please email [ibrahim@webfiori.com](mailto:ibrahim@webfiori.com).

## License

This project is licensed under the [MIT License](LICENSE).
