<?php

namespace Clay\Bootstrap\Menu;

use Illuminate\Routing\UrlGenerator as Url;
use Illuminate\Config\Repository as Config;
use Illuminate\View\Factory as View;
use Illuminate\Translation\Translator as Lang;

class MenuGenerator
{

    protected $url;
    protected $config;
    protected $view;
    protected $lang;
    
	public function __construct(URL $url, Config $config, View $view, Lang $lang)
	{
	    $this->url    = $url;
        $this->config = $config;
        $this->view   = $view;
        $this->lang   = $lang;
	}
    
    public function make($items)
    {
        if (is_string ($items)) $items = $this->config->get($items);
        $menu = new Menu($this->url, $this->view, $items);
        $menu->lang($this->lang);
        return $menu;
    }

}