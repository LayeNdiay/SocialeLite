<?php

use function PHPSTORM_META\type;

require_once "Manager.php";
class MessageManager extends Manager
{
    private string   $class;
    private string  $contactClass;
    private string  $groupeClasse;
    public function __construct(string $class, string $contact, string $group)
    {
        $this->class = $class;
        $this->contactClass = $contact;
        $this->groupeClasse = $group;
    }
    public function find(int $id)
    {
        $discussionsXml = $this->getXml()->xpath("/messagerie/discussions/discussion[@type='individuel']");
        $discussions = [];
        foreach ($discussionsXml as $discussionXml) {

            $discussionItem = $discussionXml->xpath("participants/participant[@id=$id]");
            if (!empty($discussionItem)) {
                $discussion = [];
                $discussion['id'] = intval($discussionItem[0]->xpath("../..")[0]->attributes()['id']);
                $discussion["contact"] = $discussionItem[0]->xpath("../participant[@id!=$id]")[0]->attributes()['id'];
                $lastMessage = $discussionXml->xpath("messages/message[last()]");
                $message = false;
                if (!empty($lastMessage)) {
                    $lastMessage = $lastMessage[0];
                    $citation = $lastMessage->xpath('citation');
                    $idCitation = 0;
                    if (!empty($citation)) {
                        $idCitation = intval($citation[0]->attributes()["id"]);
                    }
                    $expediteur =  $this->contactClass::findById(intval($lastMessage->expediteur->attributes()['id']));
                    $message = new $this->class(intval($lastMessage->attributes()['id']), $lastMessage->contenu, new DateTime($lastMessage[0]->created_at), $expediteur, $idCitation, $lastMessage->contenu[0]->attributes()["type"]);
                }
                $discussion["message"] = $message;
                array_push($discussions, $discussion);
            }
        }
        return $discussions;
    }
    public function findById(int $id, int $idEmeteur)
    {
        $discussionsXml = $this->getXml()->xpath("/messagerie/discussions/discussion[@id=$id]");
        if (empty($discussionsXml)) {
            return [];
        }
        $discussionsXml = $discussionsXml[0];
        $discussions = [];
        $type = $discussionsXml->attributes()["type"];
        if ($type == "individuel") {
            $recepteur = $discussionsXml->xpath("participants/participant[@id!=$idEmeteur]")[0];
            $discussions["recepteur"] = $this->contactClass::findById(intval(($recepteur->attributes()["id"])));
        } else {
            $recepteur = $discussionsXml->attributes()["groupe"];
            $discussions["groupe"] = $this->groupeClasse::findById(intval($recepteur));
        }
        $messagesXml = $discussionsXml->xpath("messages/message");
        $messages = [];
        foreach ($messagesXml as $messageXml) {
            $expediteur =  $this->contactClass::findById(intval($messageXml->expediteur->attributes()['id']));
            $citation = $messageXml->xpath('citation');
            $idCitation = 0;
            if (!empty($citation)) {
                $idCitation = intval($citation[0]->attributes()["id"]);
            }

            $message = new $this->class(intval($messageXml->attributes()['id']), $messageXml->contenu, new DateTime($messageXml[0]->created_at), $expediteur, $idCitation, $messageXml->contenu[0]->attributes()["type"]);
            array_push($messages, $message);
        }
        $discussions["messages"] = $messages;

        return $discussions;
    }
    public function save($message, int $id)
    {
        $xml = $this->getXml();
        $discussionsXml = $xml->xpath("/messagerie/discussions/discussion[@id=$id]")[0];
        $messages = $discussionsXml->messages;
        if (count($discussionsXml->messages) <= 0) {
            $messages = $discussionsXml->addChild("messages");
        }
        $message->setId(count($discussionsXml->messages));
        $messageXml = $messages->addChild("message");
        $messageXml->addAttribute("id", $message->getId());
        $messageXml->addChild("expediteur")->addAttribute("id", $id);
        $messageXml->addChild("contenu", $message->getContent())->addAttribute("type", $message->getType());
        $messageXml->addChild("created_at", $message->getCreatedAt()->format('Y-m-d H:i:s'));
        if ($message->getCitation() > 0) {
            $messageXml->addChild("citation")->addAttribute("id", $message->getCitation());
        }
        $xml->asXML(self::$file);
    }
}
