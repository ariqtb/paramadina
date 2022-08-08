<form action="<?= base_url('admin/pendaftar/tambah') ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
<?= csrf_field();
?>

<div class="form-group row">
	<label class="col-md-2">Student's Name</label>
	<div class="col-md-10">
		<input type="text" name="nama_pelajar" class="form-control" placeholder="Student's Name" value="<?= set_value('nama_pelajar') ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2">Place and Date of Birth</label>
	<div class="col-md-10">
		<input type="date" name="tanggal_lahir" class="form-control" placeholder="Place and Date of Birth" value="<?= set_value('tanggal_lahir') ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2">Age</label>
	<div class="col-md-10">
		<input type="text" name="umur" class="form-control" placeholder="Age" value="<?= set_value('umur') ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2">Grade Level</label>
	<div class="col-md-10">
		<input type="text" name="tingkat_kelas" class="form-control" placeholder="Grade Level" value="<?= set_value('level_kelas') ?>" required>
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
		<input type="text" name="nama_ayah" class="form-control" placeholder="Father's Name" value="<?= set_value('nama_ayah') ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2">Mother's Name</label>
	<div class="col-md-10">
		<input type="text" name="nama_ibu" class="form-control" placeholder="Mother's Name" value="<?= set_value('nama_ibu') ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2">Father's Occupation</label>
	<div class="col-md-10">
		<input type="text" name="pekerjaan_ayah" class="form-control" placeholder="Father's Occupation" value="<?= set_value('pekerjaan_ayah') ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2">Mother's Occupation</label>
	<div class="col-md-10">
		<input type="text" name="pekerjaan_ibu" class="form-control" placeholder="Mother's Occupation" value="<?= set_value('pekerjaan_ibu') ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2">Father's Address</label>
	<div class="col-md-10">
		<input type="text" name="alamat_ayah" class="form-control" placeholder="Father's Address" value="<?= set_value('alamat_ayah') ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2">Mother's Address</label>
	<div class="col-md-10">
		<input type="text" name="alamat_ibu" class="form-control" placeholder="Mother's Address" value="<?= set_value('alamat_ibu') ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2">Father's Cellular</label>
	<div class="col-md-10">
		<input type="text" name="nomor_ayah" class="form-control" placeholder="Father's Cellular" value="<?= set_value('nomor_ayah') ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2">Mother's Cellular</label>
	<div class="col-md-10">
		<input type="text" name="nomor_ibu" class="form-control" placeholder="Mother's Cellular" value="<?= set_value('nomor_ibu') ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2">Father's Email</label>
	<div class="col-md-10">
		<input type="text" name="email_ayah" class="form-control" placeholder="Father's Email" value="<?= set_value('email_ayah') ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2">Mother's Email</label>
	<div class="col-md-10">
		<input type="text" name="email_ibu" class="form-control" placeholder="Mother's Email" value="<?= set_value('email_ibu') ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2">Birth Certificate (AKTE)</label>
	<div class="col-md-10">
		<input type="file" name="akte_kelahiran" class="form-control" value="<?= set_value('akte_kelahiran') ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2">Parent's Identity Card (KTP)</label>
	<div class="col-md-10">
		<input type="file" name="ktp" class="form-control" value="<?= set_value('ktp') ?>">
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2">Family Card (KK)</label>
	<div class="col-md-10">
		<input type="file" name="kk" class="form-control" value="<?= set_value('kk') ?>">
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2">Passport Photo 3X4 (red background, photo on white shirt)</label>
	<div class="col-md-10">
		<input type="file" name="pasfoto" class="form-control" value="<?= set_value('pasfoto') ?>">
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2">Student's Report Card</label>
	<div class="col-md-10">
		<input type="file" name="rapot" class="form-control" value="<?= set_value('rapot') ?>">
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