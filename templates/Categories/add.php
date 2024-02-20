<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */

$this->setLayout('admin');
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Add Category') ?></h4>
            <?= $this->Html->link(__('List Categories'), ['action' => 'index'], ['class' => 'side-nav-item btn btn-primary']) ?>
        </div>
        <br>
    </aside>

    <div class="column-responsive column-80">
        <div class="categories form content">
            <?= $this->Form->create($category) ?>
            <fieldset>
                <?php
                    echo $this->Form->control('name', ['class' => 'form-control mb-3']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-dark']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
