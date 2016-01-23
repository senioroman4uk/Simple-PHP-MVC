<?php
/**
 * Created by PhpStorm.
 * User: Vladyslav
 * Date: 15.01.2016
 * Time: 20:19
 */

namespace controllers;


use Core\Controller;
use models\Slide;

class SlideController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('slideModel');
    }

    public function delete($id)
    {
        $this->models->slideModel->delete($id);

        header('Location: /dashboard/slides', true, 302);
    }

    public function updateOrCreate() {
        $options = [
            "id" => ["filter" => FILTER_SANITIZE_NUMBER_INT],
            "image" => ["filter" => FILTER_SANITIZE_STRING],
            'link' => ['filter' => FILTER_SANITIZE_URL],
            'title' => ['filter' => FILTER_SANITIZE_STRING]
        ];
        $keys =array_flip(array_keys($options)) ;
        $values = filter_input_array(INPUT_POST, $options);

        //if id is empty not validating it
        if(empty($values['id']))
            unset($keys['id']);

        $valid = true;
        if (!empty($values)) {
            $values = array_map("trim", $values);
            $values['id'] = filter_var($values['id'], FILTER_VALIDATE_INT);

            foreach ($keys as $field => $key)
                if (empty($values[$field])) {
                    $valid = false;
                    break;
                }
        } else
            $valid = false;

        $slide = new Slide($values);

        if (!$valid) {
            $this->addFlash("message", "Form is invalid", "danger");
            $this->render("/dashboard/editSlide", ['slide' => $slide], 'dashboard');
        } else {
            $result = null;

            if (!empty($values['id']))
                $result = $this->models->slideModel->update($slide);
            else
                $result = $this->models->slideModel->create($slide);

            if ($result) {
                $this->addFlash("message", "Operation successful", "success");
                header('Location: /dashboard/slides', true, 301);
            } else {
                $this->addFlash("message", "Error when saving", "danger");
                $this->render("/dashboard/editSlide", ['slide' => $slide], 'dashboard');
            }
        }
    }
}