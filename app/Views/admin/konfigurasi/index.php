<?= form_open(base_url('admin/Konfigurasi'));
echo csrf_field();
?>

<h4>Basic Information</h4>
<hr>
<div class="form-group row">
	<label class="col-3">Website's Name</label>
	<div class="col-9">
		<input type="text" name="namaweb" class="form-control" placeholder="Website's Name" value="<?= $konfigurasi['projek'] ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-3">Homepage Title</label>
	<div class="col-9">
		<input type="text" name="judulberanda" class="form-control" placeholder="Homepage Title" value="<?= $konfigurasi['judul'] ?>">
	</div>
</div>

<div class="form-group row">
	<label class="col-3">Website's Address</label>
	<div class="col-9">
		<input type="text" name="alamat_website" class="form-control" placeholder="Website's Address" value="<?= $konfigurasi['alamat_website'] ?>">
	</div>
</div>

<h4>Profile Information</h4>
<hr>
<div class="form-group row">
	<label class="col-3">Website's Description</label>
	<div class="col-9">
		<textarea name="deskripsi" class="form-control konten" placeholder="Website's Description" rows="5"><?= $konfigurasi['deskripsi'] ?></textarea>
	</div>
</div>

<h4>Contact</h4>
<hr>

<div class="form-group row">
	<label class="col-3">Email</label>
	<div class="col-9">
		<input type="text" name="email" class="form-control" placeholder="Email" value="<?= $konfigurasi['email'] ?>">
	</div>
</div>

<div class="form-group row">
	<label class="col-3">Phone</label>
	<div class="col-9">
		<input type="text" name="telepon" class="form-control" placeholder="Phone" value="<?= $konfigurasi['telepon'] ?>">
	</div>
</div>

<div class="form-group row">
	<label class="col-3">Address</label>
	<div class="col-9">
	<textarea name="alamat_kontak" class="form-control konten" placeholder="Address" rows="5"><?= $konfigurasi['alamat_kontak'] ?></textarea>
	</div>
</div>

<div class="form-group row">
	<label class="col-3">Google Map</label>
	<div class="col-9">
	<textarea name="google_map" class="form-control konten" placeholder="Google Map" rows="5"><?= $konfigurasi['google_map'] ?></textarea>
	</div>
</div>

<h4>Social Media</h4>
<hr>

<div class="form-group row">
	<label class="col-3">Facebook <i class=""></i></label>
	<div class="col-9">
		<input type="text" name="facebook" class="form-control" placeholder="Facebook" value="<?= $konfigurasi['facebook'] ?>">
	</div>
</div>

<div class="form-group row">
	<label class="col-3">Instagram <i class=""></i></label>
	<div class="col-9">
		<input type="text" name="instagram" class="form-control" placeholder="Instagram" value="<?= $konfigurasi['instagram'] ?>">
	</div>
</div>

<div class="form-group row">
	<label class="col-3">Twitter <i class=""></i></label>
	<div class="col-9">
		<input type="text" name="twitter" class="form-control" placeholder="Instagram" value="<?= $konfigurasi['twitter'] ?>">
	</div>
</div>

<div class="form-group row">
	<label class="col-3">Youtube <i class=""></i></label>
	<div class="col-9">
		<input type="text" name="youtube" class="form-control" placeholder="Youtube" value="<?= $konfigurasi['youtube'] ?>">
	</div>
</div>

<div class="form-group row">
	<label class="col-3"></label>
	<div class="col-9">
		<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
	</div>
</div>

<?= form_close(); ?>