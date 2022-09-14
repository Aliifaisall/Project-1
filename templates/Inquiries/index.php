<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Inquiry[]|\Cake\Collection\CollectionInterface $inquiries
 */
?>
<div class="inquiries index content">
    <h3><?= __('Inquiries') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('phone_number') ?></th>
                    <th><?= $this->Paginator->sort('full_name') ?></th>
                    <th><?= $this->Paginator->sort('date_created') ?></th>
                    <th><?= $this->Paginator->sort('reply_sent') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($inquiries as $inquiry): ?>
                <tr>
                    <td><?= h($inquiry->email) ?></td>
                    <td><?= h($inquiry->phone_number) ?></td>
                    <td><?= h($inquiry->full_name) ?></td>
                    <td><?= h($inquiry->date_created) ?></td>
                    <td>
                        <?php if ($inquiry->reply_sent){
                            echo 'Yes';
                        } else {
                            echo 'No';
                        } ?>
                    </td>
                    <td class="actions">
                        <?= $this->Html->link(__('Details'), ['action' => 'view', $inquiry->id]) ?>
                        <?= $this->Html->link(__('Read & Reply'), ['action' => 'reply', $inquiry->id]) ?>
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
