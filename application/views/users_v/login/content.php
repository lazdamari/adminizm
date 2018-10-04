<div class="simple-page-wrap">
    <div class="simple-page-logo animated swing">
        <a href="index.html">
            <span><i class="fa fa-gg"></i></span>
            <span>{ <b>adminizm</b> }</span>
        </a>
    </div><!-- logo -->
    <div class="simple-page-form animated flipInY" id="login-form">
        <form action="<?php echo base_url("userop/do_login");?>" method="post">
            <div class="form-group">
                <input id="sign-in-email" type="email" class="form-control" name="user_email" placeholder="E-Posta Adresi">
                <?php if (isset($form_error)) { ?>
                    <small class="input-form-error"><?php echo form_error("user_email") ?></small>
                <?php } ?>
            </div>

            <div class="form-group">
                <input id="sign-in-password" type="password" class="form-control" name="user_password" placeholder="Şifre">
            </div>
            <button type="submit" class="btn btn-primary">Giriş Yap</button>
        </form>
    </div><!-- #login-form -->

    <div class="simple-page-footer">
        <p><a href="<?php echo base_url("sifremi-unuttum"); ?>">Şifremi Unuttum</a></p>
    </div><!-- .simple-page-footer -->


</div><!-- .simple-page-wrap -->