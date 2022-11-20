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
    <title>Document</title>
    <style>
        table{border:2px solid black;
              border: spacing 25px;
              padding:10px;
              text-align: center;
        }
        th{
            padding: 5px;
        }
    </style>
</head>

<body>
    <?php




    $sql = "SELECT * FROM books ORDER BY b_title ASC";
    $sql_run = mysqli_query($conn, $sql);

    $no_of_rows = mysqli_num_rows($sql_run);
    if ($no_of_rows == 0) {
        echo "There are no books currently available";
    } else {
        echo "there are " . $no_of_rows . " books available <br>";

        echo "
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
        while ($results = mysqli_fetch_assoc($sql_run)) {
            echo "<tr>

            <td>" . $results['book_id'] . "</td>
            <td>" . $results['b_isbn'] . "</td>
            <td>" . $results['b_title'] . "</td>
            <td>" . $results['b_author'] . "</td>
            <td>" . $results['b_category'] . "</td>
            <td>" . $results['b_copies'] . "</td>
            <td>" . $results['b_price'] . "</td>
        </tr>";
        }
    }
    ?>

</body>

</html>