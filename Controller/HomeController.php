<?php
require_once "Controller.php";
require_once MODEL . "Message.php";
class HomeController extends Controller
{
    public function index()
    {
        $this->requiredAuth();
        $user = $this->user();

        $discusions = Message::findMydiscussion($user->getId());
        require $this->viewsPath . "index.php";
    }
}
