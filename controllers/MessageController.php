<?php
/**
 * Created by PhpStorm.
 * User: Vladyslav
 * Date: 03.10.2015
 * Time: 13:54
 */

namespace controllers;


use Core\Controller;

class MessageController extends Controller
{
    public function create()
    {
        $errors = [];
        $values = [];
        $keys = ['name', 'email', 'message'];
        $hadError = false;
        try {
            foreach ($keys as $key)
                if (!array_key_exists($key, $_POST)) {
                    $errors[$key] = 'Not specified';
                    $hadError = true;
                } else
                    $values[$key] = $_POST[$key];

            if (!$hadError) {
                if (!filter_var($values['email'], FILTER_VALIDATE_EMAIL)) {
                    $hadError = true;
                    $errors['email'] = 'Invalid email';
                }
                if (!strlen($values['name'])) {
                    $hadError = true;
                    $errors['name'] = 'Too small';
                }
                if (strlen($values['message']) < 6) {
                    $hadError = true;
                    $errors['message'] = 'Too small, min length 6';
                }
            }
        } catch (\Exception $e) {
            $hadError = true;
            $errors['exception'] = 'Unhandled exception';
        }


        if (!$hadError)
            $this->render('/static/contact', ['name' => $values['name'], 'previousValues' => []]);
        else
            $this->render('/static/contact', ['errors' => $errors, 'previousValues' => $values]);
    }
}