<?php namespace Direco\Http\Controllers\Admin;

use Direco\Repositories\UsuariosRepository;
use Direco\Http\Requests\RegistroRequest;
use Direco\Http\Requests\CambiarClaveRequest;

class UsersController extends AdminController {

    protected $usuariosRepository;

    public function __construct(UsuariosRepository $usuariosRepository)
    {
        $this->usuariosRepository = $usuariosRepository;
    }

    public function index()
    {
        $users = $this->usuariosRepository->paginate();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    public function store(RegistroRequest $registroRequest)
    {
        $this->usuariosRepository->createUserFromAdmin($registroRequest->all());

        return redirect('admin/usuarios');
    }

    public function show($id)
    {
        $user = $this->usuariosRepository->findOrFail($id);

        return view('admin.users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = $this->usuariosRepository->findOrFail($id);

        return view('admin.users.edit', compact('user'));
    }

    public function update($id, registroRequest $registroRequest)
    {
        $this->usuariosRepository->updateUserFromAdmin($id, $registroRequest->all());
        return redirect('admin/usuarios');
    }

    public function cambiarClave($id, cambiarClaveRequest $cambiarClaveRequest)
    {
        $this->usuariosRepository->update($id, $cambiarClaveRequest->only('clave'));

        return redirect('admin/usuarios');
    }

    public function destroy($id)
    {
        $this->usuariosRepository->delete($id);
        return redirect('admin/usuarios');    
    }

}
