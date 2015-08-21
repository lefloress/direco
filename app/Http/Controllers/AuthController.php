<?php namespace Direco\Http\Controllers;

use Direco\Base\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller {

    /**
     * Show the application login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function auth(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'clave' => 'required|min:6',
        ]);

        $credentials = array(
            'LOGIN'    => $request->get('email'),
            'password' => $request->get('clave')
        );

        if (Auth::attempt($credentials, $request->has('remember')))
        {
            return $this->loginSucceeded(Auth::user());
        }

        return redirect('login')
            ->withInput($request->only('email', 'remember'))
            ->withErrors([
                'email' => 'Correo eletrónico y/o Contraseña no válidas',
            ]);
    }

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }

    /**
     * Get the URL we should redirect to.
     *
     * @return string
     */
    protected function getRedirectUrl()
    {
        return url('login');
    }

    protected function loginSucceeded($user)
    {
        return redirect($user->isAdmin() ? 'admin' : '/');
    }

} 