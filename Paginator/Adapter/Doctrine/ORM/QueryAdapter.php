<?php

namespace Lecteurs\PaginatorBundle\Paginator\Adapter\Doctrine\ORM;

use Doctrine\ORM\Query;
use DoctrineExtensions\Paginate\Paginate;
use Lecteurs\PaginatorBundle\Paginator\Adapter\AdapterInterface;


/**
 * QueryAdapter
 *
 * @author Francisco Javier Aceituno <javier.aceituno@ideup.com>
 */
class QueryAdapter implements AdapterInterface
{
    protected $query;

    /**
     * Constructor
     * 
     * @param Doctrine\ORM\Query $query
     */
    public function __construct(Query $query)
    {
        $this->query = $query;
    }

    /**
     * {@inheritdoc}
     */
    public function getTotalResults()
    {
        return (int)Paginate::getTotalQueryResults($this->query);
    }

    /**
     * {@inheritdoc}
     */
    public function setOffset($offset)
    {
        $this->query->setFirstResult($offset);
        
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setLength($length)
    {
        $this->query->setMaxResults($length);
        
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getResult($hydrationMode=null)
    {
        return $this->query->getResult($hydrationMode);
    }
}
