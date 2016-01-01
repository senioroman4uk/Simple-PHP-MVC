<?php
/**
 * Created by PhpStorm.
 * User: Vladyslav
 * Date: 11.10.2015
 * Time: 23:41
 */

namespace models;


use Core\Model;
use Core\ViewModel;

class pageModel extends Model
{
    private static $instance;

    /**
     * pageModel constructor.
     */
    public function __construct($host, $username, $password, $database)
    {
        parent::__construct($host, $username, $password, $database, 'pages');
    }

    public function getAllForXml()
    {
        $sql = "SELECT * FROM {$this->table} WHERE system = 0 AND access = 1 ORDER BY `order` LIMIT 10";
        return $this->executeReaderQuery($sql);
    }

    public static function getInstance($host, $username, $password, $database)
    {
        if (!isset(self::$instance)) {
            self::$instance = new pageModel($host, $username, $password, $database);
        }
        return self::$instance;
    }

    public function getAll($order = [])
    {
        $sql = "SELECT * FROM {$this->table} ORDER BY `order`";
        return $this->executeReaderQuery($sql);
    }


    /**
     *
     * @param $row array that contains one row of fetch data
     * @return ViewModel
     */
    protected function processReaderResultsRow($row)
    {
        return new Page($row);
    }

    public function create($entity)
    {
        // TODO: Implement create() method.
    }

    public function findOneByName($name)
    {
        $sql = "SELECT * FROM {$this->table} WHERE `permalink` = ? LIMIT 1";
        $results = $this->executeReaderQuery($sql, 's', [$name]);

        return count($results) > 0 ? $results[0] : null;
    }

    public function update($entity) {
        $sql = "UPDATE pages
                set name = ?,
                access = ?,
                link = ?,
                route = ?,
                `order` = ?,
                `show` = ?,
                system = ?,
                menuOrder = ?,
                content = ?
         WHERE id = ?";

        return $this->executeNonQuery($sql, 'sissiiissi', [
            $entity->getName(),
            $entity->getAccess(),
            $entity->getLink(),
            $entity->getRoute(),
            $entity->getOrder(),
            $entity->getShow(),
            $entity->getSystem(),
            $entity->getMenuOrder(),
            $entity->getContent(),
            $entity->getId(),
        ]);
    }
}