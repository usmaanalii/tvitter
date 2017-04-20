<?php

$password = "password";

$hashed_password = password_hash($password, PASSWORD_DEFAULT);
echo "\n-------------\n";

echo $hashed_password;

// this is the hash of the password in above example
$hash = '$2y$10$sxiLeY2Wg3Pt8k1QmRbAc.OVDNVvWAw/0h/RDoffNwtc5dBNdJZNa';

echo "\n-------------\n";

if (password_verify('password', $hash)) {
    echo 'Password is valid!';

} else {
    echo 'Invalid password.';
}

if (password_verify('password', '$2y$10$Z6JooGEpJSe/v.0upbpde.Rsb3vYVPYgaKt.b3/D4MchD0c/uB9nG')) {
    echo 'Password is valid!';

} else {
    echo 'Invalid password.';
}
