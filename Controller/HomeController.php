<?php
require_once "Controller.php";
class HomeController extends Controller
{
    public function index()
    {
        require $this->viewsPath . "index.php";
    }
}
