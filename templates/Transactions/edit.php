<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transaction $transaction
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $items
 */
?>
<div class="row">
    <div class="column-responsive">
        <div class="transactions form content">
            <?= $this->Form->create($transaction) ?>
            <fieldset>
                <legend><?= __('Edit Transaction') ?></legend>
                <?php
                    echo $this->Form->control('paid_amount', ['label' => 'Payment Total']);
                    echo $this->Form->control('date_created');
                    echo $this->Form->control('notes');
                ?>
            </fieldset>
            <button type="submit" class="btn btn-warning btn-lg">Submit</button>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
