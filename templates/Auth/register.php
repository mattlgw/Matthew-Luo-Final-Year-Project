<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */

$this->setLayout('account');
$this->assign('title', 'Sign Up');
echo $this->Html->css('accounts.css', ['block' => true]);
?>

<section class="vh-100">
    <div class="auth-overlay">
        <div class="container py-5 h-100 ">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="" style="border-radius: 1rem;">
                        <div class="card-body card-padding">
                            <div class="text-center">
                                <?= $this->Html->link(
                                    $this->Html->image('/img/Gemino/logo/logo-color.png', ['alt'=> "logo"]),
                                    '/',
                                    ['escape' => false]
                                ) ?>

                                <br><br>
                                <h3 class="text"><?= __('Sign Up') ?></h3>
                                <br>
                            </div>

                            <?= $this->Form->create($user) ?>
                            <fieldset>

                                <?= $this->Flash->render() ?>

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <?= $this->Form->control('first_name', [
                                                'class' => 'form-control form-control-lg',
                                                'label' => ['text' => 'First Name', 'class' => 'text'],
                                                'templateVars' => ['container_class' => 'mb-4']
                                            ]); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <?= $this->Form->control('last_name', [
                                                'class' => 'form-control form-control-lg',
                                                'label' => ['text' => 'Last Name', 'class' => 'text'],
                                                'templateVars' => ['container_class' => 'mb-4']
                                            ]); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-outline mb-4">
                                    <?= $this->Form->control('email', [
                                        'class' => 'form-control form-control-lg',
                                        'label' => ['text' => 'Email Address', 'class' => 'text'],
                                    ]); ?>
                                </div>

                                <div class="form-outline mb-4">
                                    <div class="form-outline">
                                        <?= $this->Form->control('password', [
                                            'class' => 'form-control form-control-lg',
                                            'value' => '',  // Ensure password is not sending back to the client side
                                            'label' => ['text' => 'Password', 'class' => 'text'],
                                        ]); ?>
                                    </div>
                                </div>

                                <div class="form-outline mb-4">
                                    <div class="form-outline">
                                        <?= $this->Form->control('password_confirm', [
                                            'type' => 'password',
                                            'class' => 'form-control form-control-lg',
                                            'value' => '',  // Ensure password is not sending back to the client side
                                            'label' => ['text' => 'Retype Password', 'class' => 'text'],
                                            'templateVars' => ['container_class' => 'mb-4']
                                        ]); ?>
                                    </div>
                                </div>

                            </fieldset>

                            <div class="d-flex justify-content-around align-items-center mb-4">
                                <?= $this->Form->button('Register', ['class' => 'btn btn-b-n btn-lg btn-block main-btn']) ?>
                            </div>

                            <hr>
                            <p class="text">By signing up, you are indicating that you have read and agree to the
                                <?= $this->Html->link(__('Term of Use'), ['controller' => 'Informations', 'action' => 'term'], ['class' => 'text']) ?>
                                and
                                <?= $this->Html->link(__('Privacy Policy.'), ['controller' => 'Informations', 'action' => 'privacy'], ['class' => 'text']) ?>
                            </p>

                            <p class="text">Already have an account?
                                <?= $this->Html->link(__('Sign in now.'), ['controller' => 'Auth', 'action' => 'login'], ['class' => 'text']) ?>
                            </p>

                            <?= $this->Form->end() ?>



                        </div>


                    </div>

                </div>

                <div class="col-md-8 col-lg-7 col-xl-6">
                    <?= $this->Html->image('/img/Gemino/Illustrations/illustration-register.png', ['alt' => "lifestyle", 'class' => "img-fluid"])?>

                </div>


            </div>
        </div>
    </div>
</section>




