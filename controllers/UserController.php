<?php
/**
 * Created by PhpStorm.
 * User: Vladyslav
 * Date: 26.11.2015
 * Time: 22:46
 */

namespace controllers;


use Core\Controller;
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
        if (isset($this->user)) {
            header('Location : /index.html');
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
        if (!$user)
            $this->render('signin', ['errors' => ['Authorization' => 'Check your name and password']]);
        else {
            $values['password'] = hash('sha256', $values['password'] . $user->getSalt());
            if ($values['password'] === $user->getPassword()) {
                setcookie('user_id', $user->getId(), time() + 60 * 60 * 24, '/');
                header('Location: /index.html');
                return;
            } else $this->render('signin', ['errors' => ['Authorization' => 'Failed']]);
        }

    }

    public function signUp()
    {
        if (isset($this->user)) {
            header('Location : /index.html');
            exit(0);
        }

        $this->render('signup');
    }

    public function create()
    {
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
            $this->render('signup', ['errors' => $errors, 'previousValues' => $values]);
            return;
        }

        if ($values['password'] !== $values['repeatPassword']) {
            $this->render('signup', ['errors' => ['password' => 'Passwords do not match'], 'previousValues' => $values]);
        }

        if ($this->models->UsersModel->findOneByName($values['name'])) {
            $this->render('signup', ['errors' => ['name' => 'Already exists'], 'previousValues' => $values]);
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
                header('Location: /index.html');
                return;
            } else {
                $this->render('signup', ['errors' => ['Database' => 'Saving Failed'], 'previousValues' => $oldValues]);
            }

        }
    }

    public function signin()
    {
        $this->render('signin');
    }

    public function signout()
    {
        setcookie("user_id", "", time() - 3600);
        header('Location: /index.html');

    }
}