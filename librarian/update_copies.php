<?php
include '../includes/library_database.php';
include './librarianHeader.php';
?>

<form action="#" method="GET">
    <input type="numbers" name="b_isbn" placeholder="Book ISBN" required><br><br>
    <input type="numbers" name="b_copies" placeholder="no of copies" required><br><br>
    <button type="submit" name="submit_add">Add copies</button><br><br>
</form>

<?php
    if(isset($_GET['submit_add'])) {
       $b_isbn = mysqli_real_escape_string($conn, $_GET['b_isbn']);
        $b_copies = mysqli_real_escape_string($conn, $_GET['b_copies']);
        
        // checking whether the ISBN inserted matches with the one in the database
        $query = "SELECT * FROM books WHERE b_isbn = ? ;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $query)) {
            echo "failed to run the prepared statement";
        }else{
        mysqli_stmt_bind_param($stmt, "i", $b_isbn);
        mysqli_stmt_execute($stmt);
       $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);

        if ($row > 0) {
            $query = "UPDATE books SET b_copies = b_copies + ?;";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $query)) {
                echo "failed to run the prepared statement";
            } else {
                mysqli_stmt_bind_param($stmt, "i", $b_copies);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                
                if (!mysqli_stmt_execute($stmt)) {
                    echo "Didnt add the copies into the system";
                }else{
                    echo "Successfully added the copies into the database";
                }
        }
        }else{
            echo "didnt find any similar type of isbn";
        }
    }
    }else{
        echo "click the add copy to insert the book records inside the database";
    }
?>