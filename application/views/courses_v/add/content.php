<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Yeni Eğitim Ekle
        </h4>
    </div>

    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form method="post" action="<?php echo base_url("course/save"); ?>" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Başlık</label>
                        <input type="text" class="form-control" name="title" placeholder="Başlık">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("title") ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Açıklama</label>
                        <textarea class="m-0" data-plugin="summernote" name="description"
                                  data-options="{height: 250}"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="datetimepicker1">Eğitim Tarihi ve Saati Seçiniz</label>
                            <div class="form-group">
                                <input id="datetimepicker1" data-plugin="datetimepicker"
                                       data-options="{ inline: false, viewMode: 'days', format:'YYYY-MM-DD HH:mm:ss' }"
                                       name="event_date" placeholder="Eğitim tarihi ve saat" class="form-control"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group image_upload_container">
                        <label>Görsel Seçiniz</label>
                        <input type="file" name="img_url" class="form-control">
                    </div>


                    <button type="submit" class="btn btn-success btn-outline btn-md">Kaydet</button>
                    <a href="<?php echo base_url("course") ?>" class="btn btn-default">İptal</a>
                </form>
            </div>
        </div>
    </div>
</div>
