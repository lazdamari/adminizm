<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Eğitim Listesi
            <a href="<?php echo base_url("course/new_form") ?>" class="btn btn-success btn-sm pull-right"> <i
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
                                href="<?php echo base_url("course/new_form") ?>">tıklayınız</a></p>
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
                        <th>Başlık</th>
                        <th>Tarih</th>
                        <th>Görsel</th>
                        <th>Durumu</th>
                        <th>İşlem</th>
                    </tr>
                    </thead>
                    <tbody class="sortable" data-url="<?php echo base_url("course/rankSetter"); ?>">

                    <?php
                    foreach ($items as $item) {
                        ?>

                        <tr id="ord-<?php echo $item->id; ?>">
                            <td><i class="fa fa-reorder"></i></td>
                            <td>#<?php echo $item->id; ?></td>
                            <td><?php echo $item->title; ?></td>
                            <td><?php echo  get_readable_date($item->event_date); ?></td>
                            <td>
                                <img src="<?php echo base_url("uploads/$viewFolder/$item->img_url"); ?>"
                                     alt="<?php echo $item->title; ?>"
                                     class="img-responsive"
                                     width="40">
                            </td>
                            <td>
                                <input
                                        data-url="<?php echo base_url("course/isActiveSetter/$item->id"); ?>"
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
                                        data-url="<?php echo base_url("course/delete/$item->id"); ?>"
                                        class="btn btn-danger btn-outline btn-sm remove-btn"><i class="fa fa-trash"></i>
                                    Sil
                                </button>
                                <a href="<?php echo base_url("course/update_form/$item->id"); ?>"
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
