<?php

namespace NF\Menu;

use NF\Menu\Facades\View;

class MenuManager
{
	protected $type_menu = '';
	protected $theme_location = '';

	public function __construct($type_menu, $theme_location = 'main-menu') {
		$this->type_menu = $type_menu;
		$this->theme_location = $theme_location;
	}
    public function renderMenuClassName()
    {
        return 'vicoders_menu_' . $this->type_menu;
    }

    public function renderMenuClassNameMobile()
    {
        return 'vicoders_menu_mobile_' . $this->type_menu;
    }

    public function renderHTML()
    {
        $data = [
            'menu_class'        => $this->renderMenuClassName(),
            'mobile_menu_class' => $this->renderMenuClassNameMobile(),
            'theme_location'    => $this->theme_location,
        ];
        return View::render('menu', $data);
    }
}
