<?php namespace Direco\Http\Controllers;

use Direco\Base\Controller;
use Direco\Repositories\InventarioRepository;
use Direco\Repositories\MotoresRepository;
use Direco\Repositories\PiezasRepository;
use Illuminate\Contracts\View\Factory as View;

class PiezasController extends Controller {

    /**
     * @var PiezasRepository
     */
    protected $piezasRepo;
    /**
     * @var InventarioRepository
     */
    protected $inventarioRepo;

    public function __construct(PiezasRepository $piezasRepo, InventarioRepository $inventarioRepo)
    {
        $this->piezasRepo = $piezasRepo;
        $this->inventarioRepo = $inventarioRepo;
    }

    public function show($piezaSlug, $marcaSlug, $modeloSlug, $motorSlug, $piezaId, $motorId, MotoresRepository $motoresRepo, View $view)
    {
        $pieza = $this->piezasRepo->findOrFail($piezaId);
        $motor = $motoresRepo->findOrFail($motorId);
        $items = $this->inventarioRepo->getItemsByPiezaAndMotor($pieza, $motor);

        return $view->make('piezas.show', compact('pieza', 'motor', 'items'));
    }

}