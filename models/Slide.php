<?php
/**
 * Created by PhpStorm.
 * User: Vladyslav
 * Date: 15.01.2016
 * Time: 19:19
 */

namespace models;


class Slide
{
    public function __construct($row)
    {
        foreach ($row as $key => $value)
            if (property_exists($this, $key))
                $this->$key = $value;
            else

                throw new \Exception("property <$key> does not exist in class " . get_class($this));
    }

    private $id;
    private $image;
    private $title;
    private $link;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param mixed $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }


}