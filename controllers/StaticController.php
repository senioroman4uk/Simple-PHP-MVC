<?php
namespace controllers;

use Core\Controller;
use Core\View;

class StaticController extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->render('politics');
    }


    public function politics()
    {
        $this->render('politics');
    }

    public function sport()
    {
        $this->render('sport');
    }

    public function country()
    {
        $this->render('country');
    }

    public function contact()
    {
        $this->render('contact');
    }
}