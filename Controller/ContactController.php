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

        $discusions = Message::findMydiscussion($user->getId());
        var_dump($discusions);
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
            $_SESSION["error"] =  "Le formulaire est incomplet";
            $_SESSION["old"] = ["name" => $_POST["name"], "phone" => $_POST["phone"]];
            $this->redirect("/contact/create");
        }

        $contact = new Contact(0, $_POST["name"], $_POST["phone"]);

        if (Contact::findByPhoneNumber("772374233")) {
            $contact->create();
            $this->redirect("/contact");
        } else {
            $_SESSION["error"] = "Ce numéro de téphone est déjà enrégitré";
            $_SESSION["old"] = ["phone" => $_POST["phone"]];
            $this->redirect("/contact/create");
        }
    }
}
