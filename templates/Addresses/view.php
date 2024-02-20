<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Address $address
 */

$this->setLayout('admin');


?>

<div class="row">
    <aside class="column">
        <div class="side-nav">
            <?= $this->Html->link(__('Back to List Addresses'), ['action' => 'index'], ['class' => 'side-nav-item btn btn-secondary']) ?>
        </div>
        <br>
    </aside>

    <div class="column-responsive column-80">
        <div class="addresses view content">
            <h3><?= h('Address') ?></h3>
            <table class="table table-bordered" style="width: 50%;">
                <tr>
                    <th class="bg-dark text-light"><?= __('Street No') ?></th>
                    <td><?= h($address->street_no) ?></td>
                </tr>
                <tr>
                    <th class="bg-dark text-light"><?= __('Street Name') ?></th>
                    <td><?= h($address->street_name) ?></td>
                </tr>
                <tr>
                    <th class="bg-dark text-light"><?= __('Postcode') ?></th>
                    <td><?= h($address->postcode) ?></td>
                </tr>
                <tr>
                    <th class="bg-dark text-light"><?= __('City') ?></th>
                    <td><?= h($address->city) ?></td>
                </tr>
            </table>
            <div class="actions">
                <?= $this->Html->link(__('Edit Address'), ['action' => 'edit', $address->id], ['class' => 'btn btn-primary']) ?>
                <?= $this->Form->postLink(__('Delete Address'), ['action' => 'delete', $address->id], ['confirm' => __('Are you sure you want to delete this address?'), 'class' => 'btn btn-danger']) ?>
            </div>
        </div>
    </div>
</div>
