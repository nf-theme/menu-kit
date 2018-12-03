<?php

namespace NF\Menu;

use Illuminate\Support\ServiceProvider;
use NightFury\Option\Abstracts\Input;
use NightFury\Option\Facades\ThemeOptionManager;
use \Menu\MenuManager;

class MenuServiceProvider extends ServiceProvider
{
    public function register()
    {
        if (!is_dir(get_stylesheet_directory() . '/vendor/nf/menu-kit/resources/cache')) {
            mkdir(get_stylesheet_directory() . '/vendor/nf/menu-kit/resources/cache', 0755);
        }

        $this->setShortcode();

        if (is_admin()) {
            $this->registerOptionPage();
        }
    }

    public function registerCommand()
    {
        // Register your command here, they will be bootstrapped at console
        //
        // return [
        //     PublishCommand::class,
        // ];
    }

    public function registerAdminPostAction()
    {
        add_action('admin_enqueue_scripts', function () {
            wp_enqueue_media();
        });

        add_action('admin_enqueue_scripts', function () {
            wp_enqueue_style(
                'extension-kit-style',
                wp_slash(get_stylesheet_directory_uri() . '/vendor/nf/extension-kit/assets/dist/app.css'),
                false
            );
            wp_enqueue_script(
                'extension-kit-scripts',
                wp_slash(get_stylesheet_directory_uri() . '/vendor/nf/extension-kit/assets/dist/app.js'),
                'jquery',
                '1.0',
                true
            );
        });
    }

    public function setShortcode()
    {
        add_shortcode('menu-kit', function ($args) {
            if (empty($args['theme_location'])) {
                $args['theme_location'] = 'main-menu';
            }
            $type_menu = get_option($args['name_menu']);
            // echo $type_menu;
            $menu      = new MenuManager($type_menu, $args['theme_location']);
            return $menu->renderHTML();
        });
    }

    public function registerOptionPage()
    {
        $menus   = get_terms('nav_menu');
        $options = [
            [
                'value'    => 'menu_1',
                'label'    => 'Menu 1',
                'selected' => true,
            ],
            [
                'value'    => 'menu_2',
                'label'    => 'Menu 2',
                'selected' => false,
            ],
            [
                'value'    => 'menu_3',
                'label'    => 'Menu 3',
                'selected' => false,
            ],
            [
                'value'    => 'menu_4',
                'label'    => 'Menu 4',
                'selected' => false,
            ],
            [
                'value'    => 'menu_5',
                'label'    => 'Menu 5',
                'selected' => false,
            ],
            [
                'value'    => 'menu_6',
                'label'    => 'Menu 6',
                'selected' => false,
            ],
            [
                'value'    => 'menu_7',
                'label'    => 'Menu 7',
                'selected' => false,
            ],
            [
                'value'    => 'menu_8',
                'label'    => 'Menu 8',
                'selected' => false,
            ],
            [
                'value'    => 'menu_9',
                'label'    => 'Menu 9',
                'selected' => false,
            ],
        ];
        foreach ($menus as $item) {
            $data['field'][] = [
                'label'   => $item->name,
                'name'    => $item->name,
                'type'    => Input::SELECT,
                'options' => $options,
            ];
        }
        \NightFury\Option\Facades\ThemeOptionManager::add(
            [
                'name'   => 'Setting Menu',
                'fields' => $data['field'],
            ]);
    }
}
