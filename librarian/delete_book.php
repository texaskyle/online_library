<?php
include '../includes/library_database.php';
include './librarianHeader.php';
session_start();
?>
<h3>search the book that you want to delete</h3>
<p>Search by book isbn or book title or book author</p>
<form action="#" method="GET">
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
            $_SESSION['book_id'] = $row['book_id'];
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

<!-- deleting a form -->

    <form action="delete_book.php" method="GET">
    <p>Enter book index or book name to confirm delete!!</p>
    <input type="text" name="book_id_or_name" placeholder="Book id/ Book name">
    <input type="submit" name="delete_submit" value="Delete">
</form><br>
        
<?php
if(isset($_GET['delete_submit'])) {
    $book_id_or_name = mysqli_real_escape_string($conn, $_GET['book_id_or_name']);
    // query to delete data from the database
    $query = "DELETE FROM books WHERE book_id = '$book_id_or_name' OR b_title = '$book_id_or_name';";
    $query_run = mysqli_query($conn, $query);

   if ($query_run) {
    echo "successful deleted <strong>".$book_id_or_name ." </strong>book";
   }else{
    echo "Failed to deleted <strong>" . $book_id_or_name . " </strong>book";
   }
}else{
    echo "click the delete button";
}

?>

    