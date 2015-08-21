<?php namespace Direco\Repositories;

use Direco\Base\Entity;
use Direco\Base\Repository;
use Direco\Entities\ActividadEconomica;
use Direco\Entities\Estado;
use Direco\Entities\Municipio;
use Direco\Entities\Parroquia;

class ActividadesEconomicasRepository extends Repository {

	/**
	 * @return Entity
	 */
	public function getModel()
	{
		return new ActividadEconomica();
	}

    public function getList()
    {
        return $this->newQuery()->lists('nombre', 'id');
    }

}