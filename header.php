<?php
  session_start();
  require __DIR__ . '/vendor/autoload.php';

  use App\UserRepository;
  use App\User;

  $base = new PDO('mysql:host=localhost;dbname=blogweb', 'root', '');
  $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Blog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/menuStyle.css">
  </head>
  <body>
    <?php include("menu.php"); ?>

  </body>
</html>
