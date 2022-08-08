<form action="<?= base_url('admin/pendaftar/edit/' . $pendaftar['id_pendaftar']) ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	<?= csrf_field();
	?>

	<div class="form-group row">
		<label class="col-md-2">Student's Name</label>
		<div class="col-md-10">
			<input type="text" name="nama_pelajar" class="form-control" placeholder="Student's Name" value="<?= $pendaftar['nama_pelajar'] ?>" required>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-2">Place and Date of Birth</label>
		<div class="col-md-10">
			<input type="date" name="tanggal_lahir" class="form-control" placeholder="Place and Date of Birth" value="<?= $pendaftar['tanggal_lahir'] ?>" required>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-2">Age</label>
		<div class="col-md-10">
			<input type="text" name="umur" class="form-control" placeholder="Age" value="<?= $pendaftar['umur'] ?>" required>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-2">Grade Level</label>
		<div class="col-md-10">
			<input type="text" name="tingkat_kelas" class="form-control" placeholder="Grade Level" value="<?= $pendaftar['tingkat_kelas'] ?>" required>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-2">Program</label>
		<div class="col-md-2">
			<select name="program" class="form-control">
				<option value="Brincar ABC">Brincar ABC</option>
				<option value="A Private Course">A Private Course</option>
				<option value="Bilingual School">Bilingual School</option>
				<option value="PKBM">PKBM</option>
			</select>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-2">Father's Name</label>
		<div class="col-md-10">
			<input type="text" name="nama_ayah" class="form-control" placeholder="Father's Name" value="<?= $pendaftar['nama_ayah'] ?>" required>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-2">Mother's Name</label>
		<div class="col-md-10">
			<input type="text" name="nama_ibu" class="form-control" placeholder="Mother's Name" value="<?= $pendaftar['nama_ibu'] ?>" required>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-2">Father's Occupation</label>
		<div class="col-md-10">
			<input type="text" name="pekerjaan_ayah" class="form-control" placeholder="Father's Occupation" value="<?= $pendaftar['pekerjaan_ayah'] ?>" required>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-2">Mother's Occupation</label>
		<div class="col-md-10">
			<input type="text" name="pekerjaan_ibu" class="form-control" placeholder="Mother's Occupation" value="<?= $pendaftar['pekerjaan_ibu'] ?>" required>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-2">Father's Address</label>
		<div class="col-md-10">
			<input type="text" name="alamat_ayah" class="form-control" placeholder="Father's Address" value="<?= $pendaftar['alamat_ayah'] ?>" required>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-2">Mother's Address</label>
		<div class="col-md-10">
			<input type="text" name="alamat_ibu" class="form-control" placeholder="Mother's Address" value="<?= $pendaftar['alamat_ibu'] ?>" required>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-2">Father's Cellular</label>
		<div class="col-md-10">
			<input type="text" name="nomor_ayah" class="form-control" placeholder="Father's Cellular" value="<?= $pendaftar['nomor_ayah'] ?>" required>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-2">Mother's Cellular</label>
		<div class="col-md-10">
			<input type="text" name="nomor_ibu" class="form-control" placeholder="Mother's Cellular" value="<?= $pendaftar['nomor_ibu'] ?>" required>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-2">Father's Email</label>
		<div class="col-md-10">
			<input type="text" name="email_ayah" class="form-control" placeholder="Father's Email" value="<?= $pendaftar['email_ayah'] ?>" required>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-2">Mother's Email</label>
		<div class="col-md-10">
			<input type="text" name="email_ibu" class="form-control" placeholder="Mother's Email" value="<?= $pendaftar['email_ibu'] ?>" required>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-2">Birth Certificate (AKTE)</label>
		<div class="col-md-5">
			<input type="file" name="akte_kelahiran" id="akte" class="form-control" value="<?= $pendaftar['akte_kelahiran'] ?>">
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-2">Parents' Identity Card (KTP)</label>
		<div class="col-md-10">
			<input type="file" name="ktp" class="form-control" value="<?= $pendaftar['ktp'] ?>">
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-2">Parents' Identity Card (KK)</label>
		<div class="col-md-10">
			<input type="file" name="kk" class="form-control" value="<?= $pendaftar['kk'] ?>">
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-2">Passport Photo 3X4 (red background, photo on white shirt)</label>
		<div class="col-md-10">
			<input type="file" name="pasfoto" class="form-control" value="<?= $pendaftar['foto'] ?>">
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-2">Student's Report Card</label>
		<div class="col-md-10">
			<input type="file" name="rapot" class="form-control" value="<?= $pendaftar['rapot'] ?>">
		</div>
	</div>

	<!--<div class="form-group row">
	<label class="col-md-2">Keyword Berita (untuk SEO Google)</label>
	<div class="col-md-10">
		<textarea name="keywords" class="form-control"><?= set_value('keywords') ?></textarea>
	</div>
</div>-->

	<div class="form-group row">
		<label class="col-md-2"></label>
		<div class="col-md-10">
			<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
		</div>
	</div>

	<?= form_close(); ?>

	<script>
		var fileInput = document.getElementById('akte');
		var listFile = document.getElementById('akte_preview');

		fileInput.onchange = function() {
			var files = Array.from(this.files);
			files = files.map(file => file.name);
			listFile.innerHTML = "New: " + files.join('<br/>');
		}
	</script>