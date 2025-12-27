# WordPress Child Theme Template

A complete, production-ready WordPress child theme template with organized structure, best practices, and all essential files.

## 📋 Table of Contents

- [Getting Started](#getting-started)
- [Build Setup](#build-setup)
- [Structure](#structure)
- [Creating Your Child Theme](#creating-your-child-theme)
- [Placeholders](#placeholders)
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

# Watch mode
composer watch

# Development mode
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

### Development Workflow

1. **Start development**:
   ```bash
   npm run dev
   # or
   composer dev
   ```
   This starts watch mode - files will auto-rebuild on changes.

2. **Edit your files**:
   - Edit SCSS files in `assets/scss/`
   - Edit JavaScript in `assets/js/main.js`

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
└── .gitignore                   # Git ignore rules
│
├── inc/                         # PHP includes
│   ├── init-load.php            # Loads all includes
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
- `__NAMESPACE__` - PHP namespace (PascalCase, e.g., `MyTheme` or `MyCompany\MyTheme`)
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
- ✅ **ACF Integration** - Automatic Theme Options page when ACF is active
- ✅ **PHP Namespaces** - Organized code with namespace support
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

If Advanced Custom Fields (ACF) is installed and active, a "Theme Options" page will automatically appear in the WordPress admin menu.

**To use ACF options in your templates:**

```php
<?php
use __NAMESPACE__\get_acf_option;

// Get an option value using helper function
$header_text = get_acf_option( 'header_text', 'Default text' );

// Or use ACF function directly
if ( function_exists( 'get_field' ) ) {
    $logo = get_field( 'logo', 'option' );
}
```

**Helper function available:**
- `__NAMESPACE__\get_acf_option( $field_name, $default )` - Get ACF option with fallback

**Note:** The ACF Theme Options page only appears if ACF plugin is active. The theme will work fine without ACF.

## 📝 Notes

- **Never edit parent theme files directly** - Always use a child theme
- **Test thoroughly** after replacing placeholders
- **Keep placeholders consistent** - Use the same slug/name throughout
- **Version numbers** - Update version in `style.css` for cache busting
- **Build before deployment** - Always run `npm run build` before deploying to production
- **Don't commit node_modules** - Already in `.gitignore`
- **SCSS compilation** - The `main.css` file is auto-generated, don't edit it directly
- **PHP Namespaces** - All functions use namespaces. Use `__NAMESPACE__\function_name()` or `use __NAMESPACE__\function_name;` to call them
- **ACF Theme Options** - Only appears if ACF plugin is installed and active

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

## 📄 License

[Add your license here]

## 👤 Author

[Your Name/Company]

---

**Happy Theming! 🎨**

