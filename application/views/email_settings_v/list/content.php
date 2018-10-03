<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            E-mail Ayarları
            <a href="<?php echo base_url("emailsettings/new_form") ?>" class="btn btn-success btn-sm pull-right"> <i
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
                                href="<?php echo base_url("emailsettings/new_form") ?>">tıklayınız</a></p>
                </div>
                <?php
            } else {
                ?>

                <table class="table table-hover table-striped table-bordered content-container" id="default-datatable"
                       data-plugin="DataTable">
                    <thead>
                    <tr>
                        <th>#id</th>
                        <th>E-Posta Başlık</th>
                        <th>Sunucu Adı</th>
                        <th>Protokol</th>
                        <th>E-Posta Adresi</th>
                        <th>Gönderici</th>
                        <th>Alıcı</th>
                        <th>Durum</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    foreach ($items as $item) {
                        ?>

                        <tr>
                            <td>#<?php echo $item->id; ?></td>
                            <td><?php echo $item->user_name; ?></td>
                            <td><?php echo $item->host; ?></td>
                            <td><?php echo $item->protocol; ?></td>
                            <td><?php echo $item->user; ?></td>
                            <td><?php echo $item->gonderici; ?></td>
                            <td><?php echo $item->alici; ?></td>
                            <td>
                                <input
                                        data-url="<?php echo base_url("emailsettings/isActiveSetter/$item->id"); ?>"
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
                                        data-url="<?php echo base_url("emailsettings/delete/$item->id"); ?>"
                                        class="btn btn-danger btn-outline btn-sm remove-btn"><i class="fa fa-trash"></i>
                                    Sil
                                </button>
                                <a href="<?php echo base_url("emailsettings/update_form/$item->id"); ?>"
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
