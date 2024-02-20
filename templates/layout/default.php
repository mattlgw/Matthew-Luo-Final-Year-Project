
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
 * @var string[] $globalContentImages //for content Images
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

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

    <!-- ======= Header/Navbar ======= -->
    <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top navbar-bg">
        <div class="container">

            <!--nav bar button will appear in mobile view -->
            <button class="navbar-toggler collapsed"  style="border-color: white;"   type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <div class="navbar-brand text-brand">
                <!-- use images from content images database, the original images is from this directory of the project /img/Gemino/logo/logo-color.png !-->

<!--                --><?php //= $this->Html->link(
//                    $this->Html->image('/img/Gemino/logo/logo-color.png', ['alt' => 'No image upload yet', 'class' => 'logo']),
//                    '/',
//                    ['escape' => false]
//                ) ?>

                <!--use contentImages -->
                <?= $this->Html->link(
                    $this->Html->image($globalContentImages['main-logo'], ['alt' => 'No image upload yet', 'class' => 'logo']),
                    '/',
                    ['escape' => false]
                ) ?>

            </div>


            <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <?= $this->Html->link(__('Home'), ['controller' => 'Pages', 'action' => 'Home'], ['class' => 'nav-link']) ?>
                    </li>

                    <li class="nav-item">
                        <?= $this->Html->link(__('About'), ['controller' => 'Informations', 'action' => 'about'], ['class' => 'nav-link']) ?>
                    </li>

                    <li class="nav-item">
                        <?= $this->Html->link(__('Lifestyle Profile'), ['controller' => 'Users', 'action' => 'lifestyle'], ['class' => 'nav-link']) ?>
                    </li>
                </ul>
            </div>

            <div>
                <?php if ($this->Identity->isLoggedIn()): ?>
                    <?php if ($this->Identity->get('role') === 'admin'): ?>
                        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                            <li class="nav-item dropdown">
                                <a class=" dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw" style="color: #ffffff"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li style="text-align: center; font-size: 20px"><?= $this->Html->tag('div', h($this->Identity->get('first_name'))); ?></li>
                                    <hr>
                                    <li><?= $this->Html->link(__('Admin Dashboard'), ['controller' => 'Pages', 'action' => 'admin'], ['class' => 'dropdown-item nav-link', 'style' => 'color: #ff009c']) ?></li>
                                    <li><hr class="dropdown-divider" /></li>
                                    <li><?= $this->Html->link(__('Search Records'), ['controller' => 'SearchRecords', 'action' => 'customer'], ['class' => 'dropdown-item nav-link', 'style' => 'color: #ff009c' ]) ?></li>
                                    <li><hr class="dropdown-divider" /></li>
                                    <li><?= $this->Html->link(__('Logout'), ['controller' => 'Auth', 'action' => 'logout'], ['class' => 'dropdown-item nav-link', 'style' => 'color: #ff009c']) ?></li>
                                </ul>
                            </li>
                        </ul>
                    <?php else:?> <!--customer -->
                        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw" style="color: #ffffff"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li style="text-align: center"><?= $this->Html->tag('div', h($this->Identity->get('first_name'))); ?></li>
                                    <hr>
                                    <li><?= $this->Html->link(__('Search Records'), ['controller' => 'SearchRecords', 'action' => 'customer'], ['class' => 'dropdown-item nav-link', 'style' => 'color: #ff009c' ]) ?></li>
                                    <li><hr class="dropdown-divider" /></li>
                                    <li><?= $this->Html->link(__('Logout'), ['controller' => 'Auth', 'action' => 'logout'], ['class' => 'dropdown-item nav-link', 'style' => 'color: #ff009c']) ?></li>
                                </ul>
                            </li>
                        </ul>

                    <?php endif; ?>

                <?php else: ?>
                    <div class="header-btn"><?= $this->Html->link('Sign in', ['controller' => 'Auth', 'action' => 'login'], ['class' => 'btn btn-b-n']) ?></div>
                    <div style="color:white"><?= $this->Flash->render() ?></div>
                <?php endif; ?>

            </div>
        </div>
    </nav><!-- End Header/Navbar -->

    <!--FETCH CONTENT HERE -->
    <main>
        <br> <br>
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </main>

    <!-- ======= Footer ======= -->
    <section class="section-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <div class="widget-a">
                        <div class="w-header-a">
                            <h3 class="w-title-a text-brand">Contact Us</h3>
                        </div>
                        <div class="w-body-a">
                            <p class="w-text-a color-text-a">
                                Ask us so we can help you.
                            </p>
                        </div>
                        <div class="w-footer-a">
                            <ul class="list-unstyled">
                                <li class="color-a">
                                    <span class="color-text-a">Phone :</span>  <?= $globalContents['phone_number']?>
                                </li>
                                <li class="color-a">
                                    <span class="color-text-a">Email:</span> <label> <?= $globalContents['email'] ?> </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 section-md-t3">
                    <div class="widget-a">
                        <div class="w-header-a">
                            <h3 class="w-title-a text-brand">The Company</h3>
                        </div>
                        <div class="w-body-a">
                            <div class="w-body-a">
                                <ul class="list-unstyled">

                                    <li class="item-list-a">
                                        <i class="bi bi-chevron-right"></i>
                                        <?= $this->Html->link(__('About'), ['controller' => 'Informations', 'action' => 'About']) ?>
                                    </li>

                                    <li class="item-list-a">
                                        <i class="bi bi-chevron-right"></i>
                                        <?= $this->Html->link(__('Help'), ['controller' => 'Informations', 'action' => 'Instruction']) ?>
                                    </li>

                                    <li class="item-list-a">
                                        <i class="bi bi-chevron-right"></i>
                                        <?= $this->Html->link(__('Terms & Condition'), ['controller' => 'Informations', 'action' => 'Term']) ?>
                                    </li>
                                    <li class="item-list-a">
                                        <i class="bi bi-chevron-right"></i>
                                        <?= $this->Html->link(__('Privacy Policy'), ['controller' => 'Informations', 'action' => 'Privacy']) ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="socials-a">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="bi bi-facebook" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="bi bi-twitter" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="bi bi-instagram" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="bi bi-linkedin" aria-hidden="true"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="copyright-footer">
                        <p class="copyright color-text-a">
                            &copy; Copyright
                            <span class="color-a">Gemino</span> All Rights Reserved.
                        </p>
                    </div>
                    <div class="credits">
                        <!--
                        All the links in the footer should remain intact.
                        You can delete the links only if you purchased the pro version.
                        Licensing information: https://bootstrapmade.com/license/
                        Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=EstateAgency
                      -->
                        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                    </div>
                </div>
            </div>
        </div>






    </footer><!-- End  Footer -->

    <!--fecthing scripts from other pages see the top header for the js code -->
    <?= $this->fetch('script') ?>




</body>
</html>
