<?php namespace Direco\Repositories;

use Direco\Base\Entity;
use Direco\Base\Repository;
use Direco\Entities\Grupo;
use Direco\Entities\Motor;

class GruposRepository extends Repository {

	/**
	 * @return Entity
	 */
	public function getModel()
	{
		return new Grupo();
	}

	public function getGruposWithDivisionesByMotor(Motor $motor)
	{
		return $this->newQuery()
            ->with(['divisiones' => function($q) use ($motor) {
                $q->select('webdivision.*');
                $q->join('webpieza', 'webdivision.DIV_ID', '=', 'webpieza.PZA_DIV_ID')
                    // inventario
                    ->join('webinv', 'webpieza.PZA_ID', '=', 'webinv.INV_PZA_ID')
                    // equivalencia
                    ->join('webequiv', 'webinv.INV_CODIGO', '=', 'webequiv.EQUI_CODIG')
                    ->where('webequiv.EQUI_MOTOR', $motor->id)
                    ->groupBy('webdivision.DIV_ID');
            }, 'divisiones.piezas' => function($q) use ($motor) {
                $q->select('webpieza.*');
                $q->join('webinv', 'webpieza.PZA_ID', '=', 'webinv.INV_PZA_ID')
                    // equivalencia
                    ->join('webequiv', 'webinv.INV_CODIGO', '=', 'webequiv.EQUI_CODIG')
                    ->where('webequiv.EQUI_MOTOR', $motor->id)
                    ->groupBy('webpieza.PZA_ID');
            }])
            // divisiones
			->join('webdivision', 'webgru.GRU_CODIGO', '=', 'webdivision.DIV_GRU_ID')
            // piezas
			->join('webpieza', 'webdivision.DIV_ID', '=', 'webpieza.PZA_DIV_ID')
            // inventario
			->join('webinv', 'webpieza.PZA_ID', '=', 'webinv.INV_PZA_ID')
            // equivalencia
			->join('webequiv', 'webinv.INV_CODIGO', '=', 'webequiv.EQUI_CODIG')
			->where('webequiv.EQUI_MOTOR', $motor->id)
			->groupBy('webgru.GRU_CODIGO')
			->get();
	}
}