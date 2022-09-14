<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transaction $transaction
 */
?>
<div class="row">
    <div class="column-responsive">
        <div class="transactions view content">
            <h3>Order #<?= h($transaction->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User ID') ?></th>
                    <td><?= $transaction->has('user') ? $this->Html->link($transaction->user->id, ['controller' => 'Users', 'action' => 'view', $transaction->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Item') ?></th>
                    <td><?= $transaction->has('item') ? $this->Html->link($transaction->item->name, ['controller' => 'Items', 'action' => 'view', $transaction->item->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Date Created') ?></th>
                    <td><?= h($transaction->date_created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Paid Amount') ?></th>
                    <td><?= $this->Number->format($transaction->paid_amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($transaction->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Notes') ?></th>
                    <td><?= h($transaction->notes) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
