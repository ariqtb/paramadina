<p>
	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
		<i class="fa fa-plus"></i> Add Testimonial
	</button>
</p>
<form action="<?= base_url('admin/testimoni/tambah') ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
<?= csrf_field();
?>

<div class="modal fade" id="modal-default">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add New Testimonial</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<div class="form-group row">
					<label class="col-3">Student's Name</label>
					<div class="col-9">
						<input type="text" name="nama" class="form-control" placeholder="Student's Name" value="<?= set_value('nama') ?>" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Description</label>
					<div class="col-9">
						<input type="text" name="deskripsi" class="form-control" placeholder="Description" value="<?= set_value('pimpinan') ?>">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Testimonial</label>
					<div class="col-9">
						<input type="text" name="testimoni" class="form-control" placeholder="Testimonial" value="<?= set_value('pimpinan') ?>">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Photo</label>
					<div class="col-9">
						<input type="file" name="gambar" class="form-control" placeholder="Photo" value="<?= set_value('pimpinan') ?>">
					</div>
				</div>

			</div>
			<div class="modal-footer justify-content-between">
				<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?= form_close(); ?>