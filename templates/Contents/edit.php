<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Content $content
 * @var string[] $content_types
 */


$this->setLayout('admin');

//ckeditor
//echo $this->Html->script('https://cdn.ckeditor.com/ckeditor5/38.1.0/classic/ckeditor.js'); //ckeditor

// Load CKEditor scripts
$this->Html->script('ckeditor.js', ['block' => true]);
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
<!--            --><?php //= $this->Form->postLink(
//                __('Delete'),
//                ['action' => 'delete', $content->id],
//                ['confirm' => __('Are you sure you want to delete # {0}?', $content->id), 'class' => 'side-nav-item btn btn-danger']
//            ) ?>
            <?= $this->Html->link(__('List Contents'), ['action' => 'index'], ['class' => 'side-nav-item btn btn-secondary']) ?>
        </div>
        <br>
    </aside>
    <div class="column-responsive column-80">
        <div class="contents form content">

            <?= $this->Form->create($content, ['class' => 'px-md-2']) ?>
            <fieldset class="border p-4">
                <legend class="mb-0"><?= __('Edit Content')?></legend>

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
//                echo $this->Form->control('previous_value', ['class' => 'form-control mb-3', 'label' => 'Previous Value']);
                ?>
            </fieldset>
            <br>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-dark']) ?>
            <?= $this->Form->end() ?>
            <br>
        </div>
    </div>
</div>

<!--
<script>
    //ck editor function
    ClassicEditor
        .create( document.querySelector( '#content-value' ) )
        .then( editor => {
            console.log( editor );
        } )
        .catch( error => {
            console.error( error );
        } );

    ClassicEditor
        .create( document.querySelector( '#previous-value' ) )
        .then( editor => {
            console.log( editor );
        } )
        .catch( error => {
            console.error( error );
        } );
</script>
-->

<?php
echo $this->Html->script('content_block_editor.js', ['block' => 'footer_script']);
?>

