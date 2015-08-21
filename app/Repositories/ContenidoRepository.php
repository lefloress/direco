<?php namespace Direco\Repositories;
                               
use Direco\Base\Entity;        
use Direco\Base\Repository;     
use Direco\Entities\Contenido;
use Direco\Helpers\Estatus;

class ContenidoRepository extends Repository {
      
    /**
     * @return Entity                     
     */
    public function getModel() 
    {
        return new Contenido();
    }

    public function getBySectionAndSlug($seccion, $slug_url, $estatus = Estatus::PUBLICADO)
    {
        $q = $this->newQuery()->where(compact('seccion', 'slug_url'));
        if ($estatus)
        {
            $q->where('estatus', $estatus);
        }
        return $q->firstOrFail();
    }

    public function getBySectionAndId($seccion, $id)
    {
        return $this->newQuery()
            ->where(compact('seccion', 'id'))
            ->firstOrFail();
    }

    public function paginateBySection($seccion, $estatus = Estatus::PUBLICADO)
    {
        $q = $this->newQuery()->where('seccion', $seccion);
        if ($estatus)
        {
            $q->where('estatus', $estatus);
        }
        return $q->paginate(10);
    }

    public function createInSection($seccion, array $data)
    {
        $content = $this->getModel();
        $content->fill($data);
        $content->seccion = $seccion;
        $content->save();
        return $content;
    }

}
