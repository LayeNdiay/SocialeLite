<?php
require_once "Contact.php";
require_once "Group.php";
require_once DAO . "MessageManager.php";
class Message
{
    private int $id;
    private Contact $expediteur;
    private string $content;
    private  DateTime $createdAt;
    private static  $messageManger;
    public static function initialise()
    {
        self::$messageManger = new MessageManager(__CLASS__, Contact::class, Group::class);
    }


    public function __construct(int $id, string $content, DateTime $date, Contact $expediteur)
    {
        $this->id = $id;
        $this->content = $content;
        $this->expediteur = $expediteur;
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

    public static function findMydiscussion(int $id, int $expediteur = 0)
    {
        self::initialise();
        return self::$messageManger->findById($id, $expediteur);
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
     * Get the value of expediteur
     */
    public function getexpediteur()
    {
        return $this->expediteur;
    }

    /**
     * Set the value of expediteur
     *
     * @return  self
     */
    public function setexpediteur($expediteur)
    {
        $this->expediteur = $expediteur;

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
