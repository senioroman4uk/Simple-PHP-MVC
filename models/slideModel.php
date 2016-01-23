<?php
/**
 * Created by PhpStorm.
 * User: Vladyslav
 * Date: 15.01.2016
 * Time: 19:23
 */

namespace models;


use Core\Model;

class slideModel extends Model
{
    /**
     * slideModel constructor.
     * @param $host
     * @param $username
     * @param $password
     * @param $database
     */
    public function __construct($host, $username, $password, $database)
    {
        parent::__construct($host, $username, $password, $database, 'slides');
    }

    /**
     * @param $entity \models\Slide
     * @return bool
     */
    public function create($entity) {
        $sql = "INSERT INTO slides(image, link, title) VALUES(?, ?, ?)";

        return $this->executeNonQuery($sql, 'sss', [
            $entity->getImage(),
            $entity->getLink(),
            $entity->getTitle(),
        ]);
    }

    /**
     * @param $entity \models\Slide
     * @return bool
     * @throws \Exception
     */
    public function update($entity)
    {
        $sql = "UPDATE slides
                SET image = ?,
                link = ?,
                title = ?
         WHERE id = ?";

        return $this->executeNonQuery($sql, 'sssi', [
            $entity->getImage(),
            $entity->getLink(),
            $entity->getTitle(),
            $entity->getId(),
        ]);
    }

    /**
     *
     * @param $row array that contains one row of fetch data
     * @return \models\Slide
     */
    protected function processReaderResultsRow($row)
    {
        return new Slide($row);
    }
}
