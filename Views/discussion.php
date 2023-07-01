<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
   <script
      src="https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js?lang=xml&amp;skin=sunburst"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
      crossorigin="anonymous"></script>
   <link rel="stylesheet" href="./src/style.css" />
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
         <div class="formulaire">

            <section class="msger">
               <header class="msger-header">
                  <div class="msger-header-title">
                     <span class="material-symbols-outlined">
                        <i class="fa fa-chevron-left" style="font-size:24px"></i>
                     </span> SimpleChat
                  </div>
               </header>
               <main class="msger-chat">
                  <div class="msg left-msg">
                     <div class="msg-bubble">
                        <div class="msg-info">
                           <div class="msg-info-name">Azprime</div>
                           <div class="msg-info-time">12:45
                              <div class="btn-group">
                                 <!-- <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Action
                                 </button> -->
                                 <button class="chevron-down dropdown-toggle" data-bs-toggle="dropdown"></button>
                                 <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Citer ce message</a></li>

                                 </ul>
                              </div>


                           </div>
                        </div>

                        <div class="msg-text">
                           bonjour 😄
                        </div>
                     </div>
                  </div>

                  <div class="msg right-msg">
                     <div class="msg-bubble">
                        <div class="msg-info">
                           <div class="msg-info-name">UserName</div>
                           <div class="msg-info-time">12:46</div>
                        </div>
                        <div class="msg-text">Message Bidon!</div>
                     </div>
                  </div>
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
   <?php include $_SERVER['DOCUMENT_ROOT'] . "SocialeLite/src/style.css"; ?>
</style>
<script>
   <?php include $_SERVER['DOCUMENT_ROOT'] . "SocialeLite/src/script.js"; ?>

</script>