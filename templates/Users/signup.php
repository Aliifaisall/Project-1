<div class="users form container">
    <br/><br/><br/><br/><br/><br/>
    <?= $this->Flash->render() ?>
    <h3>Sign Up </h3>
    <form method="post" accept-charset="utf-8" action="<?= $this->Url->build(['controller' => 'users', 'action' => 'add',])?>">
        <fieldset>
            <legend>Please enter your preferred account details.</legend>
            <div class="input email required pt-3"><label for="email">Email</label><br/>
                <input class="form-control w-25" style="min-width: 200px;" type="email" name="email" required="required" id="email" aria-required="true"></div>
            <div class="input password required pt-3"><label for="password">Password</label><br/>
                <input class="form-control w-25" style="min-width: 200px;" type="password" name="password" required="required" id="password" aria-required="true" maxlength="255"></div>
            <div class="input first_name required pt-3"><label for="first_name">First Name</label><br/>
                <input class="form-control w-25" style="min-width: 200px;" type="first_name" name="first_name" required="required" id="first_name" aria-required="true" maxlength="50"></div>
            <div class="input last_name required pt-3"><label for="last_name">Last Name</label><br/>
                <input class="form-control w-25" style="min-width: 200px;" type="last_name" name="last_name" required="required" id="last_name" aria-required="true" maxlength="50"></div>
            <div class="input shipping_address pt-3"><label for="shipping_address">Address</label><br/>
                <input class="form-control w-25" style="min-width: 200px;" type="shipping_address" name="shipping_address" required="required" id="shipping_address" aria-required="true" maxlength="255"></div>
            <div class="input phone_number pt-3"><label for="phone_number">Phone Number</label><br/>
                <input class="form-control w-25" style="min-width: 200px;" type="phone_number" name="phone_number" required="required" id="phone_number" aria-required="true" maxlength="12"></div>
        </fieldset>
        <br/>
        <div class="submit"><input type="submit" value="Sign Up"></div>
    </form>
</div>
