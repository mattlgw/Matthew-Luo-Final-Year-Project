<?php
/**
 * @var \App\View\AppView $this
 */
$this->setLayout('account');
$this->assign('title', 'Forget Password');
echo $this->Html->css('accounts.css', ['block' => true]);
?>

<section class="vh-100">
<div class="auth-overlay accounts">
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
                            <h3 class="text"><?= __('Forget Password') ?></h3>
                            <br>
                        </div>

                        <?= $this->Form->create() ?>
                        <fieldset>
                            <?= $this->Flash->render() ?>
                            <p class="heading">Enter your registered email to reset your password: </p>
                            <?php
                            echo $this->Form->control('email', [
                                'type' => 'email',
                                'required' => true,
                                'class' => 'form-control form-control-lg mb-4 text',
                                'label' => ['class' => 'form-label text'],
                            ]);
                            ?>
                        </fieldset>

                        <div class="d-flex justify-content-around align-items-center mb-4">
                            <?= $this->Form->button(__('Send verification email'), ['class' => 'btn btn-b-n btn-lg btn-block main-btn']) ?>
                        </div>

                        <hr>

                        <?= $this->Form->end() ?>

                        <?= $this->Html->link(__('Back to login'), ['controller' => 'Auth', 'action' => 'login'], ['class' => 'text']) ?>



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


