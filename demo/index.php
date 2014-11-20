<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Demo</title>
    <link type="text/css" rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="css/screen.css" />
    <script type="text/javascript" src="../bower_components/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="../src/jquery.syncheight.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</head>

<?php

require_once 'php/Lorem.php';
$lorem = new Lorem();

?>

<body>
    <div class="jumbotron">
        <div class="container">
            <h1>Hello, world!</h1>
            <p><?php echo $lorem->getTitle(); ?></p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a></p>
        </div>
    </div>
    <div class="container">
        <div class="row" id="items">
            <?php foreach (range(0, 30) as $i) { ?>
                <div class="item col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <h2><?php echo $lorem->getTitle(); ?></h2>
                    <?php echo $lorem->getParagraphs(rand(1, 6)); ?>
                    <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &laquo;</a></p>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>