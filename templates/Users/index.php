<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="users index content">

    <h3><?= __('Users') ?></h3>

    <form method="get" accept-charset="utf-8" action=
        <?= $this->Url->build(['controller' => 'users', 'action' => 'index',])?>>
        <div class="row align-items-stretch">
            <div class="col-md-4">
                <div class="input text">
                    <input class="form-control" name="key" id="key" type="text" style="font-size: medium" placeholder="Name...">
                </div>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-warning btn-lg">Search Users</button>
            </div>
        </div>
    </form>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('is_admin') ?></th>
                    <th><?= $this->Paginator->sort('email', 'Email Address') ?></th>
                    <th><?= $this->Paginator->sort('first_name') ?></th>
                    <th><?= $this->Paginator->sort('last_name') ?></th>
                    <th><?= $this->Paginator->sort('phone_number', 'Phone No.') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $this->Number->format($user->id) ?></td>
                    <td>
                        <?php if ($user->is_admin){
                            echo 'Yes';
                        } else {
                            echo 'No';
                        } ?>
                    </td>
                    <td><?= h($user->email) ?></td>
                    <td><?= h($user->first_name) ?></td>
                    <td><?= h($user->last_name) ?></td>
                    <td><?= h($user->phone_number) ?></td>
                    <td class="actions">
                        <?php if ($this->request->getQuery('delete') && $this->request->getQuery('delete') == $user->id){
                            echo 'Confirm Deletion:<br/>';
                            echo $this->Form->postLink(__('Confirm'), ['action' => 'delete', $user->id]);
                            echo $this->Html->link(__('Cancel'), ['action' => 'index', $user->id]);
                        } else {
                            echo $this->Html->link(__('Details'), ['action' => 'view', $user->id]);
                            echo $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]);
                            echo $this->Html->link(__('Delete'), ['action' => 'index', '?' => array('delete' => $user->id), $user->id]);
                        } ?>
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
