<?php
session_start();
$book_title = $_SESSION['b_title'];

echo " <form action='bookCatalogue.php' method='POST'>
<p>click this button to confirm request for <strong>$book_title</strong></p>
<button type='submit' name='submit_request' >Confirm</button>
      </form>
      <a href='technology.php'>Go back</a> <br>";



?>
