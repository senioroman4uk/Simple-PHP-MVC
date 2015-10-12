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
    protected function __construct($host, $username, $password, $database)
    {
        parent::__construct($host, $username, $password, $database, 'pages');
    }

    public static function getInstance($host, $username, $password, $database)
    {
        if (!isset(self::$instance)) {
            self::$instance = new pageModel($host, $username, $password, $database);
        }
        return self::$instance;
    }

    public function getAll()
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
}