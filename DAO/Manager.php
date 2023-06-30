<?php
class Manager
{
    protected static $file = __DIR__ . DIRECTORY_SEPARATOR . "whatsapp.xml";
    public function getXml()
    {
        var_dump(self::$file);
        if (file_exists(self::$file)) {
            return simplexml_load_file(self::$file);
        } else {
            throw new Exception('Echec lors de l\'ouverture du fichier test.xml.');
        }
    }
    public function save()
    {
        $this->getXml()->saveXML(self::$file);
    }
}
