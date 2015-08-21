<?php namespace Direco\Http\Requests;

use Direco\Http\Requests\Request;

class CambiarClaveRequest extends Request
{

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
            'clave'              => 'required|confirmed|min:6',
            'clave_confirmation' => 'required',
        ];
    }
}
