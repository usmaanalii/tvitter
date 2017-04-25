<?php

$password = "password";

$hashed_password = password_hash($password, PASSWORD_DEFAULT);
echo "-------------<br>";

echo $hashed_password;

// this is the hash of the password in above example
$hash = '$2y$10$sxiLeY2Wg3Pt8k1QmRbAc.OVDNVvWAw/0h/RDoffNwtc5dBNdJZNa';

echo "<br>-------------<br>";

if (password_verify('password', $hash)) {
    echo 'Password is valid!';

} else {
    echo 'Invalid password.';
}
