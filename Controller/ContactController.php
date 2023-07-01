<?php

require_once "Controller.php";
require_once MODEL . "Contact.php";

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::findByPhoneNumber("772374233");
        if ($contacts) {
            # code...
            var_dump($contacts);
        }
        var_dump("contacts");
    }
    public function created()
    {
    }
    public function store()
    {
    }
}
