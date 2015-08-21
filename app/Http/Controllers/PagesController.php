<?php namespace Direco\Http\Controllers;

use Direco\Base\Controller;
use Direco\Helpers\Estatus;
use Direco\Repositories\PaginasRepository;

class PagesController extends Controller
{
    protected $paginasRepository;

    public function __construct(PaginasRepository $paginasRepository)
    {
        $this->paginasRepository = $paginasRepository;    
    }

    public function show($section, $slug_url = "")
    {
        $page = !empty ($slug_url) ?
            $this->paginasRepository->getBySectionAndSlug($section, $slug_url, Estatus::PUBLICADO)
            : $this->paginasRepository->getFirstPageInSection($section, Estatus::PUBLICADO);

        $other_pages = $this->paginasRepository->findBySection($section);
        return view('paginas.show', compact('section', 'page', 'other_pages'));
    }

}    
