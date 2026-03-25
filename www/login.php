<?php
session_start();

if ($_POST['password'] === 'admin123') { // change le mot de passe
    $_SESSION['admin'] = true;
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Connexion Admin</title>
</head>
<body>
<h2>Connexion Admin</h2>
<form method="POST">
    <input type="password" name="password" placeholder="Mot de passe">
    <button>Connexion</button>
</form>
</body>
</html>
