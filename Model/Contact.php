<?php
require_once "Model.php";

require_once DAO . "ContactManager.php";

class Contact extends Model
{
    private int $id;
    private string $name;
    private string $telephone;
    private static  $contactManager;
    public static function initialise()
    {
        self::$contactManager = new ContactManager(__CLASS__);
    }

    public function __construct(int $id = 0, string $name, string $telephone)
    {
        $this->id = $id;
        $this->name = $name;
        $this->telephone = $telephone;
        self::initialise();
    }
    public static function find()
    {
        self::initialise();
        return self::$contactManager->find();
    }
    public static function findById(int $id)
    {
        self::initialise();
        return self::$contactManager->findById($id);
    }
    public static function findByPhoneNumber(string $phone)
    {
        self::initialise();
        return self::$contactManager->findByPhoneNumber($phone);
    }
    public function create(int $id)
    {
        return self::$contactManager->create($this, $id);
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
