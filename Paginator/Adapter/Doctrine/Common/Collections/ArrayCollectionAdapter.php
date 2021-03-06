<?php

namespace Lecteurs\PaginatorBundle\Paginator\Adapter\Doctrine\Common\Collections;

use Lecteurs\PaginatorBundle\Paginator\Adapter\AdapterInterface;

/**
 * ArrayCollectionAdapter
 *
 * @author Ignacio Velazquez <ivelazquez85@gmail.com>
 */
class ArrayCollectionAdapter implements AdapterInterface
{    
    protected $collection;
    protected $offset;
    protected $length;

    public function __construct(\Doctrine\Common\Collections\ArrayCollection $collection)
    {
        $this->collection = $collection;
    }

    /**
     * {@inheritdoc}
     */
    public function getTotalResults()
    {
        return $this->collection->count();
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
        return $this->collection->slice($this->offset, $this->length);
    }
}