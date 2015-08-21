<?php namespace Direco\Http\Controllers\Admin;

use Clay\Bootstrap\Facades\Alert;
use Direco\Repositories\PaginasRepository;
use Direco\Http\Requests\PaginaRequest;
use Illuminate\Routing\Route;

class PagesController extends AdminController {

    protected $paginasRepository;
    protected $page;

    public function __construct(PaginasRepository $paginasRepository)
    {
        $this->paginasRepository = $paginasRepository;
        $this->beforeFilter('@findPage', ['only' => ['show', 'edit', 'update', 'destroy']]);
    }

    public function findPage(Route $route)
    {
        $this->page = $this->paginasRepository->getBySectionAndId(
            $route->getParameter('section'),
            $route->getParameter('id')
        );
    }

    public function index($section)
    {
        $pages = $this->paginasRepository->findBySection($section);
        return view('admin.pages.index', compact('pages', 'section'));
    }

    public function create($section)
    {
        return view('admin.pages.create', compact('section'));
    }

    public function store($section, PaginaRequest $paginaRequest)
    {
        $this->page = $this->paginasRepository->createInSection($section, $paginaRequest->all());

        Alert::success(sprintf('La página: "%s" fue creada', $this->page->titulo));

        return $this->redirectToList($section);
    }

    public function show($section, $id)
    {
        return view('admin.pages.show', ['page' => $this->page, 'section' => $section]);
    }

    public function edit($section, $id)
    {
        return view('admin.pages.edit', ['page' => $this->page, 'section' => $section]);
    }

    public function update($section, $id, PaginaRequest $paginaRequest)
    {
        $this->paginasRepository->update($this->page, $paginaRequest->all());

        Alert::success(sprintf('La página: "%s" fue actualizada', $this->page->titulo));

        return $this->redirectToList($section);
    }

    public function destroy($section, $id)
    {
        $this->paginasRepository->delete($this->page);
        Alert::success(sprintf('La página: "%s" fue eliminada', $this->page->titulo));
        return $this->redirectToList($section);
    }

    /**
     * @param $section
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirectToList($section)
    {
        return redirect()->route('admin.paginas.index', compact('section'));
    }
}
