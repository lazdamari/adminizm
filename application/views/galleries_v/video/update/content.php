<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "<b>$item->url</b> kaydını düzenliyorsunuz"; ?>
        </h4>
    </div>

    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form method="post" action="<?php echo base_url("galleries/gallery_video_update/$item->id/$item->gallery_id"); ?>">

                    <div class="form-group">
                        <label>Video URL</label>
                        <input type="text" class="form-control" name="url"
                               placeholder="Video bağlantısını buraya yapıştırınız." value="<?php echo $item->url; ?>">
                    </div>
                    <button type="submit" class="btn btn-success btn-outline btn-md">Güncelle</button>
                    <a href="<?php echo base_url("galleries/gallery_video_list/$item->gallery_id") ?>"
                       class="btn btn-default">İptal</a>
                </form>
            </div>
        </div>
    </div>
</div>
