<?php
if (empty($item_images)) {
    ?>
    <div class="alert alert-info">
        <p>Burada herhangi veri bulunmamaktadır. Eklemek için lütfen <a
                    href="<?php echo base_url("product/new_form") ?>">tıklayınız</a></p>
    </div>
    <?php
} else { ?>


    <table class="table table-striped table-bordered pictures_list" id="default-datatable" data-plugin="DataTable" >
        <thead>
        <th><i class="fa fa-reorder"></i></th>
        <th>#id</th>
        <th>Görsel</th>
        <th>Resim Adı</th>
        <th>Durumu</th>
        <th>Kapak</th>
        <th>İşlemler</th>
        </thead>
        <tbody class="sortable" data-url="<?php echo base_url("product/imageRankSetter") ?>">
        <?php foreach ($item_images as $image) { ?>
            <tr id="ord-<?php echo $image->id; ?>">
                <td><i class="fa fa-reorder"></i></td>
                <td class="w80"><?php echo $image->id; ?></td>
                <td class="w80"><img src="<?php echo base_url("uploads/{$viewFolder}/$image->img_url"); ?>" width="40"
                                     alt="" class="img img-responsive"></td>
                <td><?php echo $image->img_url; ?></td>
                <td class="w80">
                    <input
                            data-url="<?php echo base_url("product/imageIsActiveSetter/$image->id"); ?>"
                            class="isActive"
                            type="checkbox"
                            data-switchery
                            data-color="#10c469"
                        <?php echo ($image->isActive) ? "checked" : ""; ?>
                    />
                </td>
                <td class="w80">
                    <input
                            data-url="<?php echo base_url("product/isCoverSetter/$image->id/$image->product_id"); ?>"
                            class="isCover"
                            type="checkbox"
                            data-switchery
                            data-color="#333333"
                        <?php echo ($image->isCover) ? "checked" : ""; ?>
                    />
                </td>
                <td class="w80">
                    <button
                            data-url="<?php echo base_url("product/imageDelete/$image->id/$image->product_id"); ?>"
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