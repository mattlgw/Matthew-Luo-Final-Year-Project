<?php


echo $this->Html->script('/js/admin/scripts.js', ['block' => true]);


?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>


    <!-- important when configure JS plugin -->
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>

    <?= $this->html->css('admin.css') ?>

    <!--script for cdnjs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->

    <div class="brand_logo">
        <?= $this->Html->link(
            $this->Html->image('/img/Gemino/logo/logo.png', ['alt'=> "logo", 'class' => 'logo']),
            '/',
            ['escape' => false]
        ) ?>
    </div>

    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
<!--            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />-->
<!--            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>-->
        </div>
    </form>

    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li style="text-align: center"><?= $this->Html->tag('div', h($this->Identity->get('first_name'))); ?></li>
                <li><hr class="dropdown-divider" /></li>
                <li><?= $this->Html->link(__('Gemino Homepage'), ['controller' => 'Pages', 'action' => 'home'], ['class' => 'dropdown-item']) ?></li>
                <li><hr class="dropdown-divider" /></li>
                <li><?= $this->Html->link(__('Logout'), ['controller' => 'Auth', 'action' => 'logout'], ['class' => 'dropdown-item']) ?></li>
            </ul>
        </li>
    </ul>
</nav>

<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>


                    <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Admin', 'action' => 'index']) ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        <?= __('Dashboard') ?>
                    </a>


                    <div class="sb-sidenav-menu-heading">Data</div>

                    <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'index']) ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        <?= __('Users Account') ?>
                    </a>

                    <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Addresses', 'action' => 'index']) ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        <?= __('Addresses') ?>
                    </a>

                    <a class="nav-link" href="<?= $this->Url->build(['controller' => 'SearchRecords', 'action' => 'index']) ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        <?= __('Search Records') ?>
                    </a>

                    <!-- Lifestyle Preferences -->
                    <div class="sb-sidenav-menu-heading">Lifestyle Preferences</div>

                    <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Subcategories_Transports', 'action' => 'index']) ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        <?= __('Lifestyle Preferences') ?>
                    </a>

                    <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Categories', 'action' => 'index']) ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        <?= __('Categories') ?>
                    </a>

                    <a class="nav-link" href="<?= $this->Url->build(['controller' => 'SubCategories', 'action' => 'index']) ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        <?= __('Sub Categories') ?>
                    </a>

                    <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Transports', 'action' => 'index']) ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        <?= __('Transports') ?>
                    </a>

                    <!-- Web Contents -->
                    <div class="sb-sidenav-menu-heading">Web Contents</div>

                    <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Contents', 'action' => 'index']) ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        <?= __('Content Block') ?>
                    </a>

                    <a class="nav-link" href="<?= $this->Url->build(['controller' => 'ContentImages', 'action' => 'index']) ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        <?= __('Content Images') ?>
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                <?= $this->Html->tag('div', h($this->Identity->get('first_name'))); ?>
            </div>
        </nav>
    </div>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4"></h1>
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2023</div>
                    <div>


                        <?= $this->Html->link(__('Terms & Condition'), ['controller' => 'Informations', 'action' => 'Term']) ?>
                        &middot;
                        <?= $this->Html->link(__('Privacy Policy'), ['controller' => 'Informations', 'action' => 'Privacy']) ?>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
</body>
</html>

<?= $this->fetch('script') ?>

<?= $this->fetch('footer_script') ?>
