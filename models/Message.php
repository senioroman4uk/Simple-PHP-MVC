<?php
/**
 * Created by PhpStorm.
 * User: Vladyslav
 * Date: 12.10.2015
 * Time: 23:47
 */

namespace models;


class Message
{
    public function __construct($row)
    {
        foreach ($row as $key => $value)
            if (property_exists($this, $key))
                $this->$key = $value;
            else
                throw new \Exception("property <$key> does not exist in class " . get_class($this));
    }

    /** @var int */
    private $id;
    /** @var string */
    private $name;
    /** @var string */
    private $message;
    /** @var string */
    private $email;
    /** @var string */
    private $ip;
    /** @var string */
    private $date;

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
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param string $ip
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }
}