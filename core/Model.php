<?php
/**
 * Created by PhpStorm.
 * User: Vladyslav
 * Date: 11.10.2015
 * Time: 20:59
 */

namespace Core;


abstract class Model
{
    /**
     * @var \mysqli
     */
    protected $connection;
    /**
     * @var string
     */
    protected $table;

    protected function __construct($host, $username, $password, $database, $table)
    {
        $this->table = $table;
        $this->connection = new \mysqli($host, $username, $password, $database);

        if ($this->connection->errno)
            throw new \Exception('mysqlli error: ' . $this->connection->error);
        //registering autoloading of viewModel
        spl_autoload_register([$this, 'loadViewModel']);
    }


    protected function processFieldsArray($str, $fields)
    {
        if (!empty($fields)) {
            foreach ($fields as $field)
                if (!empty($field) && is_string($field))
                    $str .= $field . ', ';
        } else
            return '';
        return trim($str, ', ');
    }

    public function getAll($order = [])
    {
        $orderBy = $this->processFieldsArray('ORDER BY ', $order);

        $sql = "SELECT * FROM {$this->table} $orderBy";
        return $this->executeReaderQuery($sql);
    }

    public function getOne($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = ?";
        $results = $this->executeReaderQuery($sql, 'i', [$id]);
        return count($results) > 0 ? $results[0] : null;
    }

    //TODO: escape?
    public function paginate($page, $limit, $order = [])
    {
        $orderBy = $this->processFieldsArray('ORDER BY ', $order);
        $offset = ($page - 1) * $limit;
        $sql = "SELECT * FROM {$this->table} $orderBy LIMIT $offset, $limit";
        return $this->executeReaderQuery($sql);
    }

    public function count()
    {
        $sql = "SELECT COUNT(`id`) FROM `{$this->table}`";
        return $this->executeScalar($sql);
    }

    public abstract function create($entity);

    /**
     * for queries that return one value
     */
    protected function executeScalar($sql, $types = null, $parameters = null)
    {
        if ($query = $this->prepareQuery($sql, $types, $parameters)) {
            if ($query->execute()) {
                $result = $query->get_result();
                $row = $result->fetch_assoc();

                $result->close();
                return array_values($row)[0];
            } else {
                $query->close();
                throw new \Exception("error occurred while executing query " . $this->connection->error);
            }
        } else
            throw new \Exception("error occurred while preparing query " . $this->connection->error);
    }

    /**
     * for queries that do not return values
     */
    protected function executeNonQuery($sql, $types = null, $parameters = [])
    {
        if ($query = $this->prepareQuery($sql, $types, $parameters)) {
            if ($query->execute()) {
                $result = $query->affected_rows > 0;
                $query->close();
                return $result;
            } else
                throw new \Exception("error occurred while executing query " . $query->error);
        } else
            throw new \Exception("error occurred while preparing query " . $this->connection->error);
    }


    protected function executeReaderQuery($sql, $types = null, $parameters = null)
    {
        if ($query = $this->prepareQuery($sql, $types, $parameters)) {
            $results = [];
            if ($query->execute()) {
                $result = $query->get_result();
                while ($row = $result->fetch_assoc())
                    array_push($results, $this->processReaderResultsRow($row));

                $result->close();
                return $results;
            } else {
                $query->close();
                throw new \Exception("error occurred while executing query " . $query->error);
            }
        } else
            throw new \Exception("error occurred while preparing query " . $this->connection->error);
    }

    protected function prepareQuery($sql, $types, $parameters)
    {
        if ($query = $this->connection->prepare($sql)) {
            if (!empty($parameters) && !empty($types)) {
                $parameters = array_map([$this->connection, 'escape_string'], $parameters);
                $refs = [$types];
                foreach ($parameters as $key => $param)
                    $refs[] = &$parameters[$key];
                call_user_func_array([$query, 'bind_param'], $refs);
            }
            return $query;
        }
        return null;
    }

    /**
     *
     * @param $row array that contains one row of fetch data
     * @return ViewModel
     */
    protected abstract function processReaderResultsRow($row);

    // TODO: rethink
//    protected function processEntityFields($entity)
//    {
//        $allowedTypes = ['i', 'd', 's', 'b'];
//        $skipedTypes = ['a'];
//        $result = '';
//        $refClass = new \ReflectionClass($entity);
//
//        foreach ($refClass->get() as $property) {
//            $doc = $property->getDocComment();
//            if (!$doc)
//                throw new \RuntimeException("viewModel properties must be documented with phpdoc @var!");
//
//            $matches = [];
//            if (preg_match('/@var (\S+)/', $doc, $matches) && in_array($matches[1][0], $allowedTypes))
//                $result .= $matches[1][0];
//            elseif (in_array($matches[1][0], $skipedTypes))
//                continue;
//            else
//                throw new \RuntimeException("cannot get type from phpdoc comment");
//        }
//        return $result;
//    }

    protected function loadViewModel($vmName)
    {
        require_once(PROJECT_DIR . "/$vmName.php");
    }

    protected function getInsertId()
    {
        return $this->connection->insert_id;
    }
}