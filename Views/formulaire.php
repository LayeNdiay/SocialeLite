<?php

$items = ["private-msg", "new-msg", "group-msg"];

$info = isset($_GET['info']) ? $_GET['info'] : '';


if ($info == "private-msg") {

?>
   <div class="mb-3">
      <label for="Nom-contacte" class="form-label">Nom Contacte</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="adama dia">
   </div>
   <div class="mb-3">
      <label for="numero-contact" class="form-label">Numero Contacte</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="774563267">
   </div>

   <div class="mb-3">
      <label for="message" class="form-label">Votre message</label>
      <textarea class="form-control" id="message" rows="3"></textarea>
   </div>


<?php } else if ($info == "new-msg") { ?>
   <form method="POST" action="">
<div>
   <label for="discussion" class="form-label">Contacte</label>
   <select class="form-select" aria-label="Discussion" id="discussion">
      <?php foreach ($items as $item) : ?>
         <option value=<?= $item ?>><?= $item ?></option>
         <?php endforeach; ?>
      </select>
      <!-- <div id="validationServerUsernameFeedback" class="invalid-feedback">
     Veillez selectioner un contacte.
   </div> -->
   </div>
<div>
   <label for="citer_message" class="form-label">citer un message de la conversation</label>
   <select class="form-select" aria-label="citer un message de la discussion" id="citer_message" required>
      <?php foreach ($items as $item) : ?>
         <option value=<?= $item ?>><?= $item ?></option>
         <?php endforeach; ?>
      </select>
   </div>
      <div class="mb-3 has-validation">
         <label for="message" class="form-label">votre message</label>
         <textarea class="form-control" id="message" rows="3"></textarea>
      </div>
   </form>
<?php } else {

?>

   <form method="POST" action="">

      <label for="discussion" class="form-label">Nom du groupe</label>
      <select class="form-select" aria-label="Discussion" id="discussion">
         <?php foreach ($items as $item) : ?>
            <option value=<?= $item ?>><?= $item ?></option>
         <?php endforeach; ?>
      </select>

      <label for="citer_message" class="form-label">citer un message du chat</label>
      <select class="form-select" aria-label="citer un message de la discussion" id="citer_message">
         <?php foreach ($items as $item) : ?>
            <option value=<?= $item ?>><?= $item ?></option>
         <?php endforeach; ?>
      </select>
      <div class="mb-3">
         <label for="message" class="form-label">votre message</label>
         <textarea class="form-control" id="message" rows="3"></textarea>
      </div>
   </form>

<?php } ?>

<style>
   label {
      color: white;
   }
</style>