<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item $item
 * @var \Cake\Collection\CollectionInterface|string[] $collections
 * @var \Cake\Collection\CollectionInterface|string[] $images
 */
?>
<div class="row">
    <div class="column-responsive">
        <div class="items form content">
            <?= $this->Form->create($item) ?>
            <fieldset>
                <legend><?= __('Add Item') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('description');
                    echo $this->Form->control('date_added', ['empty' => true]);
                    echo $this->Form->control('date_of_creation', ['empty' => true]);
                    echo $this->Form->control('size_in_cm_squared', ['label' => 'Size (cm²)', 'max' => '99999999']);
                    echo $this->Form->control('price', ['label' => 'Price ($AUD)', 'max' => '999999.99']);
                echo $this->Form->control('for_sale', ['label' => 'Available for Purchase']);
                ?>
            </fieldset>
            <button type="submit" class="btn btn-warning btn-lg">Proceed to Add Image</button>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
