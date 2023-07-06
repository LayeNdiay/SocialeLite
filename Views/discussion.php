<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
   <script
      src="https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js?lang=xml&amp;skin=sunburst">
   </script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
   </script>
   <link rel="stylesheet" href="./src/style.css" />
   <title>Document</title>
   <script src="https://unpkg.com/wavesurfer.js"></script>
</head>
<?php
$interlocuteur = $discusions["recepteur"]->getName();
$id_interlocuteur = $discusions["recepteur"]->getId();
$messages = $discusions["messages"];

?>

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
         <div class="formulaire">
            <section class="msger">
               <header class="msger-header">
                  <div class="msger-header-title">
                     <a class="material-symbols-outlined chevron" href="/SocialeLite?info=private-msg">
                        <i class="fa fa-chevron-left" style="font-size:24px"></i>
                     </a>
                     <?= $interlocuteur ?>
                  </div>
               </header>
               <main class="msger-chat">
                  <?php foreach ($messages as $message) {
                     $sender = $message->getExpediteur();
                     $time = $message->getCreatedAt();
                     if ($sender->getId() == $id_interlocuteur) { ?>
                  <div class="msg left-msg">
                     <div class="msg-bubble">
                        <div class="msg-info">
                           <div class="msg-info-name">
                              <?= $sender->getName() ?>
                           </div>
                           <div class="msg-info-time">
                              <?= $time->format("H:i") ?>
                              <div class="btn-group"> <button class="chevron-down dropdown-toggle"
                                    data-bs-toggle="dropdown"></button>
                                 <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Citer ce message</a></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <?php if ($message->getType() == "texte")
                         { ?>
                        <div class="msg-text">
                           <?= $message->getContent() ?>
                        </div>
                        <?php 
                       } else { ?>
                        <div class="msg-text">
                           <div id="waveform"></div>
                           <?php require_once $this->viewsPath . "/asset/button.php"; ?>
                        </div>
                        <?php } ?>
                     </div>
                  </div>
                  <?php } else { ?>
                  <div class="msg right-msg">
                     <div class="msg-bubble">
                        <div class="msg-info">
                           <div class="msg-info-name">Vous</div>
                           <div class="msg-info-time">
                              <?= $time->format("H:i") ?>
                           </div>
                        </div>
                        <?php if ($message->getType() == "texte") { ?>
                        <div class="msg-text">
                           <?= $message->getContent() ?>
                        </div>
                        <?php } else { ?>

                        <div class="msg-text">
                           <div id="waveform"></div>
                           <?php require_once $this->viewsPath . "/asset/button.php"; ?>
                        </div>
                        <?php } ?>
                     </div>
                  </div>
                  <?php }
                  } ?>
               </main>
               <form class="msger-inputarea">
                  <input type="text" class="msger-input" placeholder="Votre message." />
                  <button type="submit" class="msger-send-btn">envoyer
                  </button>
               </form>
            </section>
         </div>
      </div>
   </div>
</body>

</html>
<style>
<?php include $_SERVER['DOCUMENT_ROOT'] . "SocialeLite/src/style.css";
?>
</style>
<script>
<?php include $_SERVER['DOCUMENT_ROOT'] . "SocialeLite/src/script.js"; ?>
</script>