<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SearchRecord $searchRecord
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $addresses
 */

$this->setLayout('admin');



?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Search Records'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="searchRecords form content">
            <?= $this->Form->create($searchRecord) ?>
            <fieldset>
                <legend><?= __('Add Search Record') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('address_id', ['options' => $addresses]);
                    echo $this->Form->control('score');
                    echo $this->Form->control('searched');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
