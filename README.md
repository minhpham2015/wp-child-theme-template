# WordPress Child Theme Template

A complete, production-ready WordPress child theme template with organized structure, best practices, and all essential files.

## 📋 Table of Contents

- [Getting Started](#getting-started)
- [Build Setup](#build-setup)
- [Structure](#structure)
- [Creating Your Child Theme](#creating-your-child-theme)
- [Placeholders](#placeholders)
- [PHP Namespaces](#php-namespaces)
- [ACF Integration](#acf-integration)
- [Installation](#installation)
- [Features](#features)

## 🚀 Getting Started

### Clone the Repository

```bash
git clone <repository-url> your-child-theme-name
cd your-child-theme-name
```

### Prerequisites

- WordPress installation
- A parent theme installed and activated
- Basic knowledge of PHP, CSS, and JavaScript
- **Node.js** (v14 or higher) and **npm** - for building CSS and JS
- **Composer** - for PHP dependency management (optional)

## 🔨 Build Setup

This theme includes automated build processes for CSS (SCSS) and JavaScript using **Composer** and **npm**.

### Initial Setup

After cloning the repository, install dependencies and build assets:

```bash
# Install Composer dependencies (optional)
composer install

# Install npm dependencies
npm install

# Build CSS and JS
npm run build
```

Or use Composer to run everything automatically:

```bash
composer install
```

This will automatically:
1. Install npm dependencies
2. Build CSS from SCSS
3. Build/minify JavaScript

### Build Commands

#### Using npm directly:

```bash
# Build everything (CSS + JS)
npm run build

# Build CSS only (from SCSS)
npm run build:css

# Build CSS minified (production)
npm run build:css:min

# Build JavaScript only (minified)
npm run build:js

# Watch mode - auto-rebuild on file changes
npm run watch

# Watch CSS only
npm run watch:css

# Development mode (watch everything)
npm run dev
```

> **Note for Windows users**: The `npm run watch` command uses `&` which may not work in PowerShell. Use separate terminals or run `npm run watch:css` and `npm run watch:js` in separate windows.
```

#### Using Composer:

```bash
# Build everything
composer build

# Build CSS only
composer build:css

# Build JS only
composer build:js

# Watch mode (CSS + JS)
composer watch

# Watch CSS only
composer dev:watch

# Development mode (watch everything)
composer dev
```

### Build Process

1. **SCSS Compilation**: 
   - Source: `assets/scss/main.scss`
   - Output: `assets/css/main.css`
   - Includes source maps for debugging

2. **JavaScript Minification**:
   - Source: `assets/js/main.js`
   - Output: `assets/js/main.min.js`
   - Includes source maps for debugging

### Development Mode (DEV_MODE)

The theme includes a **Development Mode** feature that automatically compiles CSS on page load when enabled. This is perfect for active development when you want CSS to update automatically without running watch commands.

#### Enabling Development Mode

**Method 1: Environment Variable (Recommended)**
```bash
# Set environment variable
export DEV_MODE=true

# Or in Windows PowerShell
$env:DEV_MODE="true"

# Or in Windows CMD
set DEV_MODE=true
```

**Method 2: Edit config.php**
```php
// In config.php, uncomment and set to true:
define( 'DEV_MODE', true );
```

#### How It Works

When `DEV_MODE` is enabled:
- CSS automatically compiles from SCSS on each page load
- Only compiles if SCSS file is newer than CSS file (smart compilation)
- Works seamlessly with WordPress page loads
- No need to run watch commands manually

#### Development Workflow with DEV_MODE

1. **Enable Development Mode**:
   ```bash
   # Set environment variable
   export DEV_MODE=true
   
   # Or edit config.php and set DEV_MODE to true
   ```

2. **Start WordPress**:
   - Just load any page in your browser
   - CSS will automatically compile if SCSS has changed

3. **Edit SCSS files**:
   - Edit files in `assets/scss/`
   - Refresh the page - CSS compiles automatically!

4. **Disable for Production**:
   ```bash
   # Unset environment variable
   unset DEV_MODE
   
   # Or set DEV_MODE to false in config.php
   define( 'DEV_MODE', false );
   ```

#### Manual Watch Mode (Alternative)

If you prefer traditional watch mode instead of auto-compilation:

1. **Start development**:
   ```bash
   npm run dev
   # or
   composer dev
   # or watch CSS only
   composer dev:watch
   ```
   This starts watch mode - files will auto-rebuild on changes.

2. **Edit your files**:
   - Edit SCSS files in `assets/scss/`
   - Edit JavaScript in `assets/js/main.js`
   - Changes compile automatically in the background

3. **Production build**:
   ```bash
   npm run build:css:min
   npm run build:js
   ```

### Important Notes

- ⚠️ **Always build before committing** - The compiled CSS file is required for the theme to work
- 📝 **Don't edit `assets/css/main.css` directly** - It's auto-generated from SCSS
- 🔄 **Run `npm run build` after replacing placeholders** - Ensures all files are properly compiled
- 📦 **Include `node_modules/` in `.gitignore`** - Already configured
- 🚀 **DEV_MODE for active development** - Enable DEV_MODE for auto CSS compilation on page load
- ⚡ **Disable DEV_MODE in production** - Always set DEV_MODE to false in production for better performance

## 📁 Structure

```
child-theme/
├── style.css                    # Theme header and styles
├── functions.php                # Main functions file
├── index.php                    # Required WordPress file
├── screenshot.png               # Theme screenshot (add manually)
│
├── assets/
│   ├── scss/                    # SCSS source files
│   │   ├── main.scss
│   │   ├── _variables.scss
│   │   ├── _mixins.scss
│   │   ├── _base.scss
│   │   ├── _layout.scss
│   │   └── components/
│   │       └── _buttons.scss
│   │
│   ├── css/                     # Compiled CSS (auto-generated)
│   │   └── main.css
│   │
│   ├── js/                      # JavaScript files
│   │   ├── main.js              # Source file
│   │   └── main.min.js          # Minified (auto-generated)
│   │
│   └── images/                 # Theme images
│
├── package.json                 # npm dependencies & scripts
├── composer.json                # Composer dependencies & scripts
├── config.php                   # Theme configuration (DEV_MODE)
└── .gitignore                   # Git ignore rules
│
├── inc/                         # PHP includes
│   ├── init-load.php            # Loads all includes
│   ├── build.php                # Auto CSS compilation (DEV_MODE)
│   ├── static.php               # Enqueues styles & scripts
│   ├── hooks.php                # WordPress hooks & filters
│   ├── helper.php               # Helper functions
│   ├── ajax.php                 # AJAX handlers
│   ├── shortcode.php            # Shortcode definitions
│   ├── template-functions.php   # Template functions
│   └── acf.php                  # ACF Theme Options integration
│
├── template-parts/               # Reusable template parts
│   └── components/
│       └── hero-section.php
│
└── woocommerce/                  # WooCommerce overrides
    └── single-product.php
```

## 🎯 Creating Your Child Theme

### Step 1: Clone and Rename

1. Clone this repository:
   ```bash
   git clone <repository-url> my-child-theme
   cd my-child-theme
   ```

2. Rename the folder to your desired child theme name (use lowercase, hyphens only):
   ```bash
   # Example: my-child-theme
   ```

### Step 2: Replace Placeholders

This template uses placeholders that **MUST** be replaced with your actual values. Use find-and-replace across all files:

#### Allowed Placeholders:

- `__CHILD_THEME_SLUG__` - Your child theme slug (lowercase, hyphens)
- `__CHILD_THEME_NAME__` - Your child theme display name
- `__PARENT_THEME_SLUG__` - Parent theme folder name
- `__NAMESPACE__` - **REQUIRED** PHP namespace (PascalCase, e.g., `MyTheme` or `MyCompany\MyTheme`) - Used for all functions and classes
- `__AUTHOR__` - Your name or company
- `__DESCRIPTION__` - Theme description
- `__VERSION__` - Version number (e.g., 1.0.0)

#### Example Replacement:

If your child theme is "My Awesome Theme":
- `__CHILD_THEME_SLUG__` → `my-awesome-theme`
- `__CHILD_THEME_NAME__` → `My Awesome Theme`
- `__PARENT_THEME_SLUG__` → `parent-theme-slug` (your parent theme folder)
- `__NAMESPACE__` → `MyAwesomeTheme` (PascalCase, no spaces or hyphens)
- `__AUTHOR__` → `Your Name`
- `__DESCRIPTION__` → `A custom child theme for...`
- `__VERSION__` → `1.0.0`

#### Quick Find & Replace:

**Using VS Code:**
1. Press `Ctrl+Shift+H` (or `Cmd+Shift+H` on Mac)
2. Enable "Use Regular Expression"
3. Replace each placeholder one by one

**Using Command Line (Linux/Mac):**
```bash
# Replace __CHILD_THEME_SLUG__ with my-awesome-theme
find . -type f \( -name "*.php" -o -name "*.js" -o -name "*.css" -o -name "*.scss" \) -exec sed -i 's/__CHILD_THEME_SLUG__/my-awesome-theme/g' {} +
```

**Using PowerShell (Windows):**
```powershell
# Replace __CHILD_THEME_SLUG__ with my-awesome-theme
Get-ChildItem -Recurse -Include *.php,*.js,*.css,*.scss | ForEach-Object {
    (Get-Content $_.FullName) -replace '__CHILD_THEME_SLUG__', 'my-awesome-theme' | Set-Content $_.FullName
}
```

### Step 3: Update Parent Theme

In `style.css`, update the `Template:` line with your parent theme's folder name:

```css
Template: __PARENT_THEME_SLUG__  /* Replace with actual parent theme folder */
```

### Step 4: Install Dependencies and Build

Install build dependencies and compile assets:

```bash
# Install npm dependencies
npm install

# Build CSS and JS
npm run build

# Or use Composer (installs npm deps automatically)
composer install
```

### Step 5: Add Screenshot

Add a `screenshot.png` file (1200x900px recommended) to the theme root directory.

## 🔷 PHP Namespaces

This theme uses **PHP namespaces** for better code organization and to avoid naming conflicts. All functions are namespaced using the `__NAMESPACE__` placeholder.

### How Namespaces Work

All PHP files in the `inc/` directory use the namespace declared at the top:

```php
namespace __NAMESPACE__;

function my_function() {
    // Function code
}
```

### Using Namespaced Functions

**Method 1: Full namespace path**
```php
<?php
// Call function with full namespace
$result = __NAMESPACE__\get_acf_option( 'field_name', 'default' );
```

**Method 2: Import with `use` statement (Recommended)**
```php
<?php
use __NAMESPACE__\get_acf_option;
use __NAMESPACE__\render_hero;

// Now you can use the function directly
$value = get_acf_option( 'field_name', 'default' );
render_hero();
```

**Method 3: Import multiple functions**
```php
<?php
use __NAMESPACE__\{ get_acf_option, render_hero, dump };

// Use imported functions
$value = get_acf_option( 'field_name' );
render_hero();
dump( $data );
```

### Available Namespaced Functions

- `__NAMESPACE__\enqueue_assets()` - Enqueues styles and scripts
- `__NAMESPACE__\add_body_class( $classes )` - Adds body class
- `__NAMESPACE__\dump( $data )` - Debug helper function
- `__NAMESPACE__\ajax_demo()` - AJAX demo handler
- `__NAMESPACE__\button_shortcode( $atts )` - Button shortcode handler
- `__NAMESPACE__\render_hero()` - Renders hero section
- `__NAMESPACE__\get_acf_option( $field_name, $default )` - Gets ACF option
- `__NAMESPACE__\register_acf_options_page()` - Registers ACF options page

### Important Notes

- ⚠️ **Namespace is REQUIRED** - All functions use namespaces, so `__NAMESPACE__` must be replaced
- 📝 **Use PascalCase** - Namespace should be PascalCase (e.g., `MyTheme`, not `my-theme`)
- 🔗 **No spaces or hyphens** - Use underscores or backslashes for sub-namespaces only
- ✅ **Consistent naming** - Keep the same namespace throughout all files

## 🎨 ACF Integration

This theme includes **automatic Advanced Custom Fields (ACF) integration**. When ACF is installed and active, a "Theme Options" page is automatically created in the WordPress admin.

### Automatic Theme Options Page

The theme automatically checks if ACF is active and creates a "Theme Options" page:

- **Location**: WordPress Admin → **Theme Options**
- **Icon**: Generic admin icon
- **Capability**: `edit_posts` (can be customized in `inc/acf.php`)
- **Only appears when**: ACF plugin is installed and active

### Setting Up ACF Theme Options

1. **Install ACF Plugin**:
   - Install "Advanced Custom Fields" or "ACF Pro" plugin
   - Activate the plugin

2. **Create Field Groups**:
   - Go to **Custom Fields** → **Add New**
   - Create your field group
   - In **Location Rules**, select:
     - **Options Page** → **is equal to** → **Theme Options**
   - Publish the field group

3. **Use Options in Templates**:
   ```php
   <?php
   use __NAMESPACE__\get_acf_option;
   
   // Method 1: Using helper function (recommended)
   $header_text = get_acf_option( 'header_text', 'Default Header' );
   $logo_url = get_acf_option( 'logo', '' );
   $footer_text = get_acf_option( 'footer_text', '© 2024' );
   
   // Method 2: Using ACF function directly
   if ( function_exists( 'get_field' ) ) {
       $logo = get_field( 'logo', 'option' );
       $phone = get_field( 'phone_number', 'option' );
   }
   ```

### Helper Function: `get_acf_option()`

The theme provides a helper function for safely getting ACF options:

```php
get_acf_option( string $field_name, mixed $default = false )
```

**Parameters:**
- `$field_name` - The ACF field name
- `$default` - Default value if field is empty or ACF is not active

**Returns:** Field value or default value

**Example:**
```php
<?php
use __NAMESPACE__\get_acf_option;

// Get header text with fallback
$header = get_acf_option( 'header_text', 'Welcome' );

// Get logo URL (empty string if not set)
$logo = get_acf_option( 'logo', '' );

// Get social links (empty array if not set)
$social = get_acf_option( 'social_links', [] );
```

### Benefits

- ✅ **Automatic detection** - Only loads if ACF is active
- ✅ **No errors without ACF** - Theme works perfectly without ACF
- ✅ **Safe fallbacks** - Helper function provides defaults
- ✅ **Easy to use** - Simple function calls in templates
- ✅ **Centralized options** - All theme options in one place

### Customizing Theme Options

To customize the Theme Options page (icon, position, capability), edit `inc/acf.php`:

```php
acf_add_options_page( [
    'page_title' => __( 'Theme Options', '__CHILD_THEME_SLUG__' ),
    'menu_title' => __( 'Theme Options', '__CHILD_THEME_SLUG__' ),
    'menu_slug'  => 'theme-options',
    'capability' => 'edit_posts',  // Change capability here
    'redirect'   => false,
    'icon_url'   => 'dashicons-admin-generic',  // Change icon here
    'position'   => 30,  // Change menu position here
] );
```

**Note:** The ACF Theme Options page only appears if ACF plugin is active. The theme will work fine without ACF installed.

## 📦 Installation

### Method 1: Manual Installation

1. Replace all placeholders (see Step 2 above)
2. Compress the theme folder to a `.zip` file
3. In WordPress admin, go to **Appearance → Themes → Add New → Upload Theme**
4. Upload the `.zip` file
5. Activate the theme

### Method 2: FTP Installation

1. Replace all placeholders
2. Upload the entire theme folder to `/wp-content/themes/`
3. In WordPress admin, go to **Appearance → Themes**
4. Activate your child theme

### Method 3: Direct Installation

1. Replace all placeholders
2. Copy the theme folder directly to `/wp-content/themes/`
3. Activate in WordPress admin

## ✨ Features

- ✅ **Organized Structure** - Clean, maintainable file organization
- ✅ **SCSS Support** - Pre-configured SCSS structure
- ✅ **AJAX Ready** - Built-in AJAX handler example
- ✅ **Shortcode Support** - Example shortcode implementation
- ✅ **WooCommerce Ready** - Template override structure
- ✅ **ACF Integration** - Automatic "Theme Options" page when ACF is active (see [ACF Integration](#acf-integration))
- ✅ **PHP Namespaces** - All functions use namespaces for better organization (see [PHP Namespaces](#php-namespaces))
- ✅ **DEV_MODE** - Auto CSS compilation on page load in development mode
- ✅ **Security** - All files include ABSPATH checks
- ✅ **Best Practices** - Follows WordPress coding standards
- ✅ **Version Control** - Proper versioning for cache busting

## 🔧 Customization

### Adding Styles

1. Edit SCSS files in `assets/scss/`
2. The main file `main.scss` imports all partials:
   - `_variables.scss` - Variables and constants
   - `_mixins.scss` - Reusable mixins
   - `_base.scss` - Base/reset styles
   - `_layout.scss` - Layout styles
   - `components/_buttons.scss` - Component styles
3. Run `npm run build:css` to compile, or `npm run watch:css` for auto-compilation
4. ⚠️ **Don't edit `assets/css/main.css` directly** - It's auto-generated

### Adding JavaScript

1. Edit `assets/js/main.js` - jQuery is already included as a dependency
2. Run `npm run build:js` to minify, or `npm run watch:js` for auto-minification
3. The minified version (`main.min.js`) is optional - the theme uses `main.js` by default

### Adding Functions

Add custom functions to:
- `inc/helper.php` - Helper/utility functions
- `inc/hooks.php` - WordPress hooks and filters
- `inc/template-functions.php` - Template-related functions

### Adding Shortcodes

Add new shortcodes in `inc/shortcode.php` following the existing pattern.

### Adding AJAX Handlers

Add new AJAX handlers in `inc/ajax.php` following the existing pattern.

### Using ACF Theme Options

See the [ACF Integration](#acf-integration) section above for detailed information about using ACF Theme Options.

## 📝 Notes

- **Never edit parent theme files directly** - Always use a child theme
- **Test thoroughly** after replacing placeholders
- **Keep placeholders consistent** - Use the same slug/name throughout
- **Version numbers** - Update version in `style.css` for cache busting
- **Build before deployment** - Always run `npm run build` before deploying to production
- **Don't commit node_modules** - Already in `.gitignore`
- **SCSS compilation** - The `main.css` file is auto-generated, don't edit it directly
- **PHP Namespaces** - **REQUIRED**: All functions use namespaces. Replace `__NAMESPACE__` with your PascalCase namespace (e.g., `MyTheme`). Use `__NAMESPACE__\function_name()` or `use __NAMESPACE__\function_name;` to call them. See [PHP Namespaces](#php-namespaces) section for details.
- **ACF Theme Options** - Automatically creates "Theme Options" page when ACF plugin is installed and active. See [ACF Integration](#acf-integration) section for usage examples.
- **DEV_MODE** - Enable `DEV_MODE` for automatic CSS compilation on page load. Always disable in production. See [Development Mode](#development-mode-dev_mode) section for details.

## 🆘 Troubleshooting

### Theme not showing in WordPress

- Check that `Template:` in `style.css` matches your parent theme folder name exactly
- Ensure all placeholders are replaced
- Verify file permissions

### Styles not loading

- Check browser console for 404 errors
- Verify `assets/css/main.css` exists (run `npm run build:css` if missing)
- Clear WordPress cache
- Ensure SCSS has been compiled: `npm run build:css`

### JavaScript errors

- Check that jQuery is loaded (it's included as a dependency)
- Verify `__CHILD_THEME_SLUG__Data` object is available in browser console
- Ensure JavaScript file exists and is properly enqueued

### Build errors

- Ensure Node.js (v14+) and npm are installed: `node --version`
- Try deleting `node_modules` and running `npm install` again
- Check that all SCSS imports in `main.scss` are correct
- Verify file paths in `package.json` scripts match your structure

### Namespace errors

- Ensure `__NAMESPACE__` placeholder is replaced in ALL PHP files
- Use PascalCase for namespace (e.g., `MyTheme`, not `my-theme`)
- Check that namespace is consistent across all files
- Verify function calls use correct namespace syntax: `__NAMESPACE__\function_name()` or import with `use`

### ACF Theme Options not appearing

- Verify ACF plugin is installed and activated
- Check that ACF Pro or free version is active (both supported)
- Clear WordPress cache
- Check `inc/acf.php` file exists and is loaded in `inc/init-load.php`
- Verify no PHP errors in WordPress debug log

### DEV_MODE not working

- Verify `DEV_MODE` is set to `true` in `config.php` or as environment variable
- Check that `node_modules/.bin/sass` exists (run `npm install` if missing)
- Ensure `assets/scss/main.scss` file exists
- Check file permissions - WordPress needs write access to `assets/css/` directory
- Verify `config.php` is loaded in `functions.php`
- Check WordPress debug log for PHP errors
- Note: DEV_MODE only compiles if SCSS is newer than CSS (smart compilation)

## 👤 Author

**Minh Beplus**

---

**Happy Theming! 🎨**

