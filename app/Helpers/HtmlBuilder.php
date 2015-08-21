<?php namespace Direco\Helpers;

use Clay\Bootstrap\HtmlBuilder as BootstrapHtmlBuilder;

class HtmlBuilder extends BootstrapHtmlBuilder {

    public function banner($title, $subtitle = null)
    {
        return view('partials.banner', compact('title', 'subtitle'));
    }

} 