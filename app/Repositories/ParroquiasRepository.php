<?php namespace Direco\Repositories;

use Direco\Base\Entity;
use Direco\Base\Repository;
use Direco\Entities\Estado;
use Direco\Entities\Municipio;
use Direco\Entities\Parroquia;

class ParroquiasRepository extends Repository {

	/**
	 * @return Entity
	 */
	public function getModel()
	{
		return new Parroquia();
	}
     
    public function listFromMunicipio($municipio)
    {
        return $this->newQuery()
            ->join('dpmunicipios', 'dpparroquias.id_municipio', '=', 'dpmunicipios.id')
            ->where('municipio', $municipio)
            ->lists('parroquia', 'parroquia');
    }

}
