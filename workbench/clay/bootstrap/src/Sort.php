<?php namespace Clay\Bootstrap;

use Illuminate\Http\Request as Request;
use Illuminate\Routing\UrlGenerator as URL;
use Illuminate\Config\Repository  as Config;
use Illuminate\Support\Str as Str;
use Illuminate\Translation\Translator as Lang;

use Collective\Html\HtmlBuilder as HTML;

class Sort
{

    protected $request;    
    protected $url;
    protected $html;
    protected $config;
    
    protected $isValid = true;
    protected $defaultColumn = 'id';
	protected $defaultType = 'asc';
    /**
     * @var Lang
     */
    private $lang;

    public function __construct(Request $request, URL $url, HTML $html, Config $config, Lang $lang)
    {
        $this->request = $request;
        $this->url     = $url;
        $this->html    = $html;
        $this->config  = $config;
        $this->lang = $lang;
    }

    public function setDefaultColumn($value, $type = 'asc')
    {
        $this->defaultColumn = $value;
		$this->defaultType = $type;
    }
    
    public function getDefaultColumn()
    {
        return $this->defaultColumn;
    }

    public function htmlClass($column)
    {        
        $class = 'sort';
    
        if ($column == $this->request->input('sort', $this->defaultColumn))
        {
            $sortType = $this->request->input('sort_type', 'asc');
            $class .= ' sort-' . $sortType;
        }
        
        return $class;
    }
    
    public function link($column, $title = null, $attributes = array(), $https = null)
    {
        if ($title == null)
        {
            $title = Str::title($column);
        }
        elseif (Utils::isDotSyntax($title))
        {
            $title = $this->lang->get($title);
        }
		
		$class = 'sort-icon';
        $sortType = $this->request->input('sort_type', 'asc');
		
        if ($column == $this->request->input('sort', $this->defaultColumn))
        {
            $class .= ' sort-' . $sortType;
        }
		
		return '<a href="' . $this->url->to($this->url($column), $https) . '"' . $this->html->attributes($attributes) . '>'
				. $title . '<span class="' . $class . '"> (' . $sortType . ')</span>
				</a>';
    }
    
    public function url($column)
    {
        $url = $this->url->current();
        
        $queryVars = $this->request->input();
        $queryVars['sort'] = $column;
        //We will always start sorting from page one,
        //so we make sure to remove the page from the query
        unset ($queryVars['page']);
        
        //if the rows are being sorted with this column, we invert the sort type
        if ($column == $this->request->input('sort', $this->defaultColumn))
        {
            $sort_type = $this->request->input('sort_type', 'asc');
            
            // Invert sort type
            if ($sort_type == 'asc')
            {
                $queryVars['sort_type'] = 'desc';
            }
            else
            {
                //Asc is the default sort type, so we can omit this value
                unset ($queryVars['sort_type']);
            }
        }
        //Otherwise we will sort by asc
        else
        {
            //Asc is the default sort type, so we can omit this value
            unset ($queryVars['sort_type']);
        }
        
        $url .= '?' . http_build_query($queryVars);
        
        return $url;
    }

    public function validate($whitelist)
    {
        if (is_string($whitelist))
        {
            $whitelist = $this->config->get($whitelist, array());
        }
        
        $column = $this->request->input('sort');
        $type   = $this->request->input('sort_type', 'asc');

        $this->isValid = (is_null($column) OR in_array($column, $whitelist))
               && in_array($type, array('asc', 'desc'));
               
        return $this->isValid;
    }
    
    public function getSortValues()
    {
        $column = $this->request->input('sort', NULL);
        
        if ($column == NULL) //sort by default column and default type
        {
            $column = $this->defaultColumn;
            $type = $this->defaultType;
        }
        else
        {               
            $type = $this->request->input('sort_type', 'asc');
        }        
        
        return compact('column', 'type');
    }
    
    public function buildQuery($q, $equiv = array())
    {
        if ( ! $this->isValid) return $q;

        extract($this->getSortValues());
		
		if (isset ($equiv[$column]))
		{
			$column = $equiv[$column];
		}

		$q->orderBy($column, $type);

        return $q;
    }
    
    public function collection($collection)
    {
        if ( ! $this->isValid) return $collection;

        extract($this->getSortValues());
        
        $method = 'sortBy' . ucfirst(Str::camel($column));
        if (method_exists ($collection, $method))
        {
            //use a custom method to sort the collection
            $collection = $collection->$method($value);
        }
        else // Otherwise we will just build a very basic sort method:
        {
            $collection = $collection->sortBy(function($row) use ($column)
            {
                return $row->$column;
            });
        }
        
        if ($type == 'desc')
        {
            $collection = $collection->reverse();
        }
        
        return $collection;
    }
    
    public function addUrlVars($vars = array())
    {
        if ( ! $this->isValid) return $vars;

        $column = $this->request->input('sort');
        
        if ($column != NULL)
        {
            $vars['sort'] = $column;
            
            $type = $this->request->input('sort_type', 'asc');
            
            if ($type == 'desc')
            {
                $vars['sort_type'] = $type;
            }
        }
        
        return $vars;
    }

}