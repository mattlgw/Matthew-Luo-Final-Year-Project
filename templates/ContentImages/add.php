<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ContentImage $contentImage
 */

$this->setLayout('admin');

?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Content Images'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
        <br>
    </aside>
    <div class="column-responsive column-80">
        <div class="contentImages form content">
            <?= $this->Form->create($contentImage, ['type'=> 'file']) ?>
            <fieldset class="border p-4">
                <legend><?= __('Add Content Image') ?></legend>
                <?php
                    echo $this->Form->control('parent',  ['class' => 'form-control mb-3', 'label' => 'Parent']);
                    echo $this->Form->control('hint', ['class' => 'form-control mb-3', 'label' => 'Hint']);
                    echo $this->Form->control('image_file', ['type' => 'file']);
//                    echo $this->Form->control('previous_value', ['class' => 'form-control mb-3', 'label' => 'Previous Value']);
                ?>
            </fieldset>
            <br>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-dark']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
