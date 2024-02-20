<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\ContentImage> $contentImages
 */

$this->setLayout('admin');

echo $this->Html->css('//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css' );
echo $this->Html->script('//cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js');

?>
<div class="contentImages index content">
    <?= $this->Html->link(__('New Content Image'), ['action' => 'add'], ['class' => 'btn btn-dark']) ?>
    <br> <br>
    <h3><?= __('Content Images') ?></h3>
    <div class="table-responsive">
        <table id = "table-demo">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('parent') ?></th>
                    <th><?= $this->Paginator->sort('hint') ?></th>
                    <th><?= $this->Paginator->sort('image_file') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contentImages as $contentImage): ?>
                <tr>
                    <td><?= $this->Number->format($contentImage->id) ?></td>
                    <td><?= h($contentImage->parent) ?></td>
                    <td><?= h($contentImage->hint) ?></td>
                    <td><?= $this->Html->image($contentImage->image_file, ['style' => 'max-width: 100px; height: auto;']) ?></td>
                    <td><?= h($contentImage->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $contentImage->id], ['class' => 'btn btn-dark']) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $contentImage->id], ['class' => 'btn btn-primary']) ?>
<!--                        --><?php //= $this->Form->postLink(__('Delete'), ['action' => 'delete', $contentImage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contentImage->id)]) ?>
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
</script
