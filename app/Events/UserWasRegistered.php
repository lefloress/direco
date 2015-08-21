<?php namespace Direco\Events;

use Direco\Entities\Usuario;

use Illuminate\Queue\SerializesModels;

class UserWasRegistered {

	use SerializesModels;

    /**
     * @var Usuario
     */
    public $user;

    /**
     * Create a new event instance.
     *
     * @param Usuario $user
     */
	public function __construct(Usuario $user)
	{
		//
        $this->user = $user;
    }

}
