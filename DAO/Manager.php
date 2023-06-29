<?php
class Manager
{
    protected static $file = "whatssap.xml";
    protected SimpleXMLElement $xml;
    public function __construct()
    {
        if (file_exists(self::$file)) {
            $this->xml = simplexml_load_file(self::$file);
        } else {
            throw new Exception('Echec lors de l\'ouverture du fichier test.xml.');
        }
    }
    public function save()
    {
        $this->xml->saveXML(self::$file);
    }
}
