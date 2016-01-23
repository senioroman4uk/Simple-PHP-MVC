<?php
/**
 * Created by PhpStorm.
 * User: Vladyslav
 * Date: 23.12.2015
 * Time: 16:39
 */

namespace controllers;


use Core\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('messageModel');
        $this->loadModel('pageModel');
        $this->loadModel('slideModel');
    }

    public function index() {
        $this->render('index', [], "dashboard");
    }


    public function showMessages() {
        $page = filter_var($_GET['page'], FILTER_SANITIZE_NUMBER_INT);
        $page = filter_var($page, FILTER_VALIDATE_INT);

        if(!$page)
            $page = 1;
        $limit = 10;
        $count = $this->models->messageModel->count();
        $messages = $this->models->messageModel->paginate($page, $limit);

        $this->render("editMessages", ['messages' => $messages, 'page' => $page, 'limit' => $limit, 'count' => $count], 'dashboard');
    }

    public function editMessage($id) {
        $message = $this->models->messageModel->getOne($id);
        if (!isset($message))
        {
            $this->render404();
            return;
        }

        $this->render('editMessage', ['message' => $message], 'dashboard');
    }

    public function showPages() {
        $page = filter_var($_GET['page'], FILTER_SANITIZE_NUMBER_INT);
        $page = filter_var($page, FILTER_VALIDATE_INT);

        if(empty($page))
            $page = 1;
        $limit = 10;
        $count = $this->models->pageModel->count();
        $pages = $this->models->pageModel->paginate($page, $limit);

        $this->render("editPages", ['items' => $pages, 'page' => $page, 'limit' => $limit, 'count' => $count], 'dashboard');
    }

    public function editPage($id) {
        $page = $this->models->pageModel->getOne($id);
        if (!isset($page))
        {
            $this->render404();
            return;
        }

        $this->render('editPage', ['page' => $page], 'dashboard');
    }

    public function createPage() {
        $values = [];
        $page = new \models\Page($values);
        $page->setId(null);

        $this->render('editPage', ['page' => $page], 'dashboard');
    }

    public function showSlides() {
        $page = filter_var($_GET['page'], FILTER_SANITIZE_NUMBER_INT);
        $page = filter_var($page, FILTER_VALIDATE_INT);

        if(empty($page))
            $page = 1;
        $limit = 10;

        $count = $this->models->slideModel->count();
        $slides = $this->models->slideModel->paginate($page, $limit);

        $this->render("editSlides", ['slides' => $slides, 'page' => $page, 'limit' => $limit, 'count' => $count], 'dashboard');
    }

    public function editSlide($id) {
        $slide = $this->models->slideModel->getOne($id);

        if (!isset($slide))
        {
            $this->render404();
            return;
        }

        $this->render('editSlide', ['slide' => $slide], 'dashboard');
    }
}