<?php namespace Direco\Http\Controllers;

use Direco\Base\Controller;
use Direco\Repositories\InventarioRepository;
use Illuminate\Contracts\View\Factory as View;

class ItemsController extends Controller {

    /**
     * @var InventarioRepository
     */
    protected $inventarioRepo;

    public function __construct(InventarioRepository $inventarioRepo)
    {
        $this->inventarioRepo = $inventarioRepo;
    }

    public function show($slug, $id, View $view)
    {
        $item = $this->inventarioRepo->findOrFail($id);
        $equivalencias = $this->inventarioRepo->getEquivalencias($item);
        return $view->make('items.show', compact('item', 'equivalencias'));
    }

} 