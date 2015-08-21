<?php namespace Direco\Http\Controllers;

use Direco\Repositories\MarcasRepository;
use Illuminate\Contracts\View\Factory as View;
use Direco\Base\Controller;

class HomeController extends Controller {

    public function index(View $view, MarcasRepository $marcasRepo)
    {
        $marcas_list = $marcasRepo->getList();
        $featured_marcas = $marcasRepo->getFeaturedMarcas();

        return $view->make('home.index', compact('marcas_list', 'featured_marcas'));
    }

}
