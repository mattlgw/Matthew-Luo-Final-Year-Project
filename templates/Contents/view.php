<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Content $content
 */

$this->setLayout('admin');

?>
<div class="row">
    <aside class="column" style="margin-bottom: 25px">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Content'), ['action' => 'edit', $content->id], ['class' => 'side-nav-item btn btn-dark']) ?>
            <?= $this->Html->link(__('List Contents'), ['action' => 'index'], ['class' => 'side-nav-item btn btn-primary']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="contents view content">
            <table class="table table-bordered" style="width: 50%;">
                <tr>
                    <th class="bg-dark text-light"><?= __('Parent') ?></th>
                    <td><?= h($content->parent) ?></td>
                </tr>
                <tr>
                    <th class="bg-dark text-light"><?= __('Hint') ?></th>
                    <td><?= h($content->hint) ?></td>
                </tr>
                <tr>
                    <th class="bg-dark text-light"><?= __('Content Type') ?></th>
                    <td><?= h($content->content_type) ?></td>
                </tr>
                <tr>
                    <th class="bg-dark text-light"><?= __('Modified') ?></th>
                    <td><?= h($content->modified) ?></td>
                </tr>
            </table>

            <table class="table">
                <tr>
                    <th class="bg-dark text-light"><?= __('Content Value') ?></th>
                </tr>
                <tr>
                    <td>
                        <blockquote>
                            <?= $this->Text->autoParagraph(h($content->content_value)); ?>
                        </blockquote>
                    </td>
                </tr>
                <tr>
                    <th class="bg-dark text-light"><?= __('Previous Value') ?></th>
                </tr>
                <tr>
                    <td>
                        <blockquote>
                            <?= $this->Text->autoParagraph(h($content->previous_value)); ?>
                        </blockquote>
                    </td>
                </tr>
            </table>


        </div>
    </div>
</div>
