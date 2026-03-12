<?php
include('includes/config.php');
use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/autoload.php';

$mail = new PHPMailer;
if (isset($_POST['send'])) {
    $femail = isset($_POST['femail']) ? trim($_POST['femail']) : '';
    $genericMessage = "If your email is registered, a password reset link has been sent.";

    $userId = null;
    $firstName = '';
    $toEmail = '';
    $stmt = mysqli_prepare($con, "SELECT id,fname,email FROM users WHERE email=? LIMIT 1");
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $femail);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $dbUserId, $dbFirstName, $dbEmail);
        if (mysqli_stmt_fetch($stmt)) {
            $userId = $dbUserId;
            $firstName = $dbFirstName;
            $toEmail = $dbEmail;
        }
        mysqli_stmt_close($stmt);
    }

    if ($userId !== null && app_ensure_password_resets_table($con)) {
        try {
            $rawToken = bin2hex(random_bytes(32));
        } catch (Exception $e) {
            $rawToken = bin2hex(openssl_random_pseudo_bytes(32));
        }

        $tokenHash = hash('sha256', $rawToken);
        $expiresAt = date('Y-m-d H:i:s', time() + 3600);

        $insertStmt = mysqli_prepare($con, "INSERT INTO password_resets(user_id,token_hash,expires_at) VALUES(?,?,?)");
        if ($insertStmt) {
            mysqli_stmt_bind_param($insertStmt, "iss", $userId, $tokenHash, $expiresAt);
            $saved = mysqli_stmt_execute($insertStmt);
            mysqli_stmt_close($insertStmt);

            if ($saved) {
                $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
                $host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'localhost';
                $basePath = rtrim(str_replace('\\', '/', dirname($_SERVER['PHP_SELF'])), '/');
                $resetUrl = $scheme . '://' . $host . $basePath . '/reset-password.php?token=' . urlencode($rawToken);

                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'your gmail id here';
                $mail->Password = 'your gmail password here';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;
                $mail->setFrom('your gmail id here', 'University Project');
                $mail->addAddress($toEmail);
                $mail->isHTML(true);
                $mail->Subject = "Password reset request";
                $bodyContent = 'Dear ' . htmlspecialchars($firstName) . ',';
                $bodyContent .= '<p>Click the link below to reset your password. This link expires in 1 hour.</p>';
                $bodyContent .= '<p><a href="' . htmlspecialchars($resetUrl) . '">' . htmlspecialchars($resetUrl) . '</a></p>';
                $bodyContent .= '<p>If you did not request this, you can ignore this email.</p>';
                $mail->Body = $bodyContent;
                $mail->send();
            }
        }
    }

    echo "<script>alert('" . $genericMessage . "');</script>";
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
        <title>Project on Brac University | Password Reset</title>
        <link href="css/styles.css" rel="stylesheet" />
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
<h2 align="center">Aisharjya Project</h2>
<hr />
<h3 class="text-center font-weight-light my-4">Password Recovery</h3></div>
<div class="card-body">

<div class="small mb-3 text-muted">Enter your email address and we will send you a password reset link.</div>


<form method="post">
                                           
<div class="form-floating mb-3">
<input class="form-control" name="femail" type="email" placeholder="name@example.com" required />
<label for="inputEmail">Email address</label>
</div>

<div class="d-flex align-items-center justify-content-between mt-4 mb-0">
<a class="small" href="login.php">Return to login</a>
<button class="btn btn-primary" type="submit" name="send">Send Reset Link</button>
</div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="signup.php">Need an account? Sign up!</a></div>
                        <div class="small"><a href="index.php">Back to Home</a></div>
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
