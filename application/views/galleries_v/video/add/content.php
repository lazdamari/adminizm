<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Yeni Video  Ekle
        </h4>
    </div>

    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form method="post" action="<?php echo base_url("galleries/gallery_video_save/$gallery_id"); ?>">




                        <div class="form-group">
                            <label>Video URL</label>
                            <input type="text" class="form-control" name="url"
                                   placeholder="Video bağlantısını buraya yapıştırınız.">
                            <?php if (isset($form_error)) { ?>
                                <small class="input-form-error"><?php echo form_error("url") ?></small>
                            <?php } ?>
                        </div>


                    <button type="submit" class="btn btn-success btn-outline btn-md">Kaydet</button>
                    <a href="<?php echo base_url("galleries/gallery_video_list/$gallery_id") ?>" class="btn btn-default">İptal</a>
                </form>
            </div>
        </div>
    </div>
</div>
