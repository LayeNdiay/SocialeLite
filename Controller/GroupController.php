<?php
require_once "Controller.php";
require_once MODEL . "Group.php";
require_once MODEL . "Contact.php";
class GroupController extends Controller
{
    public function index()
    {
        $group = new Group(0, "test2");
    }
    public function addMenberView(int $id)
    {
        $this->requiredAuth();
        $error = $this->flash();
        $old = $this->old();
    }
    public function addMenber(int $id)
    {
        if (!isset($_POST["contact"])) {
            $_SESSION["error"] =  "Le champ Contact est obligatoire";
            $_SESSION["old"] = ["contact" => $_POST["contact"]];
            $this->redirect("/groupes/$id");
        }
        $group = Group::findById($id);
        $contact = Contact::findById($_POST["contact"]);
        $group->addMember($contact);
    }
    public function viewOne(int $id)
    {
        $this->requiredAuth();
        $groups = Group::findById($id);
        $discusions = Message::findMydiscussion($groups->idDiscussion, 0);
        $user = $this->user();
        $user_id = $user->getId();
        $contacts = Contact::find();
        $idDiscussion = $id;
        require $this->viewsPath . "discussionGroup.php";
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
        $user = $this->user();

        if ($group->verify()) {
            $_SESSION["error"] = "Ce nom de group existe déjà";
            $_SESSION["old"] = ["name" => $_POST["name"]];
            $this->redirect("/groupes/create");
        } else {
            $idDiscussion =  $group->save($user->getId());
            $this->redirect("/groupes" . "/" . $group->getId());
        }
    }
}
