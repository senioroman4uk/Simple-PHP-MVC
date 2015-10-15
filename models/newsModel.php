<?php
/**
 * Created by PhpStorm.
 * User: Vladyslav
 * Date: 13.10.2015
 * Time: 23:12
 */

namespace models;


use Core\Model;
use Core\ViewModel;

class newsModel extends Model
{
    public function __construct($host, $username, $password, $database)
    {
        parent::__construct($host, $username, $password, $database, 'news');
    }

    public function create($entity)
    {
        // TODO: Implement create() method.
    }

    public function paginateByType($type, $page, $limit)
    {
        $from = ($page - 1) * $limit;
        $to = $page * $limit;
        $sql = "SELECT * FROM {$this->table} WHERE `type` = $type ORDER BY `date` DESC LIMIT $from, $to";

        return $this->executeReaderQuery($sql);
    }

    public function count($type)
    {
        $sql = "SELECT COUNT(`id`) FROM {$this->table} WHERE `type` = $type";
        return $this->executeScalar($sql);
    }

    public function countAll()
    {
        return parent::count();
    }

    /**
     *
     * @param $row array that contains one row of fetch data
     * @return ViewModel
     */
    protected function processReaderResultsRow($row)
    {
        return new News($row);
    }
}