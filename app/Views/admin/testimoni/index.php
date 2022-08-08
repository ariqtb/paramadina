<?php include 'tambah.php'; ?>

<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th width="5%">No</th>
			<th width="10%">Photo</th>
			<th width="20%">Student's Name</th>
			<th width="25%">Description</th>
			<th width="15%">Testimonial</th>
			<th width="15%">Option</th>
		</tr>
	</thead>
	<tbody>
	<?php
		$no = 1;
		foreach ($testimoni as $row) {
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
			<td><?= $row['deskripsi'] ?></td>
			<td><?= $row['testimoni'] ?></td>
			<td>
				<a href="<?= base_url('admin/testimoni/edit/' . $row['id_testimoni']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
				<a href="<?= base_url('admin/testimoni/delete/' . $row['id_testimoni']) ?>" class="btn btn-danger btn-sm" onclick="confirmation(event)"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>