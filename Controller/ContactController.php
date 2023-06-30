<?php

define("MODEL", dirname(__DIR__) . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR);
require_once "Controller.php";
require_once MODEL . "Contact.php";

class ContactController extends Controller
{
    public function index()
    {
        Contact::find();
    }
}
