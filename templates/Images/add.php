<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Image $image
 * @var \Cake\Collection\CollectionInterface|string[] $items
 */
?>
<div class="row">
    <div class="column-responsive">
        <div class="images form content">
            <?= $this->Form->create($image, ['type'=>'file']) ?>
            <fieldset>
                <legend><?= __('Add an image for this item') ?></legend>
                <?php
                    echo $this->Form->control('image_file',['type'=>'file']);
                ?>
            </fieldset>
            <button type="submit" class="btn btn-warning btn-lg">Submit</button>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
