<div class="form-login">

    <?= $this->hook->render('template:auth:login-form:before') ?>

    <?php if (isset($errors['login'])): ?>
        <p class="alert alert-error"><?= $this->text->e($errors['login']) ?></p>
    <?php endif ?>

    <?php if (! HIDE_LOGIN_FORM): ?>
    <form method="post" action="<?= $this->url->href('AuthController', 'check') ?>">

        <?= $this->form->csrf() ?>

        <?= $this->form->label(t('Username'), 'username') ?>
        <?= $this->form->text('username', $values, $errors, array('write','autofocus', 'required', 'placeholder="Enter your username"')) ?>

        <?= $this->form->label(t('Password'), 'password') ?>
        <?= $this->form->password('password', $values, $errors, array('write','required', 'placeholder="Enter your password"')) ?>

        <?php if (isset($captcha) && $captcha): ?>
            <?= $this->form->label(t('Enter the text below'), 'captcha') ?>
            <img src="<?= $this->url->href('CaptchaController', 'image') ?>" alt="Captcha">
            <?= $this->form->text('captcha', array(), $errors, array('required')) ?>
        <?php endif ?>

        <?php if (REMEMBER_ME_AUTH == true): ?>
            <?= $this->form->checkbox('remember_me', t('Remember Me'), 1, true) ?>
            <div class="mb-10"></div>
        <?php else: ?>
            <div class="mb-15"></div>
        <?php endif ?>

        <div class="form-actions">
            <button type="submit" class="btn login-btn" ><?= t('Sign in') ?></button>
        </div>
        <?php if ($this->app->config('password_reset') == 1): ?>
            <div class="reset-password" hidden>
                <?= $this->url->link(t('Forgot password?'), 'PasswordResetController', 'create') ?>
            </div>
        <?php endif ?>
    </form>
    <?php endif ?>

    <?= $this->hook->render('template:auth:login-form:after') ?>
</div>
