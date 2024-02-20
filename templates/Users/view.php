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

            <?= $this->Html->link(__('Back to List Users'), ['action' => 'index'], ['class' => 'side-nav-item btn btn-secondary']) ?>
<!--            --><?php //= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item btn btn-dark']) ?>
<!--            --><?php //= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']) ?>
<!--            --><?php //= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
        <br>
    </aside>
    <div class="column-responsive column-80">
        <h3><?= h('User') ?></h3>
        <div class="users view content">
            <br>
            <table class="table table-bordered" style="width: 50%;">
                <tr>
                    <th class="bg-dark text-light"><?= __('First Name') ?></th>
                    <td><?= h($user->first_name) ?></td>
                </tr>
                <tr>
                    <th class="bg-dark text-light"><?= __('Last Name') ?></th>
                    <td><?= h($user->last_name) ?></td>
                </tr>
                <tr>
                    <th class="bg-dark text-light"><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th class="bg-dark text-light"><?= __('Role') ?></th>
                    <td><?= h($user->role) ?></td>
                </tr>
<!--                <tr>-->
<!--                    <th class="bg-dark text-light">--><?php //= __('Nonce') ?><!--</th>-->
<!--                    <td>--><?php //= h($user->nonce) ?><!--</td>-->
<!--                </tr>-->
                <tr>
                    <th class="bg-dark text-light"><?= __('Created') ?></th>
                    <td><?= h($user->created) ?></td>
                </tr>
                <tr>
                    <th class="bg-dark text-light"><?= __('Modified') ?></th>
                    <td><?= h($user->modified) ?></td>
                </tr>
<!--                <tr>-->
<!--                    <th class="bg-dark text-light">--><?php //= __('Nonce Expiry') ?><!--</th>-->
<!--                    <td>--><?php //= h($user->nonce_expiry) ?><!--</td>-->
<!--                </tr>-->
            </table>
        </div>
        <div class="side-nav">

                        <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item btn btn-primary']) ?>
                        <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']) ?>
            <!--            --><?php //= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </div>
</div>
