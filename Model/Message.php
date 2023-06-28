<?php
require_once "utils/TypeMessage.php";
class Message
{
    private int $id;
    private int $idRecepteur;
    private int $idExpediteur;
    private string $content;
    private TypeMessage $type;

    public function __construct(int $id, string $content, TypeMessage $type, int $idExpediteur, int $idRecepteur = 0)
    {
        $this->id = $id;
        $this->content = $content;
        $this->type = $type;
        $this->idRecepteur = $idRecepteur;
        $this->idExpediteur = $idExpediteur;
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
    public function setType(TypeMessage $type)
    {
        $this->type = $type;

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
     * Get the value of $idRecepteur
     */
    public function getIdRecepteur()
    {
        return $this->idRecepteur;
    }

    /**
     * Set the value of $idRecepteur
     *
     * @return  self
     */
    public function setIdRecepteur($idRecepteur)
    {
        $this->idRecepteur = $idRecepteur;

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
}
