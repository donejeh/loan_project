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
                

                <div class="col-md-6">
                        <div class="card bg-success text-white mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-3">
                                        <div class="text-white-75 small">ACCOUNT BALANCE</div>
                                        <div class="text-lg font-weight-bold">
                                            <?php 
                                            
                                            echo "₦ ".$_SESSION['b_balance'];
                                             ?>
                                                
                                        </div>
                                    </div>
                                    <i class="fa fa-money-check-dollar"></i>
                                </div>
                            </div>
                        </div>
                    </div>


                     <div class="col-md-6">
                        <div class="card bg-danger text-white mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                <form id="manage_widthdrwal">
                        <span>Widthdraw to your account number</span>
                      <div class="form-group">
                        <label for="">Amount</label>
                        <input type="text" class="form-control" name="amount" placeholder="Enter Amount" value="">
                      </div>


                <div class="pt-2">
                 <input type="submit" class="btn btn-primary " name="withdraw" value="withdraw">

                  </div>
                </form>

    </div>
</div>
                                   
                            </div>
                        </div>

                         <!-- <div class="col-md-6">
                        <div class="card bg-dark text-white mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-3">
                                        
                                            <div class="container-fluid">
    <div class="col-lg-12">
        
                <form id="manage-borrower">
                  <script src="https://js.paystack.co/v1/inline.js"></script>
                   <div class="form-group">
                        <label for="">Pay Loan</label>
                <input name="firstname" class="form-control" id="fundAccount" type="number"  required="" placeholder="Enter an amount">
                    </div>


                  <button type="button" class="btn btn-success" onclick="payWithPaystack()"> Pay </button> 
                </form>

    </div>
</div>
                                    </div>
                                    <i class="fa fa-money-check-dollar"></i>
                                </div>
                            </div>
                        </div>
                    </div>
 -->

                      <div class="col-md-6">
                        <div class="card bg-primary text-white mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-3">
                                        
                                            <div class="container-fluid">
    <div class="col-lg-12">
        
                <form id="manage-borrower">
                  <script src="https://js.paystack.co/v1/inline.js"></script>
                   <div class="form-group">
                        <label for="">Fund Your Account Now</label>
                <input name="firstname" class="form-control" id="fundAccount" type="number"  required="" placeholder="Enter an amount">
                    </div>


                  <button type="button" class="btn btn-success" onclick="payWithPaystack()"> Pay </button> 
                </form>

    </div>
</div>
                                    </div>
                                    <i class="fa fa-money-check-dollar"></i>
                                </div>
                            </div>
                        </div>
                    </div>


                     
                    </div>



            

                </div>
            </div>
            
        </div>
        </div>
   

<script>
  function payWithPaystack(){

        var a = $('#fundAccount').val();
        var amount = a+"00";
        var username = '<?php echo $_SESSION['b_username']; ?>';
        var phone = '<?php echo $_SESSION['b_contact_no']; ?>';
        var email = '<?php echo $_SESSION['b_email']; ?>';
        var id = '<?php echo $_SESSION['b_user_id']; ?>';


    var handler = PaystackPop.setup({
      key: 'pk_test_9667c0c4009cfbd260edb090b6317ebab8b87ce1',
      email: email,
      amount: amount,
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
         custom_fields: [
            {
                username: username,
                phone: phone,
                email: email
            }
         ]
      },
      callback: function(response){

            if (response.status==="success") {
                $.ajax({
                    url:'ajax.php?action=save_wallet',
                    method:'POST',
                    data:{balance:a,id:id},
                    success:function(resp){
                        if(resp == 1){
                            alert_toast("Account Fund Success.","success");
                            setTimeout(function(e){
                                location.reload()
                            },1500)
                        }
                    }
                })

            }
        //  alert('success. transaction ref is ' + response.reference);
      },
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe();
  }
</script>

<script>
     $('#manage_widthdrwal').submit(function(e){
        e.preventDefault()
        
console.log($(this).serialize());
        start_load()
        
        $.ajax({
            url:'ajax.php?action=save_widthdraw',
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