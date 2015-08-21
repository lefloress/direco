<?php namespace Direco\Repositories;
                               
use Direco\Base\Entity;        
use Direco\Base\Repository;     
use Direco\Entities\Pagina;
use Direco\Helpers\Estatus;

class PaginasRepository extends Repository {
      
    /**
     * @return Entity                     
     */
    public function getModel() 
    {
        return new Pagina();        
    }

    public function findBySection($section)
    {
        return $this->newQuery()
            ->where('seccion', $section)
            ->orderBy('orden', 'ASC')
            ->get();
    }

    public function getFirstPageInSection($seccion, $estatus = Estatus::PUBLICADO)
    {
        $q = $this->newQuery()
            ->where('seccion', $seccion)
            ->orderBy('orden', 'ASC');

        if ($estatus)
        {
            $q->where('estatus', $estatus);
        }

        return $q->firstOrFail();
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

    public function createInSection($section, array $data)
    {
        $page = $this->getModel();
        $page->fill($data);
        $page->seccion = $section;
        $page->save();
        return $page;
    }

}
