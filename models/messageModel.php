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

    /**
     * @param $entity Message
     * @return bool
     * @throws \Exception
     */
    public function create($entity)
    {
//        $types = $this->processEntityFields($parameters);
        $sql = "INSERT INTO messages(`name`, `message`, `email`, `ip`) VALUES (?, ?, ?, ?)";
        $result = $this->executeNonQuery($sql, 'ssss',
            [$entity->getName(), $entity->getMessage(), $entity->getEmail(), $entity->getIp()]);
        $entity->setId($this->connection->insert_id);
        return $result;
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