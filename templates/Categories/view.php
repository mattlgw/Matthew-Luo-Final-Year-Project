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
            <?= $this->Html->link(__('Back to Categories List'), ['action' => 'index'], ['class' => 'side-nav-item btn btn-secondary']) ?>
        </div>
    </aside>
    <br><br>
    <div class="column-responsive column-80">
        <div class="categories view content">
            <br>
            <h3><?= h('Category') ?></h3>
            <table class="table table-bordered" style="width: 25%;">
                <tr>
                    <th class="bg-dark text-light"><?= __('Category Name') ?></th>
                    <td><?= h($category->name) ?></td>
                </tr>

            </table>
            <div class="related">
                <h4><?= __('Related Sub Categories') ?></h4>
                <?php if (!empty($category->sub_categories)) : ?>
                    <div class="table-responsive">
                        <table class = "table table-bordered" style="width: 90%">
                            <tr>
                                <th class="bg-dark text-light"><?= __('Sub Category Name') ?></th>
                                <th class="actions bg-dark text-light"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($category->sub_categories as $subCategories) : ?>
                                <tr>
                                    <td><?= h($subCategories->name) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['controller' => 'SubCategories', 'action' => 'view', $subCategories->id], ['class' => 'btn btn-dark']) ?>
                                        <?= $this->Html->link(__('Edit'), ['controller' => 'SubCategories', 'action' => 'edit', $subCategories->id], ['class' => 'btn btn-primary']) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'SubCategories', 'action' => 'delete', $subCategories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subCategories->id), 'class' => 'btn btn-danger']) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>
            <div class="actions">
                <?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->id], ['class' => 'btn btn-primary']) ?>
                <?= $this->Form->postLink(__('Delete Category'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete this category?'), 'class' => 'btn btn-danger']) ?>
            </div>
        </div>
    </div>
</div>
