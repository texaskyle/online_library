<?php
include '../includes/library_database.php';
include './librarianHeader.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search page</title>
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

    <h2>Welcome to the Search Page</h2>
    <form action="search_copy.php" method="GET">
        <input type="text" name="search" placeholder="search"> <br><br>
        <button type="submit" name="search_button">Search</button>
    </form>

    <?php

    if (isset($_GET['search_button']) && strlen($_GET['search']) >= 3) {

        $search = strtolower(mysqli_real_escape_string($conn, $_GET['search']));
        $query = "SELECT * FROM books WHERE b_isbn LIKE '%$search%' OR b_title LIKE '%$search%' OR b_author LIKE '%$search%' OR b_category LIKE '%$search%' OR b_price LIKE '%$search%'";
        $query_run = mysqli_query($conn, $query);
        $no_of_rows = mysqli_num_rows($query_run);

        if ($no_of_rows > 0) {
            echo "There were " . $no_of_rows . " results obtained <br>";

            echo " <strong>Search Results:</strong>
             <table>
        <tr>
            <th style='margin:5px' ;>book id</th>
            <th>book isbn</th>
            <th>book title</th>
            <th>book author</th>
            <th>book category</th>
            <th>book copies</th>
            <th>book price</th>
        </tr>";
            while ($row = mysqli_fetch_assoc($query_run)) {
                echo "<tr>
                
                    <td>" . $row['book_id'] . "</td>
                    <td>" . $row['b_isbn'] . "</td>
                    <td>" . $row['b_title'] . "</td>
                    <td>" . $row['b_author'] . "</td>
                    <td>" . $row['b_category'] . "</td>
                    <td>" . $row['b_copies'] . "</td>
                    <td>" . $row['b_price'] . "</td>
                </tr>";

            }

        } else {
            echo "The searched book didnt match any book in the database";
        }
    } else {
        echo "enter more than three characters";
    }
    

    ?>
</body>
</html>
    