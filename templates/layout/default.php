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
 */

$Description = 'Shining Glass';
$this->loadHelper('Authentication.Identity');

$user = $this->request->getAttribute('identity');

$pageStyle = 'cakephp'; //Switches formatting modes between frontend theme and Cake backend

if (
    $this->request->getParam('action') == 'homepage'
    || $this->request->getParam('action') == 'login'
    || $this->request->getParam('action') == 'signup'
    || $this->request->getParam('action') == 'forgot'
    || $this->request->getParam('action') == 'requestpassword'
    || $this->request->getParam('action') == 'account'
    || $this->request->getParam('action') == 'gallery'
) {
    $pageStyle = 'user';
//} //else if ($this->request->getParam('action') == 'dashboard'){
   // $pageStyle = 'dashboard';
}

?>
<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <!-- protection against CSRF -->
        <?= /** @var TYPE_NAME $this */
        $this->Html->meta('csrfToken', $this->request->getAttribute('csrfToken')); ?>
        <title>
            <?= $Description ?>
        </title>
        <?= $this->Html->meta('icon') ?>

        <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />

        <?php if ($pageStyle == 'user') {
            echo $this->Html->css(['normalize.min', 'cake', 'styles']);
        } elseif ($pageStyle == 'cakephp') {
            echo $this->Html->css(['sb-admin-2.min','normalize.min', 'milligram.min', 'cake']);
        }
        ?>

        <?= $this->Html->script(['scripts', 'https://use.fontawesome.com/releases/v6.1.0/js/all.js', 'https://code.jquery.com/jquery-3.3.1.slim.min.js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', 'https://cdn.startbootstrap.com/sb-forms-latest.js']); ?>

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
    </head>
    <?php if ($pageStyle == 'user') {
        ?>
        <body id="page-top">
            <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
                <div class="container">
                    <a class="navbar-brand" href="<?= $this->Url->build(['controller' => 'pages', 'action' => 'homepage',])?>#page-top">Shining Glass</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        Menu
                        <i class="fas fa-bars ms-1"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="<?= $this->Url->build(['controller' => 'pages', 'action' => 'homepage',])?>#portfolio" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                    Gallery
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?= $this->Url->build(['controller' => 'items', 'action' => 'gallery',])?>">Full Gallery</a>
                                    <a class="dropdown-item" href="<?= $this->Url->build(['controller' => 'pages', 'action' => 'homepage',])?>#portfolio">Preview</a>
                                </div>
                                <!--                        <li class="nav-item"><a class="nav-link" href="#portfolio">Gallery</a></li>-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="<?= $this->Url->build(['controller' => 'pages', 'action' => 'homepage',])?>#team">About Sam</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?= $this->Url->build(['controller' => 'pages', 'action' => 'homepage',])?>#about">News</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?= $this->Url->build(['controller' => 'pages', 'action' => 'homepage',])?>#contact">Contact</a></li>
                            <?php if ($user && $user->is_admin) {
                                ?>
                                <li class="nav-item"><a class="nav-link" href="<?= $this->Url->build(['controller' => 'pages', 'action' => 'dashboard',])?>">Admin Dashboard</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?= $this->Url->build(['controller' => 'users', 'action' => 'logout',])?>">Log Out</a></li>
                            <?php } elseif ($this->Identity->isLoggedIn()) {
                                ?>
                                <li class="nav-item"><a class="nav-link" href="<?= $this->Url->build(['controller' => 'users', 'action' => 'logout',])?>">Log Out</a></li>
                            <?php } else { ?>
                                <li class="nav-item"><a class="nav-link" href="<?= $this->Url->build(['controller' => 'users', 'action' => 'login',])?>">Log In</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </nav>
            <?php
    } elseif ($pageStyle == 'cakephp') {
        ?>
            <br/>
            <div class="container text-center">
                <h1>Shining Glass Administrator Dashboard</h1>
                <a href="<?= $this->Url->build(['controller' => 'pages', 'action' => 'homepage',])?>"
                   class="btn btn-warning btn-lg" style="font-size: large">Return to Customer-Facing Website</a>
            </div>
            <br/>
            <div class="container text-center">
                <div class="content pb-4">
                    <h3>Content Management</h3>
                    <a href="<?= $this->Url->build(['controller' => 'items', 'action' => 'index',])?>" class="btn btn-warning btn-lg" style="font-size: large">Items</a>
                    <a href="<?= $this->Url->build(['controller' => 'images', 'action' => 'index',])?>" class="btn btn-warning btn-lg" style="font-size: large">Images</a>
                    <a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'index',])?>" class="btn btn-warning btn-lg" style="font-size: large">Users</a>
                    <a href="<?= $this->Url->build(['controller' => 'transactions', 'action' => 'index',])?>" class="btn btn-warning btn-lg" style="font-size: large">Orders</a>
                    <a href="<?= $this->Url->build(['controller' => 'inquiries', 'action' => 'index',])?>" class="btn btn-warning btn-lg" style="font-size: large">Inquiries</a>
                </div>
            </div>
    <?php } ?>
            <main class="main">
            <?php if ($pageStyle == 'user') {
                echo $this->Flash->render();
                echo $this->fetch('content');
                echo '<footer class="footer py-4">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-8 text-lg-start"></div>
                                <div class="col-lg-4 text-lg-end">
                                    <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                                    <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                                </div>
                            </div>
                        </div>
                      </footer>';
            } elseif ($pageStyle == 'cakephp') {
                ?>
                <br/>
                <div class="container">
                    <?= $this->Flash->render() ?>
                    <?= $this->fetch('content') ?>
                </div>
            <?php } ?>
        </main>
    </body>
</html>
