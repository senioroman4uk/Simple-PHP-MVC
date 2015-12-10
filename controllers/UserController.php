<?php
/**
 * Created by PhpStorm.
 * User: Vladyslav
 * Date: 26.11.2015
 * Time: 22:46
 */

namespace controllers;


use Core\Controller;
use Core\View;
use models\User;

class UserController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->loadModel('UsersModel');
    }

    public function login()
    {
        $returnJson = isset($_REQUEST['ajax']) && $_REQUEST['ajax'] === 'true';

        if (isset($this->user)) {
            if ($returnJson) {
                header('Location : /index.json', true, 301);
            } else {
                header('Location : /index.html', true, 301);
            }
            exit(0);
        }
        $options = [
            "name" => ["filter" => FILTER_SANITIZE_STRING],
            "password" => ["filter" => FILTER_SANITIZE_STRING],
        ];

        $values = filter_input_array(INPUT_POST, $options);
        if (!empty($values))
            $values = array_map('trim', $values);

        if (!strlen($values['name']))
            $values['name'] = "";

        if (!strlen($values['password']))
            $values['password'] = "";

        $user = $this->models->UsersModel->findOneByName($values['name']);

        $data = null;

        if (!$user) {
            $data = ['errors' => ['Authorization' => 'Check your name and password']];
        } else {
            $values['password'] = hash('sha256', $values['password'] . $user->getSalt());
            if ($values['password'] === $user->getPassword()) {
                setcookie('user_id', $user->getId(), time() + 60 * 60 * 24, '/');

                if ($returnJson) {
                    header("Content-Type: application/json");
                    echo json_encode(['header' => View::partial('loginpartial', ['user' => $user])]);
                } else
                    header('Location : /index.html', true, 301);
                return;
            } else {
                $data = ['errors' => ['Authorization' => 'Failed']];
            }
        }

        if (isset($data)) {
            if ($returnJson) {
                header("Content-Type: application/json");
                header("Bad Request", true, 400);
                echo json_encode($data);
            } else
                $this->render('signin', $data);
        }
    }

    public function signUp($type)
    {
        if (isset($this->user)) {
            header('Location : /index.html', true, 301);
            exit(0);
        }

        if ($type === 'json')
            echo json_encode(['content' => View::partial('user/signup')]);
        else
            $this->render('signup');
    }

    public function create()
    {
        $returnAjax = isset($_REQUEST['ajax']) && $_REQUEST['ajax'] === 'true';

        $options = [
            "name" => ["filter" => FILTER_SANITIZE_STRING],
            "email" => ["filter" => FILTER_SANITIZE_EMAIL],
            "password" => ["filter" => FILTER_SANITIZE_STRING],
            "repeatPassword" => ["filter" => FILTER_SANITIZE_STRING],
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
        if (strlen($values['password']) < 6) {
            $hadError = true;
            $errors['password'] = 'Too small, min length 6';
        }
        if (strlen($values['repeatPassword']) < 6) {
            $hadError = true;
            $errors['repeatPassword'] = 'Too small, min length 6';
        }


        if ($hadError) {
            if (!$returnAjax)
                $this->render('signup', ['errors' => $errors, 'previousValues' => $values]);
            else {
                header("Bad Request", true, 400);
                header("Content-Type: application/json");
                echo json_encode($errors);
            }
            return;
        }

        if ($values['password'] !== $values['repeatPassword']) {
            if (!$returnAjax)
                $this->render('signup', ['errors' => ['password' => 'Passwords do not match'], 'previousValues' => $values]);
            else {
                header("Bad Request", true, 400);
                header("Content-Type: application/json");
                echo json_encode(['password' => 'Passwords do not match']);
            }
        }

        if ($this->models->UsersModel->findOneByName($values['name'])) {
            if (!$returnAjax)
                $this->render('signup', ['errors' => ['name' => 'Already exists'], 'previousValues' => $values]);
            else {
                header("Bad Request", true, 400);
                header("Content-Type: application/json");
                echo json_encode(['name' => 'Already exists']);
            }
            return;
        } else {
            $oldValues = $values;
            unset($values['repeatPassword']);
            $values['salt'] = uniqid(mt_rand(), true);
            $values['password'] = hash('sha256', $values['password'] . $values['salt']);
            $values['role'] = 1;
            $user = $this->models->UsersModel->create(new User($values));
            if (isset($user)) {
                setcookie('user_id', $user->getId(), time() + 60 * 60 * 24, '/');
                if (!$returnAjax)
                    header('Location: /index.html', true, 301);
                else
                    header("Location: /index.json", true, 301);
                return;
            } else {
                if (!$returnAjax)
                    $this->render('signup', ['errors' => ['Database' => 'Saving Failed'], 'previousValues' => $oldValues]);
                else {
                    header("Bad Request", true, 400);
                    header("Content-Type: application/json");
                    echo json_encode(['Database' => 'Saving Failed']);
                }
            }

        }
    }

    public function signin()
    {
        $this->render('signin');
    }

    public function signout($type)
    {
        setcookie("user_id", "", time() - 3600);
        $this->user = null;

        if ($type === 'html')
            header('Location: /index.' . $type, true, 301);
        else
            echo View::partial("loginpartial", ['user' => $this->user]);

    }
}