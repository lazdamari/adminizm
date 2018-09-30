<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Yeni Kullanıcı Ekle
        </h4>
    </div>

    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form method="post" action="<?php echo base_url("users/save"); ?>">

                    <div class="form-group">
                        <label>Kullanıcı Adı</label>
                        <input type="text" class="form-control" name="user_name" placeholder="Kullanıcı" value="<?php echo isset($form_error) ? set_value("user_name") : "" ?>">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("user_name") ?></small>
                        <?php } ?>
                    </div>


                    <div class="form-group">
                        <label>Ad Soyad</label>
                        <input type="text" class="form-control" name="full_name" placeholder="Ad Soyad" value="<?php echo isset($form_error) ? set_value("full_name") : "" ?>">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("full_name") ?></small>
                        <?php } ?>
                    </div>


                    <div class="form-group">
                        <label>E-Posta Adresi</label>
                        <input class="form-control" name="email" type="email" placeholder="E-posta Adresi" value="<?php echo isset($form_error) ? set_value("email") : "" ?>">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("email") ?></small>
                        <?php } ?>
                    </div>


                    <div class="form-group">
                        <label>Şifre</label>
                        <input  class="form-control" name="password" type="password"
                               placeholder="Şifre">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("password") ?></small>
                        <?php } ?>
                    </div>


                    <div class="form-group">
                        <label>Şifre Tejrar</label>
                        <input  class="form-control" name="re_password" type="password"
                               placeholder="Şifre Tekrar">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("re_password") ?></small>
                        <?php } ?>
                    </div>


                    <button type="submit" class="btn btn-success btn-outline btn-md">Kaydet</button>
                    <a href="<?php echo base_url("users") ?>" class="btn btn-default">İptal</a>
                </form>
            </div>
        </div>
    </div>
</div>
