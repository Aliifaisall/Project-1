<div class="users form container">
    <br/><br/><br/><br/><br/><br/>
    <?= $this->Flash->render() ?>
    <h3>Login</h3>
    <form method="post" accept-charset="utf-8" action="<?= $this->Url->build(['controller' => 'users', 'action' => 'login',])?>">
        <fieldset>
            <legend>Please enter your username and password</legend>
            <div class="input email required pt-3"><label for="email">Email</label><br/>
                <input class="form-control w-25" style="min-width: 200px;" type="email" name="email" required="required" id="email" aria-required="true"></div>
            <div class="input password required py-3"><label for="password">Password</label><br/>
                <input class="form-control w-25" style="min-width: 200px;" type="password" name="password" required="required" id="password" aria-required="true"></div>
        </fieldset>
        <div class="submit"><input type="submit" value="Login"></div>
    </form>
    <br/><br/>
    <a class="btn btn-primary text-black" href="<?= $this->Url->build(['controller' => 'users', 'action' => 'signup',])?>">Create a New Account</a>
    <a class="btn" href="<?= $this->Url->build(['controller' => 'users', 'action' => 'requestpassword',])?>" >Forgot your password?</a>
    <br/><br/><br/>
</div>
