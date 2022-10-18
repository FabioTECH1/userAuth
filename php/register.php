<?php
if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    registerUser($fullname, $email, $password);
}

function registerUser($fullname, $email, $password)
{
    //save data into the file
    $usersfile = fopen('../storage/users.csv', 'a');
    fwrite($usersfile, $fullname . ",");
    fwrite($usersfile, $email . ",");
    fwrite($usersfile, $password . "\n");
    echo "User Successfully registered";
}
// echo "HANDLE THIS PAGE";