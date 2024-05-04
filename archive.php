<?php 

$_SERVER['PHP_AUTH_USER'] != "admin" ? Header("Location: /") : 0;

$pageTitle = "Архив заверешенных задач" 

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Tracker</title>

    <link rel="stylesheet" href="./static/styles/fonts.css">
    <link rel="stylesheet" href="./static/styles/icon.css">
    <link rel="stylesheet" href="./static/styles/material.css">
    <link rel="stylesheet" href="./static/styles/styles.css">

  </head>
  <body>

      <?php require_once "./static/templates/menu.php"; ?>
  
      <main class="mdl-layout__content">

      <?php require_once "./static/templates/archiveTasks.php"; ?>

      </main>

      
    <script src="./static/scripts/script.js"></script>
  </body>
</html>

