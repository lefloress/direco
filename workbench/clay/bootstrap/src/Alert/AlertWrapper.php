<?php namespace Clay\Bootstrap\Alert;

use Illuminate\Session\Store as Session;
use Illuminate\Translation\Translator as Lang;
use Illuminate\View\Factory as View;
use Clay\Bootstrap\Utils;

class AlertWrapper
{
    protected $session;
    protected $lang;
    protected $view;
    protected $messages = array();
    protected $alerts;
    
    public function __construct(Session $session, View $view, Lang $lang)
    {
        $this->session = $session;
        $this->view = $view;
        $this->lang = $lang;
    }
    
    public function __call($name, $args)
    {
        $message = new AlertMessage($this, $name, $args[0], isset($args[1]) ? $args[1] : array());
        return $message;
    }

    public function error($message, $attributes = array())
    {
        return new AlertMessage($this, 'danger', $message, $attributes);
    }
    
    public function addMessage($message)
    {
        array_push($this->messages, $message);
    }
    
    public function getText($text, $parameters = array())
    {
        if (Utils::isDotSyntax($text))
        {
            return $this->lang->get($text, $parameters);
        }
        
        return $text;
    }
    
    public function view($view, $data = array())
    {
        return $this->view($view, $data);
    }
    
    public function push()
    {
        $messages = array();
        foreach ($this->messages as $message)
        {
            $messages[] = $message->getMessage();
        }
        $this->session->flash('AlertMessages', $messages);
    }

    // Render HTML
    
    public function render($template = 'bootstrap/alert')
    {
        $messages = $this->session->get('AlertMessages', null);
        
        if ($messages != null)
        {
        	$this->session->flash('AlertMessages', null);
            return $this->view->make($template)->with('messages', $messages)->render();
        }
        
        return "";
    }
    
}