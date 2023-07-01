<?php

//contacts
$contacts = array(
   array(
      "id_contact" => "n1",
      "nom" => "Malick SOW",

   ),
   array(
      "id_contact" => "n2",
      "nom" => "Issa FALL"
   ),
   array(
      "id_contact" => "n3",
      "nom" => "Fallou BA"
   )
);

//groupes
$groupes = ["DIC1", "DIC2"];


//messages
$messages = array(
   array(
      "discussion_id" => 1,
      "expediteur" => "malick SOW",
      "contenu" => "Bonjour",
      "timestamp" => "2023-06-28 10:00:00"
   ),
   array(
      "discussion_id" => 2,
      "expediteur" => "Astou dia",

      "contenu" => "cv ? quoi de 9",
      "timestamp" => "2023-06-28 11:00:00"
   ),
   array(
      "discussion_id" => 3,
      "expediteur" => "Bro ",
      "contenu" => "tu viens a la fete ?",
      "timestamp" => "2023-06-28 11:05:00"
   ),
   array(
      "discussion_id" => 4,
      "expediteur" => "Bro ",
      "contenu" => "tu viens a la fete ?",
      "timestamp" => "2023-06-28 11:05:00"
   ),
   array(
      "discussion_id" => 5,
      "expediteur" => "Bro ",
      "contenu" => "tu viens a la fete ?",
      "timestamp" => "2023-06-28 11:05:00"
   ),
   array(
      "discussion_id" => 6,
      "expediteur" => "Bro ",
      "contenu" => "tu viens a la fete ?",
      "timestamp" => "2023-06-28 11:05:00"
   ),

);





$info = isset($_GET['info']) ? $_GET['info'] : '';


if ($info == "new-msg") { ?>
   <!-- nouveau message -->
   <form action="contacts/create" method="POST" > 
   <div class="mb-3">
      <label for="Nom-contacte" class="form-label">Nom Contacte</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="adama dia">
   </div>
   <div class="mb-3">
      <label for="numero-contact" class="form-label">Numero Contacte</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="774563267">
   </div>

   <div class="mb-3">
  <button tyle="submit" class="btn btn-primary">Crée</button>  
   </div>
   </form>


<?php } else if ($info == "private-msg") { ?>

      <!-- discussion instantannee -->
      <div class="listContact">

      <?php foreach ($messages as $message) {
         ?>
         <a href="<?= "discussion/" . $message['discussion_id'] ?>" class="bullDiscussion">
            <p></p>
         <?= $message['expediteur'] ?>
            </p>
            <p>
            <?= $message['contenu'] ?>
            </p>
            <span class="time-right">
            <?= $message['timestamp'] ?>
            </span>
         </a>
      <?php } ?>
      </div>
   <?php } else { ?>

      <!-- groupes -->
      <form method="POST" action="">

         <label for="discussion" class="form-label">Nom du groupe</label>
         <select class="form-select" aria-label="Discussion" id="discussion">
         <?php foreach ($groupes as $groupe): ?>
            <option value=<?= $groupe ?>><?= $groupe ?></option>
         <?php endforeach; ?>
         </select>

         <label for="citer_message" class="form-label">citer un message du chat</label>
         <select class="form-select" aria-label="citer un message de la discussion" id="citer_message">
         <?php foreach ($messages as $message): ?>
            <option value=<?= $message['contenu'] ?>><?= $message['contenu'] ?></option>
         <?php endforeach; ?>
         </select>
         <div class="mb-3">
            <label for="message" class="form-label">votre message</label>
            <textarea class="form-control" id="message" rows="3"></textarea>
         </div>
      </form>

   <?php } ?>

<style>
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
</style>