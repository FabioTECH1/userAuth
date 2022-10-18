<?php
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $newpassword = $_POST['password'];

    resetPassword($email, $newpassword);
}

function resetPassword($email, $password)
{
    $password_reset = false;
    $myfile_temp = file_get_contents('../storage/users.csv') or die("User does not exist");
    $users = explode("\n", $myfile_temp);  // explode to an array
    $key = 0;
    while ($key < count($users) - 1) {
        $array_user = explode(',', $users[$key]);  // splits each user's detail to an array

        if ($array_user[1] == $email) { //search through each user array as we loop
            $password_reset = true;
            $array_user[2] = $password;   //update password
            $user = implode(',', $array_user);
            $users[$key] = $user;
            break;
        }
        $key += 1;
    }

    $myfile_temp = implode("\n", $users);
    file_put_contents('../storage/users.csv', $myfile_temp);  //write new info to file
    if ($password_reset == true) {
        echo 'Password Updated';
    } else {
        echo 'User does not exist';
    }


    //open file and check if the username exist inside
    //if it does, replace the password
}
// echo "HANDLE THIS PAGE";