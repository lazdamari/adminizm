<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Yeni Haber Ekle
        </h4>
    </div>

    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form method="post" action="<?php echo base_url("news/save"); ?>" enctype="multipart/form-data">

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

                    <div class="form-group">
                        <label class="">Haber Türü</label>
                        <div id="control-demo-6">
                            <select class="form-control news_type_select" name="news_type">
                                <option <?php echo (isset($news_type) == "image") ? "selected" : ""; ?> value="image">
                                    Resim
                                </option>
                                <option <?php echo (isset($news_type) == "video") ? "selected" : ""; ?> value="video">
                                    Video
                                </option>
                            </select>
                        </div>
                    </div>

                    <?php if (isset($form_error)) { ?>

                        <div class="form-group image_upload_container"
                             style="display: <?php echo ($news_type == "image") ? "block" : "none"; ?>;">
                            <label>File input</label>
                            <input type="file" name="img_url" class="form-control">
                        </div>

                        <div class="form-group video_url_container"
                             style="display: <?php echo ($news_type == "video") ? "block" : "none"; ?>;">
                            <label>Video URL</label>
                            <input type="text" class="form-control" name="video_url"
                                   placeholder="Video bağlantısını buraya yapıştırınız.">
                            <?php if (isset($form_error)) { ?>
                                <small class="input-form-error"><?php echo form_error("video_url") ?></small>
                            <?php } ?>
                        </div>

                    <?php } else { ?>

                        <div class="form-group image_upload_container">
                            <label>File input</label>
                            <input type="file" name="img_url" class="form-control">
                        </div>

                        <div class="form-group video_url_container">
                            <label>Video URL</label>
                            <input type="text" class="form-control" name="video_url"
                                   placeholder="Video bağlantısını buraya yapıştırınız.">
                        </div>

                    <?php } ?>
                    <button type="submit" class="btn btn-success btn-outline btn-md">Kaydet</button>
                    <a href="<?php echo base_url("news") ?>" class="btn btn-default">İptal</a>
                </form>
            </div>
        </div>
    </div>
</div>
