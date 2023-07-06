<?php

require_once "Controller.php";
require_once MODEL . "Contact.php";
require_once MODEL . "Message.php";

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
    public function view(int $id)
    {
        $user = $this->user();
        $userId = $user->getId();
        $discusions = Message::findMydiscussion($id, $userId);
        require $this->viewsPath . "discussion.php";
        // var_dump($discusions);
    }
    public function create()
    {
        $this->requiredAuth();
        $error = $this->flash();
        $old = $this->old();
    }
    public function store()
    {
        $this->requiredAuth();
        if (!isset($_POST["phone"]) || !isset($_POST["name"])) {
            $_SESSION["error"] = "Le formulaire est incomplet";
            $_SESSION["old"] = ["name" => $_POST["name"], "phone" => $_POST["phone"]];
            $this->redirect("/contacts/create");
        }


        if (!Contact::findByPhoneNumber($_POST["phone"])) {
            $contact = new Contact(0, $_POST["name"], $_POST["phone"]);
            $id = $contact->create($this->user()->getId());
            $this->redirect("/discussion" . '/' . $id);
        } else {
            $_SESSION["error"] = "Ce numéro de téphone est déjà enrégitré";
            $_SESSION["old"] = ["phone" => $_POST["phone"]];
            $this->redirect("/");
        }
    }
}
