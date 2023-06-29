<?php
$xml = simplexml_load_file("data.xml");
// $xml->contacts->addAttribute("adama", "je suis Big Laye");
// var_dump($xml->saveXML("data.xml")); ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>

<body>

   <?php include_once("./Views/home.php") ?>
</body>

</html>
<style>
   body {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      background-color: rgb(40 44 51);
   }
</style>
