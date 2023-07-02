<?php
require_once "Contact.php";
require_once DAO . "MessageManager.php";
class Message
{
    private int $id;
    private int $idExpediteur;
    private string $content;
    private  DateTime $createdAt;
    private static  $messageManger;
    public static function initialise()
    {
        self::$messageManger = new MessageManager(__CLASS__);
    }


    public function __construct(int $id, string $content, DateTime $date, int $idExpediteur)
    {
        $this->id = $id;
        $this->content = $content;
        $this->idExpediteur = $idExpediteur;
        $this->createdAt = $date;
        self::initialise();
    }
    public static function findMydiscussions(int $id)
    {
        self::initialise();
        $discussions = self::$messageManger->find($id);
        for ($i = 0; $i < count($discussions); $i++) {
            $discussions[$i]["contact"] = Contact::findById(intval($discussions[$i]["contact"]));
        }
        return $discussions;
    }

    public static function findGroupeMessages(int $id)
    {
    }

    /**
     * Get the value of Content
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of Content
     *
     * @return  self
     */
    public function setContent($content)
    {
        $this->content = $content;

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

    /**
     * Get the value of idExpediteur
     */
    public function getIdExpediteur()
    {
        return $this->idExpediteur;
    }

    /**
     * Set the value of idExpediteur
     *
     * @return  self
     */
    public function setIdExpediteur($idExpediteur)
    {
        $this->idExpediteur = $idExpediteur;

        return $this;
    }

    /**
     * Get the value of createdAt
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set the value of createdAt
     *
     * @return  self
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
