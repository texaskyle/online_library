<?php
// including the database in the registration page
include 'library_database.php';

    if (isset($_POST['sign_up'])) {
        # connection to the database
        # searching to the database to check if the username has been taken or not
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $query ="SELECT * FROM users WHERE username='$username';";
        $query_result = mysqli_query($conn, $query);
        $row = mysqli_num_rows($query_result);
        // $row = mysqli_fetch_assoc($query_result);
        if ($row>0) {
           echo "username already taken <br>
           choose another username";
        }else{
            // checking if the fields in the registration form are empty
            if (empty($_POST['username']) || empty($_POST['reg_no']) || empty($_POST['email']) || empty($_POST['pwd']) || empty($_POST['re_pwd'])) {

                echo "please fill in the empty fields";
            }
                #checking if the password match
            if ($_POST['pwd']!=$_POST['re_pwd']) {
                    echo "Ensure that both passwords match!!";
                }else{
                    #inserting the user inside the database

                    #Escape sql injection
                    $username=mysqli_real_escape_string($conn, $_POST['username']);
                    $reg_no = mysqli_real_escape_string($conn, $_POST['reg_no']);
                    $email = mysqli_real_escape_string($conn, $_POST['email']);
                    #$pwd_hash = md5($_POST['pwd']);
                    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
                    #$pwd_hash = password_hash($pwd, PASSWORD_DEFAULT);


                    $query = "INSERT INTO users(username, reg_no, email, pwd) VALUES('$username', '$reg_no', '$email', '$pwd');";
                    $query_run = mysqli_query($conn, $query);
                    if (!$query_run) {
                        echo "query to insert users inside the database didnt run";
                    }
                     header("Location:../login.php");
                    
                }
            }
    }else{
        echo "click the submit button";
    }
