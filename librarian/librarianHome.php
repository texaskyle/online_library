<?php
include 'librarianHeader.php';
session_start();
?>


<ul>
    <li><a href="insert_book.php">Insert new book record</a></li>
    <li> <a href="update_copies.php">Update copies of a book</a></li>
    <li> <a href="search_copy.php">Search a copy of a book</a></li>
    <li> <a href="delete_book.php">delete book record</a></li>
    <li> <a href="display_book.php">Display available books</a></li>
    <li> <a href="pending_reg_member.php">Manage pending book request</a></li>
    <li> <a href="update_balance">Update balance of members</a></li>
    <li> <a href="due_handler.php">Today's reminder</a></li>
    <li> <a href="pending_registration.php">Pending registration</a></li>
</ul>

<form action="logoutAdmin.php" method="POST">
    <button type="submit" name="logoutAdmin">Logout</button>
</form>



<?php
include './librarianFooter.php'
?>