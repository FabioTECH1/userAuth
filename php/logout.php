<?php
session_start();
logout();
function logout()
{
    if (isset($_SESSION['username'])) {
        session_destroy();
    }
    header('Location:../forms/login.html'); //redirect

    /*
Check if the existing user has a session
if it does
destroy the session and redirect to login page
*/
}

// echo "HANDLE THIS PAGE";