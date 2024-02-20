<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\SearchRecord> $searchRecords
 */



echo $this->Html->css('//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css' );
echo $this->Html->script('//cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js');
echo $this->Html->css('//cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css'); // Include the Responsive extension CSS
echo $this->Html->script('//cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js'); // Include the Responsive extension JavaScript

?>




<div class="searchRecords index content" style="margin: 0% 15% 5% 15%">
    <!--    --><?php //= $this->Html->link(__('New Search Records'), ['action' => 'add'], ['class' => 'btn btn-dark']) ?>
    <br> <br>
    <h3><?= __('Search Records') ?></h3>
    <br>
    <div class="table-responsive">
        <table id = "table-demo">
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('Street No') ?></th>
                <th><?= $this->Paginator->sort('Street Name') ?></th>
                <th><?= $this->Paginator->sort('Postcode') ?></th>
                <th><?= $this->Paginator->sort('City') ?></th>
                <th><?= $this->Paginator->sort('State') ?></th>
                <th><?= $this->Paginator->sort('Country') ?></th>
                <th><?= $this->Paginator->sort('Score') ?></th>
                <th><?= $this->Paginator->sort('Search Date') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($searchRecords as $searchRecord): ?>
                <tr>

                    <td><?= $searchRecord->has('address') ? h($searchRecord->address->street_no) : '' ?></td>
                    <td><?= $searchRecord->has('address') ? h($searchRecord->address->street_name) : '' ?></td>
                    <td><?= $searchRecord->has('address') ? h($searchRecord->address->postcode) : '' ?></td>
                    <td><?= $searchRecord->has('address') ? h($searchRecord->address->city) : '' ?></td>
                    <td><?= $searchRecord->has('address') ? h($searchRecord->address->state) : '' ?></td>
                    <td><?= $searchRecord->has('address') ? h($searchRecord->address->country) : '' ?></td>
                    <td><?= $searchRecord->has('address') ? h($searchRecord->score) : '' ?></td>
                    <td><?= $searchRecord->has('address') ? h($searchRecord->searched) : '' ?></td>

                    <td class="actions">
<!--                        --><?php //= $this->Html->link(__('View'), ['action' => 'record', $searchRecord->id], ['class' => 'btn btn-primary']) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $searchRecord->id], ['confirm' => __('Are you sure you want to delete this record?'), 'class' => 'btn btn-danger']) ?>

                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <br> <br>
</div>


<script>
    let table = new DataTable('#table-demo', {
        responsive: true,
        rowReorder: {
            selector: 'td:nth-child(2)' // Selector for the column to use for reordering
        }
    });
</script>

