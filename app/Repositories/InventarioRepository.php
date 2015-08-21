<?php namespace Direco\Repositories;

use Direco\Base\Entity;
use Direco\Base\Repository;
use Direco\Entities\Inventario;
use Direco\Entities\Motor;
use Direco\Entities\Pieza;

class InventarioRepository extends Repository {

    /**
     * @return Entity
     */
    public function getModel()
    {
        return new Inventario();
    }

    public function getItemsByPiezaAndMotor(Pieza $pieza, Motor $motor)
    {
        return $motor
            ->items()
            ->where('INV_PZA_ID', $pieza->id)
            ->get();
    }

    public function getEquivalencias(Inventario $item)
    {
        return $item->motores()->with([
            'modelo',
            'modelo.marca'
        ])->get();
    }

}