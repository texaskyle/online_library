<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technology books</title>
    <style>
        table {
            border: 2px solid black;
            border: spacing 25px;
            padding: 10px;
            text-align: center;
        }

        th {
            padding: 5px;
        }
    </style>
</head>

<body>

    <?php
    include_once '../../includes/library_database.php';

    // selecting all the books that are in the field of technology
    $sql = "SELECT * FROM books WHERE b_category LIKE '%technology%' ORDER BY b_title ASC;";
    $sql_run = mysqli_query($conn, $sql);

    // checking if the sql query run
    if ($numRows = mysqli_num_rows($sql_run) > 0) {

        echo "<table>
        <tr>
            <th>book_id</th>	
            <th>b_profile</th>	
            <th>b_isbn</th>	
            <th>b_title</th>	
            <th>b_author</th>	
            <th>b_category</th>	
            <th>b_copies</th>	
            <th>b_price</th>
	</th>
        </tr>";
        while ($row = mysqli_fetch_assoc($sql_run)) {
            // input type="checkbox" name="programming" id="" value ="GO">
            echo " 
            
                <td>" . $row['book_id'] . "</td>   
                <td>" . $row['b_profile'] . "</td>
                <td>" . $row['b_isbn'] . "</td>
                <td>" . $row['b_title'] . "</td>
                <td>" . $row['b_author'] . "</td>
                <td>" . $row['b_category'] . "</td>
                <td>" . $row['b_copies'] . "</td>
                <td>" . $row['b_price'] . "</td>
                </tr> ";
        }

        echo "</table><br><br>";
    } else {
        echo "<strong> currently there are no books of this category </strong>";
    }

    // query to fetch a book from the database 
        
        if (!empty($_POST['book_id'])) {
            # code...
            if (isset($_POST['book_id'])) {
                $book_id = mysqli_real_escape_string($conn, $_POST['book_id']);
                $sql = "SELECT * FROM books where book_id = '$book_id ';";
                $sql_run = mysqli_query($conn, $sql);
                if (mysqli_num_rows($sql_run) > 0) {
                    while ($row = mysqli_fetch_assoc($sql_run)) {
                       session_start();
                      
                    echo  $_SESSION['b_title'] = $row['b_title'];
                        echo "<br>";
                    }
                } else {
                    echo "no such book in the database";
                }
            } else {
                header("Location: technology.php?emptyField");
            }
        }

        ?>


    <form action='#' method='POST'>
        <p>Enter the book id that you want to request for:</p>
        <input type="number" name="book_id" placeholder="book id" require><br><br>
        <button type='submit' name='request'>Search</button>
        <br>
        <!-- <button type='submit' name='request'>Request book/ books</button> -->
    </form>

    <!-- a form to add books in the students catalogue -->
    <?php
    if (isset($_SESSION['b_title'])) {
        header("location: bookCatalogue.php?requestSuccessful");
    }
    ?>
    <br>
    <a href="../student.home.php">Go back</a>

</body>

</html>