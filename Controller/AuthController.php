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
        $error = $this->flash();
        require VIEWS . "inscription.php";
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
            $this->verifySession();
            $_SESSION["user"] = $user->getId();
            $this->redirect("/");
        }
    }
    public function logout()
    {
        $this->requiredAuth();
        unset($_SESSION["user"]);
        $this->redirect("/login");
    }
    public function signUp()
    {
        if ($this->isConnected()) {
            $this->redirect();
        }
        if (!isset($_POST["phone"]) || !isset($_POST["Nom-contacte"])) {
            $_SESSION["error"] = "Le formulaire est incomplet";
            $_SESSION["old"] = ["name" => $_POST["Nom-contacte"], "phone" => $_POST["phone"]];
            $this->redirect("/login/register");
        }


        if (!Contact::findByPhoneNumber($_POST["phone"])) {
            $contact = new Contact(0, $_POST["Nom-contacte"], $_POST["phone"]);
            $contact->inscription();
            $this->verifySession();
            $_SESSION["user"] = $contact->getId();
            $this->redirect("/");
        } else {
            $_SESSION["error"] = "Ce numéro de téphone est déjà enrégitré";
            $_SESSION["old"] = ["phone" => $_POST["phone"]];
            $this->redirect("/login/register");
        }
    }
}
