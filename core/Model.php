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

    public function getAll()
    {
        $sql = "SELECT * FROM {$this->table}";
        return $this->executeReaderQuery($sql);
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
    protected function executeNonQuery($sql, $types = null, $entity = null)
    {
        if ($query = $this->prepareQuery($sql, $types, $entity)) {
            if ($query->execute()) {
                $result = $query->affected_rows > 0;
                $query->close();
                return $result;
            } else
                throw new \Exception("error occurred while executing query " . $this->connection->error);
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
                throw new \Exception("error occurred while executing query " . $this->connection->error);
            }
        } else
            throw new \Exception("error occurred while preparing query " . $this->connection->error);
    }

    protected function prepareQuery($sql, $types, $entity, $processId = false)
    {
        if ($query = $this->connection->prepare($sql)) {
            if (!empty($entity) && !empty($types)) {
                $parameters = (array)$entity;
                $parameters = array_map([$this->connection, 'escape_string'], $parameters);
                if (!$processId)
                    unset($parameters["\0" . get_class($entity) . "\0id"]);
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

    protected function processEntityTypes($entity, $withId = false)
    {
        $allowedTypes = ['i', 'd', 's', 'b'];
        $result = '';
        $refClass = new \ReflectionClass($entity);
        foreach ($refClass->getProperties() as $property) {
            if ($property->name === 'id' && !$withId)
                continue;

            $doc = $property->getDocComment();
            if (!$doc)
                throw new \RuntimeException("viewModel properties must be documented with phpdoc @var!");

            $matches = [];
            if (preg_match('/@var (\S+)/', $doc, $matches) && in_array($matches[1][0], $allowedTypes))
                $result .= $matches[1][0];
            else
                throw new \RuntimeException("cannot get type from phpdoc comment");
        }
        return $result;
    }

    protected function loadViewModel($vmName)
    {
        require_once(PROJECT_DIR . "/$vmName.php");
    }
}