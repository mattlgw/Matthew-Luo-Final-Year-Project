<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Content $content
 * @var string[] $content_types
 *
 */

$this->setLayout('admin');

// Load CKEditor scripts
$this->Html->script('ckeditor.js', ['block' => true]);

?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Contents'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="contents form content">
            <?= $this->Form->create($content) ?>
            <fieldset class="border p-4">
                <legend><?= __('Add Content') ?></legend>
                <?php
                    echo $this->Form->control('parent', ['class' => 'form-control mb-3', 'label' => 'Parent']);
                    echo $this->Form->control('hint', ['class' => 'form-control mb-3', 'label' => 'Hint']);
                    echo $this->Form->control('content_type', [
                        'class' => 'form-select mb-3 h-25 w-25',
                        'label' => 'Content Type',
                        'options' => $content_types,
                        'empty' => '-- Select a content type --'
                    ]);
                    echo $this->Form->control('content_value', [
                        'class' => 'form-control mb-3',
                        'label' => 'Content Value',
                        'required' => false,
                        'style' => 'font-family:monospace'
                    ]);
//                    echo $this->Form->control('previous_value');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-dark']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<?php
echo $this->Html->script('content_block_editor.js', ['block' => 'footer_script']);
?>
