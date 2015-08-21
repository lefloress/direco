<?php namespace Direco\Repositories;

use Direco\Base\Entity;
use Direco\Base\Repository;
use Direco\Entities\Motor;

class MotoresRepository extends Repository {

	/**
	 * @return Entity
	 */
	public function getModel()
	{
		return new Motor();
	}

    public function listFromModelo($id)
    {
        $motores = $this->newQuery()->where('MOT_MOD_ID', $id)->get();

        $list = array();
        foreach ($motores as $motor)
        {
            $list[$motor->url] = $motor->descripcion;
        }
        return $list;
    }

}