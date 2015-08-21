<?php namespace Direco\Http\Requests;

use Direco\Http\Requests\Request;

class PaginaRequest extends Request
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
            'titulo' => 'required',
            'slug_url' => 'required|alpha_dash',
            'estatus' => 'required|in:publicado,borrador',
            'orden' => 'integer',
            'contenido' => 'required'
        ];
    }
}
