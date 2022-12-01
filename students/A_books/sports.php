<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports books</title>
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
    <h1>SPORTS BOOKS</h1>

    <?php
    include_once '../../includes/library_database.php';

    // selecting all the books that are in the field of sports
    $sql = "SELECT * FROM books WHERE b_category LIKE '%sports%' ORDER BY b_title ASC;";
    $sql_run = mysqli_query($conn, $sql);

    // checking if the sql query run
    if (mysqli_num_rows($sql_run) > 0) {
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

            echo " <tr>
                <td>" . $row['book_id'] . "</td>
                <td>" . $row['b_profile'] . "</td>
                <td>" . $row['b_isbn'] . "</td>
                <td>" . $row['b_title'] . "</td>
                <td>" . $row['b_author'] . "</td>
                <td>" . $row['b_category'] . "</td>
                <td>" . $row['b_copies'] . "</td>
                <td>" . $row['b_price'] . "</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "<strong> currently there are no books of this category </strong>";
    }

    ?>
    <br>
    <a href="../student.home.php">Go back</a>
</body>

</html>