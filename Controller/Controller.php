<?php
class Controller
{
    protected string $viewsPath;
    public function __construct()
    {
        $this->viewsPath = dirname(__DIR__) . DIRECTORY_SEPARATOR . "Views" . DIRECTORY_SEPARATOR;
    }
}
