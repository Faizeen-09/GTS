<?php
include '../config.php';
$admin=new Admin();

$stmt=$admin->ret("SELECT * FROM `location` ");
?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Service Provider Registration </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="folder/css/style.css">

	</head>
	<body  style="background-image: url(img/banner-2.jpg);background-size:cover;color:black;">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Registration Form</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-6"> 
					<div class="login-wrap p-0">
		      	
		      	<form method="post" action="controller/logreg.php" class="reg-form" enctype="multipart/form-data">

		      		<div class="form-group d-flex" style="gap:10px">
                         <label for="s_name" class="mt-3"> Username</label>
                         <input type="text" class="form-control" name="s_name"  required minlength="3" maxlength="20">
		      		</div>

					<div class="form-group d-flex" style="gap:10px">
                         <label for="s_password" class="mt-3" style="width:20%"> Password</label>
	                     <input id="password-field" type="password" class="form-control" name="s_password" required minlength="6">
	                     <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password mt-4"></span>
	                </div>

                    <div class="form-group d-flex" style="gap:10px">
                         <label for="s_phone" class="mt-3" style="width:18%"> Phone No.</label>
		      		     <input type="tel" class="form-control" name="s_phone" required required pattern="\d{10}" placeholder="Enter valid 10 digit phone number">
		      		</div>

                    <div class="form-group d-flex" style="gap:10px">
					     <label for="s_email" class="mt-3" style="width:20%" >E-mail</label>
		      			 <input type="email" class="form-control" name="s_email" required>
		      		</div>

					

					<div class="form-group d-flex flex-column" style="gap:10px">
						<label for="s_location" class="mt-3" style="width:20%;">Location</label>
						<select class="form-control" name="s_location" required style="color:black;">
							<option value="" disabled selected  >Select Location</option>
							<?php
							
						

							while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) 
							{
								?>
								<div style="color:black;">
								<?php echo "<option value='" . $row['l_name'] . "'>" . $row['l_name'] . "</option>";
								
							}
						
							?>
							</div>
						</select>
					</div>

					<div class="form-group d-flex" style="gap:10px">
                         <label for="s_ownername" class="mt-3"> Vehicle Name</label>
                         <input type="text" class="form-control" name="s_vehicle"  required minlength="3" maxlength="20">
		      		</div>

					  <div class="form-group d-flex" style="gap:10px">
                         <label for="s_businesshour" class="mt-3"> Rate</label>
                         <input type="number" class="form-control" name="s_rate"  required>
		      		</div>
 
					  <!-- <div class="form-group d-flex" style="gap:10px">
    <label for="s_upi" class="mt-3">UPI ID</label>
    <input type="text" class="form-control" name="s_upi" id="s_upi" 
           required
           oninput="validateUPI(this)">
    <small id="upiError" class="text-danger d-none">Invalid UPI format (example: name@upi)</small>
</div>

<script>
function validateUPI(input) {
    const errorElement = input.nextElementSibling;
    // Basic UPI validation: name@provider
    const isValid = /^[a-z0-9._-]+@[a-z0-9]+$/i.test(input.value);
    
    if (input.value && !isValid) {
        errorElement.classList.remove('d-none');
    } else {
        errorElement.classList.add('d-none');
    }
}
</script> -->

					<div class="form-group d-flex flex-column" style="gap:10px">
    					<label for="s_desc" class="mt-3" style="width:20%;">Description</label>
    					<textarea class="form-control" name="s_desc" required rows="3" minlength="10" maxlength="100"></textarea>
					</div>

                    
                    <div class="form-group d-flex" style="gap:10px">
					     <label for="s_photo"  style="width:20%">Vehicle Photo</label>
		      			 <input type="file" class="form-control"  name="s_photo" required>
		      		</div>

		

					  <div class="form-group d-flex" style="gap:10px">
					     <label for="s_photo"  style="width:20%">Vehicle Registration Certificate</label>
		      			 <input type="file" class="form-control"  name="s_rc" required>
		      		</div>

					  <div class="form-group d-flex" style="gap:10px">
					     <label for="s_photo"  style="width:20%">Vehicle Insurance</label>
		      			 <input type="file" class="form-control"  name="s_insurance" required>
		      		</div>

					<div class="form-group d-flex" style="gap:10px">
					     <label for="s_photo"  style="width:20%">Driver License</label>
		      			 <input type="file" class="form-control"  name="s_license" required>
		      		</div>

					  <div class="form-group d-flex" style="gap:10px">
					     <label for="s_photo"  style="width:20%">Adhar Card</label>
		      			 <input type="file" class="form-control"  name="s_adhar" required>
		      		</div>

					  <div class="form-group d-flex" style="gap:10px">
					     <label for="s_photo"  style="width:20%">Payment QR Code</label>
		      			 <input type="file" class="form-control"  name="s_upi" required>
		      		</div>

	                <div class="form-group">
	            	     <button type="submit" name="submit"  value="submit" class="form-control btn btn-primary submit px-3">Sign Up</button>
	                </div>

											
	          </form>
	          <!-- <p class="w-100 text-center">&mdash; <a href="register.php">Click here</a> to register &mdash;</p> -->
	          <!-- <div class="social d-flex text-center">
	          	<a href="#" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Facebook</a>
	          	<a href="#" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span> Twitter</a>
	          </div> -->
		      </div>
				</div>
			</div>
		</div>
	</section>

	 <script src="folder/js/jquery.min.js"></script>
     <script src="folder/js/popper.js"></script>
     <script src="folder/js/bootstrap.min.js"></script>
     <script src="folder/js/main.js"></script>

	 </body>
</html>

