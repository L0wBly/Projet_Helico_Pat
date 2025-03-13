<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $pseudo = filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_STRING);
  $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

  if ($pseudo && $password) {
      $user = ["pseudo" => $pseudo, "password" => password_hash($password, PASSWORD_DEFAULT)];
      $users = json_decode(file_get_contents("utilisateurs.json"), true) ?? [];
      $users[] = $user;
      file_put_contents("utilisateurs.json", json_encode($users));
      header("Location: connexion.php");
      exit;
  } else {
      echo "Veuillez remplir tous les champs.";
  }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <h1>Inscription</h1>
    <form method="POST">
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" id="pseudo" required>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" required>
        <input type="submit" value="Inscription">
    </form>
</body>
</html>