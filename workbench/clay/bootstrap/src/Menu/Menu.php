<?php

namespace Clay\Bootstrap\Menu;

use Illuminate\Routing\UrlGenerator as Url;
use Illuminate\View\Factory as View;
use Illuminate\Translation\Translator as Lang;

use Clay\Bootstrap\Utils as Utils;

class Menu
{
    
    protected $url;
    protected $view;
    protected $lang;

	protected $menu;
    protected $class = 'nav';
    protected $activeClass = 'active';
	protected $items;
    protected $id;
    protected $userRole = '';
    protected $defaultSecure = false;
    protected $activeUrl;
    protected $params = array();

	public function __construct(URL $url, View $view, $items)
	{
	    $this->url       = $url;
        $this->view      = $view;
        $this->items     = $items;
	    $this->activeUrl = $this->url->current();
        $this->baseUrl   = $this->url->to('');
	}

    public function param($key, $value)
    {
        $this->params[$key] = $value;
        return $this;
    }

    public function params(array $values = array())
    {
        $this->params = $values;
        return $this;
    }
    
    public function lang(Lang $lang)
    {
        $this->lang = $lang;
        return $this;
    }
	
	public function __toString()
	{
		return $this->render();
	}
    
    public function classes($value = 'nav')
    {
        $this->class = $value;
        return $this;
    }
    
    public function activeClass($value = 'active')
    {
        $this->activeClass = $value;
        return $this;
    }
    
    public function withRole($userRole)
    {
        $this->userRole = $userRole;
        return $this;
    }
    
    public function defaultSecure($value)
    {
        $this->defaultSecure = $value;
        return $this; 
    }
    
    public function activeUrl($value)
    {
        $this->activeUrl = $value;
    }
    
    public function baseUrl($value)
    {
        $this->baseUrl = $value;
    } 
    
    public function currentId()
    {
        return $this->id;
    }
	
	public function render($template = 'bootstrap/menu')
	{
		$items = $this->generateItems($this->items);
        return $this->view->make($template, array ('items' => $items, 'class' => $this->class))->render();
	}
    
    public function getTitle($key, &$title)
    {
        if ( ! isset ($title))
        {
            return Utils::title($key);
        }
        else if ( ! is_null($this->lang) && Utils::isDotSyntax($title))
        {
            return $this->lang->get($title);
        }
        
        return $title;
    }
    
    public function getItems()
    {
        return $this->generateItems($this->items);
    }
        
    protected function generateItems($items, &$parentItem = null)
    {
        foreach ($items as $id => &$values)
        {
            $values['title']  = $this->getTitle($id, $values['title']);
            $values['active'] = false;
            
            // Set default values
            if ( ! isset ($values['class']))   $values['class'] = '';
            if ( ! isset ($values['submenu'])) $values['submenu'] = null;
            if ( ! isset ($values['id']))      $values['id'] = $id;
            
            // If set, use a callback to decide if the option should be displayed or not
            if ( isset ($values['callback']))
            {
				$valid = call_user_func($values['callback'], $id, $values);
                unset ($values['callback']);
            }
            // If set, display the option only if the user has the required role
            else if(isset ($values['roles']))
            {
                $valid = Utils::checkRoles($this->userRole, $values['roles']);
                unset ($values['roles']);
            }
            // Display the option if no callback or role restrictions are set
            else
            {
                $valid = true;
            }
            
            if ( ! $valid)
            {
                unset ($items[$id]);
                continue;
            }

            if (isset ($values['submenu']))
            {
                $values['submenu'] = $this->generateItems($values['submenu'], $values);
            }
            else
            {
                if (isset ($values['full_url']))
                {
                    $values['url'] = $values['full_url'];
                    unset ($values['full_url']);
                }
                else if (isset ($values['url']))
                {
                    if (isset($values['secure']))
                    {
                        $secure = $values['secure'];
                        unset ($values['secure']);
                    }
                    else
                    {
                        $secure = $this->defaultSecure;
                    }
                    
                    $values['url'] = $this->url->to($values['url'], $secure);
                }
                else
                {
                    if (isset ($values['params']))
                    {
                        $parameters = $this->replaceParams($values['params']);
                        unset ($values['params']);
                    }
                    else
                    {
                        $parameters = array();
                    }
    
                    if (isset ($values['route']))
                    {
                        $values['url'] = $this->url->route($values['route'], $parameters);
                        unset ($values['route']);                
                    }
                    else if (isset ($values['action']))
                    {
                        $values['url'] = $this->url->action($values, $parameters);
                        unset ($values['action']);
                    }
                }
                
                if ($this->currentUrl($values))
                {
                    $values['active'] = true;
    
                    $this->id = $values['id'];
    
                    if ($parentItem != null)
                    {
                        $parentItem['active'] = true;
                    }
                }
            }
            
            if ($values['active'])
            {
                $values['class'] .= ' ' . $this->activeClass;
            }
            
            if ($values['submenu'])
            {
                $values['class'] .= ' dropdown';
            }
            
            $values['class'] = trim($values['class']); 
        }

        return $items;
    }

    public function currentUrl($values)
    {
        if ($values['url'] != $this->baseUrl)
        {
            return strpos($this->activeUrl, $values['url']) === 0;
        }
        else
        {
            return $this->activeUrl === $this->baseUrl;
        }
    }

    protected function replaceParams(array $routeParams)
    {
        foreach ($routeParams as &$param)
        {
            if (strpos($param, ':') === 0)
            {
                $param = substr($param, 1);
                if (isset ($this->params[$param]))
                {
                    $param = $this->params[$param];
                }
            }
        }

        return $routeParams;
    }

}