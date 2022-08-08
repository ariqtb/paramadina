<?php include 'tambah.php'; ?>

<table class="table table-bordered" id="example1">
	<thead>
	<tr>
			<th width="5%">No</th>
			<th width="10%">Photo</th>
			<th width="30%">Title</th>
			<th width="15%">Description</th>
			<th width="15%">Option</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$no = 1;
		foreach ($artikel as $row) {
		?>
		<tr>
			<td><?= $no++; ?></td>
			<td>
			<?php if ($row['gambar'] === '') {
    			echo '-';
				} else { ?>
				<img src="<?= base_url('assets/upload/image/thumbs/' . $row['gambar']) ?>" class="img img-thumbnail">
				<?php } ?>		
			</td>
			<td><?= $row['judul'] ?></td>
			<td><?= $row['deskripsi'] ?></td>
			<td>
				<a href="<?= base_url('admin/artikel/edit/' . $row['id_artikel']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
				<a href="<?= base_url('admin/artikel/delete/' . $row['id_artikel']) ?>" class="btn btn-danger btn-sm" onclick="confirmation(event)"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>