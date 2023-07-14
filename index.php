<?php
$cotrollerPath = __DIR__ . DIRECTORY_SEPARATOR . "Controller" . DIRECTORY_SEPARATOR;
require_once $cotrollerPath . "HomeController.php";
require_once $cotrollerPath . "ContactController.php";
require_once $cotrollerPath . "GroupController.php";
require_once $cotrollerPath . "AuthController.php";
require_once $cotrollerPath . "MessageController.php";
$home = new HomeController();
$contact = new ContactController();
$auth = new AuthController();
$group = new GroupController();
$message = new MessageController();
$action = $_GET["action"] ?? "accueil";
if ($action === "accueil") {
    $home->index();
} elseif ($action === "contacts") {
    $contact->index();
} elseif ($action === "login") {
    $auth->login();
} elseif ($action === "loginPost") {
    $auth->loginPost();
} elseif ($action === "groupes") {
    $group->index();
} elseif ($action === "Onegroupe") {
    $group->viewOne(intval($_GET["id"]));
} elseif ($action === "createGroupes") {
    $group->create();
} elseif ($action === "createGroupesPost") {
    $group->store();
} elseif ($action === "createContacts") {
    $contact->create();
} elseif ($action === "createContactsPost") {
    $contact->store();
} elseif ($action === "oneContact") {
    $contact->view(intval($_GET["id"]));
} elseif ($action === "logout") {
    $auth->logout();
} elseif ($action === "addMessage") {
    $message->create(intval($_GET["idDiscussion"]), intval($_GET["idContact"]));
} elseif ($action === "register") {
    $auth->signUp();
} elseif ($action === "addMenber") {
    $group->addMenber(intval($_GET["id"]));
} elseif ($action === "addMenageGroup") {
    $message->createGroupe(intval($_GET["idGroupe"]), intval($_GET["idContact"]), intval($_GET["idDiscussion"]));
}