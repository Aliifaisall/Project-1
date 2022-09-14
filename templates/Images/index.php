<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Image[]|\Cake\Collection\CollectionInterface $images
 */
?>
<div class="images index content">
    <?= $this->Html->link(__('Add Image'), ['action' => 'add'], ['class' => 'btn btn-warning btn-lg float-right', 'style' => 'font-size: large']) ?>
    <h3><?= __('Images') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('file_path') ?></th>
                    <th><?= $this->Paginator->sort('thumbnail_file_path') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($images as $image): ?>
                <tr>
                    <td><?= h($image->name) ?></td>
                    <td><?= h($image->file_path) ?></td>
                    <td><?= h($image->thumbnail_file_path) ?></td>
                    <td class="actions">
                        <?php if ($this->request->getQuery('delete') && $this->request->getQuery('delete') == $image->id){
                            echo 'Confirm Deletion:<br/>';
                            echo $this->Form->postLink(__('Confirm'), ['action' => 'delete', $image->id]);
                            echo $this->Html->link(__('Cancel'), ['action' => 'index', $image->id]);
                        } else {
                            echo $this->Html->link(__('View Details'), ['action' => 'view', $image->id]);
                            //echo $this->Html->link(__('Edit'), ['action' => 'edit', $image->id]);
                            //echo $this->Html->link(__('Delete'), ['action' => 'index', '?' => array('delete' => $image->id), $image->id]);
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
