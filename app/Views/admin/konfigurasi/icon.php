<form action="<?= base_url('admin/konfigurasi/icon') ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
<?= csrf_field();
?>

<div class="form-group row">
	<label class="col-3">Upload Icon</label>
	<div class="col-6">
		<input type="file" name="icon" value="" class="form-control">
		<small class="text-secondary font-italic">.jpg/png/gif</small>
	</div>
	<div class="col-3">
		<img src="<?= icon() ?>" class="img img-thumbnail">
	</div>
</div>

<div class="form-group row">
	<label class="col-3"></label>
	<div class="col-9">
		<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
	</div>
</div>

<?= form_close(); ?>