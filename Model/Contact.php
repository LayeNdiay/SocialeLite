<?php
require_once "./DAO/ContactManager.php";
class Contact
{
    private int $id;
    private int $name;
    private int $telephone;
    private static  $contactManager;
    public function initialise()
    {
        self::$contactManager = new ContactManager(__CLASS__);
    }

    public function __construct(int $id, string $name, int $telephone)
    {
        $this->id = $id;
        $this->name = $name;
        $this->telephone = $telephone;
    }
    public static function find()
    {
        return self::$contactManager->find();
    }
    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of telephone
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set the value of telephone
     *
     * @return  self
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }
}
