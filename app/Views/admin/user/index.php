<?php include 'tambah.php'; ?>

<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th width="5%">No</th>
			<th width="20%">Users Name</th>
			<th width="20%">Email</th>
			<th width="20%">Username</th>
			<th width="20%">Level</th>
			<th width="20%">Option</th>
		</tr>
	</thead>
	<tbody>
	<?php
		$no = 1;
		foreach ($user as $row) {
			?>
		<tr>
		<td><?= $no++; ?></td>
			<td><?= $row['nama'] ?></td>
			<td><?= $row['email'] ?></td>
			<td><?= $row['username'] ?></td>
			<td><?= $row['akses_level'] ?></td>
			<td>
				<a href="<?= base_url('admin/user/edit/'. $row['id_user']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
				<a href="<?= base_url('admin/user/delete/'. $row['id_user']) ?>" class="btn btn-danger btn-sm" onclick="confirmation(event)"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>