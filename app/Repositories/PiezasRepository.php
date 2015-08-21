<?php namespace Direco\Repositories;

use Direco\Base\Entity;
use Direco\Base\Repository;
use Direco\Entities\Pieza;

class PiezasRepository extends Repository {

    /**
     * @return Pieza
     */
    public function getModel()
    {
        return new Pieza();
    }

}