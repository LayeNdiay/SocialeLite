<?php
require_once "Controller.php";
require_once MODEL . "Contact.php";
require_once MODEL . "Message.php";

class MessageController extends Controller
{
    public function create()
    {
        $message = new Message(0, "salut", new DateTime(), Contact::findById(1), 0, "texte");
        $message->create(8);
    }
}
