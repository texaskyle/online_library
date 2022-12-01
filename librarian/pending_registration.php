<?php
include '../includes/library_database.php';
include './librarianHeader.php';
?>
<h1>manage the pending registartion of members</h1>
<h2>registered members</h2>

<?php
// display the available members
$query = "SELECT * FROM users";
$query_run = mysqli_query($conn, $query);
$no_of_rows = mysqli_num_rows($query_run);

echo '<table>';
if ($no_of_rows > 0) {
    echo '
    
    <tr>
        <th>id</th>
        <th>Username</th>
        <th>email</th>
        <th>pwd</th>
    </tr>';

    while ($row = mysqli_fetch_assoc($query_run)) {
        echo '
    <tr>
        <td>';
        echo $row['id'] . '</td>
        <td>';
        echo $row['username'] . '</td>
        <td>';
        echo $row['email'] . '</td>
        <td>';
        echo $row['pwd'] . '</td>
    </tr>';
    }
    echo '</table><br>';
    // inserting the users into verified registration table
    echo '<form action="pending_registration.php" method="POST">
    <p>Enter the member id number to verify them</p>
    <input type="number" name="member_id" placeholder="Member id">
    <input type="submit" name="submit_add" value="Confirm">
    <input type="submit" name="submit_reject" value="Reject">
</form>';

if (isset($_POST['member_id'])) {
        //    insert the member into the verified users table
     $id =   $row['id'];
     $username = $row['username'];
      $email = $row['email'];
      $pwd = $row['pwd'];
$query ="INSERT INTO verified_users (id, username, email, pwd) VALUES ($id, $username, $email, $pwd);";
$query_run = mysqli_query($conn, $query);
if ($query_run) {
    echo "Successfully verified the member";
}else{
    echo "Member not yet verified";
}
}else{
    echo "Enter the member id";
}
} else {
    echo "No member has been registered";
}

?>


