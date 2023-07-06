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
$groupes = [["name" => "DIC1", "id" => 1], ["name" => "DIC2", "id" => 2]];


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
<form action="contacts/create" method="POST">
   <div class="mb-3">
      <label for="name" class="form-label">Nom Contacte</label>
      <input type="text" class="form-control" name="name" placeholder=" nom du contacte">
   </div>
   <div class="mb-3">
      <label for="phone" class="form-label">Numero Contacte</label>
      <input type="text" class="form-control" name="phone" placeholder="77*******">
   </div>
   <div class="mb-3">
      <button tyle="submit" class="btn btn-primary">Crée</button>
   </div>
</form>


<?php } else if ($info == "private-msg") { ?>

<!-- discussion instantannee -->
<div class="listContact">

   <?php foreach ($discusions as $discusion) {
         ?>
   <a href=<?= "discussion/" . $discusion['id'] ?> class="bullDiscussion">
      <p>
         <?= $discusion['contact']->getName() ?>
      </p>
      <p>
         <?php echo ($discusion['message']) ? $discusion['message']->getContent() : "Vous n'avez pas de message" ?>
      </p>
      <span class="time-right">
         <?php echo ($discusion['message']) ? $discusion['message']->getCreatedAt()->format("H:i") : '' ?>

      </span>
   </a>
   <?php } ?>
</div>
<?php } elseif ($info == "group-msg") { ?>

<!-- groupes -->
<div class="listContact listgroupe">

   <?php foreach ($groups as $groupe) {
         ?>
   <a href=<?= "groupes/" . $groupe->getId() ?> class="bullDiscussion groupe">
      <p>
         <?= $groupe->getName() ?>
      </p>
   </a>
   <?php } ?>
</div>

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
</style>