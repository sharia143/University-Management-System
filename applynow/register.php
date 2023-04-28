<?php
session_start();

// initializing variables
$name = "";
$ssc = "";
$sscyear = "";
$hsc = "";
$mobile = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'loginsystem');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $ssc = mysqli_real_escape_string($db, $_POST['ssc']);
  $sscyear = mysqli_real_escape_string($db, $_POST['sscyear']);
  $hsc = mysqli_real_escape_string($db, $_POST['hsc']);
  $mobile = mysqli_real_escape_string($db, $_POST['mobile']);
  $email = mysqli_real_escape_string($db, $_POST['email']);


  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($name)) { array_push($errors, "Name is required"); }
  if (empty($ssc)) { array_push($errors, "School name is required"); }
  if (empty($sscyear)) { array_push($errors, "SSC Passing Year is required"); }
  if (empty($hsc)) { array_push($errors, "College name is required"); }
  if (empty($mobile)) { array_push($errors, "Contact number is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }

  
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$query = "INSERT INTO apply_students (name, ssc, sscyear, hsc, mobile, email) 
  			  VALUES('$name', '$ssc', '$sscyear', '$hsc', '$mobile', '$email')";
  	mysqli_query($db, $query);
	$_SESSION['success'] = "You are now logged in";
  	header('location: ../index.php');
	}
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>BRAC Univeristy Admission form</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Admission Form</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>

  	<div class="input-group">
  	  <label>Full Name</label>
  	  <input type="text" name="name" value="<?php echo $name; ?>">
  	</div>
	  <div class="input-group">
  	  <label>SSC/School Name </label>
  	  <input name="ssc" type="text" id="ssc" value="<?php echo $ssc; ?>">
  	</div>
    <div class="input-group">
  	  <label>SSC Passing Year </label>
  	  <input name="sscyear" type="text" id="sscyear" value="<?php echo $sscyear; ?>">
    </div>
	  <div class="input-group">
  	  <label>HSC/College Name</label>
  	  <input name="hsc" type="text" id="hsc" value="<?php echo $hsc; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Contact Number</label>
  	  <input name="mobile" type="text" id="mobile" value="<?php echo $mobile; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email Address</label>
  	  <input name="email" type="email" id="mobile" value="<?php echo $mobile; ?>">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Apply Now</button>
  	</div>
  	<p>
  		Already a member? <a href="../index.php">Home</a>  	</p>
  </form>
</body>
</html>