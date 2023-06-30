<?php
$cotrollerPath = __DIR__  . DIRECTORY_SEPARATOR . "Controller" . DIRECTORY_SEPARATOR;
require_once $cotrollerPath . "HomeController.php";
require_once $cotrollerPath . "ContactController.php";
$home = new HomeController();
$contact = new ContactController();
$action = $_GET["action"] ?? "accueil";
if ($action === "accueil") {
    $home->index();
} elseif ($action === "contacts") {
    $contact->index();
}
