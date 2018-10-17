<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Portfolyo Listesi
            <a href="<?php echo base_url("portfolio/new_form") ?>" class="btn btn-success btn-sm pull-right"> <i class="fa fa-plus"></i> Yeni Ekle</a>
        </h4>
    </div>

    <div class="col-md-12">
        <div class="widget p-lg">
            <?php
            if(empty($items)) {
                ?>
                <div class="alert alert-info">
                    <p>Burada herhangi veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url("portfolio/new_form") ?>">tıklayınız</a></p>
                </div>
                <?php 
            } else {
                ?>

                <table class="table table-hover table-striped table-bordered content-container" id="default-datatable" data-plugin="DataTable" >
                    <thead>
                        <tr>
                            <th><i class="fa fa-reorder"></i></th>
                            <th>#id</th>
                            <th>Başlık</th>
                            <th>URL</th>
                            <th>Müşteri</th>
                            <th>Yer</th>
                            <th>Kategori</th>
                            <th>Bitiş Tarihi</th>
                            <th>Durumu</th>
                            <th>İşlem</th>
                        </tr>
                    </thead>
                    <tbody class="sortable" data-url="<?php echo base_url("portfolio/rankSetter"); ?>">
                        
                        <?php 
                        foreach ($items as $item) {
                            ?>

                            <tr id="ord-<?php  echo $item->id; ?>">
                                <th><i class="fa fa-reorder"></i></th>
                                <td>#<?php echo $item->id; ?></td>
                                <td><?php echo $item->title; ?></td>
                                <td><?php echo $item->url; ?></td>
                                <td><?php echo $item->client; ?></td>
                                <td><?php echo $item->place; ?></td>
                                <td><?php echo  get_category_title($item->category_id); ?></td>
                                <td><?php echo get_readable_date($item->finishedAt); ?></td>
                                <td>
                                    <input 
                                    data-url="<?php echo base_url("portfolio/isActiveSetter/$item->id"); ?>"
                                    class="isActive"
                                    type="checkbox" 
                                    data-switchery 
                                    data-color="#10c469" 
                                    <?php if($item->isActive == 1){ ?> checked <?php } else { echo ''; }?>
                                    />
                                </td>
                                <td>
                                    <button 
                                    data-url="<?php echo base_url("portfolio/delete/$item->id"); ?>" 
                                    class="btn btn-danger btn-outline btn-sm remove-btn"><i class="fa fa-trash"></i> Sil</button>
                                    <a href="<?php echo base_url("portfolio/update_form/$item->id"); ?>" class="btn btn-info btn-outline btn-sm"><i class="fa fa-pencil"></i> Düzenle</a>
                                    <a href="<?php echo base_url("portfolio/image_form/$item->id"); ?>" class="btn btn-warning btn-outline btn-sm text-dark"><i class="fa fa-image"></i> Resimler</a>
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
