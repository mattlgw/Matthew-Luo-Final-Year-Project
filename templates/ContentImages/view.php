<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ContentImage $contentImage
 */

$this->setLayout('admin');

?>
<div class="row">
    <aside class="column">
        <div class="side-nav">


            <?= $this->Html->link(__('Back to List Content Images'), ['action' => 'index'], ['class' => 'side-nav-item btn btn-secondary']) ?>

        </div>
    </aside>
    <br> <br>
    <div class="column-responsive column-80">
        <div class="contentImages view content">
            <h3><?= h($contentImage->hint) ?></h3>
            <table class="table table-bordered" style="width: 50%;">
                <tr>
                    <th class="bg-dark text-light"><?= __('Parent') ?></th>
                    <td><?= h($contentImage->parent) ?></td>
                </tr>
                <tr>
                    <th class="bg-dark text-light"><?= __('Hint') ?></th>
                    <td><?= h($contentImage->hint) ?></td>
                </tr>
                <tr>
                    <th class="bg-dark text-light"><?= __('Image File') ?></th>
                    <td><?= $this->Html->image($contentImage->image_file, ['style' => 'max-width: 300px; height: auto;']) ?></td>
                </tr>
<!--                <tr>-->
<!--                    <th class="bg-dark text-light">--><?php //= __('Id') ?><!--</th>-->
<!--                    <td>--><?php //= $this->Number->format($contentImage->id) ?><!--</td>-->
<!--                </tr>-->
                <tr>
                    <th class="bg-dark text-light"><?= __('Modified') ?></th>
                    <td><?= h($contentImage->modified) ?></td>
                </tr>
            </table>
<!--            <div class="text">-->
<!--                <strong>--><?php //= __('Previous Value') ?><!--</strong>-->
<!--                <blockquote>-->
<!--                    --><?php //= $this->Text->autoParagraph(h($contentImage->previous_value)); ?>
<!--                </blockquote>-->
<!--            </div>-->
        </div>
    </div>
    <div>
        <?= $this->Html->link(__('Edit Content Image'), ['action' => 'edit', $contentImage->id], ['class' => 'side-nav-item btn btn-primary']) ?>
    </div>
</div>
