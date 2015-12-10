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
        $this->loadModel('PageModel');
    }

    public function index($type)
    {
        $page = $this->models->PageModel->findOneByName('home');
        if (!isset($page)) {
            $this->render404();
            return;
        }

        switch ($type) {
            case 'html':
                $this->render('/page', ['content' => $page->getContent()]);
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
                $json['header'] = View::partial('loginpartial', ['user' => $this->user]);
                header("Content-Type: application/json");
                echo json_encode($json);
                break;
            default:
                $this->render404();
        }

    }

    public function pagesXml()
    {
        $items = $this->models->PageModel->getAllForXML();

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
        $page = $this->models->PageModel->findOneByName($name);
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
                header("Content-Type: application/json");
                echo json_encode($json);
                break;
            default:
                $this->render404();
        }
    }

    public function rss()
    {
        $items = $this->models->PageModel->getAllForXML();
        header("Content-Type: application/rss+xml");
        $this->render("/rss", ["items" => $items], false);
    }

    public function header()
    {
        echo View::partial("header");
    }
}