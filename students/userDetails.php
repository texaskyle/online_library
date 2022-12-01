<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./student.css">
</head>

<body>



    <?php
    session_start();
    include_once '../includes/library_database.php';
    $sessionid = $_SESSION['userId'];

    // running a database query take the loged in user details
    $sql = "SELECT * FROM users WHERE id='$sessionid';";
    $sql_results = mysqli_query($conn, $sql);
    if (mysqli_num_rows($sql_results)) {
        while ($row = mysqli_fetch_assoc($sql_results)) {

            // running another query inside the profileimg table to check if the user has already updated a profile oicture inside the database
            $id = $row['id'];
            $query = "SELECT * FROM profileimg WHERE userid ='$id'";
            $query_run = mysqli_query($conn, $query);

            if (mysqli_num_rows($query_run) == 1) {
                while ($rowprofile = mysqli_fetch_assoc($query_run)) {
                    echo "<div class = 'user-container'>";
                    if ($rowprofile['status'] == 0) {
                        // checking the file info the image that the user has uploaded
                        $filename = 'uploads/profile' . $sessionid . "*";
                        $fileinfo = glob($filename);
                        $fileExt = explode(".", $fileinfo[0]);
                        $fileActualExt = $fileExt[1];
                        echo "<img src='uploads/profile" . $id . "." . $fileActualExt . "?" . mt_rand() . "'>";
                    } else {
                        // this will be default image which is echoed when the user will not have uploaded a profile image 
                        echo "<img src='uploads/profileDefault.jfif'>";
                    }
                    echo "<p class = 'pUsername'>". $row['username']. "</p>";
                    echo "</div>";
                }
            } else {
                echo "experince an error while looking for the number of rows returned";
            }
        }
    } else {
        echo "No such user inside the database";
    }
    ?>
</body>

</html>