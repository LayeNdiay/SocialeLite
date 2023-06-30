<?php
require_once "Controller.php";
require_once MODEL . "Contact.php";
class AuthController  extends Controller
{
    public function login()
    {
        if ($this->isConnected()) {
            $this->redirect();
        }
    }
    public function loginPost()
    {
        if (!isset($_POST["phone"])) {
            $this->redirect("/login");
        }

        $user = Contact::findByPhoneNumber($_POST["phone"]);
        if ($user === false) {
            $_SESSION["error"] = "Numéro de téléphone inconnu";
            $this->login();
        } else {
            $_SESSION["user"] = $user->id;
            $this->redirect();
        }
    }
}
