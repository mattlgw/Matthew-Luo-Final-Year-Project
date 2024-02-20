<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SearchRecord $searchRecord
 */


?>

<div class="container mt-5" style="margin-bottom: 100px">
    <div class="table-container">
    <div class="float-right">

    <div class="row">

        <div class="column-responsive column-80">
            <div class="searchRecords view content">
                <h3><?= h('Search Record') ?></h3>
                <br>

                <div style="display: flex; justify-content: center; align-items: center;">
                    <table class="table table-bordered">
                        <tr>
                            <th><?= __('Address') ?></th>
                            <td><?= $searchRecord->has('address') ? h($searchRecord->address->postcode) : '' ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Score') ?></th>
                            <td><?= $this->Number->format($searchRecord->score) ?></td>
                        </tr>
                    </table>
                </div>

                <div class="actions">
<!--                    <a href="--><?php //= $this->Url->build(['action' => 'edit', $searchRecord->id]) ?><!--" class="btn btn-primary">Edit Record</a>-->
                    <?= $this->Form->postLink(__('Delete Record'), ['action' => 'delete', $searchRecord->id], ['confirm' => __('Are you sure you want to delete this record?'), 'class' => 'btn btn-danger']) ?>
                    <?= $this->Html->link(__('Back to Records'), ['action' => 'customer'], ['class' => 'btn btn-secondary']) ?>
                </div>
            </div>
        </div>
    </div>
</div>

