<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 * @var string[] $homePageContentBlocks //for content block
 * @var string[] $homePageContentImages //for content Images
 *
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

//$this->disableAutoLayout();

//page title
$this->assign('title', 'Gemino | Home');

//scripts
echo $this->Html->script('/vendor/bootstrap/js/bootstrap.bundle.min.js', ['block' => true]);
//echo $this->Html->script('/vendor/swiper/swiper-bundle.min.js', ['block' => true]);
echo $this->Html->script('/vendor/php-email-form/validate.js', ['block' => true]);

echo $this->Html->css('homepage.css', ['block' => true]);

?>
<!--NOTE THAT THIS HOMEPAGE HTML CODE BELOW IS TEMPORARY -->
<!DOCTYPE html>
<html>
<head>
<body>
<!-- ======= Intro Section ======= -->
<div class="intro intro-carousel swiper position-relative">

    <div class="swiper-wrapper">
        <div class="swiper-slide carousel-item-a intro-item bg-image bg-1"> <!--background image here-->
            <div class="overlay overlay-a"></div>
            <div class="intro-content display-table">
                <div class="table-cell" >
                    <div class="container main-container" >
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="intro-body">
                                    <h1 class="intro-title mb-4 ">
                                        <!--main text of homepage -->
                                        FIND YOUR PERFECT PROPERTY


                                    </h1>



                                </div>
                            </div>

                            <div class = "image-container">
                                <div class="logo_pin">
                                    <?= $this->Html->image('/img/Gemino/logo/g-pin@3x.png', ['alt'=> "logo", 'class' => '']) ?>
                                </div>

                                <div class="instruction-container">

                                    <?= $this->Html->image($homePageContentImages['instruction'], ['alt'=> "logo", 'class' => 'instruction']) ?>
                                    <p>
                                        <?= $this->Html->link(__('Start Matching'), ['controller' => 'Users', 'action' => 'lifestyle'], ['class' => 'btn btn-b-n large']) ?>
                                    </p>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="swiper-pagination"></div>
</div><!-- End Intro Section -->


</body>
</html>
