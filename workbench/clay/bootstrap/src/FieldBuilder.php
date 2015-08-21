<?php namespace Clay\Bootstrap;

use Illuminate\View\Factory as View;
use Illuminate\Session\Store as Session;
use Illuminate\Support\Str;

class FieldBuilder {

    protected $form;
    protected $view;
    protected $session;

    protected $templatesDir    = 'bootstrap/field';
    protected $defaultClasses  = array(
        'checkbox' => '',
        'default'  => 'form-control',
        'error'    => 'input-with-feedback'
    );

    public function __construct(FormBuilder $form, View $view, Session $session)
    {
        $this->form = $form;
        $this->view = $view;
        $this->session = $session;
    }

    public function setTemplatesDir($value)
    {
        $this->templatesDir = str_replace('.', DIRECTORY_SEPARATOR, $value);
    }

    public function setDefaultClasses($type, $value = null)
    {
        if (is_array($type))
        {
            $this->defaultClasses = array_merge($this->defaultClasses, $type);
        }

        $this->defaultClasses[$type] = $value;
    }

    /**
     * @param $name
     * @return mixed
     */
    protected function getModelList($name)
    {
        $model = $this->form->getModel();
        $method = 'get' . ucfirst(Str::camel($name)) . 'List';
        if (method_exists($model, $method))
        {
            return $model->$method();
        }
        return array();
    }

    /* Get the model list that should be assigned to the field.
    *
    * @param  string  $name
    * @return string
    */
    protected function getHtmlOptions($name, $type, $list)
    {
        if (empty ($list))
        {
            $list = $this->getModelList($name);
        }

        if ($type == 'select')
        {
            $list = $this->addEmptyOption($list);
        }

        return $list;
    }

    public function addEmptyOption(array $list)
    {
        if (empty ($list))
        {
            return [];
        }

        return array('' => trans('validation.select')) + $list;
    }

    protected function getTemplate($type, $options)
    {
        if (isset($options['template']))
        {
            return $options['template'];
        }

        return $this->getDefaultTemplate($type);
    }

    protected function getDefaultTemplate($type)
    {
        $template = $this->templatesDir . '/' . $type;

        if ( ! $this->view->exists($template))
        {
            $template = $this->templatesDir . '/' . 'default';
        }

        return $template;
    }

    protected function getHtmlName($value)
    {
        if (strpos($value, '.'))
        {
            $segments = explode('.', $value);
            return array_shift($segments) . '[' . implode('][', $segments) . ']';
        }

        return $value;
    }

    protected function getHtmlId($value)
    {
        if (strpos($value, '.'))
        {
            return str_replace('.', '_', $value);
        }

        return $value;
    }

    protected function getRequired($options)
    {
        if (in_array('required', $options))
        {
            return true;
        }

        if (isset($options['required']))
        {
            return $options['required'];
        }

        return false;
    }

    protected function getLabel($name, $options)
    {
        if (isset ($options['label']))
        {
            return $options['label'];
        }

        $attribute = 'validation.attributes.' . $name;
        $label = trans($attribute);

        if ($label == $attribute)
        {
            return ucfirst(str_replace(['_', '.'], ' ', $name));
        }

        return $label;
    }

    protected function getDefaultClass($type)
    {
        if (isset ($this->defaultClasses[$type]))
        {
            return $this->defaultClasses[$type];
        }

        return $this->defaultClasses['default'];
    }

    protected function getClasses($type, $options, $error = null)
    {
        $classes = $this->getDefaultClass($type);

        if (isset ($options['class']))
        {
            $classes .= ' ' . $options['class'];
        }

        if ($error)
        {
            $classes .= ' ' . $this->getDefaultClass('error');
        }

        return trim($classes);
    }

    protected function getError($name)
    {
        $error = null;

        if ($this->session->has('errors'))
        {
            $errors = $this->session->get('errors');

            if ($errors->has($name))
            {
                $error = $errors->first($name);
            }
        }

        return $error;
    }

    /**
     * @param $type
     * @param $options
     * @param $error
     * @param $htmlId
     * @param $required
     * @return array
     */
    protected function getOptions($type, $options, $error, $htmlId, $required)
    {
        $options['class'] = $this->getClasses($type, $options, $error);
        $options['id'] = $htmlId;

        if ($required && ! in_array('required', $options))
        {
            $options[] = 'required';
        }

        if (isset ($options['ph']))
        {
            $options['placeholder'] = $options['ph'];
            unset ($options['ph']);
        }

        unset ($options['template'], $options['required'], $options['label']);
        return $options;
    }

    protected function build($type, $name, $value = null, $options = array(), $list = null)
    {
        /**
         * Swap values so programmers can skip the $value argument
         * and pass the $options array directly
         */
        if (is_array($value))
        {
            $options = $value;
            $value = null;
        }

        return $this->doBuild($type, $name, $value, $options, $list);
    }

