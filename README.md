# Menu package
 > It's an extension kit for our theme https://github.com/hieu-pv/nf-theme 
 
## Before Installation
##### Step 1: Install Nf-Theme-Option package
> [nf-theme-option](https://github.com/hieu-pv/nf-theme-option)

<a name="installation"></a>
## Installation
##### Step 1: Install Through Composer
```
composer require vicoders/menu-kit
```
##### Step 2: Add the Service Provider
> Open `config/app.php` and register the required service provider.

```php
  'providers'  => [
        // .... Others providers 
        \Vicoders\Menu\MenuServiceProvider::class,
    ],
```

##### Step 3: Add shortcode
> Automatic create a shortcode name `menu-vicoders` with a attribute `theme_location` is require:

```php
[menu-vicoders theme_location="{location_menu}"]
```

Example:
```php
[menu-vicoders theme_location='main-menu'"]
```

##### Step 5: Insert shortcode wherever you need
> Very easy
```php
do_shortcode("[menu-vicoders theme_location='main-menu'"]")
```

## Last step
> {tip} Drink tea and relax !