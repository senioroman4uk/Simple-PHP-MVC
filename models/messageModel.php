<?php
/**
 * Created by PhpStorm.
 * User: Vladyslav
 * Date: 12.10.2015
 * Time: 23:52
 */

namespace models;


use Core\Model;
use Core\ViewModel;

class messageModel extends Model
{
    public function __construct($host, $username, $password, $database)
    {
        parent::__construct($host, $username, $password, $database, 'messages');
    }

    public function create($entity)
    {
        $types = $this->processEntityTypes($entity);
        $sql = "INSERT INTO messages(`name`, `message`, `email`, `ip`) VALUES (?, ?, ?, ?)";
        $result = $this->executeNonQuery($sql, $types, $entity);
        $entity->setId($this->connection->insert_id);
        return $result;
    }

    public function getAll($page, $limit)
    {
        $from = ($page - 1) * $limit;
        $to = $page * $limit;
//        var_dump($page);
        $sql = "SELECT * FROM Messages LIMIT $from, $to";
        return $this->executeReaderQuery($sql);
    }

    public function count()
    {
        $sql = "SELECT COUNT(`id`) FROM messages";
        return $this->executeScalar($sql);
    }


    /**
     *
     * @param $row array that contains one row of fetch data
     * @return ViewModel
     */
    protected function processReaderResultsRow($row)
    {
        return new Message($row);
    }
}