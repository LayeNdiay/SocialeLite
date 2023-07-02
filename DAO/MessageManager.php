<?php
require_once "Manager.php";
class MessageManager extends Manager
{
    private static $class;
    public function __construct(string $class)
    {
        self::$class = $class;
    }
    public function find(int $id)
    {
        $discusionsXml = $this->getXml()->xpath("/messagerie/discussions/discussion[@type='individuel']");
        $discusions = [];
        foreach ($discusionsXml as $discusionXml) {

            $discusionItem = $discusionXml->xpath("participants/participant[@id=$id]");
            if (!empty($discusionItem)) {
                $discusion = [];
                $discusion['id'] = intval($discusionItem[0]->xpath("../..")[0]->attributes()['id']);
                $discusion["contact"] = $discusionItem[0]->xpath("../participant[@id!=$id]")[0]->attributes()['id'];
                $lastMessage = $discusionXml->xpath("messages/message[last()]");
                $message = false;
                if (!empty($lastMessage)) {
                    $lastMessage = $lastMessage[0];
                    $message = new self::$class(intval($lastMessage->attributes()['id']), $lastMessage->contenu, new DateTime($lastMessage[0]->created_at), intval($lastMessage->expediteur->attributes()['id']));
                }
                $discusion["message"] = $message;
                array_push($discusions, $discusion);
            }
        }
        return $discusions;
    }
}
