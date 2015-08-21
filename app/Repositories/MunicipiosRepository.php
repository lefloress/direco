<?php namespace Direco\Repositories;

use Direco\Base\Entity;
use Direco\Base\Repository;
use Direco\Entities\Estado;
use Direco\Entities\Municipio;

class MunicipiosRepository extends Repository {

	/**
	 * @return Entity
	 */
	public function getModel()
	{
		return new Municipio();
	}
    
    public function listFromEstado($estado)
    {
        return $this->newQuery()
            ->join('dpestado', 'dpmunicipios.id_estado', '=', 'dpestado.id')
            ->where('estado', $estado)
            ->lists('municipio', 'municipio');
    }

}
