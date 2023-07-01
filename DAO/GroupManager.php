<?php
require_once "Manager.php";
class GroupManager extends Manager
{
    private static $class;
    public function __construct(string $class)
    {
        self::$class = $class;
    }
    public function find(int $id)
    {
        $groupsXml = $this->getXml()->xpath("/messagerie/groupes/groupe/membres/contact[@id=$id]");
        $groups = [];
        if (!empty($groupsXml)) {
            foreach ($groupsXml as $group) {
                $goupAppartient = $group->xpath("../..");
                array_push($groups, new self::$class(intval($goupAppartient[0]->attributes()["id"]), $goupAppartient[0]->nom));
            }
        }
        return $groups;
    }
    public function findById(int $id)
    {
        $groups = $this->getXml()->xpath("/messagerie/groupes/groupe[@id=$id]");
        if (!empty($groups)) {
            return new self::$class(intval($groups[0]->attributes()["id"]), $groups[0]->nom);
        }
        return false;
    }
}
