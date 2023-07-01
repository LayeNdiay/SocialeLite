<?php
$xml = simplexml_load_file("data.xml");
// $xml->contacts->addAttribute("adama", "je suis Big Laye");
// var_dump($xml->saveXML("data.xml")); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>

    <?php include_once("./Views/inscription.php") ?>
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