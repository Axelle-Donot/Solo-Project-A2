<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title><?= $page_title; ?></title>
    <link rel="stylesheet" href="assets/lib/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/styles/general.css"/>
  </head>
  <body>
    <?php require_once File::getApp(array("views", "element", "header.php")); ?>
    <div class="main">
      <?php
      $filepath = File::getApp(array("views", self::$object, "$view.php"));
      require_once $filepath;
      ?>
    </div>
    <div class="footer">
      Site de projet Solo - Q5
    </div>

    <script defer src="assets/lib/bootstrap.bundle.min.js"></script>
    <script defer src="assets/lib/fontawesome.js"></script>
  </body>
</html>


