<?php 
include('db_connect.php');
if(isset($_GET['id'])){
$user = $conn->query("SELECT * FROM users,borrowers where users.id ='".$_GET['id']."' and  borrowers.user_id ='".$_GET['id']."' ");
foreach($user->fetch_array() as $k =>$v){
	$meta[$k] = $v;
}
}
?>
<div class="container-fluid">
	
	<form action="" id="manage-user">
		<input type="hidden" name="id" value="<?php echo isset($meta['user_id']) ? $meta['user_id']: '' ?>">
		<div class="form-group">
			<label for="name">License Front</label>
			<img src="<?php echo './assets/uploads/kyc/'.$meta['kyc_front']; ?>" class="img-thumbnail rounded mx-auto d-block" >
		</div>
		<div class="form-group">
			<label for="username">License Back</label>
			<img src="<?php echo './assets/uploads/kyc/'.$meta['kyc_back']; ?>" class="img-thumbnail rounded mx-auto d-block" >
		</div>
		<div class="form-group">
			<label for="type">User Type</label>
			<select name="kyc_status" id="type" class="custom-select">
				<option value="1" <?php echo isset($meta['kyc_status']) && $meta['kyc_status'] == 1 ? 'selected': '' ?>>Approve</option>
				<option value="2" <?php echo isset($meta['kyc_status']) && $meta['kyc_status'] == 2 ? 'selected': '' ?>>Reject</option>
			</select>
		</div>
	</form>
</div>
<script>
	$('#manage-user').submit(function(e){
		e.preventDefault();
		start_load()
		console.log($(this).serialize());
		$.ajax({
			url:'ajax.php?action=save_kyc',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				console.log(resp);
				if(resp ==1){
					alert_toast("Data successfully saved",'success')
					setTimeout(function(){
						location.reload()
					},1500)
				}
			}
		})
	})
</script>