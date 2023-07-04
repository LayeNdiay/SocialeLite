<?php
require_once "Controller.php";
require_once MODEL . "Message.php";
require_once MODEL . "Group.php";

class HomeController extends Controller
{
    public function index()
    {
        $this->requiredAuth();
        $user = $this->user();
        $discusions = Message::findMydiscussions($user->getId());
        $groups = Group::find($user->getId());

        require $this->viewsPath . "index.php";
    }
}
