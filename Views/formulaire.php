<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="./src/bootstrap.css">

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
      <label for="message" class="form-label">Example textarea</label>
      <textarea class="form-control" id="message" rows="3"></textarea>
   </div>


<?php } else if ($info == "new-msg") { ?>
   <form method="POST" action="">

      <label for="discussion" class="form-label">votre message</label>
      <select class="form-control" aria-label="Discussion" id="discussion">
         <?php foreach ($items as $item) : ?>
            <option value=<?= $item ?>><?= $item ?></option>
         <?php endforeach; ?>
      </select>

      <label for="citer_message" class="form-label">votre message</label>
      <select class="form-control" aria-label="citer un message de la discussion" id="citer_message">
         <?php foreach ($items as $item) : ?>
            <option value=<?= $item ?>><?= $item ?></option>
         <?php endforeach; ?>
      </select>
      <div class="mb-3">
         <label for="message" class="form-label">votre message</label>
         <textarea class="form-control" id="message" rows="3"></textarea>
      </div>
   </form>
<?php } else echo "bonjour";
?>

<style>
   label {
      color: white;
   }
</style>