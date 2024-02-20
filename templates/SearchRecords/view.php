<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SearchRecord $searchRecord
 */

$this->setLayout('admin');
echo $this->Html->css('admin_view.css');
?>



<div class="row">

    <aside class="column">
        <div class="side-nav">
            <?= $this->Html->link(__('Back to Records'), ['action' => 'index'], ['class' => 'btn btn-secondary']) ?>
        </div>
        <br>
    </aside>

    <div class="column-responsive">
        <div class="searchRecords view content">
            <h3><?= h('Search Record') ?></h3>
            <table class="table table-bordered searchRecords_view">
                <tr>
                    <th class="bg-dark text-light"><?= __('User') ?></th>
                    <td><?= $searchRecord->has('user') ? $this->Html->link($searchRecord->user->first_name, ['controller' => 'Users', 'action' => 'view', $searchRecord->user->id]) : '' ?></td>
                    <!--                            <td>--><?php //= $searchRecord->has('user') ? h($searchRecord->user->first_name) : '' ?><!--</td>-->
                </tr>
                <tr>
                    <th class="bg-dark text-light"><?= __('Address') ?></th>
                    <td><?= $searchRecord->has('address') ? $this->Html->link($searchRecord->address->postcode, ['controller' => 'Users', 'action' => 'view', $searchRecord->address->id]) : '' ?></td>
                    <!--                            <td>--><?php //= $searchRecord->has('address') ? h($searchRecord->address->postcode) : '' ?><!--</td>-->
                </tr>
                <tr>
                    <th class="bg-dark text-light"><?= __('Score') ?></th>
                    <td><?= $this->Number->format($searchRecord->score) ?></td>
                </tr>
            </table>
            <div class="actions">
                <a href="<?= $this->Url->build(['action' => 'edit', $searchRecord->id]) ?>" class="btn btn-primary">Edit Record</a>
                <?= $this->Form->postLink(__('Delete Record'), ['action' => 'delete', $searchRecord->id], ['confirm' => __('Are you sure you want to delete this record?'), 'class' => 'btn btn-danger']) ?>

            </div>
        </div>
    </div>
</div>
