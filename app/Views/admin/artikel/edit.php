<form action="<?= base_url('admin/artikel/edit/' . $artikel['id_artikel'])  ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	<?= csrf_field();
	?>
	<div class="form-group row">
		<label class="col-md-2">Title</label>
		<div class="col-md-10">
			<input type="text" name="judul" class="form-control" placeholder="Title" value="<?= $artikel['judul'] ?>" required>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-2">Description</label>
		<div class="col-md-10">
			<input type="text" name="deskripsi" class="form-control" placeholder="Description" value="<?= $artikel['deskripsi'] ?>" required>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-2">Photo</label>
		<div class="col-md-10">
			<input type="file" name="gambar" class="form-control" placeholder="Photo" value="<?= $artikel['gambar'] ?>" onchange="readURL(this);">
		</div>
	</div>

	<div class="p-t-15 m-auto text-center">
		<img class="rounded" id="preview" src="" alt="preview" style="width:12rem;height:12rem;object-fit:cover;" />
	</div>
	<div class="form-group row text-center mt-2">
		<div class="col-md-10 m-auto">
			<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
		</div>
	</div>

	<?= form_close(); ?>

	<script type="text/javascript">
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function(e) {
					$('#preview').attr('src', e.target.result);
				}

				reader.readAsDataURL(input.files[0]);
			}
		}
	</script>