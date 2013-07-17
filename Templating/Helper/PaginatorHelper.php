<?php

namespace Lecteurs\PaginatorBundle\Templating\Helper;

use Doctrine\Common\Util\Debug;
use Symfony\Component\Templating\Helper\Helper;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * PaginatorHelper
 *
 * @author Francisco Javier Aceituno <javier.aceituno@ideup.com>
 * @author Gustavo Piltcher
 */
class PaginatorHelper extends Helper
{
    protected $container;

    /**
     *  @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     *  @return Ideup\SimplePaginatorBundle\Paginator\Paginator
     */
    public function getPaginator()
    {
        return $this->container->get('ideup.simple_paginator');
    }

    /**
     *  @param string $route
     *  @param string $id
     *  @param array $options
     *  @param string $view
     *  @return string
     */
    public function render($route, $id = null, $options = array(), $view = null)
    {
        $view = (!is_null($view)) ? $view : 'LecteursPaginatorBundle::pagination.html.twig';

        $defaultOptions = array(
            'id'                    => $id,
            'route'                 => $route,

            'firstPage'             => $this->getPaginator()->getFirstPage(),

            'previousPage'          => $this->getPaginator()->getPreviousPage($id),

            'minPage'               => $this->getPaginator()->getMinPageInRange($id),
            'maxPage'               => $this->getPaginator()->getMaxPageInRange($id),

            'currentPage'           => $this->getPaginator()->getCurrentPage($id),
            'currentClass'          => 'current',

            'nextPage'              => $this->getPaginator()->getNextPage($id),

            'lastPage'              => $this->getPaginator()->getLastPage($id),

            'routeParams'           => (\array_key_exists('route_params', $options) && is_array($options['route_params'])) ? $options['route_params'] : array()
        );

        $options = \array_merge($defaultOptions, $options);

        return $this->container->get('templating')->render($view, $options);
    }

    /**
     *  @return string
     */
    public function getName()
    {
        return 'paginator';
    }

}
