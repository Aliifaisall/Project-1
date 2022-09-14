<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
    <div class="column-responsive">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Add User') ?></legend>
                <?php
                    echo $this->Form->control('email');
                    echo $this->Form->control('password');
                    echo $this->Form->control('first_name');
                    echo $this->Form->control('last_name');
                    echo $this->Form->control('shipping_address');
                    echo $this->Form->control('phone_number');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['id' => 'cakebtn']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>




<!-- CSRF protection -->
<script>
    $(function (){
        $('#cakebtn').click(function (){
            $.ajax({
                method:"POST",
                url: "<?= $this->Url->build(['controller' => 'Users','action' => 'add'])?>"
                data: {
                    id:10
                },
                header:{
                    'X-CSRF-Token':$('meta[name="csrfToken"]').attr('content')
                }

            })
        })
    })
</script>
