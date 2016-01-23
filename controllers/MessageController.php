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

    function createMessage($type = 'html')
    {
        switch ($type) {
            case 'html':
                $this->render('/static/contact');
                break;
            case 'json':
                $data['content'] = $this->partial('/static/contact');
                $this->echo_json_encode($data);
                break;
            default:
                $this->render404();
                break;
        }
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
            $errors['email'] = 'Не правильно введен электронный адрес';
        }

        if (!strlen($values['name'])) {
            $hadError = true;
            $errors['name'] = 'Пожалуйста, введите имя';
        }
        if (strlen($values['message']) < 6) {
            $hadError = true;
            $errors['message'] = 'Сообщение должно содержать хотя бы 6 символов';
        }

        $returnAjax = isset($_REQUEST['ajax']) && $_REQUEST['ajax'] === 'true';

        if (!$hadError) {
            $values['ip'] = $this->getRealIpAddress();
            if ($this->models->messageModel->create(new Message($values)))
                $data = ['message' => "Спасибо за ваше сообщение,  {$values['name']}", 'previousValues' => []];
            else
                $data = ['errors' => ['database' => 'Не удалось сохранить в базе']];
        } else {
            header($_SERVER["SERVER_PROTOCOL"] . " 400 Bad Request", true, 400);
            $data = ['errors' => $errors, 'previousValues' => $values];
        }

        if ($returnAjax) {
            $this->echo_json_encode($data);
        } else
            $this->render('/static/contact', $data);
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

        $messages = $this->models->messageModel->paginate($values['page'], $values['limit'], ['date DESC']);
        $count = $this->models->messageModel->count();
        if (count($messages))
            $this->render('find', ['messages' => $messages, 'count' => $count, 'page' => $values['page']]);
        else
            $this->render404();
    }

    public function delete($id)
    {
        $this->models->messageModel->delete($id);

        header('Location: /dashboard/messages', true, 302);
    }

    public function updateOrCreate()
    {
        $options = [
            "id" => ["filter" => FILTER_SANITIZE_NUMBER_INT],
            "name" => ["filter" => FILTER_SANITIZE_STRING],
            "email" => ["filter" => FILTER_SANITIZE_EMAIL],
            "message" => ["filter" => FILTER_SANITIZE_STRING],
            "answer" => ["filter" => FILTER_SANITIZE_STRING],
            "ip" => ["filter" => FILTER_SANITIZE_STRING]
        ];
        $keys = ['name', 'email', 'message', 'ip'];

        $values = filter_input_array(INPUT_POST, $options);
        $valid = true;

        if (!empty($values)) {
            $values = array_map('trim', $values);
            $values['email'] = filter_var($values['email'], FILTER_VALIDATE_EMAIL);
            $values = array_map("trim", $values);
            $values['id'] = filter_var($values['id'], FILTER_VALIDATE_INT);
            foreach ($keys as $key)
                if (empty($values[$key])) {
                    $valid = false;
                    break;
                }
        } else
            $valid = false;

        $message = new Message($values);

        if (!$valid) {
            $this->addFlash("message", "Form is invalid", "danger");
            $this->render("/dashboard/editMessage", ['message' => $message], 'dashboard');
        } else {
            $result = null;

            if (!empty($values['id']))
                $result = $this->models->messageModel->update($message);
            else
                $result = $this->models->messageModel->create($message);

            if ($result) {
                $this->addFlash("message", "Operation successful", "success");
                header('Location: /dashboard/messages', true, 301);

            } else {
                $this->addFlash("message", "Error when saving", "danger");
                $this->render("/dashboard/editMessage", ['message' => $message], 'dashboard');
            }
        }
    }
}