<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transport $transport
 */

$this->setLayout('admin');
echo $this->Html->css('admin_view.css');
?>


<div class="row">
    <aside class="column">
        <div class="side-nav">

            <?= $this->Html->link(__('Back to List Transports'), ['action' => 'index'], ['class' => 'side-nav-item btn btn-secondary']) ?>

        </div>
        <br>
    </aside>
    <div class="column-responsive column-80">
        <div class="transports view content">
            <h3><?= h('Transport') ?></h3>
            <table class="table table-bordered transports_view">
                <tr>
                    <th class="bg-dark text-light"><?= __('Mode') ?></th>
                    <td><?= h($transport->mode) ?></td>
                </tr>

            </table>
            <div class="related">
                <h4><?= __('Related Category Transports') ?></h4>
                <?php if (!empty($transport->category_transports)) : ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th class="bg-dark text-light"><?= __('Proximity') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($transport->category_transports as $categoryTransports) : ?>
                        <tr>
                            <td><?= h($categoryTransports->proximity) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'CategoryTransports', 'action' => 'view', $categoryTransports->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'CategoryTransports', 'action' => 'edit', $categoryTransports->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'CategoryTransports', 'action' => 'delete', $categoryTransports->id], ['confirm' => __('Are you sure you want to delete # {0}?', $categoryTransports->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
                <div>

                    <?= $this->Html->link(__('Edit Transport'), ['action' => 'edit', $transport->id], ['class' => 'side-nav-item btn btn-primary']) ?>
                    <?= $this->Form->postLink(__('Delete Transport'), ['action' => 'delete', $transport->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transport->id), 'class' => 'side-nav-item btn btn-danger']) ?>
                </div>
            </div>
        </div>
    </div>
</div>
