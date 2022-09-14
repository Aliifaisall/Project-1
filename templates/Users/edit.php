<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <div class="column-responsive">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Edit User') ?></legend>
                <?php
                    echo $this->Form->control('is_admin', ['label' => 'Grant Administrator Privileges']);
                    echo $this->Form->control('email');
                    echo $this->Form->control('password');
                    echo $this->Form->control('first_name');
                    echo $this->Form->control('last_name');
                    echo $this->Form->control('shipping_address');
                    echo $this->Form->control('phone_number');
                    echo $this->Form->control('notes');
                ?>
            </fieldset>
            <button type="submit" class="btn btn-warning btn-lg">Submit</button>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
