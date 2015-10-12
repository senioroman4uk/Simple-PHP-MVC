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
            "email" => ["filter" => FILTER_VALIDATE_EMAIL],
            "message" => ["filter" => FILTER_SANITIZE_STRING]
        ];
        $values = filter_input_array(INPUT_POST, $options);
        $values = array_map('trim', $values);
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

    public function find($limit, $page)
    {

    }
}