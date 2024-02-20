<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transport $transport
 */

$this->setLayout('admin');

?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Transports'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="transports form content">
            <?= $this->Form->create($transport) ?>
            <fieldset>
                <legend><?= __('Add Transport') ?></legend>
                <?php
                    echo $this->Form->control('mode');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
