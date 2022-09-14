<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Inquiry $inquiry
 */
?>
<div class="row">
    <div class="column-responsive">
        <div class="inquiries view content">
            <h3>Inquiry <?= h($inquiry->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= $this->Html->link(h($inquiry->email), 'mailto:' . $inquiry->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone Number') ?></th>
                    <td><?= h($inquiry->phone_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Full Name') ?></th>
                    <td><?= h($inquiry->full_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Message') ?></th>
                    <td><?= h($inquiry->message) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($inquiry->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date Created') ?></th>
                    <td><?= h($inquiry->date_created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Reply Sent') ?></th>
                    <td><?= $inquiry->reply_sent ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
