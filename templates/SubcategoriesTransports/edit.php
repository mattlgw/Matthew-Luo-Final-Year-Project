<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SubcategoriesTransport $subcategoriesTransport
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $subCategories
 * @var string[]|\Cake\Collection\CollectionInterface $transports
 */

$this->setLayout('admin');

?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Lifestyle Preferences'), ['action' => 'index'], ['class' => 'side-nav-item btn btn-primary']) ?>
            <?= $this->Form->postLink(
                __('Delete Lifestyle Preference'),
                ['action' => 'delete', $subcategoriesTransport->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $subcategoriesTransport->id), 'class' => 'side-nav-item btn btn-danger']
            ) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="subcategoriesTransports form content">
            <?= $this->Form->create($subcategoriesTransport) ?>
            <fieldset>
                <legend><?= __('Edit Subcategories Transport') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['class' => 'form-select h-25 w-25', 'options' => $users]);
                    echo $this->Form->control('subCategory_id', ['class' => 'form-select h-25 w-25', 'options' => $subCategories, ]);
                    echo $this->Form->control('transport_id', ['class' => 'form-select h-25 w-25', 'options' => $transports]);
                    echo $this->Form->control('proximity', ['class' => 'form-control mb-3 h-25 w-25']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-dark']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
