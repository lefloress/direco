<?php namespace Direco\Http\Controllers;

use Direco\Repositories\MarcasRepository;
use Illuminate\Contracts\View\Factory as View;
use Direco\Base\Controller;

class MarcasController extends Controller {

    /**
     * @var MarcasRepository
     */
    protected $marcasRepo;

    /**
     * @param MarcasRepository $marcasRepo
     */
    public function __construct(MarcasRepository $marcasRepo)
    {
        $this->marcasRepo = $marcasRepo;
    }

    public function index(View $view)
    {
        $marcas = $this->marcasRepo->getAll();
        return $view->make('marcas.index', compact('marcas'));
    }

    public function show($slug, $id, View $view)
    {
		$marca = $this->marcasRepo->getMarcaWithModelosOrFail($id);
		return $view->make('marcas.show', compact('marca'));
    }

}