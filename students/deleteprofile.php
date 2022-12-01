<?php
    session_start();
    include_once '../includes/library_database.php';
    $session_id = $_SESSION['userId'];

    // find the name of the image that is stored in the database
    $filename = 'uploads/profile'.$session_id."*";
    $fileInfo = glob($filename);
    $fileExt = explode(".", $fileInfo[0]);
    $fileActualExt = $fileExt[1];

    // geting the file full extension without the *
    $file = 'uploads/profile'.$session_id.".". $fileActualExt;

    //using unlink function to delete a file that has been uploaded
    if (!unlink($file)) {
        echo "You experienced an eror when delete the file";
    }else{
        echo "you have successfully deleted you profile image";
    }
    
    // an sql statement to modify the database and set the status to 1, to say that now there is no profile imahge that has been uploaded

    $sql = "UPDATE profileimg SET status = 1 WHERE userid = '$session_id';";
    $sql_run = mysqli_query($conn, $sql);

    header("Location: student.home.php? delete_successful");
