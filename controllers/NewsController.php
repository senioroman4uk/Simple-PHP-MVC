<?php
/**
 * Created by PhpStorm.
 * User: Vladyslav
 * Date: 13.10.2015
 * Time: 23:14
 */

namespace controllers;


use Core\Controller;

class NewsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('newsModel');
    }

    public function index()
    {
        $options = [
            'page' => FILTER_SANITIZE_NUMBER_INT,
            'limit' => FILTER_SANITIZE_NUMBER_INT,
        ];
        $values = filter_input_array(INPUT_GET, $options);

        if (is_array($values)) {
            $options['page'] = FILTER_VALIDATE_INT;
            $options['limit'] = FILTER_VALIDATE_INT;
            $values = filter_var_array($values, $options);
        }
        if (empty($values))
            $values = ['page' => false, 'limit' => false];

        if ($values['page'] === false)
            $values['page'] = 1;
        if ($values['limit'] === false)
            $values['limit'] = 10;

        $news = $this->models->newsModel->paginate($values['page'], $values['limit'], ['date DESC']);
        $count = ceil($this->models->newsModel->countAll() / (float)$values['limit']);
        if (count($news))
            $this->render('find', ['news' => $news, 'count' => $count, 'page' => $values['page']]);
        else
            $this->render404();
    }

    public function find()
    {
        $options = [
            'page' => FILTER_SANITIZE_NUMBER_INT,
            'limit' => FILTER_SANITIZE_NUMBER_INT,
            'type' => FILTER_SANITIZE_NUMBER_INT
        ];
        $values = filter_input_array(INPUT_GET, $options);

        if (is_array($values)) {
            $options['page'] = FILTER_VALIDATE_INT;
            $options['limit'] = FILTER_VALIDATE_INT;
            $options['type'] = FILTER_VALIDATE_INT;
            $values = filter_var_array($values, $options);
        }

        if (empty($values) || $values['type'] === false) {
            $this->render404();
            return;
        }

        if ($values['page'] === false)
            $values['page'] = 1;
        if ($values['limit'] === false)
            $values['limit'] = 10;

        $news = $this->models->newsModel->paginateByType($values['type'], $values['page'], $values['limit']);
        $count = ceil($this->models->newsModel->count($values['type']) / (float)$values['limit']);
        if (count($news))
            $this->render('find', ['news' => $news, 'count' => $count, 'page' => $values['page']]);
        else
            $this->render404();
    }

    public function findOne($id)
    {
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        //TODO: status 400?
        if (!isset($id) || $id === false)
            $this->render404();
        $vm = $this->models->newsModel->getOne($id);
        if ($vm)
            $this->render('findOne', ['vm' => $vm]);
        else
            $this->render404();
    }
}