<!-- nouveau message -->

<?php if (isset($_GET["new-msg"])) { ?>
   <div class="new-msg form">
      <form action="contacts/create" method="POST">
         <div class="mb-3">
            <label for="name" class="form-label">Nom Contacte</label>
            <input type="text" class="form-control" name="name" placeholder="adama dia">
         </div>
         <div class="mb-3">
            <label for="phone" class="form-label">Numero Contacte</label>
            <input type="text" class="form-control" name="phone" placeholder="774563267">
         </div>
         <div class="mb-3">
            <button tyle="submit" class="btn btn-primary">Crée</button>
         </div>
      </form>
   </div>
<?php } ?>
<!-- discussion instantannee -->

<div class="listContact private-msg form" style="display:none">

   <?php foreach ($discusions as $discusion) {
      ?>
      <a href="<?= "discussion/1" ?>" class="bullDiscussion">
         <p>
            <?= $discusion['contact']->getName() ?>
         </p>
         <p>
            <?= $discusion['message']->getContent() ?>
         </p>
         <span class="time-right">
            <?= $discusion['message']->getCreatedAt() ?>
         </span>
      </a>
   <?php } ?>
</div>

<!-- groupes -->
<?php $groupes = [["name" => "DIC1", "id" => 1], ["name" => "DIC2", "id" => 2]];
?>
<div class="listContact listgroupe form group-msg" style="display:none">

   <?php foreach ($groupes as $groupe) {
      ?>
      <a href="<?= "discussionGroup/" . $groupe['id'] ?>" class="bullDiscussion groupe">
         <p>
            <?= $groupe['name'] ?>
         </p>
      </a>
   <?php } ?>
</div>