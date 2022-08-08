<?= form_open(base_url('admin/user/edit/' . $user['id_user']));
echo csrf_field();
?>

<div class="form-group row">
	<label class="col-md-2">Users Name</label>
	<div class="col-md-10">
		<input type="text" name="nama" class="form-control" placeholder="Users Name" value="<?= $user['nama'] ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2">Username</label>
	<div class="col-md-10">
		<input disabled type="text" name="username" class="form-control" placeholder="Username" value="<?= $user['username'] ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2">Email</label>
	<div class="col-md-10">
		<input type="text" name="email" class="form-control" placeholder="Email" value="<?= $user['email'] ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2">Password</label>
	<div class="col-md-10">
		<input type="password" name="password" class="form-control" placeholder="Password" value="" >
		<small class="text-secondary font-italic">*keep it blank if password don't want change</small>
	</div>
</div>

<div class="form-group row">
					<label class="col-md-2">Level</label>
					<div class="col-md-10">
						<select name="akses_level" class="form-control">
							<option hidden selected value="<?= $user['akses_level'] ?>"><?= $user['akses_level'] ?></option>
							<option value="Admin">Admin</option>
							<option value="User">User</option>
						</select>
					</div>
				</div>

<div class="form-group row">
	<label class="col-md-2"></label>
	<div class="col-md-10">
		<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
	</div>
</div>

<?= form_close(); ?>