<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SubCategory $subCategory
 * @var \Cake\Collection\CollectionInterface|string[] $categories
 */

$this->setLayout('admin');

?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Add Sub Category') ?></h4>
            <?= $this->Html->link(__('List Sub Categories'), ['action' => 'index'], ['class' => 'side-nav-item btn btn-primary']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="subCategories form content">
            <?= $this->Form->create($subCategory) ?>
            <fieldset>
                <legend><?= __('Add Sub Category') ?></legend>
                <?php
                    echo $this->Form->control('category_id', ['options' => $categories, 'class' => 'form-control mb-3']);
                    echo $this->Form->control('name', ['class' => 'form-control mb-3']);
                    echo $this->Form->control('api_name', ['class' => 'form-control mb-3']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-dark']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
