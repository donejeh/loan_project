<?php 
    session_start();
include 'db_connect.php';
 include('./header.php'); 

  if ($_SESSION['kyc_status']==1) {
    header('location:dashboard.php');
  }

 ?>
    <style>
        .guide-points ul {
            padding-left: 2rem;
            list-style: disc;
        }
        .guide-points ul li {
            list-style: disc;
        }
        .license-wrapper {
            width: 320px;
            height: 220px;
            margin: 0 auto;
            border: 1px solid;
            margin-bottom: 1rem;
        }
        
        .passport-wrapper {
            width: 300px;
            height: 420px;
            margin: 0 auto;
            border: 1px solid;
            margin-bottom: 1rem;
        }
        .license-wrapper label,
        .passport-wrapper label {
            display: block;
            width: 100%;
            height: 100%;
        }
        
        .license-wrapper label img {
            width: 305px;
            height: 100%;
            object-fit: cover;
        }
        
        
        
        .passport-wrapper label img {
            width: 400px;
            height: 100%;
            object-fit: cover;
        }
        .form-group label {
            text-transform: capitalize;
        }
        .form-group input,
        .input-group input {

            -webkit-border-radius: 0;
            -moz-border-radius: 0;
            border-radius: 0;
            height: 60px;
            padding: 0 25px;
            color: #232323;
            font-size: 20px;
            background: #fff;
        }

        input[type=submit] {
            background: #5350ff !important;
            height: 50px;
            text-transform: uppercase;
            width: unset;
            padding: 0 25px;
            font-size: 16px;
            border: none;
            color: #fff
        }

        .form-radio {
            display: inline-block;
            margin-left: 2rem;
        }

        input[type=radio] {
            display: inline;
            height: auto;
            width: auto;
        }

    </style>

 <div class="container padding-top padding-bottom" style="background-color: #443ea2;">
        <div class="row justify-content-center mt-4">
            <div class="col-md-9">

                <div class="card section-bg">

                    <div class="card-header py-2 text-center  bg-primary">
                        <h4 class="m-0 text-white">Welcome  <?php echo ucfirst($_SESSION['login_username']); ?>! Please Submit your Document for Verification</h4>
                    </div>
                    <div class="card-body section-bg">
                  <?php      if (@$_SESSION['kyc_status'] == 0){

                            if ($_SESSION['kyc_front'] ==null || $_SESSION['kyc_back'] ==null) {
                                
                        ?>
                            <form action="" method="POST" enctype="multipart/form-data" class="license-form">
                                
                                <div class="row justify-content-center">
                                    <div class="col-md-4">
                                        <div class="form-radio">
                                            <input type="radio" id="radio01" name="option" value="ID" checked>
                                            <label for="radio01">ID Card</label>
                                        </div>
                                        <div class="form-radio" hidden>
                                            <input type="radio" id="radio02" name="option" value="Passport">
                                            <label for="radio02">Passport</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row option-div id-card">
                                    <div class="col-lg-5 col-md-5 col-sm-12">
                                        <div class="driver-license-example mb-2">
                                            <img src="assets/images/selfieid1.png" class="img-fluid" alt="Driver License Example">
                                        </div>
                                        <div class="guide-points">
                                            <ul>
                                                <li><strong>Turn up the phone's </strong> brightness Avoid glare
</li>
                                                <li><strong>Your </strong> first  <strong> last name must</strong>  be clearly visible</li>
                                                <li><strong>Your date of birth </strong> must be clearly visible</li>
                                                <li><strong>The card number</strong> must be clearly visible</li>
                                                <li><strong>Write BolajiLoan</strong>, on a blank piece of paper.</li>
                                                <li>N: B We also accept ID and Passport</li>
                                            </ul>
                                            <a href="ajax.php?action=logout" class="btn btn-danger">Log out</a>
                                        </div>
                                    </div>
    
                                    <div class="col-lg-7 col-md-7 col-sm-12 text-center"> <br><br>
                                        <h5 class="m-0">Take a selfie with the ID Card</h5><br>
                                        <div class="license-wrapper">
                                            <label for="license-front">
                                                <img src="assets/images/selfieid3.png" id="license-front-img" class="img-fluid" alt="license-front">
                                                <input type="file" id="license-front" name="license_front" data-target="#license-front-img" class="license-img" hidden>
                                            </label>
                                            <h8 class="m-0">NB: Click on the picture to add it</h8><br>
                                        </div>
                                        <br><br>

                                        <h5 class="m-0">Put pictures in front of the ID card </h5><br>
                                        <div class="license-wrapper">
                                            <label for="license-back">
                                                <img src="assets/images/idkat.jpeg" id="license-back-img" class="img-fluid" alt="license-back">
                                                <input type="file" id="license-back" name="license_back" data-target="#license-back-img" class="license-img" hidden>
                                            </label>
                                            <h8 class="m-0">NB: Click on the picture to add it </h8><br>
                                        </div>
<br><br>
                                        <div class="form-group">
                                            <input type="submit" value="Upload Now" name="Uploadfile">
                                        </div>
                                    </div>
                                </div>
                                <div class="row option-div passport" style="display: none;">
                                    <div class="col-lg-5 col-md-5 col-sm-12">
                                        <div class="driver-license-example mb-2">
                                            <img src="assets/images/passportid2.png" class="img-fluid" alt="Driver License Example">
                                        </div>
                                        <div class="guide-points">
                                            <ul>
                                                <li><strong>Turn up your brightness</strong> and avoid glare</li>
                                                <li><strong>First name</strong> and <strong>Last name</strong> clearly visible</li>
                                                <li><strong>Date of birth</strong> clearly visible</li>
                                                <li><strong>Passport Number</strong> clearly visible</li>
                                                <li><strong>Whrite ERITAJPAM</strong>, on a white paper.</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-lg-7 col-md-7 col-sm-12 text-center">
                                        <h5 class="m-0">Upload Passport Photo</h5>
                                        <div class="passport-wrapper">
                                            <label for="passport">
                                                <img src="assets/images/passportid.png" id="passport-img" class="img-fluid" alt="passport">
                                                <input type="file" id="passport" name="passport" data-target="#passport-img" class="passport" hidden>
                                            </label>
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" value="Upload">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        <?php  }else{
                            echo '<div class="text-center mt-3">
                                <h3>Your KYC Documents are successfully submitted. Please wait, Our team is reviewing your documents.</h3>
                             <a href="ajax.php?action=logout" class="btn btn-danger">Log out</a></div>';
                        }


                         }else{ ?>
                            <div class="text-center mt-3">
                                <h3>Your KYC Documents are successfully submitted. Please wait, Our team is reviewing your documents.</h3>
                                 <a href="ajax.php?action=logout" class="btn btn-danger">Log out</a>

                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php 
$id = $_SESSION['login_id'];

if (isset($_POST['Uploadfile'])) {
    
    // Check if file was uploaded without errors
    if(isset($_FILES["license_front"]) && $_FILES["license_front"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $license_front = $_FILES["license_front"]["name"];
        $filetype = $_FILES["license_front"]["type"];
        $filesize = $_FILES["license_front"]["size"];

        $license_back = $_FILES["license_back"]["name"];
        $filetype_back = $_FILES["license_back"]["type"];
        $filesize_back = $_FILES["license_back"]["size"];
    
        // Verify file extension
        $ext = pathinfo($license_front, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) "<script> Swal.fire('Error: Please select a valid file format.') </script>.";
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) echo "<script> Swal.fire('Error: File size is larger than the allowed limit.') </script>.";
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("assets/uploads/kyc/" . $license_front)){
                 $lf = $license_front . " is already exists.";
                 echo "<script> Swal.fire('Error: $lf.') </script>.";
            } else{

               $qry = mysqli_query($conn,"UPDATE borrowers set kyc_front='$license_front', kyc_back='$license_back' WHERE user_id='$id'");
               
                //echo "Your file was uploaded successfully.";
                if ($qry) {
                move_uploaded_file($_FILES["license_front"]["tmp_name"], "assets/uploads/kyc/" . $license_front);
                move_uploaded_file($_FILES["license_back"]["tmp_name"], "assets/uploads/kyc/" . $license_back);

                echo "<script> Swal.fire('Your file was uploaded successfully').then((result) =>{window.location.href = 'kyc.php'; return;}); </script>";    
                }
            } 
        } else{
            //echo "Error: There was a problem uploading your file. Please try again."; 

            echo "<script> Swal.fire('Error: There was a problem uploading your file. Please try again.') </script>.";
        }
    } else{
        $error = "Error:There was a problem uploading your file. Please try again. ";

        echo "<script> Swal.fire('$error') </script>.";
    }


}



?>

<script>
	    function readURL(input, target) {
            for(var i =0; i< input.files.length; i++){
                if (input.files[i]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        var img = $(target);
                        img.attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        }


        $(".license-img, .passport").change(function(){
            var target = $(this).data('target');
            readURL(this, target);
        });

        $("input[name='option']").change(function (e) {
            e.preventDefault();
            $(".option-div").hide();
            if ($(this).val() == "ID") {
                $(".id-card").fadeIn();
            } else if ($(this).val() == "Passport") {
                $(".passport").fadeIn();
            }
        });
</script>