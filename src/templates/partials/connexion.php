
<!DOCTYPE html>
<html>
<head>
  <title>CodeBanque | Se connecter</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="page-container">
    <h1>Se connecter</h1>
    <form action="/CodeBanque/login.php" method="post">
      <label>Nom d'utilisateur :</label>
      <input type="text" name="username" required="required" />
      <label>Mot de passe :</label>
      <input type="password" name="password" required="required" />
      <input type="submit" value="Se connecter" />
    </form>
  </div>
</body>
</html>