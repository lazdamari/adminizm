<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
           Yeni E-Posta Ekle
        </h4>
    </div>

    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form method="post" action="<?php echo base_url("emailsettings/save"); ?>">

                    <div class="form-group">
                        <label>E-Posta Başlık</label>
                        <input type="text" class="form-control" name="user_name" placeholder="E-Posta Başlık giriniz" value="<?php echo isset($form_error) ? set_value("user_name") : "" ?>">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("user_name") ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Protokol</label>
                        <input type="text" class="form-control" name="protokol" placeholder="Protokol" value="<?php echo isset($form_error) ? set_value("protokol") : "" ?>">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("protokol") ?></small>
                        <?php } ?>
                    </div>


                    <div class="form-group">
                        <label>Host</label>
                        <input type="text" class="form-control" name="host" placeholder="Host" value="<?php echo isset($form_error) ? set_value("host") : "" ?>">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("host") ?></small>
                        <?php } ?>
                    </div>


                    <div class="form-group">
                        <label>Port</label>
                        <input class="form-control" name="port" type="number" placeholder="Port Numarası" value="<?php echo isset($form_error) ? set_value("port") : "" ?>">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("port") ?></small>
                        <?php } ?>
                    </div>



                    <div class="form-group">
                        <label>E-Posta Adresi</label>
                        <input class="form-control" name="user" type="email" placeholder="E-Posta Adresi" value="<?php echo isset($form_error) ? set_value("user") : "" ?>">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("user") ?></small>
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
                        <label>Şifre Tekrar</label>
                        <input  class="form-control" name="re_password" type="password"
                               placeholder="Şifre Tekrar">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("re_password") ?></small>
                        <?php } ?>
                    </div>


                    <div class="form-group">
                        <label>Gönderici E-Posta Adresi</label>
                        <input class="form-control" name="gonderici" type="email" placeholder="Gönderici E-Posta Adresi" value="<?php echo isset($form_error) ? set_value("gonderici") : "" ?>">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("gonderici") ?></small>
                        <?php } ?>
                    </div>



                    <div class="form-group">
                        <label>Alıcı E-Posta Adresi</label>
                        <input class="form-control" name="alici" type="email" placeholder="Alıcı E-Posta Adresi" value="<?php echo isset($form_error) ? set_value("alici") : "" ?>">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("alici") ?></small>
                        <?php } ?>
                    </div>


                    <button type="submit" class="btn btn-success btn-outline btn-md">Kaydet</button>
                    <a href="<?php echo base_url("emailsettings") ?>" class="btn btn-default">İptal</a>
                </form>
            </div>
        </div>
    </div>
</div>
