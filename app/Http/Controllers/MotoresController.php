<?php namespace Direco\Http\Controllers;

use Direco\Repositories\MotoresRepository;
use Direco\Repositories\GruposRepository;
use Direco\Base\Controller;
use Illuminate\Contracts\View\Factory as View;

class MotoresController extends Controller {

    /**
     * @var MotoresRepository
     */
    protected $motoresRepo;

    /**
     * @param MotoresRepository $motoresRepo
     */
    public function __construct(MotoresRepository $motoresRepo)
    {
        $this->motoresRepo = $motoresRepo;
    }

    public function show($marcaSlug, $modeloSlug, $motorSlug, $motorId, View $view, GruposRepository $gruposRepo)
    {
		$motor = $this->motoresRepo->findOrFail($motorId);
		$grupos = $gruposRepo->getGruposWithDivisionesByMotor($motor);
		return $view->make('motores.show', compact ('motor', 'grupos'));
    }

} 