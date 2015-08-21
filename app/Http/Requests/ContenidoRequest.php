<?php namespace Direco\Http\Requests;

use Direco\Http\Requests\Request;

class ContenidoRequest extends Request
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
            'titulo'           => 'required',
            'imagen'           => '',
            'contenido'        => 'required',
            'orden'            => 'integer',
            'slug_url'         => 'required',
            'meta_description' => 'max:160',
            'estatus'          => 'required|in:publicado,borrador',
        ];
    }
}