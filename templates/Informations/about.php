<?php
/**
 * @var string[] $aboutContents //for content block
 */

echo $this->Html->script('/vendor/bootstrap/js/bootstrap.min.js', ['block' => true]);
echo $this->Html->css('lifestyle.css', ['block' => true]);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collapsible Example</title>
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js"></script>
</head>
<body>
<div class="container mt-4 lifestyle-main">


    <h1 class = "heading">
        About Gemino
    </h1>
    <br><br>

    <p>
        <?= $aboutContents['main-paragraph']?>

    </p>
    <br><br>

    <div class="about">
        <div class="col">
            <h3><?= $aboutContents['sub-heading-1']?></h3> <br>
            <?= $aboutContents['sub-paragraph-1']?>

        </div>
        <div class="col order-1">
            <h3><?= $aboutContents['sub-heading-2']?></h3><br>
            <?= $aboutContents['sub-paragraph-2']?>


        </div>
        <div class="col order-2">
            <h3><?= $aboutContents['sub-heading-3']?> </h3><br><br>
            <?= $aboutContents['sub-paragraph-3']?>
        </div>
    </div>
    <br>
    <br>

</div>

