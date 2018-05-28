<?php

namespace Vicoders\Menu;

use Illuminate\Support\ServiceProvider;
use NightFury\Option\Abstracts\Input;
use NightFury\Option\Facades\ThemeOptionManager;
use Vicoders\Menu\Facades\View;

class MenuServiceProvider extends ServiceProvider
{
    public function register()
    {
        //check exist folders
        if (!is_dir(get_stylesheet_directory() . '/vendor/Vicoders/menu-kit/resources/cache')) {
            mkdir(get_stylesheet_directory() . '/vendor/Vicoders/menu-kit/resources/cache', 0755);
        }

        add_shortcode('menu-vicoders', function ($args) {
            $type_menu = get_option('menu');

            $mobile_menu = '';

            if($type_menu == 'menu_1'){
                $mobile_menu = 'primary_menu_responsive_1';
            }elseif ($type_menu == 'menu_2') {
                $mobile_menu = 'primary_menu_responsive_2';
            }elseif ($type_menu == 'menu_3') {
                $mobile_menu = 'primary_menu_responsive_3';
            }elseif ($type_menu == 'menu_4') {
                $mobile_menu = 'primary_menu_responsive_4';
            }elseif ($type_menu == 'menu_5') {
                $mobile_menu = 'primary_menu_responsive_5';
            }elseif ($type_menu == 'menu_6') {
                $mobile_menu = 'primary_menu_responsive_6';
            }

            $data = [
                'type_menu' => $type_menu,
                'mobile_menu' => $mobile_menu,
                'theme_location' => $args['theme_location'],
            ];

            return View::render('menu', $data);
        });
        // All your actions that registered here will be bootstrapped

        // For example
        //
        // $this->app->singleton('ThemeOption', function ($app) {
        //     return new Manager;
        // });

        if (is_admin()) {
            $this->registerAdminPostAction();
            $this->registerOptionPage(); // it require nf/theme-option package in template
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

    public function registerOptionPage()
    {
        \NightFury\Option\Facades\ThemeOptionManager::add([
            'name'   => 'General',
            'fields' => [
                [
                    'label'   => 'Select',
                    'name'    => 'menu',
                    'type'    => Input::SELECT,
                    'options' => [
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
                    ],
                ],
            ],
        ]);
    }
}
