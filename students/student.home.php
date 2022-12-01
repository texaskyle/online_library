<?php
// session_start();
include_once '../includes/library_database.php';

//  $sessionid = $_SESSION['userId'];

include_once 'userDetails.php';

?>
<!-- uploading profile picture form -->
<form action='uploadProfilePic.php' method='POST' enctype='multipart/form-data'>
    <input type='file' name='file'>
    <button type='submit' name='uploadFile'>Upload</button>
</form>

<!-- deleting profile picture form -->
<form action="deleteprofile.php" method="POST">
    <button type="submit" name="deleteprofile">Delete profile</button>
</form>

<h1>list of available books according to category</h1>
<h2>choose the book category</h2>

<ul>
    <li>
        <a href="./A_books/technology.php">Technology</a>&nbsp;&nbsp;
        <a href="./A_books/medical.php">Medical</a>&nbsp;&nbsp;
        <a href="./A_books/history.php">History</a>&nbsp;&nbsp;
        <a href="./A_books/education.php">Education</a>&nbsp;&nbsp;
        <a href="./A_books/literature.php">Literature</a>&nbsp;&nbsp;
        <a href="./A_books/kiswahili.php">kiswahili</a>&nbsp;&nbsp;
        <a href="./A_books/sports.php">Sports</a>&nbsp;&nbsp;
    </li>
</ul>





<form action="logout.student.php" method="POST">
    <button type="submit" name="logout">Logout</button>
</form>