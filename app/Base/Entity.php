<?php namespace Direco\Base;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Entity extends Eloquent {

    /**
     * Using this helper function to retrieve the full name for the entity
     * classes so we don't have to hard type them (this avoids typos)
     * Also the server runs PHP 5.4 so we can't use PHP 5.5 *::class feature
     * @return string
     */
    public static function getClass()
    {
        return get_called_class();
    }

    public function __toString()
    {
        switch(true) {
            case isset ($this->titulo):
                return $this->titulo;
                break;
            case isset($this->nombre):
                return $this->nombre;
                break;
            case isset($this->descripcion):
                return $this->descripcion;
                break;
        }

        return $this->id;
    }

} 