<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SubCategory $subCategory
 */

$this->setLayout('admin');

?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Edit Sub Categories') ?></h4>
            <?= $this->Html->link(__('List Sub Categories'), ['action' => 'index'], ['class' => 'side-nav-item btn btn-primary']) ?>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $subCategory->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $subCategory->id), 'class' => 'side-nav-item btn btn-danger']
            ) ?>

        </div>
        <br>
    </aside>
    <div class="column-responsive column-80">
        <div class="subCategories form content">
            <?= $this->Form->create($subCategory) ?>
            <fieldset class="border p-4">
                <?php
                    echo $this->Form->control('id');
                    echo $this->Form->control('name' , ['class' => 'form-control mb-3 h-25 w-25']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-dark']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
