<p>
	<a href="<?= base_url('admin/tilawah/tambah') ?>" class="btn btn-success">
		<i class="fa fa-plus"></i> Tambah Baru
	</a>
</p>

<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th width="5%">No</th>
			<th width="10%">Foto</th>
			<th width="25%">Nama Peserta</th>
			<th width="15%">Alamat</th>
			<th width="15%">Email</th>
			<th width="15%">Cabang Lomba</th>
			<th width="15%">Status</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1;

foreach ($pekan_tilawah as $pekan_tilawah) { ?>
		<tr>
			<td><?= $no ?></td>
			<td>
				<?php if ($pekan_tilawah['tilawah_foto'] === '') {
    echo '-';
} else { ?>
					<a href="<?= base_url('admin/tilawah/unduh/' . $pekan_tilawah['id_tilawah']) ?>" class="btn btn-success btn-sm"><i class="fa fa-download"></i> Foto</a>
				<?php } ?>

			</td>
			<td><?= $pekan_tilawah['nama_tilawah'] ?>
				<small>
					<br><i class="fas fa-mobile-alt"></i> <?= $pekan_tilawah['tilawah_telepon'] ?>
				</small>
			</td>
			<td><?= $pekan_tilawah['tilawah_alamat'] ?></td>
			<td><?= $pekan_tilawah['tilawah_email'] ?></td>
			<td><?= $pekan_tilawah['cabang_lomba'] ?></td>
			<td>
				<?php
					if($pekan_tilawah['status_tilawah'] == "Terkirim"){
                        echo '<div class="col btn-primary rounded-pill" style="opacity:0.7 ;">
						Terkirim
						</div>';
                    }
					elseif($pekan_tilawah['status_tilawah'] == "Dikonfirmasi"){
                        echo '<div class="col btn-success rounded-pill" style="opacity:0.7 ;">
						Dikonfirmasi
						</div>';
                    }
					elseif($pekan_tilawah['status_tilawah'] == "Ditolak"){
                        echo '<div class="col btn-danger rounded-pill" style="opacity:0.7 ;">
						Ditolak
						</div>';
                    }
				?>
			</td>
			<td>

				<a href="<?= base_url('admin/tilawah/edit/' . $pekan_tilawah['id_tilawah']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
				<a href="<?= base_url('admin/tilawah/delete/' . $pekan_tilawah['id_tilawah']) ?>" class="btn btn-danger btn-sm" onclick="confirmation(event)"><i class="fa fa-trash"></i></a>
				<a href="<?= base_url('admin/tilawah/toPDF/' . $pekan_tilawah['id_tilawah']) ?>" class="btn btn-dark btn-sm"><i class="fa fa-file"></i></a>

			</td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>