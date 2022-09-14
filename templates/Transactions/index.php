<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transaction[]|\Cake\Collection\CollectionInterface $transactions
 */
?>
<div class="transactions index content">
    <h3><?= __('Orders') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('item_id', 'Item') ?></th>
                    <th><?= $this->Paginator->sort('paid_amount', 'Payment Total') ?></th>
                    <th><?= $this->Paginator->sort('date_created') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transactions as $transaction): ?>
                <tr>
                    <td><?= $transaction->has('item') ? $this->Html->link($transaction->item->name, ['controller' => 'Items', 'action' => 'view', $transaction->item->id]) : '' ?></td>
                    <td><?= $this->Number->format($transaction->paid_amount) ?></td>
                    <td><?= h($transaction->date_created) ?></td>
                    <td><?= h($transaction->status) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Details'), ['action' => 'view', $transaction->id]) ?>
                        <?php if ($transaction->status == 'Pending'){
                            echo $this->Html->link(__('Edit'), ['action' => 'edit', $transaction->id]);
                            echo $this->Html->link(__('Send Invoice'), ['action' => 'sendInvoice', $transaction->id]);
                        } elseif ($transaction->status == 'Invoice Sent'){
                            echo $this->Html->link(__('Edit'), ['action' => 'edit', $transaction->id]);
                            echo $this->Html->link(__('Resend Invoice'), ['action' => 'sendInvoice', $transaction->id]);
                            echo $this->Html->link(__('Mark Complete'), ['action' => 'markComplete', $transaction->id]);
                        }?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
