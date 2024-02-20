<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SubCategory $subCategory
 */

$this->setLayout('admin');
echo $this->Html->css('admin_view.css');
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <?= $this->Html->link(__('Back to Sub-Categories List'), ['action' => 'index'], ['class' => 'side-nav-item btn btn-secondary']) ?>
        </div>
    </aside>
    <br> <br>
    <div class="column-responsive column-80">
        <div class="subCategories view content">
            <br>
            <h3><?= h('Sub-Category') ?></h3>
            <table class="table table-bordered sub_category_view" >
                <tr>
                    <th class="bg-dark text-light"><?= __('Sub-Category Name') ?></th>
                    <td><?= h($subCategory->name) ?></td>
                </tr>

            </table>
            <div class="actions">
                <?= $this->Html->link(__('Edit Sub Category'), ['action' => 'edit', $subCategory->id], ['class' => 'btn btn-primary']) ?>
                <?= $this->Form->postLink(__('Delete Sub Category'), ['action' => 'delete', $subCategory->id], ['confirm' => __('Are you sure you want to delete this sub-category?'), 'class' => 'btn btn-danger']) ?>
            </div>
        </div>
    </div>
</div>
