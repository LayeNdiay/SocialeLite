<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <!-- importer le fichier de style -->
</head>

<body>
   <div id="container">
      <h1>
         <?php echo isset($_GET['discussion_id']) ? $_GET['discussion_id'] : ''; ?>
      </h1>
   </div>
</body>

</html>