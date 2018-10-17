<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Yeni Portfolyo Ekle
        </h4>
    </div>

    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form method="post" action="<?php echo base_url("portfolio/save"); ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Başlık</label>
                                <input type="text" class="form-control" name="title" placeholder="Başlık">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error"><?php echo form_error("title") ?></small>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="datetimepicker1">İşin Bitiş Tarihi</label>
                            <div class="form-group">
                                <input id="datetimepicker1" data-plugin="datetimepicker"
                                       data-options="{ inline: false, viewMode: 'days', format:'YYYY-MM-DD HH:mm:ss' }"
                                       name="finishedAt" placeholder="Bitiş tarihi" class="form-control"/>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Müşteri</label>
                                <input type="text" class="form-control" name="client" placeholder="Müşteri">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error"><?php echo form_error("client") ?></small>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>İşin Yapıldığı Yer</label>
                                <input type="text" class="form-control" name="place" placeholder="İşin Yapıldığı Yer">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error"><?php echo form_error("place") ?></small>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Portfolyo URL</label>
                                <input type="text" class="form-control" name="portfolio_url" placeholder="Portfolyo URL">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error"><?php echo form_error("portfolio_url") ?></small>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Portfolyo Kategorisi</label>
                                <select name="category_id" id="" class="form-control">
                                    <?php foreach ($category as $categories)  { ?>
                                    <option value="<?php echo $categories->id; ?>"><?php echo $categories->title; ?></option>
                                    <?php } ?>
                                </select>
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error"><?php echo form_error("category_id") ?></small>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Açıklama</label>
                        <textarea class="m-0" data-plugin="summernote" name="description"
                                  data-options="{height: 250}"></textarea>
                    </div>

                    <button type="submit" class="btn btn-success btn-outline btn-md">Kaydet</button>
                    <a href="<?php echo base_url("portfolio") ?>" class="btn btn-default">İptal</a>
                </form>
            </div>
        </div>
    </div>
</div>
