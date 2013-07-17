<?php

namespace Lecteurs\PaginatorBundle\Twig\Extension;

use Lecteurs\PaginatorBundle\Templating\Helper\PaginatorHelper;
use Lecteurs\PaginatorBundle\Paginator\Paginator;

class PaginatorExtension extends \Twig_Extension
{
    /**
     *  @var  $pagebar
     */
    protected $pagebar;

    /**
     *  @param Lecteurs\PaginatorBundle\Templating\Helper\PaginatorHelper $pagebar
     */
    public function __construct(PaginatorHelper $pagebar)
    {
        $this->pagebar = $pagebar;
    }

    /**
     *  @return array
     * 
     *  @see \Twig_Extension
     */
    public function getFunctions()
    {
        return array(
            'paginator_render'   => new \Twig_Function_Method($this, 'render', array('is_safe' => array('html')))
        );
    }

    /**
     *  Renders the paginator
     *
     *  @param string $route
     *  @param string $id
     *  @param array $options
     *  @param string $view
     *
     *  @return string
     */
    public function render($route, $id = null, $options = array(), $view = null)
    {
        return $this->pagebar->render($route, $id, $options, $view);
    }

    /**
     *  @return string
     */
    public function getName()
    {
        return 'paginator_extension';
    }

}

