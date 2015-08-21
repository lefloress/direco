<?php namespace Direco\Http\Controllers;

use Direco\Base\Controller;
use Direco\Helpers\Estatus;
use Direco\Repositories\ContenidoRepository;

class ContentController extends Controller {

    protected $contenidoRepository;

    public function __construct(ContenidoRepository $contenidoRepository)
    {
        $this->contenidoRepository = $contenidoRepository;
    }

    public function index($section)
    {
        $content = $this->contenidoRepository->paginateBySection($section, Estatus::PUBLICADO);
        return view('contenido.index', compact('content', 'section'));
    }

    public function show($section, $slug)
    {
        $content = $this->contenidoRepository->getBySectionAndSlug($section, $slug, Estatus::PUBLICADO);
        return view('contenido.show', compact('section', 'content'));
    }

}  
