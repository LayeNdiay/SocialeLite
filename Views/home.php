<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <script
      src="https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js?lang=xml&amp;skin=sunburst">
   </script>
   <title>Document</title>
</head>

<body>
   <div class="contenant">
      <div style="display: flex">

         <div class="codeXML">
            <pre class="prettyprint">
             <code class="language-xml">
             <?php
             $info = isset($_GET['info']) ? $_GET['info'] : '';
             highlight_file(dirname(__DIR__) . DIRECTORY_SEPARATOR . "DAO" . DIRECTORY_SEPARATOR . "data.xml"); ?>   
            </code>
            </pre>
         </div>
         <div>
            <div class="btn-group">
               <button class="dropdown-toggle logout" data-bs-toggle="dropdown" aria-expanded="false">
                  <?= $user->getName() ?><i class="fa fa-chevron-down"></i>
               </button>
               <ul class="dropdown-menu">
                  <form action="logout" method="POST">
                     <li><button class="dropdown-item" type="submit">se deconnecter</a></li>
                  </form>
               </ul>
            </div>
            <div class="buttons">
               <a href="?info=private-msg">
                  <button class="<?php echo $info == "private-msg" ? "btn btn-primary" : ''; ?>">
                     <img width="24" height="24" src="./src/new msg.png" alt="private-message" />
                     Discussion Prive
                  </button>
               </a>
               <div class="btn-group">
                  <div class="dropdown">
                     <button type="button" class="dropdown-toggle grp-down btn btn-primary" data-bs-toggle="dropdown"
                        data-bs-auto-close="outside" aria-expanded="false"><i class="fa fa-plus"></i>
                     </button>
                     <div>
                        <form class="dropdown-menu p-4" method="POST" action="groupes/create">
                           <div class="mb-3">
                              <label for="name" class="form-label" style="color:black">Nom du Groupe</label>
                              <input type="text" class="form-control" id="name" name="name">
                           </div>
                           <button type="submit" class="btn btn-primary">Crée</button>
                        </form>
                     </div>

                  </div>
                  <a href="?info=group-msg">
                     <button class="<?php echo $info == "group-msg" ? "btn btn-primary grp" : ''; ?>">
                        <img width="24" height="24" src="./src/groupe msg.png" alt="groupe-message" />
                        Discussion de Groupe
                     </button>
                  </a>
               </div>
               <a href="?info=new-msg">
                  <button class="<?php echo $info == "new-msg" ? "btn btn-primary" : ''; ?>">
                     <img width="24" height="24" src="./src/ajouter msg.png" alt="new-message" />
                     Nouvelle Discussion
                  </button>
               </a>




            </div>
            <div id="formulaire">

               <?php include_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "Views" . DIRECTORY_SEPARATOR . "formulaire.php"; ?>
            </div>
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

.buttons a button {
   outline: none;
   border-radius: 20px;
   padding: 10px;
   display: flex;
   flex-direction: row;
}

a {
   text-decoration: none;
   color: inherit;
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

.logout {
   display: flex;
   padding: 10px;
   border-radius: 20px;
}

.btn-group {
   display: flex;
   flex-direction: row-reverse;

}

.container {
   height: 100%;
   width: 100%;
}

.bullDiscussion {
   border: 2px solid #dedede;
   border-radius: 10px;
   padding: 0px 0px 0px 20px;
   margin: 10px 0;
   background-color: #ddd;
   text-align: left;
   text-decoration: none;
   display: block;
   color: black;
}

.listContact {
   max-height: 460px;
   overflow: scroll;
   margin-top: 20px;
}

.listgroupe {
   min-height: 400px;
}

/* Style time text */
.time-right {
   float: right;
   margin-top: -20px;
   margin-left: -10px;
   color: #aaa;
}

label {
   color: white;
}

.groupe {
   padding: 10px;
}

.grp {
   border-top-right-radius: 0px !important;
   border-bottom-right-radius: 0px !important;
}

.grp-down {
   height: 95%;
   border-top-left-radius: 0px !important;
   border-top-right-radius: 20px !important;
   border-bottom-right-radius: 20px !important;
   border-bottom-left-radius: 0px !important;
   margin-bottom: 0 !important;
}

.dropdown-toggle::after {
   display: none;
}

<?php if($info !="group-msg") {
   ?>.grp-down {
      display: none;
   }


   <?php
}

?>
</style>