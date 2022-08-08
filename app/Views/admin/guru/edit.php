<form action="<?= base_url('admin/guru/edit/' . $guru['id_guru']) ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
<?= csrf_field();
?>

<div class="form-group row">
	<label class="col-md-2">Teacher's Name</label>
	<div class="col-md-10">
		<input type="text" name="nama" class="form-control" placeholder="Teacher's Name" value="<?= $guru['nama'] ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2">Description</label>
	<div class="col-md-10">
		<input type="text" name="deskripsi" class="form-control" placeholder="Description" value="<?= $guru['deskripsi'] ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2">Instagram</label>
	<div class="col-md-10">
		<input type="text" name="instagram" class="form-control" placeholder="Instagram" value="<?= $guru['instagram'] ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2">Linkedin</label>
	<div class="col-md-10">
		<input type="text" name="linkedin" class="form-control" placeholder="Linkedin" value="<?= $guru['linkedin'] ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2">Photo</label>
	<div class="col-md-10">
		<input type="file" name="gambar" class="form-control" placeholder="Photo" value="<?= $guru['gambar'] ?>" onchange="readURL(this);">
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