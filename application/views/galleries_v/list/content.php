<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Galeri Listesi
            <a href="<?php echo base_url("galleries/new_form") ?>" class="btn btn-success btn-sm pull-right"> <i
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
                                href="<?php echo base_url("galleries/new_form") ?>">tıklayınız</a></p>
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
                        <th>Galeri Adı</th>
                        <th>Galeri Type</th>
                        <th>Klasör Adı</th>
                        <th>Durum</th>
                        <th>İşlem</th>
                    </tr>
                    </thead>
                    <tbody class="sortable" data-url="<?php echo base_url("galleries/rankSetter"); ?>">

                    <?php
                    foreach ($items as $item) {
                        ?>

                        <tr id="ord-<?php echo $item->id; ?>">
                            <th><i class="fa fa-reorder"></i></th>
                            <td>#<?php echo $item->id; ?></td>
                            <td><?php echo $item->gallery_name; ?></td>
                            <td><?php echo $item->gallery_type; ?></td>
                            <td><?php echo $item->folder_name; ?></td>
                            <td>
                                <input
                                        data-url="<?php echo base_url("galleries/isActiveSetter/$item->id"); ?>"
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
                                        data-url="<?php echo base_url("galleries/delete/$item->id"); ?>"
                                        class="btn btn-danger btn-outline btn-sm remove-btn"><i class="fa fa-trash"></i>
                                    Sil
                                </button>

                                <?php
                                    if ($item->gallery_type == "image"){
                                        $button_icon = "fa-image";
                                        $button_url = "galleries/upload_form/$item->id";
                                    }
                                    else if ($item->gallery_type == "video") {
                                          $button_icon = "fa-play-circle-o";
                                        $button_url = "galleries/gallery_video_list/$item->id";
                                    }
                                    else {
                                        $button_icon = "fa-file-o";
                                        $button_url = "galleries/upload_form/$item->id";

                                    }
                                ?>
                                <a href="<?php echo base_url("galleries/update_form/$item->id"); ?>"
                                   class="btn btn-info btn-outline btn-sm"><i class="fa fa-pencil"></i> Düzenle</a>
                                <a href="<?php echo base_url($button_url); ?>"
                                   class="btn btn-warning btn-outline btn-sm text-dark"><i class="fa <?php  echo $button_icon; ?>"></i>
                                    <?php echo "Galeriye Gözat"; ?></a>
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
