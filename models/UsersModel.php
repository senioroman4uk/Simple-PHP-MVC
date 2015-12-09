<?php
/**
 * Created by PhpStorm.
 * User: Vladyslav
 * Date: 26.11.2015
 * Time: 17:54
 */

namespace models;


use Core\Model;

class UsersModel extends Model
{
    public function __construct($host, $username, $password, $database)
    {
        parent::__construct($host, $username, $password, $database, 'users');
    }

    public function findOneByName($name)
    {
        $sql = 'SELECT * FROM users WHERE `name` = ? LIMIT 1';
        $results = $this->executeReaderQuery($sql, 's', [$name]);
        return count($results) > 0 ? $results[0] : null;
    }

    public function create($entity)
    {
        $sql = "INSERT INTO labs.users(`name`, `password`, `salt`, `role`, `email`) VALUES(?, ?, ?, ?, ?)";
        if ($this->executeNonQuery($sql, 'sssis', [
            $entity->getName(),
            $entity->getPassword(),
            $entity->getSalt(),
            $entity->getRole(),
            $entity->getEmail()
        ])
        ) {
            $entity->setId($this->getInsertId());
            return $entity;
        } else
            return null;
    }

    /**
     *
     * @param $row array that contains one row of fetch data
     * @return ViewModel
     */
    protected function processReaderResultsRow($row)
    {
        return new User($row);
    }
}