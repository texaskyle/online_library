<?php
session_start();
include_once '../includes/library_database.php';
$session_id = $_SESSION['userId'];


if (isset($_POST['uploadFile'])) {
    $file = $_FILES['file'];
    // taking the file properties of the uploaded file
    $filename = $_FILES['file']['name'];
    $filetype = $_FILES['file']['type'];
    $fileTmpname = $_FILES['file']['tmp_name'];
    $fileerror = $_FILES['file']['error'];
    $filesize = $_FILES['file']['size'];

    // creating  an array for the allowed files
    $allowedFiles = array('png', 'jpg', 'peng', 'pdf');
    // taking the file extension
    $fileExt = explode(".", $filename);
    // print_r($fileExt); echo "<br>"; 
    $fileActualExt = strtolower(end($fileExt));
    

    // checking whether the extension is in the array
    if(in_array($fileActualExt, $allowedFiles)){
        if ($fileerror === 0) {
            if($filesize < 5000000){
                $newFilename = "profile". $session_id.".". $fileActualExt;

                $newFileDestination = 'uploads/'. $newFilename;

                // updating in the sql
                $sql = "UPDATE profileimg SET status=0 WHERE userid='$session_id';";
                move_uploaded_file($fileTmpname, $newFileDestination);
                $sql_run = mysqli_query($conn, $sql);
                // header("Location: ../login.php?uploadSuccess");
                header("Location: ../students/student.home.php?uploadSuccess");
            }else{
                echo "This type of image is too large";
            }
        }else{
            echo "There was an error while uploading";
        }
    }else{
        header("Location: student.home.php?cannot upload this file");
    }




}else{
    echo "click the upload button";
}
?>