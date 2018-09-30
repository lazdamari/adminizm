<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "<b>$item->kullanici_adi</b> kaydının şifresini değiştiriyorsunuz"; ?>
        </h4>
    </div>

    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form method="post" action="<?php echo base_url("users/update_password/$item->id"); ?>">

                 

                    <div class="form-group">
                        <label>Şifre</label>
                        <input class="form-control" name="password" type="password"
                               placeholder="Şifre">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("password") ?></small>
                        <?php } ?>
                    </div>


                    <div class="form-group">
                        <label>Şifre Tejrar</label>
                        <input class="form-control" name="re_password" type="password"
                               placeholder="Şifre Tekrar">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("re_password") ?></small>
                        <?php } ?>
                    </div>


                    <button type="submit" class="btn btn-success btn-outline btn-md">Güncelle</button>
                    <a href="<?php echo base_url("users") ?>" class="btn btn-default">İptal</a>
                </form>
            </div>
        </div>
    </div>
</div>
