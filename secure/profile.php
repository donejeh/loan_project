<?php include 'db_connect.php' ?>
<style>
   
</style>

<div class="containe-fluid">

	<div class="row">
		<div class="col-lg-12">
			
		</div>
	</div>

	<div class="row mt-3 ml-3 mr-3">
			<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<?php  echo "Welcome back ".($_SESSION['login_type'] == 3 ? "".$_SESSION['login_username'] : $_SESSION['login_username'])."!"  ?>					
				</div>

                <?php 
                    if ($_SESSION['firstname'] == "" || $_SESSION['lastname'] == "") {
                         echo '<span class="d-block p-2 bg-danger text-white">Please update your profile details <a href="dashboard.php?page=profile"> here </a></span>
';
                    } else {
                        # code...
                    }
                    
                ?>


				<hr>
				<div class="row ml-2 mr-2">
				

                <div class="container-fluid">
    <div class="col-lg-12">
        <form id="manage-borrower">
            <input type="hidden" name="id" value="<?php echo isset($_SESSION['b_id']) ? $_SESSION['b_id'] : '' ?>">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="" class="control-label">Last Name</label>
                        <input name="lastname" class="form-control" required="" value="<?php echo isset($_SESSION['b_lastname']) ? $_SESSION['b_lastname'] : '' ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">First Name</label>
                <input name="firstname" class="form-control" required="" value="<?php echo isset($_SESSION['b_firstname']) ? $_SESSION['b_firstname'] : '' ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Middle Name</label>
                        <input name="middlename" class="form-control" value="<?php echo isset($_SESSION['b_middlename']) ? $_SESSION['b_middlename'] : '' ?>">
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-4">
                            
                            <label for="">occupation</label>
                        <input type="text" class="form-control" name="tax_id" value="<?php echo isset($_SESSION['b_tax_id']) ? $_SESSION['b_tax_id'] : '' ?>">
                </div>
                <div class="col-md-4">
                    <div class="">
                        <label for="">Phone Number</label>
                        <input type="text" class="form-control" name="contact_no" value="<?php echo isset($_SESSION['b_contact_no']) ? $_SESSION['b_contact_no'] : '' ?>">
                    </div>
                </div>

                <div class="col-md-4">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="email" value="<?php echo isset($_SESSION['b_email']) ? $_SESSION['b_email'] : '' ?>" readonly>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-4">
                            <label for="bank">Bank name</i></label>
                                <select type="text" class="form-control " id="bank" name="bank_name">
                                <option selected>Choose</option>
                                <option value="access">Access Bank</option>
                                <option value="citibank">Citibank</option>
                                <option value="diamond">Diamond Bank</option>
                                <option value="ecobank">Ecobank</option>
                                <option value="fidelity">Fidelity Bank</option>
                                <option value="fcmb">First City Monument Bank (FCMB)</option>
                                <option value="fsdh">FSDH Merchant Bank</option>
                                <option value="gtb">Guarantee Trust Bank (GTB)</option>
                                <option value="heritage">Heritage Bank</option>
                                <option value="Keystone">Keystone Bank</option>
                                <option value="rand">Rand Merchant Bank</option>
                                <option value="skye">Skye Bank</option>
                                <option value="stanbic">Stanbic IBTC Bank</option>
                                <option value="standard">Standard Chartered Bank</option>
                                <option value="sterling">Sterling Bank</option>
                                <option value="suntrust">Suntrust Bank</option>
                                <option value="union">Union Bank</option>
                                <option value="uba">United Bank for Africa (UBA)</option>
                                <option value="unity">Unity Bank</option>
                                <option value="wema">Wema Bank</option>
                                <option value="zenith">Zenith Bank</option>
                                </select>
                </div>
                <div class="col-md-4">
                    <div class="">
                        <label for="">Account Name</label>
                        <input type="text" class="form-control" name="account_name" value="<?php echo isset($_SESSION['b_account_name']) ? $_SESSION['b_account_name'] : '' ?>">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="">
                        <label for="">Account Number</label>
                        <input type="text" class="form-control" name="account_number" value="<?php echo isset($_SESSION['b_account_number']) ? $_SESSION['b_account_number'] : '' ?>">
                    </div>
                </div>

</div>

                  <div class="row form-group">
                
                <div class="col-md-12">
                    <div class="">
                        <label for="">Address</label>
                            <textarea name="address" id="" cols="30" rows="2" class="form-control" required=""><?php echo isset($_SESSION['b_address']) ? $_SESSION['b_address'] : '' ?></textarea>

                    </div>
                </div>

                 </div>
<div class="row form-group">
                  <div class="col-md-12">
                    <div class="">
                        <label for=""></label>
                        <input type="submit" class="btn btn-primary btn-lg" name="update" value="Update Profile">
                    </div>
                </div>
            </div>

            </div>

        </form>
    </div>
</div>

				</div>
			</div>
			
		</div>
		</div>
	</div>

</div>

<script>
     $('#manage-borrower').submit(function(e){
        e.preventDefault()
        
//console.log($(this).serialize());
        start_load()
        
        $.ajax({
            url:'ajax.php?action=save_borrower',
            method:'POST',
            data:$(this).serialize(),
            success:function(resp){
                if(resp == 1){
                    alert_toast("Borrower data successfully saved.","success");
                    setTimeout(function(e){
                        location.reload()
                    },1500)
                }
            }
        })
     })
</script>