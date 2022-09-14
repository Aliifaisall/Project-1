<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item[]|\Cake\Collection\CollectionInterface $items
 */
?>
<div class="items index content">
    <?= $this->Html->link(__('Add Item'), ['action' => 'add'], ['class' => 'btn btn-warning btn-lg float-right', 'style' => 'font-size: large']) ?>
    <h3><?= __('Items') ?></h3>

    <form method="get" accept-charset="utf-8" action=
        <?= $this->Url->build(['controller' => 'items', 'action' => 'index',])?>>
        <div class="row align-items-stretch">
            <div class="col-md-4">
                <div class="input text">
                    <input class="form-control" name="key" id="key" type="text" style="font-size: medium" placeholder="Item name...">
                </div>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-warning btn-lg">Search Items</button>
            </div>
        </div>
    </form>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('date_added') ?></th>
                    <th><?= $this->Paginator->sort('date_of_creation') ?></th>
                    <th><?= $this->Paginator->sort('for_sale') ?></th>
                    <th><?= $this->Paginator->sort('price', 'Price ($AUD)') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item): ?>
                <tr>
                    <td><?= $this->Number->format($item->id) ?></td>
                    <td><?= h($item->name) ?></td>
                    <td><?= h($item->date_added) ?></td>
                    <td><?= h($item->date_of_creation) ?></td>
                    <td>
                        <?php if ($item->for_sale){
                            echo 'Yes';
                        } else {
                            echo 'No';
                        } ?>
                    </td>
                    <td><?= $item->price === null ? '' : $this->Number->format($item->price) ?></td>
                    <td class="actions">
                        <?php if ($this->request->getQuery('delete') && $this->request->getQuery('delete') == $item->id){
                            echo 'Confirm Deletion:<br/>';
                            echo $this->Form->postLink(__('Confirm'), ['action' => 'delete', $item->id]);
                            echo $this->Html->link(__('Cancel'), ['action' => 'index', $item->id]);
                        } else {
                            echo $this->Html->link(__('Details'), ['action' => 'view', $item->id]);
                            echo $this->Html->link(__('Edit'), ['action' => 'edit', $item->id]);
                            echo $this->Html->link(__('Delete'), ['action' => 'index', '?' => array('delete' => $item->id), $item->id]);
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
