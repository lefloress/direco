<?php namespace Direco\Http\Controllers;

use Direco\Base\Controller;
use Direco\Repositories\ContactosRepository;
use Direco\Http\Requests\ContactFormRequest;

class ContactController extends Controller
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
        return view('contacto.index'); 
    } 

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ContactFormRequest $contactFormRequest)
    {     
        $data = array(
            'nombre' => $contactFormRequest->input('nombre'),
            'correo' => $contactFormRequest->input('correo'),
            'empresa' => $contactFormRequest->input('empresa'),
            'telefono' => $contactFormRequest->input('telefono'),
            'mensaje' => $contactFormRequest->input('mensaje')
        );

        \Mail::send('contacto.email', $data, function($message)
        {
            $message->from('no-reply@direco.com.ve', 'Mensaje de contacto');

            $message->to('info@direco.com.ve');
        });

        $this->contactosRepository->createContactoMsg($contactFormRequest->all());

        return redirect('contactanos');
    }

} 
