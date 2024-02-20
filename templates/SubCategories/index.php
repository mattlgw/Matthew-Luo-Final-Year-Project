<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\SubCategory> $subCategories
 */

$this->setLayout('admin');

echo $this->Html->css('//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css' );
echo $this->Html->script('//cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js');
echo $this->Html->css('//cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css'); // Include the Responsive extension CSS
echo $this->Html->script('//cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js'); // Include the Responsive extension JavaScript

?>
<div class="subCategories index content">
    <?= $this->Html->link(__('New Sub Category'), ['action' => 'add'], ['class' => 'btn btn-dark']) ?>
    <br> <br>
    <h3><?= __('Sub Categories') ?></h3>
    <div class="table-responsive">
        <table id = "table-demo">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('ID') ?></th>
                    <th><?= $this->Paginator->sort('Category ID') ?></th>
                    <th><?= $this->Paginator->sort('Sub-Category name') ?></th>
                    <th><?= $this->Paginator->sort('Sub-Category API name') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($subCategories as $subCategory): ?>
                <tr>
                    <td><?= $this->Number->format($subCategory->id) ?></td>
                    <td><?= $this->Number->format($subCategory->category_id) ?></td>
                    <td><?= h($subCategory->name) ?></td>
                    <td><?= h($subCategory->api_name) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $subCategory->id], ['class' => 'btn btn-dark']) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $subCategory->id], ['class' => 'btn btn-primary']) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $subCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subCategory->id), 'class' => 'btn btn-danger']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

<script>
    let table = new DataTable('#table-demo', {
        responsive: true,

    });
</script>
