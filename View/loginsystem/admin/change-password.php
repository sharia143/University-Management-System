<?php session_start();
include_once('../includes/config.php');
if (strlen($_SESSION['adminid']==0)) {
  header('location:logout.php');
  } else{
 // for  password change   
if(isset($_POST['update']))
{
    $oldpassword=$_POST['currentpassword']; 
    $newpassword=$_POST['newpassword'];
    $adminid=(int)$_SESSION['adminid'];
    $storedPassword = null;

    $stmt = mysqli_prepare($con, "SELECT password FROM admin WHERE id=? LIMIT 1");
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $adminid);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $dbPassword);
        if (mysqli_stmt_fetch($stmt)) {
            $storedPassword = $dbPassword;
        }
        mysqli_stmt_close($stmt);
    }

    if($storedPassword !== null && app_password_verify_compat($oldpassword, $storedPassword))
    {
        $newHash = app_password_hash($newpassword);
        $updateStmt = mysqli_prepare($con, "UPDATE admin SET password=? WHERE id=?");
        if ($updateStmt) {
            mysqli_stmt_bind_param($updateStmt, "si", $newHash, $adminid);
            mysqli_stmt_execute($updateStmt);
            mysqli_stmt_close($updateStmt);
        }
        echo "<script>alert('Password Changed Successfully !!');</script>";
        echo "<script type='text/javascript'> document.location = 'change-password.php'; </script>";
    }
    else
    {
        echo "<script>alert('Old Password not match !!');</script>";
        echo "<script type='text/javascript'> document.location = 'change-password.php'; </script>";
    }
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
        <title>Project on Brac University | Change password</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
<script language="javascript" type="text/javascript">
function valid()
{
if(document.changepassword.newpassword.value!= document.changepassword.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.changepassword.confirmpassword.focus();
return false;
}
return true;
}
</script>

    </head>
    <body class="sb-nav-fixed">
      <?php include_once('includes/navbar.php');?>
        <div id="layoutSidenav">
          <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        

                        <h1 class="mt-4">Change Password</h1>
                        <div class="card mb-4">
                     <form method="post" name="changepassword" onSubmit="return valid();">
                            <div class="card-body">
                                <table class="table table-bordered">
                                   <tr>
                                    <th>Current Password</th>
                                       <td><input class="form-control" id="currentpassword" name="currentpassword" type="password" value="" required /></td>
                                   </tr>
                                   <tr>
                                       <th>New Password</th>
                                       <td><input class="form-control" id="newpassword" name="newpassword" type="password" value=""  required /></td>
                                   </tr>
                                         <tr>
                                       <th>Confirm Password</th>
                                       <td colspan="3"><input class="form-control" id="confirmpassword" name="confirmpassword" type="password"    required /></td>
                                   </tr>
                  
                                   <tr>
                                       <td colspan="4" style="text-align:center ;"><button type="submit" class="btn btn-primary btn-block" name="update">Change</button></td>

                                   </tr>
                                    </tbody>
                                </table>
                            </div>
                            </form>
                        </div>


                    </div>
                </main>
          <?php include('../includes/footer.php');?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php } ?>
