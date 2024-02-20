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
            <h4 class="heading"><?= __('Edit Address') ?></h4>
            <?= $this->Html->link(__('List Addresses'), ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $address->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $address->id), 'class' => 'btn btn-danger']
            ) ?>

        </div>
        <br>
    </aside>


    <div class="column-responsive column-80">
        <div class="addresses form content">
            <?= $this->Form->create($address) ?>
            <fieldset class="border p-4">
                <div class="form-group">
                    <?= $this->Form->control('street_no', ['class' => 'form-control mb-3']) ?>

                <div class="form-group">
                    <?= $this->Form->control('street_name', ['class' => 'form-control mb-3']) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('postcode', ['class' => 'form-control mb-3']) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('city', ['class' => 'form-control mb-3']) ?>
                </div>
            </fieldset>
            <br>
            <div class="actions" style="margin-bottom: 20px;">
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-dark']) ?>


            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
