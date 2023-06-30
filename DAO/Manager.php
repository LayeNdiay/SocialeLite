<?php
class Manager
{
    protected static $file = __DIR__ . DIRECTORY_SEPARATOR . "data.xml";
    public function getXml()
    {
        if (file_exists(self::$file)) {
            return simplexml_load_file(self::$file);
        } else {
            throw new Exception('Echec lors de l\'ouverture du fichier test.xml.');
        }
    }
}
