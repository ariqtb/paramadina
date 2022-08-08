<?php include 'tambah.php'; ?>

<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th width="5%">No</th>
			<th width="8%">Photo</th>
			<th width="45%">Description</th>
			<th width="15%">Option</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$no = 1;
			foreach ($galeri as $row) {
		?>
		<tr>
			<td><?= $no++ ?></td>
			<td>
				<?php if ($row['gambar'] === '') {
    echo '-';
} else { ?>
					<img src="<?= base_url('assets/upload/image/thumbs/' . $row['gambar']) ?>" class="img img-thumbnail">
				<?php } ?>
			</td>
			<td><small><?= $row['deskripsi'] ?></small></td>
			<td>

				<a href="<?= base_url('admin/galeri/edit/' . $row['id_galeri']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
				<a href="<?= base_url('admin/galeri/delete/' . $row['id_galeri']) ?>" class="btn btn-danger btn-sm" onclick="confirmation(event)"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>