<?php namespace Direco\Repositories;

use Direco\Base\Entity;
use Direco\Base\Repository;
use Direco\Entities\Modelo;

class ModelosRepository extends Repository {

	public function getModel()
	{
		return new Modelo();
	}

    public function listFromMarca($id)
    {
        return $this->newQuery()
            ->where('MOD_CODMAR', $id)
            ->lists('MOD_DESCRI', 'MOD_ID');
    }

}