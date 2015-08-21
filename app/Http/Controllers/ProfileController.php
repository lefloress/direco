<?php namespace Direco\Http\Controllers;

use Clay\Bootstrap\Facades\Alert;
use Direco\Base\Controller;
use Direco\Http\Requests\ChangePasswordRequest;
use Direco\Http\Requests\EditProfileRequest;
use Direco\Repositories\UsuariosRepository;
use Illuminate\Auth\AuthManager;
use Illuminate\Auth\Guard;
use Illuminate\View\Factory as View;

class ProfileController extends Controller {

    /**
     * @var AuthManager
     */
    private $auth;

    public function __construct(Guard $auth, View $view)
    {
        $this->user = $auth->user();
        $view->share('user', $this->user);
    }

    public function index()
    {
        return view('users.profile');
    }

    public function edit()
    {
        return view('users.edit');
    }

    public function update(EditProfileRequest $editProfileRequest, UsuariosRepository $usuariosRepository)
    {
        $usuariosRepository->update($this->user, $editProfileRequest->sanitize());
        Alert::success('Sus datos fueron actualizados');
        return redirect()->route('profile');
    }

    public function changePassword()
    {
        return view('users.password');
    }

    public function updatePassword(ChangePasswordRequest $changePasswordRequest, UsuariosRepository $usuariosRepository)
    {
        $usuariosRepository->update($this->user, $changePasswordRequest->only('clave'));
        Alert::success('Su clave fue actualizada');
        return redirect()->route('profile');
    }

}