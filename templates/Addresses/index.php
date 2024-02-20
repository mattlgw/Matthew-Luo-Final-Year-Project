<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Address> $addresses
 */

$this->setLayout('admin');

echo $this->Html->css('//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css' );
echo $this->Html->script('//cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js');

?>

<div class="searchRecords index content">
    <!--    --><?php //= $this->Html->link(__('New Search Records'), ['action' => 'add'], ['class' => 'btn btn-dark']) ?>
    <br> <br>
    <h3><?= __('Addresses') ?></h3>
    <div class="table-responsive">
        <table id = "table-demo">
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('Street No') ?></th>
                <th><?= $this->Paginator->sort('Street Name') ?></th>
                <th><?= $this->Paginator->sort('Postcode') ?></th>
                <th><?= $this->Paginator->sort('City') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($addresses as $address): ?>
                <tr>
                    <td><?= h($address->street_no) ?></td>
                    <td><?= h($address->street_name) ?></td>
                    <td><?= h($address->postcode) ?></td>
                    <td><?= h($address->city) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $address->id], ['class' => 'btn btn-dark']) ?>

                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $address->id], ['class' => 'btn btn-primary']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <br>
</div>

<script>
    let table = new DataTable('#table-demo');

</script






