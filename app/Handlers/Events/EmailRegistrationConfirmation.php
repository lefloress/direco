<?php namespace Direco\Handlers\Events;

use Direco\Events\UserWasRegistered;

use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Mail\Message;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class EmailRegistrationConfirmation {
    /**
     * @var Mailer
     */
    private $mailer;

    /**
     * Create the event handler.
     *
     * @param Mailer $mailer
     * @return \Direco\Handlers\Events\EmailRegistrationConfirmation
     */
	public function __construct(Mailer $mailer)
	{
        $this->mailer = $mailer;
    }

	/**
	 * Handle the event.
	 *
	 * @param  UserRegistered $event
	 * @return void
	 */
	public function handle(UserWasRegistered $event)
	{
        $user = $event->user;

        $url = route('register.confirmation', [
            'id' => $user->cedula_rif,
            'token' => $user->confirmation_token
        ]);

		$this->mailer->send(
            'emails.registration',
            compact('user', 'url'),
            function (Message $message) use ($user) {
                $message->to($user->email, $user->nombre)
                    ->subject('Confirma tu registro');
            }
        );
	}

}
