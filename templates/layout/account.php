<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 * @var string[] $globalContents //for content block
 */

$cakeDescription = 'CakePHP: the rapid development php framework';

//load js script
echo $this->Html->script('/js/main.js', ['block' => true]);
echo $this->Html->script('/vendor/bootstrap/js/bootstrap.bundle.min.js', ['block' => true]);
echo $this->Html->script('/vendor/bootstrap/js/bootstrap.esm.js', ['block' => true]);
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>


    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>

    <!--CSS File-->
    <?= $this->Html->css('style.css') ?>

    <?= $this->Html->css('/vendor/animate.css/animate.min.css') ?>
    <?= $this->Html->css('/vendor/bootstrap/css/bootstrap.min.css') ?>
    <?= $this->Html->css('/vendor/bootstrap-icons/bootstrap-icons.css') ?>
    <?= $this->Html->css('/vendor/swiper/swiper-bundle.min.css') ?>



</head>
<body>

<!--FETCH CONTENT HERE -->

<main>
    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>
</main>


</section>


<!--fecthing scripts from other pages see the top header for the js code -->
<?= $this->fetch('script') ?>




</body>
</html>
