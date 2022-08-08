<?php include 'tambah.php'; ?>

<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th width="5%">No</th>
			<th width="5%">Photo</th>
			<th width="5%">Teacher's Name</th>
			<th width="20%">Description</th>
			<th width="15%">Social Media</th>
			<th width="10%">Option</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$no = 1;
		foreach ($guru as $row) {
			?>
			<tr>
			<td><?= $no++; ?></td>
			<td>
			<?php if ($row['foto'] === '') {
    			echo '-';
				} else { ?>
				<img src="<?= base_url('assets/upload/image/thumbs/' . $row['gambar']) ?>" class="img img-thumbnail">
				<?php } ?>
			</td>
			<td><?= $row['nama'] ?></td>
			<td><small><?= $row['deskripsi'] ?></small></td>
			<td>
				<i class="fa fa-instagram"> <?= $row['instagram'] ?></i>
				<br><i class="fa-brands fa-linkedin-in"> <?= $row['linkedin'] ?></i>
			</td>
			<td>
				<a href="<?= base_url('admin/guru/edit/' . $row['id_guru']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
				<a href="<?= base_url('admin/guru/delete/' . $row['id_guru']) ?>" class="btn btn-danger btn-sm" onclick="confirmation(event)"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>