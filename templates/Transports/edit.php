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
            <h4 class="heading"><?= __('Edit Transport') ?></h4>
            <?= $this->Html->link(__('List Transports'), ['action' => 'index'], ['class' => 'side-nav-item btn btn-primary']) ?>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $transport->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $transport->id), 'class' => 'side-nav-item btn btn-danger']
            ) ?>
        </div>
        <br>
    </aside>
    <div class="column-responsive column-80">
        <div class="transports form content">
            <?= $this->Form->create($transport) ?>
            <fieldset class="border p-4">
                <?php
                    echo $this->Form->control('mode', ['class' => 'form-control mb-3 h-25 w-25']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-dark']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