    protected function doBuild($type, $name, $value = null, $options = array(), $list = null)
    {
        $template = $this->getTemplate($type, $options);
        $required = $this->getRequired($options);
        $label    = $this->getLabel($name, $options);
        $htmlName = $this->getHtmlName($name);
        $htmlId   = $this->getHtmlId($name);
        $error    = $this->getError($name);

        $options = $this->getOptions($type, $options, $error, $htmlId, $required);

        if ($type) {
            $input = $this->buildControl($type, $name, $value, $options, $list, $htmlName);
        } else {
            $value = $this->form->getValueAttribute($name, $value);
        }

        return $this->view->make($template, compact('htmlName', 'htmlId', 'label', 'input', 'value', 'error', 'required'))->render();
    }

    /**
     * Dynamically handle calls to the field builder.
     *
     * @param  string  $method
     * @param  array   $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        return call_user_func_array([$this, 'build'], array_merge([$method], $parameters));
    }

    /**
     * Create a form input field.
     *
     * @param  string  $type
     * @param  string  $name
     * @param  string  $value
     * @param  array   $options
     * @return string
     */
    public function input($type, $name, $value = null, $options = array())
    {
        $this->build($type, $name, $value, $options);
    }

    /**
     * Create a text input field.
     *
     * @param  string  $name
     * @param  string  $value
     * @param  array   $options
     * @return string
     */
    public function text($name, $value = null, $options = array())
    {
        return $this->build('text', $name, $value, $options);
    }

    /**
     * Create a password input field.
     *
     * @param  string  $name
     * @param  array   $options
     * @return string
     */
    public function password($name, $options = array())
    {
        return $this->build('password', $name, '', $options);
    }

    /**
     * Create a hidden input field.
     *
     * @param  string  $name
     * @param  string  $value
     * @param  array   $options
     * @return string
     */
    public function hidden($name, $value = null, $options = array())
    {
        return $this->form->input('hidden', $name, $value, $options);
    }

    /**
     * Create an e-mail input field.
     *
     * @param  string  $name
     * @param  string  $value
     * @param  array   $options
     * @return string
     */
    public function email($name, $value = null, $options = array())
    {
        return $this->build('email', $name, $value, $options);
    }

    /**
     * Create a url input field.
     *
     * @param  string  $name
     * @param  string  $value
     * @param  array   $options
     * @return string
     */
    public function url($name, $value = null, $options = array())
    {
        return $this->build('url', $name, $value, $options);
    }

    /**
     * Create a file input field.
     *
     * @param  string  $name
     * @param  array   $options
     * @return string
     */
    public function file($name, $options = array())
    {
        return $this->build('file', $name, null, $options);
    }

    /**
     * Create a textarea input field.
     *
     * @param  string  $name
     * @param  string  $value
     * @param  array   $options
     * @return string
     */
    public function textarea($name, $value = null, $options = array())
    {
        return $this->build('textarea', $name, $value, $options);
    }

    /**
     * Create a radios field.
     *
     * @param  string  $name
     * @param  array   $list
     * @param  string  $selected
     * @param  array   $options
     * @return string
     */
    public function radios($name, $list = array(), $selected = null, $options = array())
    {
        return $this->build('radios', $name, $selected, $options, $list);
    }

    /**
     * Create a select box field.
     *
     * @param  string  $name
     * @param  array   $list
     * @param  string  $selected
     * @param  array   $options
     * @return string
     */
    public function select($name, $list = array(), $selected = null, $options = array())
    {
        return $this->build('select', $name, $selected, $options, $list);
    }

    /**
     * Create a checkboxes field.
     *
     * @param  string  $name
     * @param  array   $list
     * @param  string  $selected
     * @param  array   $options
     * @return string
     */
    public function checkboxes($name, $list = array(), $selected = null, $options = array())
    {
        return $this->doBuild('checkboxes', $name, $selected, $options, $list);
    }

    /**
     * Create a checkbox input field.
     *
     * @param  string $name
     * @param  mixed $value
     * @param null $selected
     * @param  array $options
     * @internal param bool $checked
     * @return string
     */
    public function checkbox($name, $value = 1, $selected = null, $options = array())
    {
        return $this->build('checkbox', $name, $selected, $options, $value);
    }

    public function custom($name, $value = null, $options = array())
    {
        return $this->build(null, $name, $value, $options);
    }

    /**
     * @param $type
     * @param $name
     * @param $value
     * @param $options
     * @param $list
     * @param $htmlName
     * @return string
     */
    protected function buildControl($type, $name, $value, $options, $list, $htmlName)
    {
        switch ($type) {
            case 'password':
            case 'file':
                return $this->form->$type($htmlName, $options);
            case 'radios':
            case 'checkboxes':
            case 'select':
                return $this->form->$type($htmlName, $this->getHtmlOptions($name, $type, $list), $value, $options);
            case 'checkbox':
                return $this->form->checkbox($htmlName, $list ?: 1, $value, $options);
            default:
                return $this->form->$type($htmlName, $value, $options);
        }
    }

}
