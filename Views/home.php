<?php define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="./src/prism.css">
   <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"> -->
   <script src="./src/prism.js"></script>
   <script src="./src/home.js"></script>
   <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->

   <title>Document</title>
</head>

<body>
   <div class="contenant">
      <div style="display: flex">

         <div class="codeXML">
            <pre>
             <code class="language-xml">
             <?php
               highlight_file(ROOT . "dialogue.xml"); ?>   
            </code>
            </pre>
         </div>
         <div class="bootstrap-utilities">
            <h2 id="iii">Demarrer Une une</h2>
            <div class="buttons">
               <button data-info="private-msg">
                  <img width="24" height="24" src="./src/new msg.png" alt="private-message" />
                  Discussion Prive</button>
               <button data-info="new-msg">
                  <img width="24" height="24" src="./src/ajouter msg.png" alt="new-message" />
                  Nouvelle Discussion</button>
               <button data-info="group-msg">
                  <img width="24" height="24" src="./src/groupe msg.png" alt="groupe-message" />
                  Discussion de Groupe</button>
            </div>
            <div id="formulaire"></div>
         </div>
      </div>
   </div>
</body>



</html>
<style>
   h2 {
      margin-top: 30px;
      color: white;
      text-align: center;
   }

   .buttons {
      margin-top: 10px;
      display: flex;
      flex-direction: row;
      justify-content: space-between;
   }

   .buttons button {
      outline: none;
      border-radius: 20px;
      padding: 10px;
      display: flex;
      flex-direction: row;
   }

   #formulaire {
      width: 90%;
      /* margin-left: 20px; */
   }
</style>