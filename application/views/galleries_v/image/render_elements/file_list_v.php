<?php
if (empty($items)) {
    ?>
    <div class="alert alert-info">
        <p>Burada herhangi veri bulunmamaktadır. Eklemek için lütfen 
            <a href="<?php echo base_url("galleries/new_form") ?>">tıklayınız</a></p>
    </div>
    <?php
} else { ?>


    <table class="table table-striped table-bordered pictures_list" id="default-datatable" data-plugin="DataTable">
        <thead>
        <th><i class="fa fa-reorder"></i></th>
        <th>#id</th>
        <th>Görsel</th>
        <th>Dosya Yolu/Adı</th>
        <th>Durumu</th>
        <th>İşlemler</th>
        </thead>
        <tbody class="sortable" data-url="<?php echo base_url("galleries/fileRankSetter/$gallery_type") ?>">
        <?php foreach ($items as $item) { ?>
            <tr id="ord-<?php echo $item->id; ?>">
                <td><i class="fa fa-reorder"></i></td>
                <td class="w80"><?php echo $item->id; ?></td>
                <td class="w80">
                    <?php if ($gallery_type == "image") { ?>
                        <img src="<?php echo base_url("$item->url"); ?>" width="40"
                             alt="" class="img img-responsive">
                    <?php } else if ($gallery_type == "file") { ?>
                        <i class="fa fa-folder fa-2x"></i>
                    <?php } ?>
                </td>
                <td><?php echo $item->url; ?></td>
                <td class="w80">
                    <input
                            data-url="<?php echo base_url("galleries/fileIsActiveSetter/$item->id/$gallery_type"); ?>"
                            class="isActive"
                            type="checkbox"
                            data-switchery
                            data-color="#10c469"
                        <?php echo ($item->isActive) ? "checked" : ""; ?>
                    />
                </td>

                <td class="w80">
                    <button
                            data-url="<?php echo base_url("galleries/fileDelete/$item->id/$item->gallery_id/$gallery_type"); ?>"
                            class="btn btn-danger btn-outline btn-sm remove-btn btn-block"><i class="fa fa-trash"></i>
                        Sil
                    </button>
                </td>
            </tr>

            <?php

        } ?>
        </tbody>
    </table>


    <?php
} ?>