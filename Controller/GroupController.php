<?php
require_once "Controller.php";
require_once MODEL . "Group.php";
class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::find(1);
    }
    public function viewOne(int $id)
    {
        $groups = Group::findById($id);
        var_dump($groups);
    }
}
