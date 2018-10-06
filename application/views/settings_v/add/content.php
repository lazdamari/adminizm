<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Yeni Ayar Ekle
        </h4>
    </div>


    <div class="col-md-12">
        <form method="post" action="<?php echo base_url("settings/save"); ?>" enctype="multipart/form-data">
            <div class="widget">
                <div class="m-b-lg nav-tabs-horizontal">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#tab-1" aria-controls="tab-1" role="tab" data-toggle="tab">Site Bilgileri</a>
                        </li>
                        <li role="presentation">
                            <a href="#tab-6" aria-controls="tab-6" role="tab" data-toggle="tab">Adres Bilgisi</a>
                        </li>
                        <li role="presentation">
                            <a href="#tab-2" aria-controls="tab-2" role="tab" data-toggle="tab">Hakkımızda</a>
                        </li>
                        <li role="presentation">
                            <a href="#tab-3" aria-controls="tab-3" role="tab" data-toggle="tab">Vizyon</a>
                        </li>
                        <li role="presentation">
                            <a href="#tab-4" aria-controls="tab-4" role="tab" data-toggle="tab">Misyon</a>
                        </li>
                        <li role="presentation">
                            <a href="#tab-5" aria-controls="tab-5" role="tab" data-toggle="tab">Sosyal Medya</a>
                        </li>
                        <li role="presentation">
                            <a href="#tab-7" aria-controls="tab-5" role="tab" data-toggle="tab">Logo Yönetimi</a>
                        </li>
                    </ul>
                    <div class="tab-content p-md">
                        <div role="tabpanel" class="tab-pane in active fade" id="tab-1">

                            <div class="form-group">
                                <label>Firma Adı</label>
                                <input type="text" class="form-control" name="company_name"
                                       placeholder="Şirketinizi ya da firmanızın adı"
                                       value="<?php echo isset($form_error) ? set_value("company_name") : "" ?>">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error"><?php echo form_error("company_name") ?></small>
                                <?php } ?>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Telefon 1</label>
                                    <input type="text" class="form-control" name="phone_1"
                                           placeholder="Telefon numarası"
                                           value="<?php echo isset($form_error) ? set_value("phone_1") : "" ?>">
                                    <?php if (isset($form_error)) { ?>
                                        <small class="input-form-error"><?php echo form_error("phone_1") ?></small>
                                    <?php } ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Telefon 2</label>
                                    <input type="text" class="form-control" name="phone_2"
                                           placeholder="Diğer telefon numaranız (opsiyonel)"
                                    >
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Fax 1</label>
                                    <input type="text" class="form-control" name="fax_1"
                                           placeholder="Fax numarası"
                                    >

                                </div>
                                <div class="form-group col-md-6">
                                    <label>Fax 2</label>
                                    <input type="text" class="form-control" name="fax_2"
                                           placeholder="Diğer fax numaranız (opsiyonel)"
                                    >

                                </div>
                            </div>

                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="tab-6">
                            <div class="form-group">
                                <textarea class="m-0" data-plugin="summernote" name="address"
                                          data-options="{height: 250}"></textarea>
                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="tab-2">
                            <div class="form-group">
                                <textarea class="m-0" data-plugin="summernote" name="about_us"
                                          data-options="{height: 250}"></textarea>
                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="tab-3">
                            <div class="form-group">
                                <textarea class="m-0" data-plugin="summernote" name="vission"
                                          data-options="{height: 250}"></textarea>
                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="tab-4">
                            <div class="form-group">
                                <textarea class="m-0" data-plugin="summernote" name="mission"
                                          data-options="{height: 250}"></textarea>
                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="tab-5">

                            <div class="form-group">
                                <label>E-Posta Adresi</label>
                                <input type="email" class="form-control" name="email"
                                       placeholder="Facebook adresiniz "
                                       value="<?php echo isset($form_error) ? set_value("email") : "" ?>">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error"><?php echo form_error("email") ?></small>
                                <?php } ?>
                            </div>

                            <div class="form-group">
                                <label>Facebook</label>
                                <input type="text" class="form-control" name="facebook"
                                       placeholder="Facebook adresiniz ">
                            </div>

                            <div class="form-group">
                                <label>Twitter</label>
                                <input type="text" class="form-control" name="twitter"
                                       placeholder="Twitter adresiniz ">
                            </div>


                            <div class="form-group">
                                <label>Instagram</label>
                                <input type="text" class="form-control" name="instagram"
                                       placeholder="Instagram adresiniz ">
                            </div>


                            <div class="form-group">
                                <label>Twitter</label>
                                <input type="text" class="form-control" name="linkedin"
                                       placeholder="Linkedin adresiniz ">
                            </div>


                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="tab-7">
                            <div class="form-group image_upload_container">
                                <img src="<?php echo base_url(""); ?>" alt=""
                                     class="img img-responsive" width="250">
                                <label>Görsel Seçiniz</label>
                                <input type="file" name="logo" class="form-control">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-md">Kaydet</button>
                <a href="<?php echo base_url("settings") ?>" class="btn btn-danger">İptal</a>
            </div>
        </form>
    </div>
</div>
