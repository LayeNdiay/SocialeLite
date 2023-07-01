
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <!-- importer le fichier de style -->
</head>

<body>
  <div id="container">
    <!-- zone de connexion -->
    <form action="login" method="POST">
      <h1 style="text-align: center">Connexion</h1>
      <p><?=$error?></p>
      <label><b>Votre Numero</b></label>
      <input type="number" name="phone" required class="form-control">
      <input type="submit" id='submit' value='LOGIN'>
    </form>
  </div>
</body>

</html>
<style>
  body {
    background: #67BE4B;
  }

  #container {
    width: 500px;
    margin: 0 auto;
    margin-top: 10%;
  }

  /* Bordered form */
  form {
    width: 100%;
    padding: 30px;
    border: 1px solid #f1f1f1;
    background: #fff;
    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
  }

  #container h1 {
    width: 38%;
    margin: 0 auto;
    padding-bottom: 10px;
  }

  /* Full-width inputs */
  input[type=text],
  input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
  }

  /* Set a style for all buttons */
  input[type=submit] {
    background-color: #53af57;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
  }

  input[type=submit]:hover {
    background-color: white;
    color: #53af57;
    border: 1px solid #53af57;
  }
</style>