<?php
require_once "Manager.php";
class GroupManager extends Manager
{
    private string $class;
    private string $contactClass;
    public function __construct(string $class, string $contactClass)
    {
        $this->class = $class;
        $this->contactClass = $contactClass;
    }
    public function find(int $id)
    {
        $groupsXml = $this->getXml()->xpath("/messagerie/groupes/groupe/membres/contact[@id=$id]");
        $groups = [];
        if (!empty($groupsXml)) {
            foreach ($groupsXml as $group) {
                $goupAppartient = $group->xpath("../..");
                $contactXml = $goupAppartient[0]->xpath("membres/contact");
                $contacts = [];
                foreach ($contactXml as $contact) {
                    $contact = $this->contactClass::findById(intval($contact->attributes()["id"]));
                    $contacts[] = $contact;
                }
                $group = new $this->class(intval($goupAppartient[0]->attributes()["id"]), $goupAppartient[0]->nom);
                $group->contacts = $contacts;
                $groups[] = $group;
            }
        }
        return $groups;
    }
    public function findById(int $id)
    {
        $groups = $this->getXml()->xpath("/messagerie/groupes/groupe[@id=$id]");
        if (!empty($groups)) {
            $contacts = [];
            $group = new $this->class(intval($groups[0]->attributes()["id"]), $groups[0]->nom);
            $contactXml = $groups[0]->xpath("membres/contact");
            foreach ($contactXml as $contact) {
                $contact = $this->contactClass::findById(intval($contact->attributes()["id"]));
                array_push($contacts, $contact);
            }
            $discussions = $this->getXml()->xpath("/messagerie/discussions/discussion[@type='groupe']/groupe[@id=$id]");
            $discussions = $discussions[0]->xpath("..");
            $group->idDiscussion = intval($discussions[0]->attributes()["id"]);
            $group->contacts = $contacts;
            return $group;
        }
        return false;
    }
    public function verify($name)
    {
        $groupsXml = $this->getXml()->xpath("/messagerie/groupes/groupe/nom");

        return in_array($name, $groupsXml);
    }
    public function save($group, $id)
    {
        $xml = $this->getXml();
        $groupsXml = $xml->groupes[0];
        $groupNode = $groupsXml->addChild("groupe");
        $group->setId(count($groupsXml->children()));
        $groupNode->addAttribute('id', $group->getId());
        $groupNode->addChild('nom', $group->getName());
        $membres =  $groupNode->addChild('membres');
        $membres->addChild("contact")->addAttribute('id', $id);
        $discussions = $xml->discussions[0];
        $idDiscussion = count($discussions->children());
        $discussion = $discussions->addChild('discussion');
        $discussion->addAttribute("id", $idDiscussion);
        $discussion->addAttribute("type", "groupe");
        $discussion->addChild("groupe")->addAttribute('id', $group->getId());

        $xml->asXML(self::$file);
        return $idDiscussion;
    }
}
