<?php namespace Direco\Repositories;

use Direco\Base\Repository;
use Direco\Entities\Usuario;
use Direco\Events\UserWasRegistered;
use Direco\Helpers\Estatus;
use Direco\Helpers\Role;
use Illuminate\Contracts\Events\Dispatcher;
use Symfony\Component\Security\Core\Util\StringUtils;

class UsuariosRepository extends Repository {

    /**
     * @var Dispatcher
     */
    protected $event;

    public function __construct(Dispatcher $event)
    {
        $this->event = $event;
    }

    /**
     * @return Usuario
     */
    public function getModel()
    {
        return new Usuario();
    }

    public function newUser()
    {
        $user = new Usuario();
        $user->setEstatusAttribute(Estatus::EN_ESPERA);
        $user->setRoleAttribute(Role::USER);
        return $user;
    }

    public function newUserFromAdmin()
    {
        $user = new Usuario();
        return $user;
    }

    public function createUserFromAdmin(array $data) 
    {
        $user = $this->newUserFromAdmin();      
        $user->role = $data['role'];
        $user->estatus = $data['estatus'];
        $user->fill($data);   
        $user->save($data);

        return $user;
    }

    public function updateUserFromAdmin($id, array $data)
    {
        $user = $this->findOrFail($id);
        if (isset ($data['role']))
        {
            $user->role = $data['role'];
        }
        if (isset ($data['estatus']))
        {
            $user->estatus = $data['estatus'];
        }
        $user->fill($data);
        $user->save();

        return $user;
    }

    public function register(array $data)
    {
        unset($data['estatus'], $data['role']);
        
        $user = $this->newUser();
        $user->setConfirmationTokenAttribute(str_random(30));
        $user->fill($data);
        $user->save($data);

        $this->event->fire(new UserWasRegistered($user));

        return $user;
    }

    public function confirmRegistration(Usuario $user, $token)
    {
        if ( ! StringUtils::equals($user->confirmation_token, $token))
        {
            return false;
        }

        $user->setConfirmationTokenAttribute("");
        $user->setEstatusAttribute(Estatus::ACTIVO);
        $user->save();

        return true;
    }

}
