<?php
include 'librarianHeader.php';
require '../includes/library_database.php';
?>


<form action="insert_book.php" method="POST">
    
   Book picture if any! <input type="file" name="b_profile"> <br>

    <input type="number" name="b_isbn" placeholder="ISBN" required> <br>

    <input type="text" name="b_title" placeholder="Book Title"> <br>

    <input type="text" name="b_author" placeholder="Book author"> <br>

    <h4>category</h4>
    <select name="b_category" id="">
        <option value="">Technology</option>
        <option value="">Medical</option>
        <option value="">History</option>
        <option value="">Education</option>
        <option value="">Literature</option>
        <option value="">kiswahili</option>
        <option value="">Sports</option>
    </select> <br>

    <input type="number" name="b_copies" placeholder="The number of copies"> <br>

    <input type="number" name="b_price" placeholder="The price of the book"> <br>

    <input type="submit" name="add_copy" value="Add Book"> <br>
</form>

<?php
// checking if the submit "add_copy" is clicked
if (isset($_POST['add_copy'])) {
    // checking if a book with the same isbn exist
    $b_isbn = mysqli_real_escape_string($conn,$_POST['b_isbn']);
    $query = "SELECT * FROM books WHERE b_isbn='$b_isbn'";
    $query_run = mysqli_query($conn, $query);
    $num_rows = mysqli_num_rows($query_run);
    if ($num_rows>=1) {
        echo "A book with this ISBN already exist <br>
        Enter a unique ISBN!!";
    }else{
        // inserting a book into the database using prepared statements

        $b_profile = mysqli_real_escape_string($conn, $_POST['b_profile']);
        $b_isbn = mysqli_real_escape_string($conn, $_POST['b_isbn']);
        $b_title = mysqli_real_escape_string($conn, $_POST['b_title']);
        $b_author = mysqli_real_escape_string($conn, $_POST['b_author']);
        $b_category = $_POST['b_category'];
        $b_copies = mysqli_real_escape_string($conn, $_POST['b_copies']);
        $b_price = mysqli_real_escape_string($conn,
            $_POST['b_price']
        );

        $query = "INSERT INTO books(b_profile, b_isbn, b_title, b_author, b_category, b_copies, b_price) VALUES(?, ?, ?, ? ,? ,? ,?);";
        // using prepared statements to insert into the database.
        $stmt = mysqli_stmt_init($conn);
        
        if (!mysqli_stmt_prepare($stmt, $query)) {
            echo "the prepared statement to prepare the insert book didnt run";
        }else{
            mysqli_stmt_bind_param($stmt, "sisssii", $b_profile, $b_isbn, $b_title, $b_author, $b_category, $b_copies, $b_price);
            $recording = mysqli_stmt_execute($stmt);
             if ($recording) {
                echo "successful recorded <strong> ". $b_title. "</strong> book";
            }else{
                echo "You encounted an error while recording the book";
            } 
        }
    }
}else{
    echo "Please click the add copy button!!";
}
?>