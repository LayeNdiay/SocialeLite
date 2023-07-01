<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
   <script src="https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js?lang=xml&amp;skin=sunburst"></script>
   <title>Document</title>
</head>

<body>
   <div class="contenant">
      <div style="display: flex">

         <div class="codeXML">
            <pre class="prettyprint">
             <code class="language-xml">
             <?php
               highlight_file("../DAO/data.xml"); ?>   
            </code>
            </pre>
         </div>
         <div class="bootstrap-utilities">
            <h2 id="bullDiscussion">Demarrer Une une</h2>
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
<script src="./src/home.js"></script>
<style>
   .formulaire {
      max-height: 600px;
      overflow: scroll;
   }

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

   *,
   *::before,
   *::after {
      box-sizing: border-box;
   }

   html,
   body {
      height: 100%;
      width: 100%;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      background-color: rgb(40 44 51);
   }

   .codeXML {
      margin-left: 0px;
      padding-right: 10px;
      display: flex;
      width: 50%;
      max-height: 600px;

   }

   .container {
      height: 100%;
      width: 100%;
   }
</style>