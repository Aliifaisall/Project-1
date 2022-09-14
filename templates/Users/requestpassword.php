<div class="users form container">
    <br/><br/><br/><br/><br/><br/>
    <?= $this->Flash->render() ?>
    <h3>Reset Password</h3>
    <form method="post" accept-charset="utf-8" action="<?= $this->Url->build(['controller' => 'users', 'action' => 'requestpassword',])?>">
        <fieldset>
            <legend>A password reset link will be emailed to you.</legend>
            <div class="input email required pt-3"><label for="email">Email</label><br/>
                <input class="form-control w-25" style="min-width: 200px;" type="email" name="email" required="required" id="email" aria-required="true"></div>
        </fieldset>
        <br/>
        <div class="submit"><input type="submit" value="Request Password Reset Link"></div>
    </form>
    <br/>
</div>
