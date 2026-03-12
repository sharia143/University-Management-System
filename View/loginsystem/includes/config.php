<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'loginsystem');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
if ($con) {
    mysqli_set_charset($con, 'utf8mb4');
}

// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL.";
}

function app_password_is_modern_hash($value)
{
    if (!is_string($value) || $value === '') {
        return false;
    }
    $info = password_get_info($value);
    return isset($info['algo']) && $info['algo'] !== 0;
}

function app_password_hash($password)
{
    return password_hash($password, PASSWORD_DEFAULT);
}

function app_password_verify_compat($plainPassword, $storedPassword)
{
    if (!is_string($storedPassword) || $storedPassword === '') {
        return false;
    }

    if (app_password_is_modern_hash($storedPassword)) {
        return password_verify($plainPassword, $storedPassword);
    }

    if (function_exists('hash_equals')) {
        if (hash_equals($storedPassword, $plainPassword)) {
            return true;
        }
        if (hash_equals($storedPassword, md5($plainPassword))) {
            return true;
        }
        return false;
    }

    return $storedPassword === $plainPassword || $storedPassword === md5($plainPassword);
}

function app_password_needs_upgrade($storedPassword)
{
    if (!app_password_is_modern_hash($storedPassword)) {
        return true;
    }
    return password_needs_rehash($storedPassword, PASSWORD_DEFAULT);
}

function app_ensure_password_resets_table($con)
{
    $sql = "CREATE TABLE IF NOT EXISTS password_resets (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        token_hash CHAR(64) NOT NULL,
        expires_at DATETIME NOT NULL,
        used TINYINT(1) NOT NULL DEFAULT 0,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        INDEX idx_user_id (user_id),
        INDEX idx_token_hash (token_hash),
        INDEX idx_expires_at (expires_at)
    )";

    return mysqli_query($con, $sql);
}

?>

