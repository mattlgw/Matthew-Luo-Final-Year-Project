<?php
/**
 * @var \App\View\AppView $this
 */

use Cake\Core\Configure;

$debug = Configure::read('debug');

$this->setLayout('account');

$this->assign('title', 'Login');
echo $this->Html->css('accounts.css', ['block' => true]);
?>

<section class="vh-100 auth-img">
<div class="auth-overlay">
    <div class="container py-5 h-100 ">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong login-card" style="border-radius: 1rem;">
                    <div class="card-body p-5">

                        <div class="text-center">
                            <?= $this->Html->link(
                                $this->Html->image('/img/Gemino/logo/logo-color.png', ['alt'=> "logo"]),
                                '/',
                                ['escape' => false]
                            ) ?>

                            <br>
                            <br>
                            <h3 class="text"><?= __('Sign in') ?></h3>
                        </div>

                        <?= $this->Form->create() ?>
                        <fieldset>

                            <?= $this->Flash->render() ?>
                            <?php
                            echo $this->Form->control('email', [
                                'type' => 'email',
                                'required' => true,
                                'autofocus' => true,
                                'class' => 'form-control form-control-lg mb-4',
                                'label' => ['class' => 'form-label text-left'],
                            ]);
                            echo $this->Form->control('password', [
                                'type' => 'password',
                                'required' => true,
                                'value' => '',
                                'class' => 'form-control form-control-lg mb-4',
                                'label' => ['class' => 'form-label text-left'],
                            ]);
                            ?>
                        </fieldset>

                        <div class="d-flex justify-content-around align-items-center mb-4">
                            <?= $this->Form->button('Sign in', ['class' => 'btn btn-b-n btn-lg btn-block main-btn']) ?>
                        </div>

                        <hr>

                        <?= $this->Html->link('Forgot password?', ['controller' => 'Auth', 'action' => 'forgetPassword'], ['class' => 'text']) ?>
                        <p class="text">Don't have an account?
                            <?= $this->Html->link(__('Register here'), ['controller' => 'Auth', 'action' => 'register'], ['class' => 'text']) ?>
                        </p>

                        <?= $this->Form->end() ?>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>







