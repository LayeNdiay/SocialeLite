<?php
require_once "Contact.php";
require_once "Group.php";
require_once DAO . "MessageManager.php";
class Message
{
    private int $id;
    private Contact $expediteur;
    private string $content;
    private string $type;
    private  DateTime $createdAt;
    private static  $messageManger;
    private int $citation;
    public static function initialise()
    {
        self::$messageManger = new MessageManager(__CLASS__, Contact::class, Group::class);
    }


    public function __construct(int $id, string $content, DateTime $date, Contact $expediteur, int $citaion, string $type)
    {
        $this->id = $id;
        $this->content = $content;
        $this->expediteur = $expediteur;
        $this->createdAt = $date;
        $this->citation = $citaion;
        $this->type = $type;
        self::initialise();
    }
    public function create(int $idDisussion)
    {
        return self::$messageManger->save($this, $idDisussion);
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

    /**
     * Get the value of citation
     */
    public function getCitation()
    {
        return $this->citation;
    }

    /**
     * Set the value of citation
     *
     * @return  self
     */
    public function setCitation($citation)
    {
        $this->citation = $citation;

        return $this;
    }

    /**
     * Get the value of type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }
}
