<?php
require_once "Model.php";

require_once DAO . "GroupManager.php";
class Group extends Model
{
    private string $name;
    private int $id;
    private static  $groupManager;
    public static function initialise()
    {
        self::$groupManager = new GroupManager(__CLASS__);
    }


    public function __construct(int $id = 0, string $name)
    {
        $this->name = $name;
        $this->id = $id;
        self::initialise();
    }

    public static function find(int $id)
    {
        self::initialise();
        return self::$groupManager->find($id);
    }

    public static function findById(int $id)
    {
        self::initialise();
        return self::$groupManager->findById($id);
    }

    public function verify()
    {
        return self::$groupManager->verify($this->name);
    }

    public function save(int $id)
    {
        return self::$groupManager->save($this, 1);
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
}
