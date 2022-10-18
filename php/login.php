<?php
session_start();

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    loginUser($email, $password);
}

function loginUser($email, $password)
{
    $user_exist = false;
    $myfile = fopen("../storage/users.csv", "r") or die("Unable to open file!");
    // Output one line until end-of-file
    while (!feof($myfile)) {
        $user = fgets($myfile);
        $user = explode(',', $user);  // splits each user's detail to an array

        if ($user[1] == $email && rtrim($user[2]) == $password) { //search through each user array as we loop
            $user_exist = true;
            $_SESSION['username'] = $user[0];
            break;
        }
    }
    fclose($myfile);

    if ($user_exist == true) {
        header('Location:../dashboard.php'); //redirect if found
    } else {
        session_destroy();
        header('Location:../forms/login.html'); //redirect if not found
    }

    /*
        Finish this function to check if username and password 
    from file match that which is passed from the form
    */
}

// echo "HANDLE THIS PAGE";;