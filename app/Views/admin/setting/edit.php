<form action="<?= base_url('admin/tilawah/edit/' . $pekan_tilawah['id_tilawah']) ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
<?= csrf_field();
?>

<div class="form-group row">
		<label class="col-md-2">Nama Peserta</label>
		<div class="col-md-10">
			<input type="text" name="nama_tilawah" class="form-control" placeholder="Nama Peserta" value="<?= $pekan_tilawah['nama_tilawah'] ?>" required>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-2">Tempat, tanggal lahir</label>
		<div class="col-3">
			<input type="text" name="tilawah_tempat_lahir" class="form-control" placeholder="Tempat lahir" value="<?= $pekan_tilawah['tilawah_tempat_lahir'] ?>">
		</div>
		<div class="col-3">
		<input type="text" name="tilawah_tanggal_lahir" class="form-control tanggal" placeholder="Tanggal lahir" value="<?php if (isset($_POST['tilawah_tanggal_lahir'])) {
    		echo set_value('tilawah_tanggal_lahir');
		} else {
			echo tanggal_id($pekan_tilawah['tilawah_tanggal_lahir']);
		} ?>">
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-2">Jenis Kelamin</label>
		<div class="col-md-3">
			<select name="id_kategori_download" class="form-control">
				<?php foreach ($kategori_download as $kategori_download) { ?>
					<option value="<?= $kategori_download['id_kategori_download'] ?>">
						<?= $kategori_download['nama_kategori_download'] ?>
					</option>
				<?php } ?>
			</select>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-2">Alamat</label>
		<div class="col-md-10">
			<textarea name="tilawah_alamat" class="form-control"><?= $pekan_tilawah['tilawah_alamat'] ?></textarea>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-2">Nomor Telepon</label>
		<div class="col-md-10">
			<input type="text" name="tilawah_telepon" class="form-control" placeholder="Telepon" value="<?= $pekan_tilawah['tilawah_telepon'] ?>" required>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-2">Email</label>
		<div class="col-md-10">
			<input type="text" name="tilawah_email" class="form-control" placeholder="Email" value="<?= $pekan_tilawah['tilawah_email'] ?>" required>
		</div>
	</div>

	<div class="form-group row">
        <label class="col-md-2">Cabang Lomba</label>
		<div class="col-md-10">
        	<select name="cabang_lomba" class="form-control" required>
           		<option value="Tahfidz Quran">Tahfidz Quran</option>
           		<option value="Tausiah" <?php if ($pekan_tilawah['cabang_lomba'] === 'Tausiah') {
    echo 'selected';
} ?>>Tausiah</option>
            	<option value="Tilawah" <?php if ($pekan_tilawah['cabang_lomba'] === 'Tilawah') {
    echo 'selected';
} ?>>Tilawah</option>
       		</select>
        	<div class="validate"></div>
		</div>
    </div>

	<div class="form-group row">
		<label class="col-md-2">Foto 4x6</label>
		<div class="col-md-10">
			<input type="file" name="tilawah_foto" class="form-control" value="<?= $pekan_tilawah['tilawah_foto'] ?>">
		</div>
	</div>

	<!--<div class="form-group row">
		<label class="col-md-2">Foto KTP/SIM/Kartu Pelajar/Mahasiswa</label>
		<div class="col-md-10">
			<input type="file" name="tilawah_ktp" class="form-control" value="<?= set_value('tilawah_ktp') ?>">
		</div>
	</div>-->

	<div class="form-group row">
		<label class="col-md-2">Status</label>
			<div class="col-md-3">
				<select name="status_tilawah" class="form-control">
					<option value="Terkirim">Terkirim</option>
					<option value="Dikonfirmasi" <?php if ($pekan_tilawah['status_tilawah'] === 'Dikonfirmasi') {
					echo 'selected';
					} ?>>Dikonfirmasi</option>
					<option value="Ditolak" <?php if ($pekan_tilawah['status_tilawah'] === 'Ditolak') {
					echo 'selected';
					} ?>>Ditolak</option>
				</select>
			</div>
	</div>

	<div class="form-group row">
		<label class="col-md-2"></label>
		<div class="col-md-10">
			<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
		</div>
	</div>

<?= form_close(); ?>