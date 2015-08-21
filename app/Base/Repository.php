<?php namespace Direco\Base;

use Illuminate\Database\Eloquent\Builder as Query;
use Direco\Support\PaginationFactory;

abstract class Repository
{

    const PAGINATE = true;
    protected $filters = [];

    /**
     * @return Entity
     */
    abstract public function getModel();

    public function newEntity()
    {
        return $this->getModel();
    }

    public function newQuery()
    {
        return $this->getModel()->newQuery();
    }

    /**
     * @param $id
     * @return Entity
     */
    public function findOrFail($id)
    {
        return $this->newQuery()->findOrFail($id);
    }

    public function getAll()
    {
        return $this->newQuery()->get();
    }

    public function paginate()
    {
        return $this->newQuery()->paginate();
    }

    public function paginateNews($size)
    {
        return $this->newQuery()->paginate($size);
    }

    public function search(array $data)
    {
        return $this->getSearchQuery($data)->get();
    }

    public function searchPaginated(array $data, $perPage = 15)
    {
        return $this->getSearchQuery($data)->paginate($perPage);
    }

    /**
     * @param array $data
     * @return Query
     */
    protected function getSearchQuery(array $data = array())
    {
        $data = array_only($data, $this->filters);
        $data = array_filter($data, 'strlen');

        $q = $this->newQuery()->select();

        foreach ($data as $field => $value)
        {
            // slug_url -> filterBySlugUrl
            $filterMethod = 'filterBy' . studly_case($field);

            if (method_exists(get_called_class(), $filterMethod))
            {
                $this->$filterMethod($q, $value);
            }
            else
            {
                $q->where($field, $data[$field]);
            }
        }

        return $q;
    }

    // Basic CRUD operations

    public function create(array $data)
    {
        return $this->getModel()->create($data);
    }

    public function update($entity, array $data)
    {
        if(is_numeric($entity))
        {
            $entity = $this->findOrFail($entity);
        }

        $entity->fill($data);
        return $entity->save();
    }

    /**
     * @param $entity
     * @return Entity
     */
    public function delete($entity)
    {
        if (is_numeric($entity))
        {
            $entity = $this->findOrFail($entity);
        }

        return $entity->delete();
    }

    public function getIds()
    {
        return $this->newQuery()->lists('id');
    }

}
