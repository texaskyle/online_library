<?php
include 'library_database.php';

// checking if the user clicked the login button
if (isset($_POST['login_submit'])) {
    // taking the details from the users input login page
    $username = $_POST['username'];
    $pwd = $_POST['pwd'] ;

    // checking if the fields are empty
    if (empty($username) || empty($_POST['pwd'])) {
        // redirect the user to the login page to enter all the fields
         header("Location:../login.php?error=emptyFields.$username");
         exit();
    }else{
        $sql = "SELECT * FROM users WHERE username=?;";
        // intializializing the prepared statement
        $stmt=mysqli_stmt_init($conn);

        // checking if the prepared statement run
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location:../login.php?error=sqlerror");
            exit();
        }else{
            #bind parameters to the placeholders
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                echo $row['username'];
                echo $row['id'];
                echo $row['email'];
                echo $row['pwd'];
                #$pwdcheck = password_verify($pwd_hash, $row['pwd']);
                  #die();
                #if ($pwdcheck == true) {
                if ($row['pwd'] == $pwd) {
                    session_start();
                    $_SESSION['userId'] = $row['id'];
                    $_SESSION['username'] = $row['username'];
                     header("Location:../login.php?login=success");
                    exit();
                }
                else {
                    header("Location:../login.php?error=wrongPassword");
                        exit();
                    echo "login diened";
                }
                }
            }
        }
}else{
    echo "click the login button";
}