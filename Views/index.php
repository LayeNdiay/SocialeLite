<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
   <script>
      <?php include dirname(__DIR__) . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "home.js"; ?>
   </script>
   <style>
      <?php include dirname(__DIR__) . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "home.css"; ?>
   </style>
   <script
      src="https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js?lang=xml&amp;skin=sunburst"></script>
   <title>Document</title>
</head>

<body>
   <div class="contenant">
      <div style="display: flex">

         <div class="codeXML">
            <pre class="prettyprint">
             <code class="language-xml">
             <?php
             highlight_file(dirname(__DIR__) . DIRECTORY_SEPARATOR . "DAO" . DIRECTORY_SEPARATOR . "data.xml"); ?>   
            </code>
            </pre>
         </div>
         <div>
            <div class="btn-group">
               <button class="dropdown-toggle logout" data-bs-toggle="dropdown" aria-expanded="false">
                  <?= $user->getName(); ?>
               </button>
               <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">se deconnecter</a></li>
               </ul>
            </div>
            <div class="buttons">
               <button data-info="private-msg" class="monButton">
                  <img width="24" height="24" src="./src/new msg.png" alt="private-message" />
                  Discussion Prive</button>
               <button data-info="new-msg" class="monButton">
                  <img width="24" height="24" src="./src/ajouter msg.png" alt="new-message" />
                  Nouvelle Discussion</button>
               <button data-info="group-msg" class="monButton">
                  <img width="24" height="24" src="./src/groupe msg.png" alt="groupe-message" />
                  Discussion de Groupe</button>
            </div>
            <div>
               <?php include_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "Views" . DIRECTORY_SEPARATOR . "formulaires.php"; ?>
            </div>
         </div>
      </div>
   </div>
</body>

</html>