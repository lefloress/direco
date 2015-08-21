<?php namespace Direco\Repositories;

use Direco\Base\Entity;
use Direco\Base\Repository;
use Direco\Entities\Marca;

class MarcasRepository extends Repository {

    /**
     * @return Entity
     */
    public function getModel()
    {
        return new Marca();
    }

	public function getMarcaWithModelosOrFail($id)
	{
		return $this->newQuery()
			->with([
                'modelos' => function ($q) {
                    $q->orderBy('MOD_DESCRI', 'ASC');
                },
                'modelos.motores'
            ])
			->where('MAV_CODIGO', $id)
			->firstOrFail();
	}

    public function getList()
    {
        return $this->newQuery()
            ->lists('MAV_NOMBRE', 'MAV_CODIGO');
    }

    public function getFeaturedMarcas($take = 9)
    {
        return $this->newQuery()
            //TODO: uncomment line below to show only featured brand
            //->where('MAV_DESTAC', 1)
            ->orderByRaw('RAND()')
            ->take($take)
            ->get();
    }
}