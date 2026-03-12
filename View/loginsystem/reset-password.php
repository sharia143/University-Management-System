<?php
include('includes/config.php');
app_ensure_password_resets_table($con);

$token = isset($_GET['token']) ? trim($_GET['token']) : '';
$tokenHash = $token !== '' ? hash('sha256', $token) : '';
$resetId = null;
$userId = null;
$isTokenValid = false;
$errorMessage = '';

if ($tokenHash !== '') {
    $stmt = mysqli_prepare($con, "SELECT id,user_id FROM password_resets WHERE token_hash=? AND used=0 AND expires_at>=NOW() ORDER BY id DESC LIMIT 1");
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $tokenHash);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $dbResetId, $dbUserId);
        if (mysqli_stmt_fetch($stmt)) {
            $resetId = $dbResetId;
            $userId = $dbUserId;
            $isTokenValid = true;
        }
        mysqli_stmt_close($stmt);
    }
}

if (isset($_POST['reset'])) {
    $postedToken = isset($_POST['token']) ? trim($_POST['token']) : '';
    $newPassword = isset($_POST['newpassword']) ? $_POST['newpassword'] : '';
    $confirmPassword = isset($_POST['confirmpassword']) ? $_POST['confirmpassword'] : '';
    $postedTokenHash = $postedToken !== '' ? hash('sha256', $postedToken) : '';

    $postedResetId = null;
    $postedUserId = null;
    $lookupStmt = mysqli_prepare($con, "SELECT id,user_id FROM password_resets WHERE token_hash=? AND used=0 AND expires_at>=NOW() ORDER BY id DESC LIMIT 1");
    if ($lookupStmt) {
        mysqli_stmt_bind_param($lookupStmt, "s", $postedTokenHash);
        mysqli_stmt_execute($lookupStmt);
        mysqli_stmt_bind_result($lookupStmt, $dbResetId, $dbUserId);
        if (mysqli_stmt_fetch($lookupStmt)) {
            $postedResetId = $dbResetId;
            $postedUserId = $dbUserId;
        }
        mysqli_stmt_close($lookupStmt);
    }

    if ($postedResetId === null || $postedUserId === null) {
        $errorMessage = 'This reset link is invalid or expired.';
    } elseif ($newPassword !== $confirmPassword) {
        $errorMessage = 'Password and Confirm Password do not match.';
    } else {
        $newHash = app_password_hash($newPassword);
        $updated = false;

        $updateUserStmt = mysqli_prepare($con, "UPDATE users SET password=? WHERE id=?");
        if ($updateUserStmt) {
            mysqli_stmt_bind_param($updateUserStmt, "si", $newHash, $postedUserId);
            $updated = mysqli_stmt_execute($updateUserStmt);
            mysqli_stmt_close($updateUserStmt);
        }

        if ($updated) {
            $markUsedStmt = mysqli_prepare($con, "UPDATE password_resets SET used=1 WHERE id=?");
            if ($markUsedStmt) {
                mysqli_stmt_bind_param($markUsedStmt, "i", $postedResetId);
                mysqli_stmt_execute($markUsedStmt);
                mysqli_stmt_close($markUsedStmt);
            }

            echo "<script>alert('Password reset successful. Please login.');</script>";
            echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
            exit();
        } else {
            $errorMessage = 'Could not reset password. Please try again.';
        }
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
        <title>Project on Brac University | Reset Password</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script language="javascript" type="text/javascript">
        function valid() {
            if(document.resetform.newpassword.value != document.resetform.confirmpassword.value) {
                alert("Password and Confirm Password Field do not match !!");
                document.resetform.confirmpassword.focus();
                return false;
            }
            return true;
        }
        </script>
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
<h2 align="center">Aisharjya Project</h2>
<hr />
<h3 class="text-center font-weight-light my-4">Reset Password</h3></div>
                                    <div class="card-body">
<?php if (!$isTokenValid && !isset($_POST['reset'])) { ?>
    <div class="alert alert-danger">This reset link is invalid or expired.</div>
<?php } else { ?>
    <?php if ($errorMessage !== '') { ?>
    <div class="alert alert-danger"><?php echo htmlspecialchars($errorMessage); ?></div>
    <?php } ?>
    <form method="post" name="resetform" onSubmit="return valid();">
        <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>" />
        <div class="form-floating mb-3">
            <input class="form-control" id="newpassword" name="newpassword" type="password" placeholder="New Password" required />
            <label for="newpassword">New Password</label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" id="confirmpassword" name="confirmpassword" type="password" placeholder="Confirm Password" required />
            <label for="confirmpassword">Confirm Password</label>
        </div>
        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
            <a class="small" href="login.php">Return to login</a>
            <button class="btn btn-primary" type="submit" name="reset">Reset Password</button>
        </div>
    </form>
<?php } ?>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="signup.php">Need an account? Sign up!</a></div>
                                        <div class="small"><a href="../index.php">Back to Home</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <?php include('includes/footer.php');?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
