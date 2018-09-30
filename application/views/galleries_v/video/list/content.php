<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "$gallery->gallery_name galerisine ait videolar" ?>
            <a href="<?php echo base_url("galleries/new_gallery_video_form/$gallery->id") ?>" class="btn btn-success btn-sm pull-right"> <i
                        class="fa fa-plus"></i> Yeni Ekle</a>
        </h4>
    </div>

    <div class="col-md-12">
        <div class="widget p-lg">
            <?php
            if (empty($items)) {
                ?>
                <div class="alert alert-info">
                    <p>Burada herhangi veri bulunmamaktadır. Eklemek için lütfen <a
                                href="<?php echo base_url("galleries/new_gallery_video_form/$gallery->id") ?>">tıklayınız</a></p>
                </div>
                <?php
            } else {
                ?>

                <table class="table table-hover table-striped table-bordered content-container" id="default-datatable"
                       data-plugin="DataTable">
                    <thead>
                    <tr>
                        <th><i class="fa fa-reorder"></i></th>
                        <th>#id</th>
                        <th>URL</th>
                        <th>Görsel</th>
                        <th>Durumu</th>
                        <th>İşlem</th>
                    </tr>
                    </thead>
                    <tbody class="sortable" data-url="<?php echo base_url("galleries/rankGalleryVideoSetter"); ?>">

                    <?php
                    foreach ($items as $item) {
                        ?>

                        <tr id="ord-<?php echo $item->id; ?>">
                            <th><i class="fa fa-reorder"></i></th>
                            <td>#<?php echo $item->id; ?></td>
                            <td><?php echo $item->url; ?></td>
                            <td>

                                <a href="<?php echo $item->url; ?>" target="_blank"><?php echo $item->url; ?></a>
                            </td>
                            <td>
                                <input
                                        data-url="<?php echo base_url("galleries/isGalleryVideoActiveSetter/$item->id"); ?>"
                                        class="isActive"
                                        type="checkbox"
                                        data-switchery
                                        data-color="#10c469"
                                    <?php if ($item->isActive == 1) { ?> checked <?php } else {
                                        echo '';
                                    } ?>
                                />
                            </td>
                            <td>
                                <button
                                        data-url="<?php echo base_url("galleries/galleryVideoDelete/$item->id"); ?>"
                                        class="btn btn-danger btn-outline btn-sm remove-btn"><i class="fa fa-trash"></i>
                                    Sil
                                </button>
                                <a href="<?php echo base_url("galleries/update_gallery_video_form/$item->id"); ?>"
                                   class="btn btn-info btn-outline btn-sm"><i class="fa fa-pencil"></i> Düzenle</a>

                            </td>
                        </tr>


                        <?php
                    }
                    ?>
                    </tbody>
                </table>

                <?php
            }
            ?>
        </div>
    </div>
</div>
