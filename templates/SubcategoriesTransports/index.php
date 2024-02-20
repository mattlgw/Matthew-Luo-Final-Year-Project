<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\SubcategoriesTransport> $subcategoriesTransports
 */

$this->setLayout('admin');

echo $this->Html->css('//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css' );
echo $this->Html->script('//cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js');
echo $this->Html->css('//cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css'); // Include the Responsive extension CSS
echo $this->Html->script('//cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js'); // Include the Responsive extension JavaScript

?>
<div class="subcategoriesTransports index content">
<!--    --><?php //= $this->Html->link(__('New Lifestyle Preference'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Lifestyle Preferences') ?></h3>
    <div class="table-responsive">
        <table id = "table-demo">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort("User's Full Name") ?></th>
                    <th><?= $this->Paginator->sort('subCategory_id') ?></th>
                    <th><?= $this->Paginator->sort('transport_id') ?></th>
                    <th><?= $this->Paginator->sort('proximity') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($subcategoriesTransports as $subcategoriesTransport): ?>
                <tr>
                    <td><?= h($subcategoriesTransport->user->first_name." ".$subcategoriesTransport->user->last_name) ?></td>
                    <td><?= h($subcategoriesTransport->sub_category->name) ?></td>
                    <td><?= h($subcategoriesTransport->transport->mode) ?></td>
                    <td><?= h($subcategoriesTransport->proximity) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $subcategoriesTransport->id], ['class' => 'btn btn-dark']) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $subcategoriesTransport->id], ['class' => 'btn btn-primary']) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $subcategoriesTransport->id],
                            ['confirm' => __('Are you sure you want to delete # {0}?', $subcategoriesTransport->id), 'class' => 'btn btn-danger']
                        ) ?>
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
