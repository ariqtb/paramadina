<p>
	<a href="<?= base_url('admin/pendaftar/tambah') ?>" class="btn btn-success">
		<i class="fa fa-plus"></i> Add Registrant
	</a>
</p>
<div class="table-responsive">
	<table class="table table-bordered" id="example1">
		<thead>
			<tr>
				<th width="5%">No</th>
				<th width="6%">Photo</th>
				<th width="5%">Student's Name</th>
				<th width="5%">Grade Level</th>
				<th width="5%">Program</th>
				<th width="5%">Father's Name</th>
				<th width="5%">Mother's Name</th>
				<th width="5%">Father's Occupation</th>
				<th width="5%">Mother's Occupation</th>
				<th width="5%">Father's Address</th>
				<th width="5%">Mother's Address</th>
				<th width="5%">Father's Number</th>
				<th width="5%">Mother's Number</th>
				<th width="5%">Father's Email</th>
				<th width="5%">Mother's Email</th>
				<th width="5%">Birth Certificate (AKTE)</th>
				<th width="5%">Parent's Identity Card (KTP)</th>
				<th width="5%">Family Card (KK)</th>
				<th width="5%">Passport Photo</th>
				<th width="5%">Student's Report Card</th>
				<th width="5%">Option</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;

			foreach ($pendaftar as $row) {
			?>
				<tr>
					<td><?= $no++ ?></td>

					<td>
						<?php if ($row['foto'] === '') {
							echo '-';
						} else { ?>
							<img src="<?= base_url('assets/upload/registrant/foto/thumbs/' . $row['foto']) ?>" class="img img-thumbnail">
						<?php } ?>
					</td>
					<td><?= $row['nama_pelajar'] ?></td>
					<td><?= $row['tingkat_kelas'] ?></td>
					<td><?= $row['program'] ?></td>
					<td><?= $row['nama_ayah'] ?></td>
					<td><?= $row['nama_ibu'] ?></td>
					<td><?= $row['pekerjaan_ayah'] ?></td>
					<td><?= $row['pekerjaan_ibu'] ?></td>
					<td><?= $row['alamat_ayah'] ?></td>
					<td><?= $row['alamat_ibu'] ?></td>
					<td><?= $row['nomor_ayah'] ?></td>
					<td><?= $row['nomor_ibu'] ?></td>
					<td><?= $row['email_ayah'] ?></td>
					<td><?= $row['email_ibu'] ?></td>
					<td><a href="<?= base_url('admin/Pendaftar/download/'.$row['akte_kelahiran']. '/' . 'akte_kelahiran') ?>"><?= $row['akte_kelahiran'] ?></a></td>
					<td><a href="<?= base_url('admin/Pendaftar/download/'.$row['ktp']. '/' . 'ktp') ?>"><?= $row['ktp'] ?></a></td>
					<td><a href="<?= base_url('admin/Pendaftar/download/'.$row['kartu_keluarga']. '/' . 'kartu_keluarga') ?>"><?= $row['kartu_keluarga'] ?></a></td>
					<td><a href="<?= base_url('admin/Pendaftar/download/'.$row['foto']. '/' . 'foto') ?>"><?= $row['foto'] ?></a></td>
					<td><a href="<?= base_url('admin/Pendaftar/download/'.$row['rapot']. '/' . 'rapot') ?>"><?= $row['rapot'] ?></a></td>
					<td>
						<a href="<?= base_url('admin/pendaftar/edit/' . $row['id_pendaftar']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
						<a href="<?= base_url('admin/pendaftar/delete/' . $row['id_pendaftar']) ?>" class="btn btn-danger btn-sm" onclick="confirmation(event)"><i class="fa fa-trash"></i></a>
					</td>
				</tr>
			<?php
			}
			?>
		</tbody>
</div>
</table>