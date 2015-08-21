<?php namespace Direco\Http\Controllers\Admin;

use Direco\Helpers\Estatus;
use Direco\Repositories\ContenidoRepository;
use Direco\Http\Requests\ContenidoRequest;
use Clay\Bootstrap\Facades\Alert;
use Illuminate\Routing\Route;

class ContentController extends AdminController {

    protected $content;
    protected $contenidoRepository;

    public function __construct(ContenidoRepository $contenidoRepository)
    {
        $this->contenidoRepository = $contenidoRepository;

        $this->beforeFilter('@findContent', ['only' => ['show', 'edit', 'update', 'destroy']]);
    }

    public function findContent(Route $route)
    {
        $this->content = $this->contenidoRepository->getBySectionAndId(
            $route->getParameter('content'),
            $route->getParameter('id')
        );
    }

    public function index($section)
    {
        $content = $this->contenidoRepository->paginateBySection($section, Estatus::TODOS);
        return view('admin.content.index', compact('content', 'section'));
    }

    public function create($section)
    {
        return view('admin.content.create', compact('section'));
    }

    public function store($section, ContenidoRequest $contenidoRequest)
    {
        $this->content = $this->contenidoRepository->createInSection($section, $contenidoRequest->all());

        Alert::success(sprintf('La %s: "%s" fue creada', $section, $this->content->titulo));

        return $this->redirectToList($section);
    }

    public function show($section, $id)
    {
        return view('admin.content.show', ['content' => $this->content, 'section' => $section]);
    }

    public function edit($section, $id)
    {
        return view('admin.content.edit', ['content' => $this->content, 'section' => $section]);
    }

    public function update($section, $id, ContenidoRequest $contenidoRequest)
    {
        $this->contenidoRepository->update($this->content, $contenidoRequest->all());
        Alert::success(sprintf('La %s: "%s" fue actualizada', $section, $this->content->titulo));
        return $this->redirectToList($section);
    }

    public function destroy($section, $id)
    {
        $this->contenidoRepository->delete($this->content);
        Alert::success(sprintf('La %s: "%s" fue eliminada', $section, $this->content->titulo));
        return $this->redirectToList($section);
    }

    /**
     * @param $section
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirectToList($section)
    {
        return redirect()->route('admin.contenido.index', compact('section'));
    }

}
