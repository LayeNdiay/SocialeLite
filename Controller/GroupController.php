<?php
require_once "Controller.php";
require_once MODEL . "Group.php";
class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::find(1);
        var_dump($groups);
    }
    public function viewOne(int $id)
    {
        $this->requiredAuth();
        $groups = Group::findById($id);
        $discusions = Message::findMydiscussion($id, 0);
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
        if (!isset($_POST["name"])) {
            $_SESSION["error"] =  "Le champ groupe est obligatoire";
            $_SESSION["old"] = ["name" => $_POST["name"]];
            $this->redirect("/groupes/create");
        }

        $group = new Group(0, $_POST["name"]);
        $id = $_SESSION["id"];

        if ($group->verify()) {
            $_SESSION["error"] = "Ce nom de group existe déjà";
            $_SESSION["old"] = ["name" => $_POST["name"]];
            $this->redirect("/groupes/create");
        } else {
            $group->save($id);
            $this->redirect("/groupes" . "/" . $group->getId());
        }
    }
}
