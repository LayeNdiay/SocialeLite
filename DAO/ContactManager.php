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
        $contactsXml = $this->getXml()->xpath("/messagerie/contacts/contact");
        $contacts = [];
        foreach ($contactsXml as $contact) {
            array_push($contacts, new self::$class(intval($contact->attributes()["id"]), $contact->nom, intval($contact->telephone)));
        }
        return $contacts;
    }
    public function findById(int $id)
    {
        $contactsXml = $this->getXml()->xpath("/messagerie/contacts/contact[@id=$id]");
        if ($contactsXml) {
            return  new self::$class(intval($contactsXml[0]->attributes()["id"]), $contactsXml[0]->nom, $contactsXml[0]->telephone);
        }
        return false;
    }
    public function findByPhoneNumber(string $phone)
    {
        $contactsXml = $this->getXml()->xpath("/messagerie/contacts/contact");
        if ($contactsXml) {
            foreach ($contactsXml as $contactXml) {
                if ($contactXml->telephone == $phone) {

                    return  new self::$class(intval($contactXml[0]->attributes()["id"]), $contactXml[0]->nom, $contactXml[0]->telephone);
                }
            }
        }
        return false;
    }
    public function create($contact, $id)
    {
        $xml = $this->getXml();
        $contactsXml = $xml->contacts[0];
        $contactNode = $contactsXml->addChild("contact");
        $contact->setId(count($contactsXml->children()));
        $contactNode->addChild('nom', $contact->getName());
        $contactNode->addChild('telephone', $contact->getTelephone());
        $contactNode->addAttribute('id', $contact->getId());
        $discussions = $xml->discussions[0];
        $idDiscussion = count($discussions->children());
        $discussion = $discussions->addChild('discussion');
        $discussion->addAttribute("id", $idDiscussion);
        $discussion->addAttribute("type", "individuel");
        $participants = $discussion->addChild("participants");
        $participants->addChild("participant")->addAttribute('id', $contact->getId());
        $participants->addChild("participant")->addAttribute('id', $id);



        $xml->asXML(self::$file);

        return $idDiscussion;
    }
}
