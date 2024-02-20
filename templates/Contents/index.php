<?php

$this->setLayout('admin');

$this->assign('title', 'Web Content');

echo $this->Html->css('//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css' );
echo $this->Html->script('//cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js');

?>
<div class="contents index content">
    <?= $this->Html->link(__('New Content'), ['action' => 'add'], ['class' => 'btn btn-dark']) ?>
    <br> <br>
    <h3><?= __('Contents') ?></h3>
    <div class="table-responsive">
        <table id = "table-demo">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('parent') ?></th>
                    <th><?= $this->Paginator->sort('hint') ?></th>
                    <th><?= $this->Paginator->sort('content_type') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contents as $content): ?>
                <tr>
                    <td><?= h($content->parent) ?></td>
                    <td><?= h($content->hint) ?></td>
                    <td><?= h($content->content_type) ?></td>
                    <td><?= h($content->modified) ?></td>
                    <td class="actions">
<!--                        --><?php //= $this->Html->link(__('View'), ['action' => 'view', $content->id], ['class' => 'btn btn-dark']) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $content->id], ['class' => 'btn btn-primary']) ?>
<!--                        --><?php //= $this->Form->postLink(__('Delete'), ['action' => 'delete', $content->id], ['class' => 'btn btn-danger'],['confirm' => __('Are you sure you want to delete # {0}?', $content->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<!--    <div class="paginator">-->
<!--        <ul class="pagination">-->
<!--            --><?php //= $this->Paginator->first('<< ' . __('first')) ?>
<!--            --><?php //= $this->Paginator->prev('< ' . __('previous')) ?>
<!--            --><?php //= $this->Paginator->numbers() ?>
<!--            --><?php //= $this->Paginator->next(__('next') . ' >') ?>
<!--            --><?php //= $this->Paginator->last(__('last') . ' >>') ?>
<!--        </ul>-->
<!--        <p>--><?php //= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?><!--</p>-->
<!--    </div>-->
    <br>
</div>

<script>
    let table = new DataTable('#table-demo');
</script>
