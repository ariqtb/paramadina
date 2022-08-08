<p>
	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
		<i class="fa fa-plus"></i> Add Article
	</button>
</p>
<form action="<?= base_url('admin/artikel/tambah') ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
<?= csrf_field();
?>
<div class="modal fade" id="modal-default">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add New Article</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group row">
					<label class="col-3">Title</label>
					<div class="col-9">
						<input type="text" name="judul" class="form-control" placeholder="Title" value="<?= set_value('judul') ?>" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-3">Description</label>
					<div class="col-9">
						<input type="text" name="deskripsi" class="form-control" placeholder="Description" value="<?= set_value('deskripsi') ?>" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-3">Photo</label>
					<div class="col-9">
						<input type="file" name="gambar" class="form-control" placeholder="Nama Pimpinan/Panggilan" value="<?= set_value('gambar') ?>" required>
					</div>
				</div>
			</div>
			<div class="modal-footer justify-content-between">
				<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
			</div>
		</div>
	</div>
</div>
</form>