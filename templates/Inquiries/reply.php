<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Inquiry $inquiry
 */
?>
<div class="row">
    <div class="column-responsive">
        <div class="inquiries form content">
            <form method="post" accept-charset="utf-8" action="<?= $this->Url->build(['controller' => 'inquiries', 'action' => 'sendEmail', $inquiry->id])?>">
                <fieldset>
                    <legend>Inquiry from <?= $inquiry->full_name ?>:</legend>
                    <a style="min-width: 200px;" id="inquiry"><?= $inquiry->message ?></a>
                    <br/><br/>
                    <div class="input required pt-3"><label for="body" style="h2">Reply:</label>
                        <textarea class="form-control w-75" style="min-width: 200px; font-size: medium" type="body" name="body" required="required" id="body" aria-required="true"></textarea>
                    </div>
                </fieldset>
                <button type="submit" class="btn btn-warning btn-lg">Reply</button>
                <a class="btn" href="<?= $this->Url->build(['controller' => 'inquiries', 'action' => 'index'])?>" style="font-size: medium">Back to Inquiries</a>
            </form>
        </div>
    </div>
</div>
