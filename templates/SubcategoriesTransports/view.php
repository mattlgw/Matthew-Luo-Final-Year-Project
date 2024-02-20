<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SubcategoriesTransport $subcategoriesTransport
 */

$this->setLayout('admin');
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <?= $this->Html->link(__('Back to Lifestyle Preferences List'), ['action' => 'index'], ['class' => 'side-nav-item btn btn-secondary']) ?>
         </div>
    </aside>
    <br> <br>
    <div class="column-responsive column-80">
        <div class="subcategoriesTransports view content">
            <br>
            <h3><?= 'Lifestyle Preference' ?></h3>
            <table class="table table-bordered" style="width: 25%;">
                <tr>
                    <th class="bg-dark text-light"><?= __("User's Name") ?></th>
                    <td><?= h($subcategoriesTransport->user->first_name." ".$subcategoriesTransport->user->last_name) ?></td>
                </tr>
                <tr>
                    <th class="bg-dark text-light"><?= __("Sub Category") ?></th>
                    <td><?= h($subcategoriesTransport->sub_category->name) ?></td>
                </tr>
                <tr>
                    <th class="bg-dark text-light"><?= __("Transport") ?></th>
                    <td><?= h($subcategoriesTransport->transport->mode) ?></td>
                </tr>
                <tr>
                    <th class="bg-dark text-light"><?= __("Proximity") ?></th>
                    <td><?= $this->Number->format($subcategoriesTransport->proximity) ?></td>
                </tr>
            </table>
            <div class="actions">
                <?= $this->Html->link(__('Edit Lifestyle Preference'), ['action' => 'edit', $subcategoriesTransport->id], ['class' => 'btn btn-primary']) ?>
                <?= $this->Form->postLink(__('Delete Lifestyle Preference'), ['action' => 'delete', $subcategoriesTransport->id], ['confirm' => __('Are you sure you want to delete this Lifestyle Preference?'), 'class' => 'btn btn-danger']) ?>
            </div>
        </div>
    </div>
</div>
