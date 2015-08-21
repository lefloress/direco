<?php namespace Direco\Http\Requests;

use Direco\Helpers\Rif;
use Illuminate\Foundation\Http\FormRequest;

class RegistroRequest extends FormRequest {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            'email'                   => 'required|email',
            'clave'                   => 'required|confirmed|min:6',
            'clave_confirmation'      => 'required', 
            'cedula_rif'              => 'required|rif',
            'nombre'                  => 'required',
            'direccion_fiscal1'       => 'required',
            'direccion_fiscal2'       => 'required',
            'direccion_fiscal3'       => 'required',
            'direccion_fiscal4'       => 'required',
            'direccion_fiscal5'       => '',
            'telefono1'               => 'required',
            'telefono2'               => '',
            'celular'                 => '',
            'estado'                  => 'required',
            'municipio'               => 'required',
            'parroquia'               => 'required',
            'id_actividad_economica'  => 'required',
		];
	}

    public function messages()
    {
        return [];
    }

	/**
	 * Get the sanitized input for the request.
	 *
	 * @return array
	 */
	public function sanitize()
	{
		$data = $this->all();
        $data['cedula_rif'] = Rif::toString($data['cedula_rif']);
        return $data;
	}

}
