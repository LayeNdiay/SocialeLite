<?php
define("MODEL", dirname(__DIR__) . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR);
class Controller
{
    protected string $viewsPath;
    public function __construct()
    {
        $this->viewsPath = dirname(__DIR__) . DIRECTORY_SEPARATOR . "Views" . DIRECTORY_SEPARATOR;
    }

    public function isConnected()
    {
        if (isset($_SESSION["user"]) && Contact::findById($_SESSION["id"])) {
            return true;
        }
        return false;
    }
    public function verifySession()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
    public function flash(string $message = "error"): string
    {
        $error = "";
        if (isset($_SESSION[$message])) {
            $error = $_SESSION[$message];
            unset($_SESSION[$message]);
        }
        return $error;
    }
    public function old()
    {
        $old = array();
        if (isset($_SESSION["old"])) {
            $old = $_SESSION["old"];
            unset($_SESSION["old"]);
        }
        return $old;
    }
    public function redirect(string $path = "/")
    {
        header("location: http://localhost/DAO" . $path);
    }
    public function requiredAuth()
    {
        if (!$this->isConnected()) {
            $this->redirect("/login");
        }
    }
}
