<?php
/**
 * Created by PhpStorm.
 * User: Vladyslav
 * Date: 25.11.2015
 * Time: 22:40
 */

namespace controllers;


use Core\Controller;
use Core\View;
use models\Page;

class PagesController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('pageModel');
    }

    public function root() {
        $page = $this->models->pageModel->findOneByName('index');
        if (!isset($page)) {
            $this->render404();
            return;
        }

        $this->render('/page', ['content' => $page->getContent()]);
    }

    public function index($type)
    {
        $page = $this->models->pageModel->findOneByName('index');
        if (!isset($page)) {
            $this->render404();
            return;
        }

        switch ($type) {
            case 'html':
                $this->render('/page', ['content' => $page->getContent()]);
                break;
            case 'xml':
                $xml = new \SimpleXMLElement("<xml/>");

                $variables = (array)$page;
                foreach ($variables as $key => $variable) {
                    $key = str_replace("\0models\\Page\0", "", $key);
                    $xml->addChild($key, $variable);
                }

                header("Content-Type: application/xml");
                echo $xml->saveXML();
                break;
            case 'json':
                $variables = (array)$page;
                $json = [];

                foreach ($variables as $key => $variable) {
                    $oldKey = $key;
                    $key = str_replace("\0models\\Page\0", "", $key);
                    $json[$key] = $variables[$oldKey];
                }

                $json['content'] = View::partial("page", ['content' => $page->getContent()]);
                $this->echo_json_encode($json);
                break;
            default:
                $this->render404();
        }

    }

    public function pagesXml()
    {
        $items = $this->models->pageModel->getAllForXML();

        $xml = new \SimpleXMLElement("<xml/>");
        $pages = $xml->addChild("Pages");
        foreach ($items as $page) {
            $element = $pages->addChild("Page");
            $variables = (array)$page;

            foreach ($variables as $key => $variable) {
                $key = str_replace("\0models\\Page\0", "", $key);
                $element->addChild($key, $variable);
            }
        }


        header("Content-Type: application/xml");
        echo $xml->asXML();
    }


    public function findOne($name, $type)
    {
        $page = $this->models->pageModel->findOneByName($name);
        if (!isset($page)) {
            $this->render404();
            return;
        }

        switch ($type) {
            case 'html':
                /** @var Page $page */
                $this->render('/page', ['content' => $page->getContent()]);
                break;
            case 'xml':
                $xml = new \SimpleXMLElement("<xml/>");

                $variables = (array)$page;
                foreach ($variables as $key => $variable) {
                    $key = str_replace("\0models\\Page\0", "", $key);
                    $xml->addChild($key, $variable);
                }

                header("Content-Type: application/xml");
                echo $xml->saveXML();
                break;
            case 'json':
                $variables = (array)$page;
                $json = [];

                foreach ($variables as $key => $variable) {
                    $oldKey = $key;
                    $key = str_replace("\0models\\Page\0", "", $key);
                    $json[$key] = $variables[$oldKey];
                }

                $json['content'] = View::partial("page", ['content' => $page->getContent()]);
                if (array_key_exists('redirect', $_GET) && $_GET['redirect'] === 'true')
                    $json['header'] = $this->partial('header', [
                        'user' => $this->user,
                        'pages' => $this->pages
                    ]);
                $this->echo_json_encode($json);
                break;
            default:
                $this->render404();
        }
    }

    public function rss()
    {
        $items = $this->models->pageModel->getAllForXML();
        header("Content-Type: application/rss+xml; charset=utf-8");
        $this->render("/rss", ["items" => $items], false);
    }


    public function delete($id)
    {
        $this->models->pageModel->delete($id);

        header('Location: /dashboard/pages', true, 302);
    }

    public function updateOrCreate() {
        $options = [
            "id" => ["filter" => FILTER_SANITIZE_NUMBER_INT],
            "name" => ["filter" => FILTER_SANITIZE_STRING],
            'access' => ['filter' => FILTER_SANITIZE_NUMBER_INT],
            'link' => ['filter' => FILTER_SANITIZE_URL],
            'route' => ['filter' => FILTER_SANITIZE_STRING],
            'order' => ['filter' => FILTER_SANITIZE_NUMBER_INT],
            'show' => ['filter' => FILTER_SANITIZE_NUMBER_INT],
            'system' => ['filter' => FILTER_SANITIZE_NUMBER_INT],
            'menuOrder' => ['filter' => FILTER_SANITIZE_NUMBER_INT],
            'date' => ['filter'=> FILTER_SANITIZE_STRING],
            'content' => ['filter' => FILTER_SANITIZE_SPECIAL_CHARS]
        ];
        $keys =array_flip(array_keys($options)) ;
        unset($keys['id']);
        unset($keys['content']);
        unset($keys['menuOrder']);
        $values = filter_input_array(INPUT_POST, $options);

        $valid = true;
        if (!empty($values)) {
            $values = array_map("trim", $values);
            $values['id'] = filter_var($values['id'], FILTER_VALIDATE_INT);
            $values['show'] = filter_var($values['show'], FILTER_VALIDATE_INT);
            $values['access'] = filter_var($values['access'], FILTER_VALIDATE_INT);
            $values['order'] = filter_var($values['order'], FILTER_VALIDATE_INT);
            $values['system'] = filter_var($values['system'], FILTER_VALIDATE_INT);
            $values['menuOrder'] = filter_var($values['menuOrder'], FILTER_VALIDATE_INT);



            foreach ($keys as $field => $key)
                if (empty($values[$field])) {
                    if($values[$field] === 0)
                        continue;
                    $valid = false;
                    break;
                }
            if(empty( $values['menuOrder']))
                $values['menuOrder'] = 0;
        } else
            $valid = false;

        $page = new Page($values);

        if (!$valid) {
            $this->addFlash("message", "Form is invalid", "danger");
            $this->render("/dashboard/editPage", ['page' => $page], 'dashboard');
        } else {
            $result = null;

            if (!empty($values['id']))
                $result = $this->models->pageModel->update($page);
            else
                $result = $this->models->pageModel->create($page);

            if ($result) {
                $this->addFlash("message", "Operation successful", "success");
                header('Location: /dashboard/pages', true, 301);
            } else {
                $this->addFlash("message", "Error when saving", "danger");
                $this->render("/dashboard/editPage", ['page' => $page], 'dashboard');
            }
        }
    }
}