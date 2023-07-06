<?php
require_once "Controller.php";
require_once MODEL . "Contact.php";
require_once MODEL . "Message.php";

class MessageController extends Controller
{
    public function create(int $idDiscussion, int $idContact)
    {

        $content = "";
        $type = "";
        if (isset($_POST["text"]) && $_POST["text"] !== "") {
            $content = $_POST["text"];
            $type = "text";
        } else if ($_FILES["audio"]["error"] == 0) {
            $content = dirname(__DIR__) . DIRECTORY_SEPARATOR . "DAO" . DIRECTORY_SEPARATOR . "files" . DIRECTORY_SEPARATOR . time() . basename($_FILES["audio"]["name"]);
            move_uploaded_file($_FILES["audio"]["tmp_name"], $content);
            $type = "audio";
        }
        $message = new Message(0, $content, new DateTime(), Contact::findById($idContact), 0, $type);
        $message->create($idDiscussion);
    }
}
