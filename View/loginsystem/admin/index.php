<?php session_start(); 
include_once('../includes/config.php');
// Code for login 
if(isset($_POST['login']))
{
  $adminusername = isset($_POST['username']) ? trim($_POST['username']) : '';
  $password = isset($_POST['password']) ? $_POST['password'] : '';
  $adminId = null;
  $storedPassword = '';

  $stmt = mysqli_prepare($con, "SELECT id,password FROM admin WHERE username=? LIMIT 1");
  if ($stmt) {
    mysqli_stmt_bind_param($stmt, "s", $adminusername);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $dbAdminId, $dbPassword);
    if (mysqli_stmt_fetch($stmt)) {
      $adminId = $dbAdminId;
      $storedPassword = $dbPassword;
    }
    mysqli_stmt_close($stmt);
  }

  if($adminId !== null && app_password_verify_compat($password, $storedPassword))
  {
    if (app_password_needs_upgrade($storedPassword)) {
      $newHash = app_password_hash($password);
      $updateStmt = mysqli_prepare($con, "UPDATE admin SET password=? WHERE id=?");
      if ($updateStmt) {
        mysqli_stmt_bind_param($updateStmt, "si", $newHash, $adminId);
        mysqli_stmt_execute($updateStmt);
        mysqli_stmt_close($updateStmt);
      }
    }

    $extra="dashboard.php";
    $_SESSION['login']=$adminusername;
    $_SESSION['adminid']=$adminId;
    echo "<script>window.location.href='".$extra."'</script>";
    exit();
  }

  echo "<script>alert('Invalid username or password');</script>";
  $extra="index.php";
  echo "<script>window.location.href='".$extra."'</script>";
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Project on Brac University | Admin Login</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">

<div class="card-header">
<h2 align="center">Project on Brac University</h2>
<hr />
    <h3 class="text-center font-weight-light my-4">Admin Login</h3></div>
                                    <div class="card-body">
                                        
                                        <form method="post">
                                            
<div class="form-floating mb-3">
<input class="form-control" name="username" type="text" placeholder="Username"  required/>
<label for="inputEmail">Username</label>
</div>
                                            

<div class="form-floating mb-3">
<input class="form-control" name="password" type="password" placeholder="Password" required />
<label for="inputPassword">Password</label>
</div>


<div class="d-flex align-items-center justify-content-between mt-4 mb-0">
<a class="small" href="password-recovery.php">Forgot Password?</a>
<button class="btn btn-primary" name="login" type="submit">Login</button>
</div>
</form>
</div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="../../index.php">Back to Home Page</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
<?php include('../includes/footer.php');?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
    </body>
</html>
