<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item $item
 * @var string[]|\Cake\Collection\CollectionInterface $collections
 * @var string[]|\Cake\Collection\CollectionInterface $images
 */
?>
<div class="row">
    <div class="column-responsive">
        <div class="items form content">
            <?= $this->Form->create($item) ?>
            <fieldset>
                <legend><?= __('Edit Item') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('description');
                    echo $this->Form->control('date_added', ['empty' => true]);
                    echo $this->Form->control('date_of_creation', ['empty' => true]);
                    echo $this->Form->control('size_in_cm_squared');
                    echo $this->Form->control('price');
                    echo $this->Form->control('for_sale');
                ?>
            </fieldset>
            <button type="submit" class="btn btn-warning btn-lg">Submit</button>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
