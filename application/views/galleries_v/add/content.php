<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Yeni Galeri Ekleme
        </h4>
    </div>

    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form method="post" action="<?php echo base_url("galleries/save"); ?>">
                    <div class="form-group">
                        <label>Galeri Adı</label>
                        <input type="text" class="form-control" name="title" placeholder="Galerinin adını giriniz.">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("title") ?></small>
                        <?php } ?>
                    </div>


                    <div class="form-group">
                        <label class="">Galeri Tipi</label>
                        <div id="control-demo-6">
                            <select class="form-control news_type_select" name="gallery_type">
                                <option <?php echo (isset($gallery_type) == "image") ? "selected" : ""; ?> value="image">
                                    Resim
                                </option>
                                <option <?php echo (isset($gallery_type) == "video") ? "selected" : ""; ?> value="video">
                                    Video
                                </option>
                                <option <?php echo (isset($gallery_type) == "file") ? "selected" : ""; ?> value="file">
                                    Dosya
                                </option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success btn-outline btn-md">Kaydet</button>
                    <a href="<?php echo base_url("galleries") ?>" class="btn btn-default">İptal</a>
                </form>
            </div>
        </div>
    </div>
</div>
