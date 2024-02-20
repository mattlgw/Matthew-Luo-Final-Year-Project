<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */

$this->setLayout('admin');

?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Edit Users') ?></h4>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item btn btn-primary']) ?>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item btn btn-danger']
            ) ?>
        </div>
        <br>
    </aside>

    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset class="border p-4">

                <?php
                    echo $this->Form->control('first_name', ['class' => 'form-control mb-3']);
                    echo $this->Form->control('last_name', ['class' => 'form-control mb-3']);
                    echo $this->Form->control('email', ['class' => 'form-control mb-3']);
                    echo $this->Form->control('role', ['class' => 'form-select h-25 w-25', 'options' => [
                        '' => __('- Select -'),
                        'admin' => __('admin'),
                        'customer' => __('customer')
                    ]]);
                ?>
            </fieldset>
            <br>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-dark']) ?>
            <?= $this->Form->end() ?>
            <br>
        </div>
    </div>
</div>
