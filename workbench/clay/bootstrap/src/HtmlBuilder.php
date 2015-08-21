<?php namespace Clay\Bootstrap;

use Collective\Html\HtmlBuilder as CollectiveHtmlBuilder;

class HtmlBuilder extends CollectiveHtmlBuilder {

    /**
     * Builds an HTML class attribute dynamically
     * Usage:
     * {!! Html::classes(['home' => true, 'main', 'dont-use-this' => false]) !!}
     * Returns:
     * class="home main"
     * @param array $classes
     * @return string
     */
    public function classes(array $classes)
    {
        $html = '';

        foreach ($classes as $name => $bool)
        {
            if (is_int($name))
            {
                $name = $bool;
                $bool = true;
            }

            if ($bool)
            {
                $html .= $name . ' ';
            }
        }

        if ( ! empty($html))
        {
            return ' class="' . trim($html) . '"';
        }

        return '';
    }

}