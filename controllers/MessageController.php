<?php
/**
 * Created by PhpStorm.
 * User: Vladyslav
 * Date: 03.10.2015
 * Time: 13:54
 */

namespace controllers;


use Core\Controller;
use models\Message;

class MessageController extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->loadModel('messageModel');
    }

    public function create()
    {
        $options = [
            "name" => ["filter" => FILTER_SANITIZE_STRING],
            "email" => ["filter" => FILTER_SANITIZE_EMAIL],
            "message" => ["filter" => FILTER_SANITIZE_STRING]
        ];
        $values = filter_input_array(INPUT_POST, $options);
        if (!empty($values))
            $values = array_map('trim', $values);
        $values['email'] = filter_var($values['email'], FILTER_VALIDATE_EMAIL);

        $errors = [];
        $hadError = false;

        if (!$values['email']) {
            $hadError = true;
            $errors['email'] = 'Invalid email';
        }

        if (!strlen($values['name'])) {
            $hadError = true;
            $errors['name'] = 'Required';
        }
        if (strlen($values['message']) < 6) {
            $hadError = true;
            $errors['message'] = 'Too small, min length 6';
        }

        if (!$hadError) {
            $values['ip'] = $this->getRealIpAddress();
            if ($this->models->messageModel->create(new Message($values)))
                $this->render('/static/contact', ['name' => $values['name'], 'previousValues' => []]);
            else
                $this->render('/static/contact', ['errors' => ['database' => 'saving of message failed']]);
        } else
            $this->render('/static/contact', ['errors' => $errors, 'previousValues' => $values]);
    }

    public function find()
    {
        $options = [
            'page' => FILTER_SANITIZE_NUMBER_INT,
            'limit' => FILTER_SANITIZE_NUMBER_INT
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

        $messages = $this->models->messageModel->getAll($values['page'], $values['limit']);
        $count = ceil($this->models->messageModel->count() / (float)$values['limit']);
        if (count($messages))
            $this->render('find', ['messages' => $messages, 'count' => $count]);
        else
            $this->render404();
    }
}