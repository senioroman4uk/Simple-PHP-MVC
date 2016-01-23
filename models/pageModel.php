<?php
/**
 * Created by PhpStorm.
 * User: Vladyslav
 * Date: 11.10.2015
 * Time: 23:41
 */

namespace models;


use Core\Model;

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
     * @return \models\Page
     */
    protected function processReaderResultsRow($row)
    {
        return new Page($row);
    }

    /**
     * @param $entity \models\Page
     * @return bool
     * @throws \Exception
     */
    public function create($entity)
    {
        $sql = "INSERT INTO pages(`name`, access, link, route, `order`, `show`, system, content, menuOrder, permalink)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        return $this->executeNonQuery($sql, 'sissisisis', [
            $entity->getName(),
            $entity->getAccess(),
            $entity->getLink(),
            $entity->getRoute(),
            $entity->getOrder(),
            $entity->getShow(),
            $entity->getSystem(),
            $entity->getContent(),
            $entity->getMenuOrder(),
            $entity->getPermalink(),
        ]);
    }

    public function findOneByName($name)
    {
        $sql = "SELECT * FROM {$this->table} WHERE `permalink` = ? LIMIT 1";
        $results = $this->executeReaderQuery($sql, 's', [$name]);

        return count($results) > 0 ? $results[0] : null;
    }

    /**
     * @param $entity \models\Page
     * @return bool
     * @throws \Exception
     */
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
                content = ?,
                permalink = ?
         WHERE id = ?";

        return $this->executeNonQuery($sql, 'sissiiisssi', [
            $entity->getName(),
            $entity->getAccess(),
            $entity->getLink(),
            $entity->getRoute(),
            $entity->getOrder(),
            $entity->getShow(),
            $entity->getSystem(),
            $entity->getMenuOrder(),
            $entity->getContent(),
            $entity->getPermalink(),
            $entity->getId(),
        ]);
    }
}