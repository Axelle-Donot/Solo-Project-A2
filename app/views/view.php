<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $pagetitle; ?></title>
    </head>
    <header>
        
    </header>
    <body>
    <?php
    
        $filepath = File::build_path(array("View", $controller, "$view"));
        require $filepath;
    ?>
    </body>
    <footer>
        <p style="border: 1px solid black;text-align:right;padding-right:1em;">
        Site de covoiturage
        </p>
    </footer>
</html>
