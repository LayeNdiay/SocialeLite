<?php
require_once "Manager.php";
class ContactManager extends Manager
{
    private static $class;
    public function __construct(string $class)
    {
        self::$class = $class;
    }
    public function find()
    {
        $contacts = $this->xml->xpath("/whatsapp/contacts");
        var_dump($contacts);
    }
}
