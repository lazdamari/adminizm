<div class="simple-page-wrap">
    <div class="simple-page-logo animated swing">
        <a href="<?php echo base_url()?>">
            <span><i class="fa fa-gg"></i></span>
            <span>{ <b>adminizm</b> }</span>
        </a>
    </div><!-- logo -->


    <div class="simple-page-form animated flipInY" id="reset-password-form">
        <h4 class="form-title m-b-xl text-center">Şifrenizi mi unuttunuz ?</h4>

        <form action="<?php echo base_url("reset-password")?>" method="post">
            <div class="form-group">
                <input id="reset-password-email" type="email" name="email" class="form-control" placeholder="E-Posta Adresi"  value="<?php echo isset($form_error) ? set_value("email") : "" ?>">
                <?php if (isset($form_error)) { ?>
                    <small class="input-form-error"><?php echo form_error("email") ?></small>
                <?php } ?>
            </div>
            <button class="btn btn-primary">Şifremi Sıfırla</button>
        </form>
    </div><!-- #reset-password-form -->

    <div class="simple-page-footer">
        <p><a href="<?php echo base_url("login"); ?>">Giriş Yap</a></p>
    </div><!-- .simple-page-footer -->



</div><!-- .simple-page-wrap -->