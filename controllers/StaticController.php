<?php
namespace controllers;

use Core\Controller;

class StaticController extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->render('home');
    }
}