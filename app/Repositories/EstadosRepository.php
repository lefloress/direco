<?php namespace Direco\Repositories;

use Direco\Base\Entity;
use Direco\Base\Repository;
use Direco\Entities\Estado;

class EstadosRepository extends Repository {

	/**
	 * @return Entity
	 */
	public function getModel()
	{
		return new Estado();
	}

    public function getList()
    {
        return $this->newQuery()->lists('estado', 'estado');
    }

}