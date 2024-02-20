<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */

$this->setLayout('admin');

echo $this->Html->css('//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css' );
echo $this->Html->script('//cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js');
echo $this->Html->css('//cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css'); // Include the Responsive extension CSS
echo $this->Html->script('//cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js'); // Include the Responsive extension JavaScript

?>
<div class="users index content">
<!--    --><?php //= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Users') ?></h3>
    <div class="table-responsive">
        <table id = "table-demo">
            <thead>
                <tr>

                    <th><?= $this->Paginator->sort('first_name') ?></th>
                    <th><?= $this->Paginator->sort('last_name') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('role') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>

                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>

                    <td><?= h($user->first_name) ?></td>
                    <td><?= h($user->last_name) ?></td>
                    <td><?= h($user->email) ?></td>
                    <td><?= h($user->role) ?></td>
                    <td><?= h($user->created) ?></td>
                    <td><?= h($user->modified) ?></td>

                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $user->id], ['class' => 'btn btn-dark']) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id], ['class' => 'btn btn-primary']) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $user->id],
                            ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'btn btn-danger']
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
