# Menu package
 > It's an extension kit for our theme https://github.com/hieu-pv/nf-theme 
 
## Before Installation
##### Step 1: Install Nf-Theme-Option package
> [nf-theme-option](https://github.com/hieu-pv/nf-theme-option)

<a name="installation"></a>
## Installation
##### Step 1: Install Through Composer
```
composer require nf/menu-kit
```
##### Step 2: Add the Service Provider
> Open `config/app.php` and register the required service provider.

```php
  'providers'  => [
        // .... Others providers 
        \NF\Menu\MenuServiceProvider::class,
    ],
```
##### Step 3: import css and js
>import js of package menu-kit in file (wp-content/themes/{name_theme}/resources/assets/scripts/app.js);
```
import '../../../vendor/nf/menu-kit/assets/dist/app.js';
```
>import css of package menu-kit in file (wp-content/themes/{name_theme}/resources/assets/styles/app.scss);
```
@import '../../../vendor/nf/menu-kit/assets/dist/app.css';
```

##### Step 4: Add shortcode
> Automatic create a shortcode name `menu-kit` with a attribute `theme_location` is require:

```php
[menu-kit theme_location="{location_menu}"]
```

Example:
```php
[menu-kit theme_location='main-menu'"]
```

##### Step 5: Insert shortcode wherever you need
> Very easy
```php
do_shortcode("[menu-kit theme_location='main-menu'"]")
```

## Last step
> {tip} Drink tea and relax !