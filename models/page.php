<?php
/**
 * Created by PhpStorm.
 * User: Vladyslav
 * Date: 11.10.2015
 * Time: 11:42
 */

namespace models;


class Page
{
    public function __construct($row)
    {
        foreach ($row as $key => $value)
            if (property_exists($this, $key))
                $this->$key = $value;
            else
                throw new \Exception("property <$key> does not exist in class " . get_class($this));
    }


    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $link;
    /**
     * @var string
     */
    private $route;
    /**
     * @var string
     */
    private $name;
    /**
     * @var int
     */
    private $order;

    /**
     * @var int
     */
    private $menuOrder;

    /**
     * @var int
     */
    private $show;

    /**
     * @var int
     */
    private $access;

    /**
     * @var int
     */
    private $system;

    /**
     * @var string
     */
    private $content;

    private $date;

    private $permalink;

    /**
     * @return mixed
     */
    public function getPermalink()
    {
        return $this->permalink;
    }

    /**
     * @param mixed $permalink
     */
    public function setPermalink($permalink)
    {
        $this->permalink = $permalink;
    }


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param string $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * @return string
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @param string $route
     */
    public function setRoute($route)
    {
        $this->route = $route;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param int $order
     */
    public function setOrder($order)
    {
        $this->order = $order;
    }

    /**
     * @return int
     */
    public function getMenuOrder()
    {
        return $this->menuOrder;
    }

    /**
     * @param int $menuOrder
     */
    public function setMenuOrder($menuOrder)
    {
        $this->menuOrder = $menuOrder;
    }

    /**
     * @return int
     */
    public function getShow()
    {
        return $this->show;
    }

    /**
     * @param int $show
     */
    public function setShow($show)
    {
        $this->show = $show;
    }

    /**
     * @return int
     */
    public function getAccess()
    {
        return $this->access;
    }

    /**
     * @return int
     */
    public function getSystem()
    {
        return $this->system;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param $context string
     */
    public function setContext($context)
    {
        $this->content = $context;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }


    /**
     * @param $a Page
     * @param $b Page
     * @return bool
     */
    public static function comparator($a, $b)
    {
        $a_order = $a->getMenuOrder() == null ? 99 : $a->getMenuOrder();
        $b_order = $b->getMenuOrder() == null ? 99 : $b->getMenuOrder();
        return $a_order > $b_order;
    }
}