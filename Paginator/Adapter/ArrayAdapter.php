<?php

namespace Lecteurs\PaginatorBundle\Paginator\Adapter;

use Lecteurs\PaginatorBundle\Paginator\Adapter\AdapterInterface;

/**
 * ArrayAdapter
 *
 * @author Francisco Javier Aceituno <javier.aceituno@ideup.com>
 */
class ArrayAdapter implements AdapterInterface
{    
    protected $collection;
    protected $offset;
    protected $length;

    public function __construct(array $collection)
    {
        $this->collection = $collection;
    }

    /**
     * {@inheritdoc}
     */
    public function getTotalResults()
    {
        return count($this->collection);
    }

    /**
     * {@inheritdoc}
     */
    public function setOffset($offset)
    {
        $this->offset = $offset;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setLength($length)
    {
        $this->length = $length;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getResult()
    {
        return \array_slice($this->collection, $this->offset, $this->length);
    }
}