<?php namespace Direco\Http\Controllers;

use Direco\Helpers\Options;
use Illuminate\Contracts\View\Factory as View;
use Direco\Base\Controller;
use Direco\Http\Requests\RegistroRequest;
use Direco\Repositories\UsuariosRepository;
use Direco\Repositories\EstadosRepository;
use Direco\Repositories\MunicipiosRepository;
use Direco\Repositories\ParroquiasRepository;
use Direco\Repositories\ActividadesEconomicasRepository;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class RegisterController extends Controller {

    /**
     * @var UsuariosRepository
     */
    private $usuariosRepository;

    public function __construct(UsuariosRepository $usuariosRepository)
    {
        $this->usuariosRepository = $usuariosRepository;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
    {
        $usuario = $this->usuariosRepository->newUser();
        return view('register.index', compact('usuario'));
	}

	public function register(RegistroRequest $registroRequest)
	{
        $this->usuariosRepository->register($registroRequest->sanitize());

        return view('register/confirmation');
	}

    public function confirmation($id, $token)
    {
        $user = $this->usuariosRepository->findOrFail($id);

        if ($this->usuariosRepository->confirmRegistration($user, $token))
        {
            // Loguear al usuario
            \Auth::loginUsingId($user->id);
            return redirect('/');
        }

        \App::abort('404', 'Los tokens no coinciden');
    }

}
