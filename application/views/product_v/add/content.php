<div class="row">
	<div class="col-md-12">
		<h4 class="m-b-lg">
			Yeni Ürün Ekleme
		</h4>
	</div>

	<div class="col-md-12">
		<div class="widget">
			<div class="widget-body">
				<form method="post" action="<?php echo base_url("product/save"); ?>">
					<div class="form-group">
						<label>Başlık</label>
						<input type="text" class="form-control" name="title" placeholder="Başlık">
						<?php if (isset($form_error)) {?>
							<small class="input-form-error"><?php echo form_error("title") ?></small>
						<?php }?>
					</div>
					<div class="form-group">
						<label>Açıklama</label>
						<textarea class="m-0" data-plugin="summernote" name="description" data-options="{height: 250}"></textarea>
					</div>
					
					<button type="submit" class="btn btn-success btn-outline btn-md">Kaydet</button>
					<a href="<?php echo base_url("product") ?>" class="btn btn-default">İptal</a>
				</form>
			</div>
		</div>
	</div>
</div>
