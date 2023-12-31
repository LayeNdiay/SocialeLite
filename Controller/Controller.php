<?php
define("MODEL", dirname(__DIR__) . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR);
define("VIEWS", dirname(__DIR__) . DIRECTORY_SEPARATOR . "Views" . DIRECTORY_SEPARATOR);
class Controller
{
    protected string $viewsPath;
    public function __construct()
    {
        $this->viewsPath = dirname(__DIR__) . DIRECTORY_SEPARATOR . "Views" . DIRECTORY_SEPARATOR;
    }
    public function user()
    {
        $this->verifySession();
        return Contact::findById($_SESSION["user"]);
    }

    public function isConnected()
    {
        $this->verifySession();
        if (isset($_SESSION["user"])) {
            if (Contact::findById($_SESSION["user"])) {
                return true;
            }
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
        $this->verifySession();

        $error = "";
        if (isset($_SESSION[$message])) {
            $error = $_SESSION[$message];
            unset($_SESSION[$message]);
        }
        return $error;
    }
    public function old()
    {
        $this->verifySession();
        $old = array();
        if (isset($_SESSION["old"])) {
            $old = $_SESSION["old"];
            unset($_SESSION["old"]);
        }
        return $old;
    }
    public function redirect(string $path = "/")
    {
        header("location: http://localhost/SocialeLite" . $path);
    }
    public function requiredAuth()
    {
        if (!$this->isConnected()) {
            $this->redirect("/login");
        }
    }
}
