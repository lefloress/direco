<?php namespace Direco\Http\Controllers\Admin;

use Direco\Repositories\ContactosRepository;

class ContactosController extends AdminController
{
    protected $contactosRepository;
    
    public function __construct(ContactosRepository $contactosRepository)
    {
        $this->contactosRepository = $contactosRepository;    
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $contactos = $this->contactosRepository->paginate();
    
        return view('admin.contactos.index', compact('contactos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $contacto = $this->contactosRepository->getMsg($id);

        return view('admin.contactos.show', compact('contacto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return redirect('admin/contactos/' . $id);    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->contactosRepository->deleteMsg($id);

        return redirect('admin/contactos');    
    }
}
