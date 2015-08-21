<?php namespace Direco\Repositories;
                               
use Direco\Base\Entity;        
use Direco\Base\Repository;     
use Direco\Entities\Contacto;

class ContactosRepository extends Repository {
      
    /**
     * @return Entity                     
     */
    public function getModel() 
    {
        return new Contacto();        
    }

    public function newContacto()
    {
        $contacto = new Contacto();
        return $contacto;
    }

    public function createContactoMsg(array $data) 
    {
        $contacto = $this->newContacto();      
        $contacto->fill($data);   
        $contacto->save($data);

        return $contacto;
    } 

    public function getMsg($id)
    {
        $contacto = $this->newQuery()->where('id', $id)->firstOrFail();
        
        return $contacto;
    }
    
    public function deleteMsg($id)
    {
        $contacto = $this->getMsg($id);
        $contacto->delete();
    }

}

