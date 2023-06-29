<?php
$xml = simplexml_load_file("data.xml");
$xml->contacts->addAttribute("laye", "je suis Big Laye");
var_dump($xml->saveXML("data.xml"));
